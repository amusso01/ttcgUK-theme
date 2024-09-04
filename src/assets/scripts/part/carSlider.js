import Splide from '@splidejs/splide'
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll'

export default function carSlider() {
	new Splide('.splideCars', {
		type: 'loop',
		focus: 'center',
		arrows: false,
		pagination: false,
		perPage: 4,
		drag: true,
		direction: 'rtl',
		pauseOnHover: false,
		pauseOnFocus: false,
		gap: '20px',
		breakpoints: {
			1360: {
				perPage: 4,
			},
			1140: {
				perPage: 2,
			},
			920: {
				perPage: 1,
			},
		},
		autoScroll: {
			speed: 1,
			pauseOnHover: false,
			pauseOnFocus: false,
		},
	}).mount({ AutoScroll })
}
