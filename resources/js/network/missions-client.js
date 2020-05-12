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

function remove(missionId) {
    return client(`admin/mission/${missionId}`, {method: "DELETE"})
}

export {create, read, update, readAll, remove}
