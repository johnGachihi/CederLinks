import {getCsrfToken} from "../utils/csrf";

function client(endpoint, data, headers) {
    const options = {};
    options.headers = {
        'X-CSRF-TOKEN': getCsrfToken(),
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        ...headers
    };

    if (data) {
        options.method = 'POST'
        options.body = JSON.stringify(data);
    }

    return window.fetch(`${process.env.REACT_APP_API_URL}/${endpoint}`, options)
        .then(async res => {
            if (res.status === 401){
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
