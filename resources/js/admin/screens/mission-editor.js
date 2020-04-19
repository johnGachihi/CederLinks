import React, {useState, createRef, useEffect} from 'react'
import Navbar from "../components/navbar";
import IconActionButton from "../components/icon-action-button";
import defaultImage from "../../assets/images/philippe-unsplash.jpg"
import ReactTooltip from "react-tooltip";
import ImageUploader from "../components/image-uploader";



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
            </div>
        </div>
    )
}

export default MissionEditor
