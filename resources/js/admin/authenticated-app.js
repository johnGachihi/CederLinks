import React from 'react'
import {BrowserRouter as Router, Switch, Route} from 'react-router-dom'
import Missions from "./screens/missions"
import MissionEditor from "./screens/mission-editor"

function AuthenticatedApp() {
    return (
        <Router basename="admin">
            <Switch>
                <Route path="/make-mission" children={<MissionEditor/>}/>
                <Route path="/" children={<Missions/>}/>
            </Switch>
        </Router>
    )
}

export default AuthenticatedApp
