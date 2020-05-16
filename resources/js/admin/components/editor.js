import React from "react";
import CKEditor from "@ckeditor/ckeditor5-react";
import BalloonBlockEditor from "@ckeditor/ckeditor5-build-balloon-block";
import "../../../sass/admin/editor.scss";

const editorConfig = {
    placeholder: "Insert the mission description here"
};

function Editor({ initData, onError, onChange }) {
    return (
        <CKEditor
            editor={BalloonBlockEditor}
            config={editorConfig}
            onInit={editor => {
                if (initData) editor.setData(initData);
            }}
            onError={error => onError(error)}
            onChange={(event, editor) => {
                onChange(editor.getData());
            }}
        />
    );
}

export default Editor;
