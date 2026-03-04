const loginViaEmail = e => {
    const formContainer = document.querySelector('#login-form');

    if (formContainer !== null && formContainer !== undefined) {
        const btnContinue = formContainer.querySelector('.js-continue-login');
        const btnLogIn = formContainer.querySelector('.js-btn-login');
        const inputEmail = formContainer.querySelector('#email-address-login');
        const inputLoginCode = formContainer.querySelector('#login-code');
        const textEmailContainer = formContainer.querySelector('.js-login-email');
        const tab1 = formContainer.querySelector('.js-login-tab-1');
        const tab2 = formContainer.querySelector('.js-login-tab-2');
        
        btnContinue.addEventListener('click', async e => {
            e.preventDefault();
            
            if (inputEmail.value.trim()) {
                const response = await sendLoginCode(inputEmail.value);
                console.log(response, "Send Login Code");

                textEmailContainer.innerHTML = inputEmail.value.trim();

                tab1.classList.remove('active');
                tab2.classList.add('active');
            } else {

            }
        });

        btnLogIn.addEventListener('click',async () => {
            const response = await verifyLoginCode(inputEmail.value, inputLoginCode.value);
            if (response.success) {
                window.location.reload(); // or redirect
            } else {
                alert(response.data.message);
            }
        });
    }

    async function sendLoginCode(email) {
        const formData = new FormData();
        formData.append('action', 'send_login_code');
        formData.append('security', SDEV.nonce);
        formData.append('email', email);

        const res = await fetch(SDEV.ajax_url, {
            method: 'POST',
            body: formData
        });

        return await res.json();
    }

    async function verifyLoginCode(email, code) {
        const formData = new FormData();
        formData.append('action', 'verify_login_code');
        formData.append('security', SDEV.nonce);
        formData.append('email', email);
        formData.append('code', code);

        const res = await fetch(SDEV.ajax_url, {
            method: 'POST',
            body: formData
        });

        return await res.json();
    }
}

export default loginViaEmail