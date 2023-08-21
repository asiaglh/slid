
document.addEventListener('DOMContentLoaded', function() {
  const headerNav = document.querySelector('.menu__list');

  document.body.addEventListener('scroll', ()=> {
    const verticalScrollPosition = document.body.scrollTop;
    verticalScrollPosition > 150
        ? headerNav.classList.add('menu__list-scroll')
        : headerNav.classList.remove('menu__list-scroll');
  });
});



