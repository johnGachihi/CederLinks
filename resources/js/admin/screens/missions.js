import React from 'react'
import Navbar from "../components/navbar"
import ActionButton from "../components/action-button"
import {useHistory} from "react-router-dom"
import IconActionButton from "../components/icon-action-button";

function Missions() {
    const history = useHistory()
    return (
        <div>
            <Navbar/>
            <div className="container">
                <div className="_toolbar_">
                    <IconActionButton icomoonIcon="icon-plus" label="Add Mission"/>
                </div>
            </div>
        </div>
    )
}

export default Missions;
