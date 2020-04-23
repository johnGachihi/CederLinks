import client from "./api-client";

function create() {
    return client('admin/mission', {}, {method: 'POST'})
}

function read(id) {
    return client(`admin/mission/${id}`)
}

function readAll() {
    return client('admin/mission')
}

function update(id, form) {
    return client(`admin/mission/${id}`, form, {}, {method: 'PUT'})
}

export {create, read, update, readAll}
