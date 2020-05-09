import React, { useReducer, useMemo } from "react";
import Navbar from "../components/navbar";
import { useHistory } from "react-router-dom";
import { useCreateMission } from "../utils/mission";
import IconActionButton from "../components/icon-action-button";
import { BeatLoader } from "react-spinners";
import { useMissions } from "../utils/mission";
import MissionCard from "../components/mission-card";
import Alert from "../components/alert";
import { Tabs, Tab, TabList, TabPanel } from "react-tabs";
import noResults from "../../assets/illustrations/void-illustration.svg";
import "../../../sass/admin/tabs.scss";

function Missions() {
    const history = useHistory();
    const [mutate, { status }] = useCreateMission();
    const { data } = useMissions();
    const [alert, setAlert] = useAlert();

    async function handleAddMissionClick() {
        try {
            const data = await mutate();
            history.push(`/make-mission/${data.id}`);
        } catch (e) {
            setAlert({
                showing: true,
                message: "Error experienced unable to create mission",
                timeout: 5000,
                onClose: () => setAlert({ showing: false })
            });
        }
    }

    const [draftMissions, publishedMissions] = useMemo(() => {
        if (!data) return [null, null];
        const drafts = [],
            published = [];
        data.forEach(mission => {
            if (mission.status === "draft") drafts.push(mission);
            else published.push(mission);
        });
        return [drafts, published];
    }, [data]);

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

                <Tabs className="mt-3">
                    <TabList>
                        <Tab>Published</Tab>
                        <Tab>Drafts</Tab>
                    </TabList>

                    <TabPanel>
                        <div className="row d-flex my-4">
                            {data && publishedMissions.length !== 0 ? (
                                publishedMissions.map(mission => (
                                    <MissionCard
                                        {...mission}
                                        date={
                                            mission.date
                                                ? new Date(mission.date)
                                                : null
                                        }
                                        key={mission.id}
                                        data-testid="mission-card"
                                    />
                                ))
                            ) : (
                                <div className="col-lg-4 col-md-5 col-7 mx-auto mt-5 text-center">
                                    <img
                                        width="100%"
                                        height="100%"
                                        src={noResults}
                                        alt="No published missions illustration"
                                    />
                                    <span>No published missions yet</span>
                                </div>
                            )}
                        </div>
                    </TabPanel>
                    <TabPanel>
                        <div className="row d-flex my-4">
                            {data && draftMissions.length !== 0 ? (
                                draftMissions.map(mission => (
                                    <MissionCard
                                        {...mission}
                                        date={
                                            mission.date
                                                ? new Date(mission.date)
                                                : null
                                        }
                                        key={mission.id}
                                        data-testid="mission-card"
                                    />
                                ))
                            ) : (
                                <div className="col-lg-4 col-md-5 col-7 mx-auto mt-5 text-center">
                                    <img
                                        width="100%"
                                        height="100%"
                                        src={noResults}
                                        alt="No draft missions illustration"
                                    />
                                    <span>No draft missions yet</span>
                                </div>
                            )}
                        </div>
                    </TabPanel>
                </Tabs>
            </div>

            <Alert {...alert} />
        </>
    );
}

function useAlert() {
    const [alert, setAlert] = useReducer((s, a) => ({ ...s, ...a }), {
        showing: false,
        message: "",
        actionText: "",
        onActionClick: null,
        onClose: null,
        timeout: 4500
    });

    return [alert, setAlert];
}

export default Missions;
