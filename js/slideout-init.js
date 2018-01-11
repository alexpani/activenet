jQuery(function($){

    // initialize Slideout.
    var slideout = new Slideout({
        'panel': $('.site-container').get(0),
        'menu': $('.side-menu').get(0),
        'padding': 256, // width of the slideout menu
        // 'side': 'right' // open the menu from right
    });

    // open and close the side menu by clicking on the hamburger button.
    var $hamburger = $('.hamburger');

    $hamburger.on('click', function(e) {
        $hamburger.toggleClass('is-active');

        slideout.toggle();
    });

    // Toggle Slideout when .close-icon is tapped.
    $('.close-icon').on('click', function () {
        slideout.close();
    });

    // add an overlay on the open panel to close the side menu on click.
    function close(eve) {
        eve.preventDefault();
        slideout.close();
    }

    slideout
        .on('beforeopen', function() {
            this.panel.classList.add('panel-open');
        })
        .on('open', function() {
            this.panel.addEventListener('click', close);
        })
        .on('beforeclose', function() {
            this.panel.classList.remove('panel-open');
            this.panel.removeEventListener('click', close);
            $hamburger.removeClass('is-active');
        });

});