document.addEventListener('DOMContentLoaded', function() {

    if(document.querySelectorAll('.menu__list').length) {
        const headerNav = document.querySelector('.menu__list');

        document.body.addEventListener('scroll', () => {
            const verticalScrollPosition = document.body.scrollTop;
            verticalScrollPosition > 150
                ? headerNav.classList.add('menu__list-scroll')
                : headerNav.classList.remove('menu__list-scroll');
        });
    }

});


const createVideoPoster = (element, id) => {
    element.addEventListener('click', () => {
        const videoIframe = element.nextElementSibling;
        videoIframe.style.display = 'block';
        element.style.display = 'none';
        videoIframe.src = `https://www.youtube.com/embed/${id}?autoplay=1`;
    })
}




       


