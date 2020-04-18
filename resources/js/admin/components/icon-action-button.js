import React from 'react'
import ActionButton from "./action-button";

function IconActionButton({icomoonIcon, label}) {
    return (
        <ActionButton>
            <i className={icomoonIcon}></i>
            <span style={{'marginLeft': '8px'}}>{label}</span>
        </ActionButton>
    )
}

export default IconActionButton
