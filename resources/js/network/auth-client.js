import client from "./api-client";

function getUser() {
    return client('admin/me').then(data => data.user)
}

function logout() {
    return client('logout')
}

export {getUser, logout}
