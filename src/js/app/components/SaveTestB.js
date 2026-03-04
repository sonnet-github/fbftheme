const saveTestB = e => {

    const form = document.querySelector('#test-b-form');
    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const checklist = Array.from(
            document.querySelectorAll('input[name="chat_gpt_considers"]:checked')
        ).map(el => el.value);

        if (checklist.length === 0) {
            alert('Please select at least one checklist option.');
            return;
        }

        const formData = new FormData();
        formData.append('action', 'submit_test_b');
        formData.append('security', SDEV.nonce);

        formData.append('date_of_post', document.getElementById('date-of-post').value);
        formData.append('post_url', document.getElementById('post-url').value);
        formData.append('chatgpt_analysis', document.getElementById('chat-gpt-url').value);

        checklist.forEach(value => {
            formData.append('chat_gpt_considers[]', value);
        });

        try {
            const response = await fetch(SDEV.ajax_url, {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.success) {
                // alert(result.data.message);
                // form.reset();
                if (document.querySelector('.js-form-container') !== null && document.querySelector('.js-form-container') !== undefined) {
                    document.querySelector('.js-form-container').classList.add('hidden');
                    document.querySelector('.js-thank-you-container').classList.add('active');
                }
                
            } else {
                alert(result.data.message);
            }

        } catch (error) {
            alert('Something went wrong.');
        }

    });
    
}

export default saveTestB