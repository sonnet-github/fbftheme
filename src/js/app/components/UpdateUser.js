import { validateFields } from "../helper";

const updateUser = e => {
    const form = document.querySelector('#profile-form');

    const updateProfile = async (formData) => {
        try {
            const response = await fetch(SDEV.ajax_url, {
            method: 'POST',
            body: formData
            });

            const result = await response.json();

            if (result.success) {
                // alert(result.data.message);

                document.querySelector('body').classList.remove('active-popup');
                const formContainer = document.querySelector('.profile-container__right');

                const thankYouContainer = document.createElement('div');
                thankYouContainer.className = 'profile-container__right-thank-you';
                thankYouContainer.innerHTML = "<h6>Your profile has been saved successfully</h6>";

                if (formContainer) {
                    formContainer.prepend(thankYouContainer);
                }
            } else {
                alert(result.data.message);
            }
        } catch (error) {
            console.error('AJAX error:', error);
        }
    };

    form?.addEventListener('submit', (e) => {
        e.preventDefault();
        const inputFields = form.querySelectorAll('.required-field');
        
        if (inputFields.length) {

            if (validateFields(inputFields)) {
                return;
            }
            
        }

        const formData = new FormData(form);

        formData.append('action', 'update_profile');
        formData.append('security', SDEV.nonce);

        updateProfile(formData);
    });
}

export default updateUser