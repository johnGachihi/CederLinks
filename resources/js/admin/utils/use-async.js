import React from 'react'

const initialState = {status: 'idle', data: null, error: null}

function useAsync() {
    const [{status, data, error}, setState] = React.useReducer(
        (s, a) => ({...s, ...a}),
        initialState
    )

    const safeSetState = useSafeDispatch(setState)

    const run = React.useCallback(
        promise => {
            if (!promise || !promise.then)
                throw new Error('The argument passed to useAsync().run must be a promise')
            safeSetState({status: 'pending'})
            return promise.then(
                data => {
                    safeSetState({data, status: 'resolved'})
                    return data
                },
                error => {
                    safeSetState({error, status: 'rejected'})
                    return error
                }
            )
        },
        [safeSetState]
    )

    const setData = React.useCallback(
        data => safeSetState({data}),
        [safeSetState]
    )
    const setError = React.useCallback(
        error => safeSetState({error}),
        [safeSetState]
    )
    const reset = React.useCallback(
        () => safeSetState(initialState),
        [safeSetState]
    )

    return {
        isIdle: status === 'idle',
        isLoading: status === 'pending',
        isError: status === 'rejected',
        isSuccess: status === 'resolved',
        setData,
        setError,
        reset,
        status,
        data,
        error,
        run
    }
}

function useSafeDispatch(dispatch) {
    const mounted = React.useRef(false)
    React.useLayoutEffect(() => {
        mounted.current = true
        return () => (mounted.current = false)
    }, [])
    return React.useCallback(
        (...args) => (mounted.current ? dispatch(...args) : void 0),
        [dispatch]
    )
}

export default useAsync
