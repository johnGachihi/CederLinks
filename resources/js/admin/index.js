import App from "./app";
import AppProviders from "./providers/app-providers"

require('./bootstrap');

import React from 'react';
import ReactDom from 'react-dom';

ReactDom.render(
    <AppProviders>
        <App/>
    </AppProviders>,
    document.getElementById('root')
);
