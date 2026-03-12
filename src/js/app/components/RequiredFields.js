const requiredFields = e => {
    const inputs = document.querySelectorAll('input[required]');

    if (inputs.length) {
        inputs.forEach(input => {
            const existing = input.nextElementSibling;
            if (existing && existing.classList.contains('error-msg')) {
                existing.remove();
            }

            let message = '';

            if (!input.value.trim()) {
                message = 'This field is required';
            } else if (input.type === 'email' && !input.validity.valid) {
                message = 'Please enter a valid email';
            }

            if (message) {
                const span = document.createElement('span');
                span.className = 'error-msg';
                span.textContent = message;

                input.insertAdjacentElement('afterend', span);
            }

        });
    }
}

export default requiredFields