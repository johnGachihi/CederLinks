import React from 'react'
import Navbar from "../components/navbar"
import ActionButton from "../components/action-button"
import {useHistory} from "react-router-dom"

function Missions() {
    const history = useHistory()
    return (
        <div>
            <Navbar/>
            <div className="container">
                <div className="_toolbar_">
                    <ActionButton onClick={() => history.push('/make-mission')}>
                        <i className="icon-plus" style={{'marginRight': '8px'}}></i>
                        <span>Add Mission</span>
                    </ActionButton>
                </div>
            </div>
        </div>
    )
}

export default Missions;
