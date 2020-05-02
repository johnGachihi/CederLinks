import React, { useReducer } from "react";
import Navbar from "../components/navbar";
import { useHistory } from "react-router-dom";
import { useCreateMission } from "../utils/mission";
import IconActionButton from "../components/icon-action-button";
import { BeatLoader } from "react-spinners";
import { useMissions } from "../utils/mission";
import MissionCard from "../components/mission-card";
import Alert from "../components/alert";

function Missions() {
    const history = useHistory();
    const [mutate, { status }] = useCreateMission();
    const { data } = useMissions();
    const [alert, setAlert] = useAlert()

    async function handleAddMissionClick() {
        try {
            const data = await mutate();
            history.push(`/make-mission/${data.id}`);
        } catch (e) {
            setAlert({
                showing: true,
                message: "Error experienced unable to create mission",
                timeout: 5000,
                onClose: () => setAlert({showing: false})
            })
        }
    }

    return (
        <>
            <Navbar />
            <div className="container">
                <div className="_toolbar_">
                    <IconActionButton
                        icomoonIcon="icon-plus"
                        label="Add Mission"
                        onClick={handleAddMissionClick}
                    />
                    <BeatLoader
                        loading={status === "loading"}
                        color="#afa939"
                    />
                </div>

                <div className="row d-flex my-4">
                    {data && data.map(mission => (
                        <MissionCard
                            {...mission}
                            date={mission.date ? new Date(mission.date) : null}
                            key={mission.id}
                            data-testid="mission-card"
                        />
                    ))}
                </div>
            </div>

            <Alert {...alert}/>
            {/* message= */}
        </>
    );
}

function useAlert() {
    const [alert, setAlert] = useReducer((s, a) => ({ ...s, ...a }), {
        showing: false,
        message: '',
        actionText: '',
        onActionClick: null,
        onClose: null,
        timeout: 4500
    });

    return [alert, setAlert]
}

export default Missions;
