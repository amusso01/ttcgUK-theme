import Glide from '@glidejs/glide'


export default function carouselBranch() {

  const branchGlide = new Glide('.fdry-glide__branches', {
    perView: 3,
    gap: 25,
    bound: true,
    peek: {
      before: 0,
      after: 60
    },
    breakpoints: {
      1024: {
        perView: 2
      },
      600: {
        perView: 1
      }
    }
  })

  branchGlide.mount();

}