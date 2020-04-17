import React from 'react'
import Navbar from "../components/navbar";

function Missions() {
    return (
        <div>
            <Navbar/>
            <div className="container">
                <div style={stickyNav}></div>
            </div>
        </div>
    )
}

const stickyNav = {
    'display': 'none',
    'height': '50px',
    'borderBottom': '1px solid gray',
    'position': 'sticky',
    'top': '50px',
    'left': '0'
}

export default Missions;
