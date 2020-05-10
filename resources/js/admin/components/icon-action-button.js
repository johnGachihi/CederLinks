import React from "react";
import ActionButton from "./action-button";

function IconActionButton(props) {
    const { icomoonIcon, label, ...others } = props;
    return (
        <ActionButton {...others}>
            <i className={icomoonIcon}></i>
            {props.label ? (
                <span style={{ marginLeft: "8px" }}>{label}</span>
            ) : null}
        </ActionButton>
    );
}

export default IconActionButton;
