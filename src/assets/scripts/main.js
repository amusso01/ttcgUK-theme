import starter from './part/starter';
import carouselBranch from './part/carousel';
import carouselKit from './part/carouselKit';
import HystModal from './vendors/hystmodal';
import Accordion from './vendors/accordion-js';
import mobileNav from './part/mobileNav';
import logosSplide from './part/infinteLogos';
import carouselTestimonials from './part/carouselTestimonials';

document.addEventListener('DOMContentLoaded', function (event) {
	starter();

	mobileNav();

	const myModal = new HystModal({
		linkAttributeName: 'data-hystmodal',
		//settings (optional). see Configuration
	});

	const branchSlide = document.querySelector('.fdry-glide__branches');
	if (typeof branchSlide != 'undefined' && branchSlide != null) {
		carouselBranch();
	}

	const kitSlide = document.querySelector('.fdry-glide__kit-club');
	if (typeof kitSlide != 'undefined' && kitSlide != null) {
		carouselKit();
	}

	const testimonials = document.querySelector('.fdry-glide__testimonials');
	if (typeof testimonials != 'undefined' && testimonials != null) {
		carouselTestimonials();
	}

	const carAccordion = document.querySelector('.hystmodal');
	if (typeof carAccordion != 'undefined' && carAccordion != null) {
		new Accordion('.accordion-container');
		new Accordion('.features-accordion-container');
	}

	const logosSection = document.querySelector('.splideLogos');
	if (typeof logosSection != 'undefined' && logosSection != null) {
		logosSplide();
	}
});
