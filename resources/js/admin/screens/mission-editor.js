import React, {useState, useReducer, useEffect} from 'react'
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
import moment from "moment";

function MissionEditor() {
    const {missionId} = useParams('id')
    const [mission, missionStatus] = useMission(missionId)
    const [mutate, {status}] = useUpdateMission()
    const [editorError, setEditorError] = useState(null)
    const [inputs, setInputs] = useReducer(
        (s, a) => ({...s, ...a}), {})

    useEffect(() => setInputs(mission), [missionStatus])


    async function saveMission() {
        const form = new FormData()
        form.set('image', inputs.image ?? '')
        form.set('title', inputs.title ?? '')
        form.set('date', inputs.date ?? '')
        form.set('description', inputs.description ?? '')

        try {
            await mutate({id: mission.id, data: form})
        } catch (e) {
            // Save request not successful
            // Tell users there's an error
        }
    }

    if (editorError)
        return 'Error loading editor';

    if (missionStatus === 'loading')
        return 'Loading :/'

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
                            image={typeof inputs.image === 'string'
                                ? `${process.env.IMAGES_URL}/${inputs.image}`
                                : inputs.image
                            }
                            onImageChange={image => setInputs({image})}
                            cssClass="image-uploader"
                        />
                    </div>
                </div>
                <div className="row">
                    <div className="col-md-8 mx-auto">
                        <TextField
                            onTextChange={title => setInputs({title})}
                            placeholder="Mission title"
                            inputClasses="mission-title-input"
                            value={inputs.title ?? ""}
                        />
                    </div>
                </div>
                <div className="row">
                    <div className="col-md-8 mx-auto">
                        <DatePicker
                            placeholder={"Mission date"}
                            date={inputs.date ? moment(inputs.date) : null}
                            onDateChange={date => setInputs({date})}
                        />
                    </div>
                </div>
                <div className="row" style={{marginTop: '40px', marginBottom: '40px'}}>
                    <div className="col-md-8 mx-auto">
                        <CKEditor
                            editor={BalloonBlockEditor}
                            config={editorConfig}
                            onInit={editor => {
                                if (inputs.description)
                                    editor.setData(inputs.description)
                            }}
                            onError={error => setEditorError(error)}
                            onChange={(event, editor) => {
                                setInputs({description: editor.getData()})
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
