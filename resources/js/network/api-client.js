import {getCsrfToken} from "../utils/csrf";

function client(endpoint, data, customConfig = {}) {
    const headers = {
        'X-CSRF-TOKEN': getCsrfToken(),
        'Accept': 'application/json',
    };

    const options = {
        method: data ? 'POST' : 'GET',
        ...customConfig,
        headers: {
            ...headers,
            ...customConfig.headers
        }
    }

    if (data) {
        if (data instanceof FormData)
            options.body = data
        else
            options.body = JSON.stringify(data);
    }

    // const _options = {
    //     ...options,
    //     ...customConfig
    // }

    return window.fetch(`${process.env.REACT_APP_API_URL}/${endpoint}`, options)
        .then(async res => {
            if (res.status === 401) {
                redirectToLogin()
                return
            }

            const data = await res.json();
            if (res.ok)
                return data;
            else
                return Promise.reject(data)
        })
}

function redirectToLogin() {
    window.location.assign(`${process.env.APP_URL}?login=true`)
}

export default client
