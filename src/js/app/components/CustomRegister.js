import {validateFields} from "./../helper";

const customRegister = e => {
    const form = document.querySelector('#form-register');
    const formMessageContainer = form.querySelector('.js-form-message');

    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const inputFields = form.querySelectorAll('.required-field');

        if (inputFields.length) {

            if (validateFields(inputFields)) {
                return;
            }
            
        }

        const formData = new FormData(form);
        formData.append('action', 'custom_register');
        formData.append('security', SDEV.nonce);
        formMessageContainer.innerHTML = "";

        formMessageContainer.classList.remove('error');

        try {
            const response = await fetch(SDEV.ajax_url, {
                method: 'POST',
                body: formData,
            });

            const result = await response.json();

            if (result.success) {
                formMessageContainer.innerHTML = "<p>" + result.data.message + "</p>";
                
                if (result.data.message == 'Registration successful.') {
                    
                    window.location.href = '/profile/';
                }

                form.reset();

            } else {
                formMessageContainer.classList.add('error');
                formMessageContainer.innerHTML = "<p>" + result.data.message + "</p>";
            }

        } catch (error) {
            formMessageContainer.classList.add('error');
            formMessageContainer.innerHTML = "<p>Registration error</p>";
        }
    });
}

export default customRegister