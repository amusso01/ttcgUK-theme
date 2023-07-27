import Glide from '@glidejs/glide'


export default function carouselKit() {

  const kitGlide = new Glide('.fdry-glide__kit-club', {
    perView: 1,
    gap: 25,
    bound: true,
  })

  kitGlide.mount();

}