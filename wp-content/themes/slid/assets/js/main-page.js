
document.addEventListener('DOMContentLoaded', function() {
    let windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    const onlineBtn = document.getElementById('btn-online');
    //const storeBtn = document.getElementById('btn-store');
    const videoThumbnail = document.querySelector('.video__thumbnail');
    const videoIframe = document.querySelector('.trailer__iframe');
    const testimonialBtns = document.querySelectorAll('.testimonial__btn');
    const mainPage = document.querySelector('.main-page__content');
    const trailer = document.querySelector('.trailer');

if(windowWidth > 767 ) {
    onlineBtn.innerText = "Замовити онлайн";
    //storeBtn.innerText = "Знайти в магазині";
}

    testimonialBtns.forEach(el => {
        el.addEventListener('click', ({target}) => {
            const parent = target.closest('.testimonial__description');
            textBlock = parent.querySelector('.testimonial__text');
            if(!textBlock.matches('.active')) {
                textBlock.classList.add('active');
                target.innerText = "Приховати";
            } else {
                textBlock.classList.remove('active');
                target.innerText = "Повністю";
            }
        })
    })

    /****************/
    const checkMainContentHeight = () => {
        const screenHeight = window.innerHeight;
        const mainContentHeight = mainPage.offsetHeight;
        if (screenHeight < mainContentHeight) {
            const paddingDifference = mainContentHeight - screenHeight;
            const currentPadding = parseInt(window.getComputedStyle(trailer).paddingTop);
            const newPadding = currentPadding + paddingDifference;
            trailer.style.paddingTop = `calc(7.5rem + ${newPadding}px)`;
        }
    }
    checkMainContentHeight();
    window.addEventListener("resize", checkMainContentHeight)

    /*********************/
    videoThumbnail.addEventListener('click', () => {
            videoIframe.style.display = 'block';
            videoThumbnail.style.display = 'none';
            videoIframe.src = "https://www.youtube.com/embed/uBcUVycMHDE?autoplay=1";
        }
    );
});