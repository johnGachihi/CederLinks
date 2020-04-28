import React from "react";
import {Snackbar} from "@material/react-snackbar";

function Alert({showing, message, actionText, onActionClick, onClose, timeout = 5000}) {
    function setUpSnackBar(snackBar) {
        if (snackBar && onActionClick)
            snackBar.handleActionClick = onActionClick
    }

    return (
        <Snackbar
            open={showing}
            ref={setUpSnackBar}
            message={message}
            actionText={actionText}
            timeoutMs={timeout}
            onClose={onClose}
        />
    )
}

export default Alert
