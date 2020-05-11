import { useQuery, useMutation, queryCache } from "react-query";
import * as missionClient from "../../network/missions-client";

function useMissions() {
    return useQuery({
        queryKey: "missions",
        queryFn: missionClient.readAll
    });
}

function useMission(missionId) {
    const { data, status } = useQuery({
        queryKey: ["mission", { id: missionId }],
        queryFn: getMission,
        config: {
            initialData: () => {
                const missionsQuery = queryCache.getQuery("missions");
                if (missionsQuery && Date.now() - missionsQuery.state.updatedAt <= 2*60*1000) {
                    return missionsQuery.state.data.find(d => d.id === missionId);
                }
            }
        }
    });
    return [data, status];
}

function getMission(queryKey, { id }) {
    return missionClient.read(id);
}

function useCreateMission() {
    return useMutation(missionClient.create, {
        onSettled: () => {
            queryCache.refetchQueries("missions");
        },
        useErrorBoundary: false,
        throwOnError: true
    });
}

function useUpdateMission() {
    return useMutation(({ id, data }) => missionClient.update(id, data), {
        onMutate: onUpdateMutation,
        onError: (error, newMission, rollback) => rollback(),
        onSettled: () => {
            queryCache.refetchQueries("missions");
        },
        // useErrorBoundary: false,
        throwOnError: true
    });
}

function onUpdateMutation(newMission) {
    const previousMissions = queryCache.getQueryData("missions");

    queryCache.setQueryData("missions", old => {
        return old.map(oldMission =>
            oldMission.id === newMission.id
                ? { ...oldMission, newMission }
                : oldMission
        );
    });

    return () => queryCache.setQueryData("missions", previousMissions);
}

function useDeleteMission(missionId) {}

export { useMissions, useMission, useCreateMission, useUpdateMission };
