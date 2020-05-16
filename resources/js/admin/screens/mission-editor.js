import React, { useState, useReducer, useEffect } from "react";
import { useParams, useHistory } from "react-router-dom";
import "../../../sass/admin/mission-editor.scss";
import Navbar from "../components/navbar";
import IconActionButton from "../components/icon-action-button";
import ActionButton from "../components/action-button";
import ImageUploader from "../components/image-uploader";
import TextField from "../components/textfield";
import DatePicker from "../components/datepicker";
import Editor from "../components/editor";
import { BeatLoader } from "react-spinners";
import {
    useMission,
    useUpdateMission,
    useRemoveMission
} from "../utils/mission";
import moment from "moment";
import Alert from "../components/alert";
import "../../../sass/admin/snackbar.scss";
import "../../../sass/admin/dialog.scss";
import Dialog, {
    DialogTitle,
    DialogContent,
    DialogFooter,
    DialogButton
} from "@material/react-dialog";
import Loader from "../components/loader";

function MissionEditor() {
    const { missionId } = useParams("id");
    const history = useHistory();
    const [mission, missionStatus] = useMission(Number(missionId));
    const [mutate, { status }] = useUpdateMission();
    const [
        removeMissionMutation,
        { status: removeMissionMutationStatus }
    ] = useRemoveMission();
    const [editorError, setEditorError] = useState(null);
    const [alert, setAlert] = useState({
        showing: false,
        message: null,
        action: {
            text: null,
            action: null
        },
        timeout: null
    });
    const [dialogIsOpen, setDialogIsOpen] = useState(false);

    const [inputs, setInputs] = useReducer((s, a) => ({ ...s, ...a }), {});

    useEffect(() => setInputs(mission), [missionStatus]);

    async function saveMission() {
        const form = getInputsFormFromState(inputs);
        try {
            await mutate({ id: mission.id, data: form });
            setAlert({
                ...alert,
                showing: true,
                message: "Saved successfully"
            });
        } catch (e) {
            setAlert({
                showing: true,
                message: "Unable to save. Something went wrong",
                action: { text: "Retry", action: () => saveMission() },
                timeout: 10000
            });
        }
    }

    async function publishMission() {
        const form = getInputsFormFromState(inputs);
        form.set("status", "published");

        try {
            await mutate({ id: mission.id, data: form });
            setAlert({
                ...alert,
                showing: true,
                message: "Published successfully"
            });
        } catch (e) {
            setAlert({
                showing: true,
                message: "Unable to publish. Something went wrong",
                action: { text: "Retry", action: () => publishMission() },
                timeout: 10000
            });
        }
    }

    async function unPublishMission() {
        const form = getInputsFormFromState(inputs);
        form.set("status", "draft");
        console.log(mission);

        try {
            await mutate({ id: mission.id, data: form });
            setAlert({
                ...alert,
                showing: true,
                message: "Unpublished successfully"
            });
        } catch (e) {
            setAlert({
                showing: true,
                message: "Unable to unpublish. Something went wrong",
                action: { text: "Retry", action: () => unPublishMission() },
                timeout: 10000
            });
        }
    }

    async function removeMission() {
        try {
            await removeMissionMutation({ id: Number(mission.id) });
            history.push("/");
        } catch (e) {
            setAlert({
                showing: true,
                message: "Unable to delete. Something went wrong",
                action: { text: "Retry", action: () => removeMission() },
                timeout: 10000
            });
        }
    }

    if (editorError) return "Error loading editor. " + editorError;

    if (missionStatus === "loading") return "Loading :/";

    return (
        <div>
            <Navbar />
            <div className="container">
                <div className="_toolbar_ separate">
                    <div>
                        <IconActionButton
                            onClick={saveMission}
                            icomoonIcon="icon-save"
                            label="Save"
                        />
                        <span
                            className="mission-status"
                            data-testid="mission-status"
                        >
                            {mission?.status}
                        </span>
                    </div>
                    <Loader
                        loading={
                            status === "loading" ||
                            removeMissionMutationStatus === "loading"
                        }
                        aria-label="Saving mission"
                    />
                    <div>
                        {mission && mission.status === "published" ? (
                            <ActionButton
                                onClick={unPublishMission}
                                className="mr-1"
                            >
                                Unpublish
                            </ActionButton>
                        ) : (
                            <ActionButton
                                onClick={publishMission}
                                className="mr-1"
                            >
                                Publish
                            </ActionButton>
                        )}

                        <div className="dropdown d-inline">
                            <IconActionButton
                                id="dropdown"
                                icomoonIcon="icon-chevron-down"
                                type="button"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                aria-label="Dropdown button"
                            />
                            <div
                                className="dropdown-menu dropdown-menu-right"
                                aria-labelledby="dropdown"
                            >
                                <button
                                    className="dropdown-item"
                                    onClick={() => setDialogIsOpen(true)}
                                >
                                    <i
                                        className="icon-delete"
                                        style={{ paddingRight: "5px" }}
                                    ></i>
                                    <span>Delete this mission</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="row">
                    <div className="col-lg-4 col-md-6 mx-auto my-4">
                        <ImageUploader
                            image={
                                typeof inputs.image === "string"
                                    ? `${process.env.IMAGES_URL}/${inputs.image}`
                                    : inputs.image
                            }
                            onImageChange={image => setInputs({ image })}
                            cssClass="image-uploader"
                        />
                    </div>
                </div>
                <div className="row">
                    <div className="col-md-8 mx-auto">
                        <TextField
                            onTextChange={title => setInputs({ title })}
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
                            onDateChange={date => setInputs({ date })}
                        />
                    </div>
                </div>
                <div
                    className="row"
                    style={{ marginTop: "40px", marginBottom: "40px" }}
                >
                    <div className="col-md-8 mx-auto">
                        <Editor
                            initData={inputs.description}
                            onError={error => setEditorError(error)}
                            onChange={newData =>
                                setInputs({ description: newData })
                            }
                        />
                    </div>
                </div>
            </div>

            <Alert
                showing={alert.showing}
                message={alert.message}
                actionText={alert.action.text}
                onActionClick={alert.action.action}
                timeout={alert.timeout}
                onClose={() => setAlert({ ...alert, showing: false })}
            />

            <Dialog
                open={dialogIsOpen}
                onClose={action => {
                    setDialogIsOpen(false);
                    if (action === "delete") {
                        removeMission();
                    }
                }}
            >
                <DialogTitle>Delete Mission</DialogTitle>
                <DialogContent>
                    Are you sure you want to delete this mission?
                </DialogContent>
                <DialogFooter>
                    <DialogButton action="dismiss">Cancel</DialogButton>
                    <DialogButton action="delete" isDefault>
                        Delete
                    </DialogButton>
                </DialogFooter>
            </Dialog>
        </div>
    );
}

function getInputsFormFromState(inputs) {
    const form = new FormData();
    form.set("image", inputs.image ?? "");
    form.set("title", inputs.title ?? "");
    form.set("date", inputs.date ?? "");
    form.set("description", inputs.description ?? "");

    return form;
}

const editorConfig = {
    placeholder: "Insert the mission description here"
};

export default MissionEditor;
