import React, {useRef, useState} from 'react'
import Navbar from "../components/navbar";
import IconActionButton from "../components/icon-action-button";
import ReactTooltip from "react-tooltip";
import ImageUploader from "../components/image-uploader";
import TextField from "../components/textfield";
import DatePicker from "../components/datepicker"
import CKEditor from "@ckeditor/ckeditor5-react"
import BalloonBlockEditor from "@ckeditor/ckeditor5-build-balloon-block"

function MissionEditor() {
    let editor = useRef(null)
    let [editorError, setEditorError] = useState(null)

    if (editorError)
        return 'Error loading editor';

    return (
        <div>
            <Navbar/>
            <div className="container">
                <div className="_toolbar_">
                    <IconActionButton
                        onClick={() => console.log(editor.current.getData())}
                        icomoonIcon="icon-save"
                        label="Save"
                    />
                </div>

                <div className="row">
                    <div className="col-lg-4 col-md-6 mx-auto my-4">
                        <ImageUploader
                            onImageChange={() => console.log("mission-editor -- image change")}
                            cssClass="image-uploader"
                        />
                    </div>
                </div>
                <div className="row">
                    <div className="col-md-8 mx-auto">
                        <TextField
                            onTextChange={(text) => console.log(text)}
                            placeholder="Mission title"
                            inputClasses="mission-title-input"
                        />
                    </div>
                </div>
                <div className="row">
                    <div className="col-md-8 mx-auto">
                        <DatePicker
                            placeholder={"Mission date"}
                            onDateChange={date => console.log(date)}
                        />
                    </div>
                </div>
                <div className="row" style={{marginTop: '40px'}}>
                    <div className="col-md-8 mx-auto">
                        <CKEditor
                            editor={BalloonBlockEditor}
                            config={editorConfig}
                            onInit={_editor => editor.current = _editor}
                            onError={error => setEditorError(error)}
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
