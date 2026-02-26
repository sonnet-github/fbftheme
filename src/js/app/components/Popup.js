const popup = e => {
    const triggers = document.querySelectorAll('.js-popup');
    const closePopup = document.querySelectorAll('.js-close-popup');
    const body = document.querySelector('body');

    if (triggers.length) {
        triggers.forEach(elem => {
            elem.addEventListener('click', e => {
                e.preventDefault();
                const thisID = e.currentTarget.hash;
                const targetElem = document.querySelector(thisID)
                
                if (targetElem !== undefined && targetElem !== null) {
                    targetElem.classList.add('current-popup-active');
                    body.classList.add('active-popup');

                    if (e.currentTarget.classList.contains('js-popup-login')) {
                        e.currentTarget.closest('.current-popup-active').classList.remove('current-popup-active');
                    }
                }
            });
        });
    }

    if (closePopup.length) {
        closePopup.forEach(elem => {
            elem.addEventListener('click', e => {
                e.preventDefault();
                body.classList.remove('active-popup');
                document.querySelector('.current-popup-active').classList.remove('current-popup-active');
            });
        });
    }
}

export default popup