import React, { useState } from "react";
import { Switch, Route, useRouteMatch } from "react-router-dom";
import MissionEditor from "./mission-editor";
import MissionsList from "./missionsList";

function Missions() {
    const match = useRouteMatch();
    const [openTab, setOpenTab] = useState(tab.PUBLISHED);

    return (
        <Switch>
            <Route
                path={`${match.path}make-mission/:missionId`}
                children={<MissionEditor />}
            />
            <Route path={`${match.path}`}>
                <MissionsList openTab={openTab} setOpenTab={setOpenTab} />
            </Route>
        </Switch>
    );
}

const tab = {
    PUBLISHED: "published",
    DRAFT: "drafts"
};

export default Missions;
export { tab };
