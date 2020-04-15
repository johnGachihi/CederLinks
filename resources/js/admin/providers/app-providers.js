import React from 'react'
import {AuthProvider} from "./auth-provider";

function AppProviders({children}) {
    return (
        <AuthProvider>{children}</AuthProvider>
    )
}

export default AppProviders
