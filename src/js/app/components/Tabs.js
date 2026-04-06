const tabs = e => {
    const container = document.querySelectorAll('.js-tabs');
    const thisHAsh = window.location.hash;
    
    if (container.length) {
        const tabHeading = document.querySelectorAll('.js-tab-heading');
        const tabContent = document.querySelectorAll('.js-tab-content');
        const tabHeadingBackground = document.querySelector('.js-tab-background');

        tabHeading.forEach(elem => {
            elem.addEventListener('click', e => {
                e.preventDefault();

                if (!e.currentTarget.classList.contains('active')) {
                    const thisID = e.currentTarget.querySelector('a').hash;
                    removeClass(tabHeading, 'active');
                    e.currentTarget.classList.add('active');

                    removeClass(tabContent, 'active');

                    if (document.querySelector('.js-tab-content' + thisID) !== null && document.querySelector('.js-tab-content' + thisID) !== undefined) {
                        document.querySelector('.js-tab-content' + thisID).classList.add('active');
                    }
                }

                if (tabHeadingBackground !== null && tabHeadingBackground !== undefined) {
                    setActiveBackground(tabHeadingBackground, e.currentTarget);
                }
            });
        });

        if (tabHeadingBackground !== null && tabHeadingBackground !== undefined) {
            const activeElem = document.querySelector('.js-tab-heading.active');
            setActiveBackground(tabHeadingBackground, activeElem);
        }
    }

    if (thisHAsh !== null && thisHAsh !== undefined) {
        if (thisHAsh == '#guidelines-b') {
            document.querySelector('.js-tab-heading:last-child a').click();
            if (document.querySelector('#guidelines-b').length) {
                console.log('test');
                document.querySelector('#guidelines-b').scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }

        if (thisHAsh == '#faq-b') {
            document.querySelector('.js-tab-heading:last-child a').click();
            if (document.querySelector('#faq-b').length) {
                console.log('test');
                document.querySelector('#faq-b').scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
    }
}

const removeClass = (elems, thisClass) => {
    elems.forEach(elem => {
        elem.classList.remove(thisClass);
    });
}

const setActiveBackground = (elem, refElem) => {
    elem.style.width = refElem.offsetWidth + "px";
    elem.style.height = refElem.offsetHeight + "px";
    elem.style.left = refElem.offsetLeft + "px";
}

export default tabs