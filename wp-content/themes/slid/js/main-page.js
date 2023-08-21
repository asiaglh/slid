document.addEventListener('DOMContentLoaded', function() {
    if(document.querySelectorAll('.main-page').length) {
        let windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        const onlineBtn = document.getElementById('btn-online');
        //const storeBtn = document.getElementById('btn-store');
        const videoThumbnail = document.querySelector('.video__thumbnail');
        const testimonialBtns = document.querySelectorAll('.testimonial__btn');
        const mainPage = document.querySelector('.main-page__content');
        const trailer = document.querySelector('.trailer');

        if (windowWidth > 767) {
            onlineBtn.innerText = "Замовити онлайн";
            //storeBtn.innerText = "Знайти в магазині";
        }

        testimonialBtns.forEach(el => {
            el.addEventListener('click', ({target}) => {
                const parent = target.closest('.testimonial__description');
                textBlock = parent.querySelector('.testimonial__text');
                if (!textBlock.matches('.active')) {
                    textBlock.classList.add('active');
                    target.style.backgroundImage = "url(./assets/minus.svg)"
                    target.innerText = "Приховати";
                } else {
                    textBlock.classList.remove('active');
                    target.style.backgroundImage = "url(./assets/plus.svg)"
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
            }
        }


        checkMainContentHeight();
        window.addEventListener("resize", checkMainContentHeight)

        /*********************/
        createVideoPoster(videoThumbnail, 'uBcUVycMHDE');
    }

});
