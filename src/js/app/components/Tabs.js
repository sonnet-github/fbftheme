const tabs = e => {
    const container = document.querySelectorAll('.js-tabs');
    
    if (container.length) {
        const tabHeading = document.querySelectorAll('.js-tab-heading');
        const tabContent = document.querySelectorAll('.js-tab-content');

        tabHeading.forEach(elem => {
            elem.addEventListener('click', e => {
                e.preventDefault();

                if (!e.currentTarget.classList.contains('active')) {
                    const thisID = e.currentTarget.querySelector('a').hash;
                    removeClass(tabHeading, 'active');
                    e.currentTarget.classList.add('active');

                    removeClass(tabContent, 'active');
                    document.querySelector('.js-tab-content' + thisID).classList.add('active');
                }
            });
        });
    }
}

const removeClass = (elems, thisClass) => {
    elems.forEach(elem => {
        elem.classList.remove(thisClass);
    });
}

export default tabs