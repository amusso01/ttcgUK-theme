import Glide from '@glidejs/glide'

export default function carouselThumbnails() {
	const ThumbGlide = new Glide('.fdry-glide__videos', {
		perView: 5,
		gap: 20,
		loop: true,
		startAt: 1,
		type: 'carousel',
		dragThreshold: false,
		breakpoints: {
			1124: {
				perView: 3,
			},
			600: {
				perView: 2,
			},
		},
	})

	ThumbGlide.mount()

	// populate video src
	const slides = document.querySelectorAll('.fdry-career-2-videos__thumbnails')

	slides.forEach((el) => {
		el.addEventListener('click', changeSrc)
	})
}

function changeSrc(e) {
	let el = this
	let player = document.getElementById('videoIframe')
	let name = document.querySelector('#videoName')
	let role = document.querySelector('#videoRole')

	let elSrc = el.dataset.video
	let elName = el.dataset.name
	let elRole = el.dataset.role

	let elPoster = el.querySelector('.videoPosterThumb')

	player.src = elSrc
	player.setAttribute(
		'poster',
		'https://www.tradecentreuk.com/wp-content/uploads/2024/07/Screenshot-2024-07-15-at-16.49.36.jpg'
	)
	name.innerHTML = elName
	role.innerHTML = elRole

	setTimeout(() => {
		player.play()
	}, 500)
}
