import React from 'react'
import Navbar from "../components/navbar"
import ActionButton from "../components/action-button"
import {useHistory} from "react-router-dom"
import {useCreateMission} from "../utils/mission";
import IconActionButton from "../components/icon-action-button";
import {BeatLoader} from "react-spinners";

function Missions() {
    const history = useHistory()
    const [mutate, {status}] = useCreateMission()

    async function handleAddMissionClick() {
        try {
            const data = await mutate()
            history.push(`/make-mission/${data.id}`)
        } catch (e) {
            console.log("Error mutating", e)
        }
    }

    return (
        <div>
            <Navbar/>
            <div className="container">
                <div className="_toolbar_">
                    <IconActionButton
                        icomoonIcon="icon-plus"
                        label="Add Mission"
                        onClick={handleAddMissionClick}
                    />
                    <BeatLoader loading={status === 'loading'} color="#afa939"/>
                </div>
            </div>
        </div>
    )
}

export default Missions;
