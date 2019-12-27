import ImagesLoaded from 'imagesloaded'
import Swiper from 'swiper'
import GLightbox from 'glightbox'

export default {
  init() {
    const thumbItems = document.querySelectorAll('.product__gallery--thumb a')
    const productGallery = document.querySelector('.swiper-product-gallery')

    const gallery = new Swiper(productGallery, {
      init: false,
      slidesPerView: 1,
      spaceBetween: 0,
      speed: 400,
      loop: false
    })

    ImagesLoaded('.product__gallery', () => {
      if (typeof productGallery !== 'undefined' && productGallery != null)
        gallery.init()
    })

    GLightbox({
      touchNavigation: true,
      loop: false
    })

    const question = GLightbox({
      selector: 'product__question',
      loop: false
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
