function onSuccessfulResponse() {
    $('#g-captcha-val').val('checked')
}

function onResponseExpired() {
    $('#g-captcha-val').val('unchecked')
}

window.gcaptcha = {
    onSuccessfulResponse,
    onResponseExpired
};
