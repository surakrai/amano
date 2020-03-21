import Swiper from 'swiper/js/swiper'
import ImagesLoaded from 'imagesloaded'
import Video from './video'

export default {
  init() {
    const aboutfeature = document.querySelector('.about__feature')
    const about = document.querySelector('.about')
    const playVideo = document.querySelector('.video-player__play')

    playVideo.onclick = event => {
      Video('playVideo')
      event.preventDefault()
    }

    const feature = new Swiper('.about-swiper-container', {
      init: false,
      slidesPerView: 'auto',
      autoplay: {
        delay: 5000
      },
      spaceBetween: 15,
      loop: false,
      speed: 800,
      navigation: {
        nextEl: '.about .button-next',
        prevEl: '.about .button-prev'
      },
      breakpoints: {
        576: {
          slidesPerView: 2,
          slidesPerGroup: 2,
          spaceBetween: 15
        },
        767: {
          slidesPerView: 3,
          slidesPerGroup: 3,
          spaceBetween: 30
        }
      }
    })

    ImagesLoaded('.about__feature', () => {
      feature.init()
      new Waypoint({
        element: about,
        handler: () => {
          about.classList.add('loaded')
        },
        offset: '50%'
      })
    })

    feature.on('slideChange', () => {
      let page = 1

      if (feature.realIndex === 3) {
        page = 2
      }
      aboutfeature.setAttribute('data-page', page)
    })
  },
  finalize() {}
}
