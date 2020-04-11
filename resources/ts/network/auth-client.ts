import {client} from './api-client'

interface RegisterForm {
    name: string,
    email: string,
    password: string
}

function register(form: RegisterForm) {
    return client('/register', form)
}

export {register}
