import React from 'react';
import {Link, NavLink, useLocation} from "react-router-dom";

function Navbar() {
    return (
        <nav className="_navbar_">
            <div className="container">
                <a className="navbar-brand" href={`${process.env.APP_URL}`}>CederLinks</a>
                <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span className="oi oi-menu"></span> Menu
                </button>

                <div className="collapse navbar-collapse" id="ftco-nav">
                    <ul className="navbar-nav ml-auto">
                        <li className="nav-item">
                            <NavLink to="/" activeClassName="active" className="nav-link">Missions</NavLink>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    )
}

export default Navbar
