import ImagesLoaded from 'imagesloaded'
import Swiper from 'swiper/dist/js/swiper'
import Fullpage from 'fullpage.js'
import Parallax from 'parallax-js'

export default {
  init() {
    const branding = document.querySelector('body.home .site-branding')
    const navItems = document.querySelectorAll('.welcome__navigation-item')
    const scrollIcon = document.querySelector('.welcome__scroll-icon')
    const videoParallax = document.querySelector('.video-parallax')
    const videoPlayer = document.querySelector('.video-player')
    const playVideo = document.querySelector('.video-player__play')

    const fullpage = new Fullpage('.home-fullpage', {
      anchors: [
        'welcome',
        'about-company',
        'business-area',
        'product-details',
        'our-project',
        'our-news',
        'contact'
      ],
      lockAnchors: false,
      navigation: true,
      navigationPosition: 'right'
    })

    branding.onclick = event => {
      event.preventDefault()
      fullpage.moveTo('welcome', 1)
    }

    for (let i = 0; i < navItems.length; i++) {
      navItems[i].onclick = function(event) {
        event.preventDefault()
        fullpage.moveTo(this.dataset.anchor, 1)
      }
    }

    scrollIcon.onclick = event => {
      event.preventDefault()
      fullpage.moveTo('about-company', 1)
    }

    const swiperProject = new Swiper('.swiper-our-project', {
      init: false,
      slidesPerView: 4,
      slidesPerColumn: 2,
      spaceBetween: 14,
      speed: 400,
      loop: false,
      navigation: {
        nextEl: '.our-project .swiper-button-next',
        prevEl: '.our-project .swiper-button-prev'
      }
    })

    ImagesLoaded('.our-project', () => {
      swiperProject.init()
    })

    new Parallax(videoParallax, {
      relativeInput: false,
      pointerEvents: true
    })

    playVideo.onclick = function(event) {
      event.preventDefault()

      videoPlayer.classList.add('is-playing')

      const iframe = document.createElement('iframe')

      iframe.setAttribute(
        'src',
        `https://www.youtube.com/embed/${this.id}?autoplay=1&rel=0&modestbranding=1`
      )
      iframe.setAttribute('frameborder', 0)
      iframe.setAttribute(
        'allow',
        'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'
      )
      iframe.setAttribute('allowfullscreen', true)
      iframe.setAttribute('width', this.clientWidth)
      iframe.setAttribute('height', this.clientHeight)

      this.parentNode.replaceChild(iframe, this)
    }
  },

  finalize() {}
}
