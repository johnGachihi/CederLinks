import React from 'react';

function Navbar() {
    return (
        <nav className="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light scrolled awake"
             id="ftco-navbar">
            <a className="navbar-brand" href={`${process.env.APP_URL}`}>CederLinks</a>
            <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                    aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span className="oi oi-menu"></span> Menu
            </button>
        </nav>
    )
}

export default Navbar
