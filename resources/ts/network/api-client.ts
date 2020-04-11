import {getCsrfToken} from "../utils/csrf";

function client(endpoint: string,
                data?: object,
                headers?: object,
                handleUnauthorizedRequest?: (request: () => Promise<any>) => void)
{
    const options: RequestInit = {};
    options.headers = {
        'X-CSRF-TOKEN': getCsrfToken(),
        'Content-Type': 'application/json',
        ...headers
    };

    if (data)
        options.body = JSON.stringify(data);

    return window.fetch(`${process.env.APP_URL}/${endpoint}`, options)
        .then(async res => {
            const data = await res.json();
            if (res.ok)
                return data;
            else
                Promise.reject(data)
        })
}

export {client}
