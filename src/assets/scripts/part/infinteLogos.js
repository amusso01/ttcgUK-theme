import Splide from '@splidejs/splide'
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll'

export default function logosSplide() {
	new Splide('.splideLogos', {
		type: 'loop',
		focus: 'center',
		arrows: false,
		pagination: false,
		perPage: 5,
		drag: false,
		direction: 'rtl',
		pauseOnHover: false,
		pauseOnFocus: false,
		gap: '60px',
		breakpoints: {
			1360: {
				perPage: 4,
			},
			1140: {
				perPage: 3,
			},
			920: {
				perPage: 2,
			},
		},
		autoScroll: {
			speed: -1,
			pauseOnHover: false,
			pauseOnFocus: false,
		},
	}).mount({ AutoScroll })
}
