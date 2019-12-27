import ImagesLoaded from 'imagesloaded'
import Swiper from 'swiper'
import Fullpage from 'fullpage.js'
import Parallax from 'parallax-js'

export default {
  init() {
    const branding = document.querySelector('body.home .site-branding')
    const navItems = document.querySelectorAll('.welcome__navigation-item')
    const scrollIcon = document.querySelector('.welcome__scroll-icon')
    const videoParallax = document.querySelector('.video-parallax')
    const hamburger = document.querySelector('.hamburger-menu')
    const body = document.querySelector('body')

    const fullpage = new Fullpage('.home-fullpage', {
      licenseKey: 'D13C582-F31F4AE6-ABD78E7A-BAD33678',
      anchors: [
        'welcome',
        'about-company',
        'business-area',
        'product-details',
        'our-project',
        'our-news',
        'contact'
      ],
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

    hamburger.onclick = () => {
      let scrolling = true
      body.classList.toggle('open-menu')
      if (body.classList.contains('open-menu')) scrolling = false
      fullpage.setMouseWheelScrolling(scrolling)
    }

    branding.onclick = event => {
      event.preventDefault()
      fullpage.setMouseWheelScrolling(true)
      body.classList.remove('open-menu')
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
      slidesPerGroup: 4,
      slidesPerColumnFill: 'row',
      spaceBetween: 14,
      loop: false,
      navigation: {
        nextEl: '.our-project .button-next',
        prevEl: '.our-project .button-prev'
      }
    })

    ImagesLoaded('.our-project', () => {
      swiperProject.init()
    })

    const swiperProduct = new Swiper('.product-details .swiper-container', {
      init: false,
      slidesPerView: 'auto',
      spaceBetween: 0,
      speed: 400,
      loop: false,
      breakpoints: {
        575: {
          slidesPerView: 2
        },
        767: {
          slidesPerView: 3
        },
        1199: {
          slidesPerView: 4
        },
        1600: {
          slidesPerView: 5
        }
      }
    })

    ImagesLoaded('.our-project', () => {
      swiperProduct.init()
    })

    new Parallax(videoParallax, {
      relativeInput: false,
      pointerEvents: true
    })
  },

  finalize() {}
}
