import React from 'react'
import useAsync from "../utils/use-async";
import * as authClient from '../../network/auth-client'
import bootstrapAppData from '../utils/bootstrap'

const AuthContext = React.createContext()

const appDataPromise = bootstrapAppData()

function AuthProvider(props) {
    const {
        run,
        setData,
        data,
        isLoading,
        isIdle,
        isError,
        error,
        isSuccess
    } = useAsync()

    React.useLayoutEffect(() => {
        // run(authClient.getUser())
        run(appDataPromise)
    }, [run])

    const logout = React.useCallback(() => {
        authClient.logout()
        setData(null)
    }, [setData])

    const user = data?.user

    const contextValue = React.useMemo(
        () => ({user, logout}),
        [user, logout]
    )

    if (isLoading || isIdle)
        return <div>Loading</div>

    if (isError)
        return <div>Error: {JSON.stringify(error)}</div>

    if (isSuccess)
        return <AuthContext.Provider value={contextValue} {...props}/>

    throw new Error('Unhandled status')
}

function useAuth() {
    const authContext = React.useContext(AuthContext)
    if (authContext === undefined)
        throw new Error('useAuth must be used within AuthProvider')

    return authContext
}

export {AuthProvider, useAuth}
