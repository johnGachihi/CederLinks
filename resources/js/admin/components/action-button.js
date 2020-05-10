import React from 'react'

function ActionButton(props) {
    return (
        <button {...props} className={`_action-button_ ${props.className ?? ""}`}>
            {props.children}
        </button>
    )
}

export default ActionButton
