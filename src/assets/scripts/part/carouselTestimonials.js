import Glide from '@glidejs/glide';

export default function carouselTestimonials() {
	const TestimonialsGlide = new Glide('.fdry-glide__testimonials', {
		perView: 1,
		gap: 15,
		bound: true,
	});

	TestimonialsGlide.mount();
}
