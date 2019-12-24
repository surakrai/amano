import ImagesLoaded from 'imagesloaded'
import Swiper from 'swiper/dist/js/swiper'

export default {
  init() {
    const thumbItems = document.querySelectorAll('.product__gallery--thumb a')

    const gallery = new Swiper('.swiper-product-gallery', {
      init: false,
      slidesPerView: 1,
      spaceBetween: 0,
      speed: 400,
      loop: false
    })

    ImagesLoaded('.product__gallery', () => {
      gallery.init()
    })

    gallery.on('slideChange init', () => {
      const el = thumbItems[gallery.realIndex]
      el.classList.add('is-active')

      Array.prototype.filter.call(el.parentNode.children, child => {
        if (child !== el) child.classList.remove('is-active')
      })
    })

    for (let i = 0; i < thumbItems.length; i++) {
      thumbItems[i].onclick = function(event) {
        event.preventDefault()
        gallery.slideTo(i, 400, true)
      }
    }
  },

  finalize() {}
}
