const deleteAccount = e => {
    const btn = document.querySelector('.js-delete-confirm');
    if (!btn) return;

    btn.addEventListener('click', async () => {

        const formData = new FormData();
        formData.append('action', 'delete_my_account');
        formData.append('security', SDEV.nonce); // use your existing nonce

        try {
            const response = await fetch(SDEV.ajax_url, { // use your existing ajax_url
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.success) {
                alert(result.data.message);
                window.location.href = '/'; // redirect after deletion
            } else {
                alert(result.data.message);
            }
        } catch (error) {
            console.error(error);
            alert('Something went wrong.');
        }
    });

}

export default deleteAccount