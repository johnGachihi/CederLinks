import React from 'react'

function ActionButton(props) {
    return (
        <button className="_action-button_" {...props}>
            {props.children}
        </button>
    )
}

export default ActionButton
