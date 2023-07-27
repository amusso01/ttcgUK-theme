/*
* All JS features for the interactive content tabs throughout the website
* Scrollers
* Overlay popups
* Fixed element locks on scrolls
*/

window.tcCloseOverlays = function () {
    $('body').css('overflow-y', 'auto');
    $('.tab-pane, #locations-overlay, .tab-px, .tab-ds, .tab-pp, .tab-pfc').removeClass('active show');
}

window.tcScrollTop = function () {
    let body = $('html, body');
    let bannerHeight = $('.banner').outerHeight() + 2;
    if (body.scrollTop() < bannerHeight) {
        body.animate({
            scrollTop: bannerHeight
        }, 200);
    }
}

$(function () {
    // JS for the footer bar links.
    $('#link--ffc, #link--px-valuation, #link--locations')
        .on('click', function (e) {
        window.tcCloseOverlays();
        window.showDropShadow = true;
        $('.sticky-mobile-footer').addClass('noShadow');

        let clickArray = {
            'link--px-valuation': ".tab-px",
            'link--ffc': ".tab-pfc"
        };

        $('body').css('overflow-y', 'hidden');

        if (clickArray.hasOwnProperty(this.id)) {
            window.tcScrollTop();
            $(clickArray[this.id]).click();
        }
    });

    $('#nav-px').on('click', function (e) {
        e.preventDefault();
        $('.tab-px').click();
    });
});
// Show the overlay popups upon click
$(function () {

    $('.content-tabs .list-group-item[href="#pxvaluation"], .content-tabs .list-group-item[href="#freefinance"]')
        .on('click', function (e) {
        e.preventDefault();
        window.showDropShadow = true;

        $("#pxvalform").show();
        $('body').css('overflow-y', 'hidden');
        window.tcScrollTop();
    }
           );
});

// Scroll to DOM section upon click of tab
$(function () {
    $('.content-tabs .list-group-item[href="#similardailyspecials"]')
        .on('click', function (e) {
            e.preventDefault();

            window.showDropShadow = false;

            $('html, body').animate({
                scrollTop: $('.similarcarlisting').offset().top - (($('header').outerHeight() + $('.content-tabs').outerHeight()) + 30)
            }, 200, function(){
                $('.content-tabs').removeClass('tabShadow');
                setTimeout(function(){ window.showDropShadow = true; }, 300);
                //console.log('removed');
            });
        });

    $('.content-tabs .list-group-item[href="#dailyspecials"]')
        .on('click', function (e) {
        e.preventDefault();
        window.showDropShadow = true;
        
        window.tcCloseOverlays();
        $('#locations-overlay').addClass('d-none');
        $('.sticky-mobile-footer').removeClass('noShadow');

        $('body').css('overflow-y', 'auto');

        $('.tab-pane').removeClass('active show');

        $('html, body').animate({
            scrollTop: $('.banner').outerHeight() + 2
        }, 200);
    }
           );
});

// Scroll to DOM section upon click of tab
$(function () {
    $('.content-tabs .list-group-item[href="#pricepromise"]')
        .on('click', function (e) {
        e.preventDefault();

        window.showDropShadow = false;
        
        window.tcCloseOverlays();
        $('#locations-overlay').addClass('d-none');
        $('.sticky-mobile-footer').removeClass('noShadow');
        //$('.content-tabs').removeClass('tabShadow');

        $('body').css('overflow-y', 'auto');

        $('.tab-pane').removeClass('active show');

        $('html, body').animate({
            scrollTop: $('.price-promise').offset().top - (($('header').outerHeight() + $('.content-tabs').outerHeight()) - 20)
        }, 200, function(){
            $('.content-tabs').removeClass('tabShadow');
            setTimeout(function(){ window.showDropShadow = true; }, 300);
            //console.log('removed');
        });
    });
});

/**
 * Event handlers for 3 buttons at bottom of page in mobile view.
 *
 * Currently only the Locations link is covered until Dan decides if he wants to
 * use existing tabs used in the top tabs (desktop view) or separate.
 * The events are still in development hence the existence of the console.log() * calls.
 *
 * @global  $   jQuery object shorthand.
 */
$(function () {
    /**
     * When Locations button at bottom middle of page in mobile view is clicked
     * this event is executed.
     */
    $('#link--locations').on('click', function (e) {
        e.preventDefault();
        window.showDropShadow = true;
        $(window).scrollTop($('.banner').outerHeight());
        $('#locations-overlay').removeClass('d-none');
    });

    /**
     * The close link executed when clicking close in the top right corner
     * of the overlay for locations.
     */
    $('#locations__close--link, .close-tab').on('click', function (e) {
        e.preventDefault();
        window.tcCloseOverlays();
        $('#locations-overlay').addClass('d-none');
        $('.sticky-mobile-footer').removeClass('noShadow');
    });
});

// Add the drop shadow once we've scrolled past the banner
window.showDropShadow = true;
$(function () {
    var $document = $(document),
        $element = $('.content-tabs'),
        className = 'tabShadow',
        scrollAmount = $('.banner').outerHeight() +5;

    if ($element.hasClass('nocoreShadow')) {
        $document.scroll(function () {
            if (window.showDropShadow === true) {
                $element.addClass(className);
            }
        });
    } else {
        $document.scroll(function () {
            if (window.showDropShadow === true) {
                $element.toggleClass(className, $document.scrollTop() >= scrollAmount);
                //console.log('toggled');
            }
        });
    }
});

$( window ).resize(function() {
    if ($(window).width() > 768) {
        $('body').css('overflow-y', 'auto');
        $('#locations-overlay').addClass('d-none');
    }
});
