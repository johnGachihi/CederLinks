function getCsrfToken() {
    const meta = document.querySelector('meta[name="csrf-token')
    if (meta === undefined) {
        throw new Error(
            'Meta element with name="csrf-token" and content="<csrf-token>" must be defined in the html')
    }
    return  meta.getAttribute('content')
}

export {getCsrfToken}
