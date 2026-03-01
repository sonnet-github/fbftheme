const accordions = e => {
    const container = document.querySelectorAll('.js-accordions');
    
    if (container.length) {
        const trigger = document.querySelectorAll('.js-accordion-heading');
        const $parentClass = '.js-accordion-item';

        trigger.forEach(elem => {
            elem.addEventListener('click', e => {
                e.preventDefault();

                if (e.currentTarget.classList.contains('active')) {
                    e.currentTarget.classList.remove('active');
                    e.currentTarget.closest($parentClass).classList.remove('active');
                } else {
                    e.currentTarget.classList.add('active');
                    e.currentTarget.closest($parentClass).classList.add('active');
                }
            });
        });
    }
}

export default accordions