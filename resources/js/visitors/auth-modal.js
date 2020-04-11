let currentTab = '';

enterRegistrationState();

$('#modal-register').on('click', e => {
    e.preventDefault();
    enterRegistrationState();
});

$('#modal-login').on('click', e => {
    e.preventDefault();
    enterLoginState();
});

function enterRegistrationState() {
    currentTab = 'register';
    $('#register-tab').removeClass('d-none');
    $('#login-tab').addClass('d-none');
    $('#modal-register').addClass('active');
    $('#modal-login').removeClass('active');
}

function enterLoginState() {
    currentTab = 'login';
    $('#register-tab').addClass('d-none');
    $('#login-tab').removeClass('d-none');
    $('#modal-login').addClass('active');
    $('#modal-register').removeClass('active');
}


$('#auth-modal-show').on('click', e => {
    e.preventDefault();
    $('#auth-modal').modal();
});

$('#registration-form').on('submit', function (e) {
    e.preventDefault();
    $(this).addClass('was-validated');
    if (!validateRegistrationForm(this))
        return;

    this.submit();
});

function validateRegistrationForm(form) {
    let isValid = true;
    const htmlFields = ['name', 'email', 'password'];
    for (const fieldName of htmlFields) {
        const field = form[fieldName];
        if (!field.checkValidity()) {
            setError(field, field.validationMessage);
            isValid = false;
        }
    }
    return isValid;
}

function setError(element, error) {
    $(element).siblings('.invalid-feedback').text(error)
}
