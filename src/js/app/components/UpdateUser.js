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
                if (document.querySelector('.profile-container__right-thank-you')) {
                    document.querySelector('.profile-container__right-thank-you').remove();
                }
                const firstname = form.querySelector('#first_name').value;
                const lastname = form.querySelector('#last_name').value;
                const gender = form.querySelector('#gender').value;
                const linkedinurl = form.querySelector('#linkedin_url').value;
                const linkedin_followers = form.querySelector('#linkedin_followers').value;
                const country_region = form.querySelector('#country_region').value;

                document.querySelector('.js-firstname').innerText = `${firstname} ${lastname}`;
                document.querySelector('.js-gender').innerText = `${gender}`;
                document.querySelector('.js-linkedinurl').innerText = `${linkedinurl}`;
                document.querySelector('.js-linkedinfollowers').innerText = `${linkedin_followers}`;
                document.querySelector('.js-countryregion').innerText = `${country_region}`;

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