export const validateFields = (inputFields) => {
    const inputs = inputFields;
    let errorCounter = 0;

    if (inputs.length) {
        inputs.forEach(input => {
            const existing = input.nextElementSibling;
            if (existing && existing.classList.contains('error-msg')) {
                existing.remove();
            }

            let message = '';

            if (!input.value.trim()) {
                message = 'This field is required';
                errorCounter++;
            } else if (input.type === 'email' && !input.validity.valid) {
                message = 'Please enter a valid email';
                errorCounter++;
            }

            if (message) {
                const span = document.createElement('span');
                span.className = 'error-msg';
                span.textContent = message;

                input.insertAdjacentElement('afterend', span);
            }
        });
    }

    console.log(errorCounter);

    return errorCounter;
}