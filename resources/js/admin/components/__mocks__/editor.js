import React, { useEffect } from "react";

let shouldError = false;
let error = "";
function __shouldError(_error) {
    shouldError = true;
    error = _error;
}

function Editor({ initData, onError, onChange }) {
    useEffect(() => {
        if (shouldError) {
            shouldError = false
            onError(error)
        }
    }, [shouldError])

    return (
        <textarea
            value={initData}
            onChange={event => onChange(event.target.value)}
        />
    );
}

export default Editor;
export { __shouldError };
