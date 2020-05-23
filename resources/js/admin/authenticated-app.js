import React from "react";
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";
import Missions from "./screens/missions";

function AuthenticatedApp() {
    return (
        <Router basename="admin">
            <Switch>
                <Route path="/" children={<Missions />} />
            </Switch>
        </Router>
    );
}

export default AuthenticatedApp;
