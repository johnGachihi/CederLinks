import client from "./api-client";

function create() {
    return client('admin/mission', {})
}

function read(id) {
    return client(`admin/mission/${id}`)
}

function readAll() {
    return client('admin/mission')
}

function update(id, form) {
    return client(`admin/mission/${id}`, form)
}

export {create, read, update, readAll}
