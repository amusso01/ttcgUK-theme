$(function () {
    $('.map-button').on('click', function (e) {
        //if ($(window).width() > 768) {
            e.preventDefault();

            $('.modal-title').html($(this).data('modaltitle'));

            $('.maps-model-body').html(
                $('<iframe>', {
                    src: $(this).data('gmap'),
                    id: 'gmapIframe',
                    frameborder: 0,
                    style: 'border:0;',
                    allowfullscreen: '',
                    scrolling: 'no',
                    width: '100%',
                    height: '488',
                    'aria-hidden': 'true',
                    tabindex: '0',
                    marginheight: 0,
                    marginwidth: 0
                }));

            $('#mapsModal').modal('toggle');
        //}
    });
});