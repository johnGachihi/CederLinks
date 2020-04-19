import React from 'react'
import Navbar from "../components/navbar";
import IconActionButton from "../components/icon-action-button";
import ReactTooltip from "react-tooltip";
import ImageUploader from "../components/image-uploader";
import TextField from "../components/textfield";
import DatePicker from "../components/datepicker"

function MissionEditor() {
    return (
        <div>
            <Navbar/>
            <div className="container">
                <div className="_toolbar_">
                    <IconActionButton icomoonIcon="icon-save" label="Save"/>
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
            </div>
        </div>
    )
}

export default MissionEditor
