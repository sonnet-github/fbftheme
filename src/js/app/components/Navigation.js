const navigation = e => {
    const triggers = document.querySelectorAll('.js-menu-trigger');
    const closePopup = document.querySelectorAll('.js-close-navigation');
    const body = document.querySelector('body');

    if (triggers.length) {
        triggers.forEach(elem => {
            elem.addEventListener('click', e => {
                e.preventDefault();
                
                if (body.classList.contains('active-navigation')) {
                    body.classList.remove('active-navigation');
                } else {
                    body.classList.add('active-navigation');
                }
            });
        });
    }

    if (closePopup.length) {
        closePopup.forEach(elem => {
            elem.addEventListener('click', e => {
                e.preventDefault();
                body.classList.remove('active-navigation');
            });
        });
    }
}

export default navigation