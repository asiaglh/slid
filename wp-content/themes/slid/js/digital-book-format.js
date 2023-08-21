document.addEventListener('DOMContentLoaded', function() {


    const video = document.querySelector('.video__thumbnail');
    let windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;


    createVideoPoster(video, 'NjV6fhixCGo');

    if(windowWidth < 1024 ) {
        $(document).ready(function() {
            $('.digital__screenshots').lightSlider({
                item:1,
                slideMargin: 24,
                slideMove: 1,
                controls: false,
                autoWidth: true,
            });
        });
    }

});



