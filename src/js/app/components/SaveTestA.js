import { validateFields } from "./../helper";

const saveTestA = e => {

    const form = document.querySelector('#test-a-form');
    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const inputFields = form.querySelectorAll('.required-field');

        if (inputFields.length) {
            if (validateFields(inputFields)) {
                return;
            }
        }

        const fields = [
            'date-of-post',
            'linkedin-test-post-url',
            'no-of-impressions',
            'no-of-members-reached',
            'no-of-reactions',
            'no-of-comments',
            'no-of-reports',
            'no-of-saves',
            'no-of-sends',
            'buddy-linkedin-profile',
            'buddy-linkedin-post'
        ];

        // Frontend required check
        for (let id of fields) {
        const input = document.getElementById(id);
        if (!input || input.value.trim() === '') {
            alert('All fields are required.');
            input.focus();
            return;
        }
        }

        const formData = new FormData();
        formData.append('action', 'submit_test_a');
        formData.append('security', SDEV.nonce);

        formData.append('date_of_post', document.getElementById('date-of-post').value);
        formData.append('linkedin_test_post_url', document.getElementById('linkedin-test-post-url').value);
        formData.append('no_of_impressions', document.getElementById('no-of-impressions').value);
        formData.append('no_of_members_reached', document.getElementById('no-of-members-reached').value);
        formData.append('no_of_reactions', document.getElementById('no-of-reactions').value);
        formData.append('no_of_comments', document.getElementById('no-of-comments').value);
        formData.append('no_of_reports', document.getElementById('no-of-reports').value);
        formData.append('no_of_saves', document.getElementById('no-of-saves').value);
        formData.append('no_of_sends', document.getElementById('no-of-sends').value);
        formData.append('buddy_linkedin_profile_url', document.getElementById('buddy-linkedin-profile').value);
        formData.append('buddy_linkedin_post_url', document.getElementById('buddy-linkedin-post').value);

        try {
        const response = await fetch(SDEV.ajax_url, {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (result.success) {
            // alert(result.data.message);

            window.location.href = "#thank-you";

            document.querySelector('.test-page__tab-heading').classList.add('hidden');
            document.querySelector('.js-form-container').classList.add('hidden');
            document.querySelector('.js-thank-you-message').classList.remove('hidden');
            
            form.reset();
        } else {
            alert(result.data.message);
        }

        } catch (error) {
            alert('Something went wrong.');
        }

    });
    
}

export default saveTestA