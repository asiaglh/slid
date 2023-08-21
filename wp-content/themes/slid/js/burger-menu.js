const menuIcon = document.querySelector('.menu__icon');
const menuBody = document.querySelector('.menu_wrapper');
const menuItems = document.querySelectorAll('.menu__item');

if(menuIcon) {
    menuIcon.addEventListener('click', () => {
        document.body.classList.toggle('lock');
        menuIcon.classList.toggle('active');
        menuBody.classList.toggle('active');
    })
}

menuItems.forEach(el => {
    el.addEventListener('click', ({currentTarget}) => {
        const parent = currentTarget.closest('.menu_wrapper')
        if(parent.matches('.active')) {
            document.body.classList.remove('lock');
            menuIcon.classList.remove('active');
            menuBody.classList.remove('active');
        }
    })
})

