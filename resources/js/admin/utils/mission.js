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
                if (
                    missionsQuery &&
                    Date.now() - missionsQuery.state.updatedAt <= 2 * 60 * 1000
                ) {
                    return missionsQuery?.state.data?.find(
                        mission => mission.id === missionId
                    );
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
        onSuccess: newMission => {
            queryCache.setQueryData("missions", old => [...old, newMission]);
        },
        onSettled: () => {
            queryCache.refetchQueries("missions");
        },
        useErrorBoundary: false,
        throwOnError: true
    });
}

function useUpdateMission() {
    return useMutation(({ id, data }) => missionClient.update(id, data), {
        onSuccess: updatedMission => {
            queryCache.setQueryData("mission", updatedMission);
            queryCache.setQueryData("missions", old => {
                return old?.map(mission =>
                    mission.id === updatedMission.id ? updatedMission : mission
                );
            });
        },
        onSettled: () => {
            queryCache.refetchQueries("missions");
        },
        throwOnError: true
    });
}

function useRemoveMission() {
    return useMutation(({ id }) => missionClient.remove(id), {
        onMutate: removedMission => {
            const previousMissions = queryCache.getQueryData("missions");

            queryCache.setQueryData("missions", old =>
                old?.filter(mission => mission.id !== removedMission.id)
            );

            return () => queryCache.setQueryData("missions", previousMissions);
        },
        onError: (error, variables, rollback) => rollback(),
        onSettled: () => {
            queryCache.refetchQueries("missions");
        },
        throwOnError: true
    });
}

export {
    useMissions,
    useMission,
    useCreateMission,
    useUpdateMission,
    useRemoveMission
};
