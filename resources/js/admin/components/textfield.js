import React, {useRef, useEffect} from 'react'
import {MDCTextField} from "@material/textfield/component";

function TextField(props) {
    const textField = useRef(null)

    useEffect(() => {
        new MDCTextField(textField.current)
    }, [])

    return (
        <label
            ref={textField}
            className="mdc-text-field mdc-text-field--outlined mdc-text-field--fullwidth"
        >
            <div className="mdc-text-field__ripple"></div>
            <input
                className="mdc-text-field__input"
                type="text"
                aria-labelledby="my-label-id"
                onChange={(e) => props.onTextChange(e.target.value)}
            />
            <span className="mdc-floating-label" id="my-label-id">Mission Title</span>
            <div className="mdc-line-ripple"></div>
        </label>
    )
}

export default TextField
