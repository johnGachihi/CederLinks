import React from "react";
import { BeatLoader } from "react-spinners";

function Loader({ loading, color, ...others }) {
    return loading && (
        <div role="loader" {...others}>
            <BeatLoader color={color ?? "#afa939"} />
        </div>
    );
}

export default Loader;
