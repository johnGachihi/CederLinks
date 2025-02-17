import React from "react";
import { Snackbar } from "@material/react-snackbar";

function Alert({
    showing,
    message,
    actionText,
    onActionClick,
    timeout = 5000,
    ...callbacks
}) {
    function setUpSnackBar(snackBar) {
        if (snackBar && onActionClick)
            snackBar.handleActionClick = onActionClick;
    }

    return (
        <Snackbar
            open={showing}
            ref={setUpSnackBar}
            message={message}
            actionText={actionText}
            timeoutMs={process.env.NODE_ENV !== "test" ? timeout : 4000}
            {...callbacks}
        />
    );
}

export default Alert;
