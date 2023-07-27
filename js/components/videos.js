window.muteUnmute = function ($video) {
    $video.muted = !$video.muted;
    $('#bettercar-mutebutton').toggleClass('fa-volume-off fa-volume-mute')
};

$(document).ready(function () {
    $('.bettercar__wrapper').waypoint(function () {
        let bcVid = document.getElementById("bettercar-video");
		if (navigator.connection) {
			if (navigator.connection.type !== 'cellular') {
                bcVid.play();
			}
		} else bcVid.play();
    }, {
        offset: '50%',
        triggerOnce: true
    });
});