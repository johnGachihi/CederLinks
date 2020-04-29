import App from "./app";
import AppProviders from "./providers/app-providers"

require('./bootstrap');

import React from 'react';
import ReactDom from 'react-dom';
import {BrowserRouter as Router, Switch} from "react-router-dom";
import {ReactQueryDevtools} from "react-query-devtools";

ReactDom.render(
    <AppProviders>
        <App/>
        <ReactQueryDevtools/>
    </AppProviders>,
    document.getElementById('root')
);
