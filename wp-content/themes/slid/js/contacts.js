if(document.querySelectorAll('.store__tabs').length) {
    const tabsBlock = document.querySelector('.store__tabs');
    const tabs = document.querySelectorAll('.store__tab');
    const blocks = document.querySelectorAll('.store__block');

    tabsBlock.addEventListener('click', ({target}) => {
        console.log(target)
        if (target.matches('.store__tab')) {
            tabs.forEach(tab => tab.classList.remove('active'));
            target.classList.add('active');
            blocks.forEach(block => {
                block.dataset.block === target.dataset.tab
                    ? block.classList.add('active')
                    : block.classList.remove('active')
            })
        }
    })
}