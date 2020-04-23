import React from 'react';
import {useAuth} from "./providers/auth-provider";
import AuthenticatedApp from "./authenticated-app";
import UnauthenticatedApp from "./unauthenticated-app";

function App() {
    const {user} = useAuth()
    return user ? <AuthenticatedApp/> : <UnauthenticatedApp/>
}

export default App
