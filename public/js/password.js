document.addEventListener('DOMContentLoaded', function (event) {

    let targetElement = document.getElementById('password');
    let targetElement2 = document.getElementById('password-confirm')
    const triggerElement = document.getElementById('inputCheckbox');
    const triggerElement2 = document.getElementById('inputCheckbox2');

    triggerElement.addEventListener('change', function (event) {
        if (this.checked) {
            targetElement.setAttribute('type', 'text');
        } else {
            targetElement.setAttribute('type', 'password');
        }

    }, false)

    triggerElement2.addEventListener('change', function (event) {
        if (this.checked) {
            targetElement2.setAttribute('type', 'text');
        } else {
            targetElement2.setAttribute('type', 'password');
        }
    })

}, false);