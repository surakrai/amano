import ImagesLoaded from 'imagesloaded'
import Swiper from 'swiper/dist/js/swiper'
import Fullpage from 'fullpage.js'
import Parallax from 'parallax-js'

export default {
  init() {
    const navItems = document.querySelectorAll('.fullpage-navigation-item')
    const branding = document.querySelector('body.home .site-branding')
    const videoWrap = document.querySelector('.business-area-video')
    const videoButton = document.querySelector('.business-area-video a')
    const clickToScroll = document.querySelector('.click-to-scroll')
    const scene = document.querySelector('#business-parallax')

    const fullPage = new Fullpage('#fullpage', {
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
      slideSelector: '.fullpage-navigation-slide',
      navigation: true,
      navigationPosition: 'right',
      navigationTooltips: [
        'Welcome',
        'About Company',
        'Business Area',
        'Product Details',
        'Our Project',
        'Our News',
        'Contact'
      ]
    })

    branding.onclick = event => {
      event.preventDefault()
      fullPage.moveTo('welcome', 1)
    }

    function moveToSection(event) {
      event.preventDefault()
      fullPage.moveTo(event.target.dataset.anchor, 1)
    }

    for (let i = 0; i < navItems.length; i++) {
      navItems[i].onclick = event => {
        moveToSection(event)
      }
    }

    clickToScroll.onclick = event => {
      event.preventDefault()
      // eslint-disable-next-line no-undef
      fullpage_api.moveTo('about-company', 1)
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

    new Parallax(scene, {
      relativeInput: false,
      pointerEvents: true
    })

    videoButton.onclick = function(event) {
      event.preventDefault()

      videoWrap.classList.add('is-playing')

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
