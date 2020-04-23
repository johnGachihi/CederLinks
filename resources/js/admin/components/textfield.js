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
            className="mdc-text-field mdc-text-field--filled mdc-text-field--fullwidth"
        >
            <span className="mdc-text-field__ripple"></span>
            <input className={"mdc-text-field__input " + props.inputClasses}
                   type="text"
                   placeholder={props.placeholder}
                   aria-label="Full-Width Text Field"
                   onChange={(e) => props.onTextChange(e.target.value)}
                   value={props.value}
            />
            <span className="mdc-line-ripple"></span>
        </label>
    )
}

export default TextField
