import React, {useState, useCallback} from 'react'
import {useParams} from 'react-router-dom'
import "../../../sass/admin/mission-editor.scss"
import Navbar from "../components/navbar";
import IconActionButton from "../components/icon-action-button";
import ImageUploader from "../components/image-uploader";
import TextField from "../components/textfield";
import DatePicker from "../components/datepicker"
import CKEditor from "@ckeditor/ckeditor5-react"
import BalloonBlockEditor from "@ckeditor/ckeditor5-build-balloon-block"
import {BeatLoader} from "react-spinners";
import {useMission, useUpdateMission} from "../utils/mission";

function MissionEditor() {
    const {missionId} = useParams('id')
    const mission = useMission(missionId)
    const [mutate, {status}] = useUpdateMission()
    console.log('mission', mission)
    console.log('load status:', status)

    let [image, setImage] = useState(mission.image)
    let [title, setTitle] = useState(mission.title)
    let [date, setDate] = useState(mission.date)
    let [description, setDescription] = useState(mission.description)
    let [editorError, setEditorError] = useState(null)

    async function saveMission() {
        const form = new FormData()
        form.set('image', image)
        form.set('title', title)
        form.set('date', date)
        form.set('description', description)

        try {
            const data = await mutate({id: mission.id, data: form})
            console.log(data)
            console.log('aldskfjkalsdfhkjldfhkjalfkjjfnjn')
        } catch (e) {
            console.log(e)
            console.log('eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee')
        }

    }

    if (editorError)
        return 'Error loading editor';

    return (
        <div>
            <Navbar/>
            <div className="container">
                <div className="_toolbar_">
                    <IconActionButton
                        onClick={saveMission}
                        icomoonIcon="icon-save"
                        label="Save"
                    />
                    <BeatLoader loading={status === 'loading'} color="#afa939"/>
                </div>

                <div className="row">
                    <div className="col-lg-4 col-md-6 mx-auto my-4">
                        <ImageUploader
                            onImageChange={setImage}
                            cssClass="image-uploader"
                        />
                    </div>
                </div>
                <div className="row">
                    <div className="col-md-8 mx-auto">
                        <TextField
                            onTextChange={setTitle}
                            placeholder="Mission title"
                            inputClasses="mission-title-input"
                            value={title ?? ""}
                        />
                    </div>
                </div>
                <div className="row">
                    <div className="col-md-8 mx-auto">
                        <DatePicker
                            placeholder={"Mission date"}
                            // date={state.date.value}
                            onDateChange={setDate}
                        />
                    </div>
                </div>
                <div className="row" style={{marginTop: '40px', marginBottom: '40px'}}>
                    <div className="col-md-8 mx-auto">
                        <CKEditor
                            editor={BalloonBlockEditor}
                            config={editorConfig}
                            onError={error => setEditorError(error)}
                            onChange={(event, editor) => {
                                setDescription(editor.getData())
                            }}
                        />
                    </div>
                </div>
            </div>
        </div>
    )
}

const editorConfig = {
    placeholder: "Insert the mission description here",
}

export default MissionEditor
