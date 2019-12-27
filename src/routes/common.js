// import Waypoint from 'waypoints/lib/noframework.waypoints.min'

export default {
  init() {
    const hamburger = document.querySelector('.hamburger-menu')
    const playVideo = document.querySelector('.video-player__play')
    const videoPlayer = document.querySelector('.video-player')
    const accordions = document.querySelectorAll('.accordion__toggle')

    hamburger.onclick = () => {
      document.body.classList.toggle('open-menu')
    }

    if (typeof playVideo !== 'undefined' && playVideo != null) {
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
    }

    if (accordions[0]) {
      const firstPanel = accordions[0].nextElementSibling
      firstPanel.style.maxHeight = `${firstPanel.scrollHeight}px`
    }

    for (let i = 0; i < accordions.length; i++) {
      accordions[i].addEventListener('click', function() {
        this.classList.toggle('is-active')

        const panel = this.nextElementSibling

        if (panel.style.maxHeight) {
          panel.style.maxHeight = null
        } else {
          panel.style.maxHeight = `${panel.scrollHeight}px`
        }
      })
    }

    window.onload = () => {
      const header = document.querySelector('.site-header')
      const content = document.querySelector('.main-content')
      const sidebar = document.querySelector('.sidebar')
      const { body } = document

      let scrollPos = 0

      if (typeof sidebar !== 'undefined' && sidebar != null) {
        // eslint-disable-next-line no-undef
        new Waypoint({
          element: sidebar,
          handler: () => {
            sidebar.classList.toggle('is-sticky')
          },
          offset: '-1px'
        })
      }

      if (typeof content !== 'undefined' && content != null) {
        // eslint-disable-next-line no-undef
        new Waypoint({
          element: content,
          handler: () => {
            header.classList.toggle('is-sticky')
            if (typeof sidebar !== 'undefined' && sidebar != null)
              sidebar.classList.toggle('header-sticky')
          },
          offset: '-300px'
        })
      }

      window.addEventListener('scroll', function() {
        if (body.scrollHeight < 2000) return

        if (body.getBoundingClientRect().top > scrollPos) {
          body.classList.add('scrollup')
        } else {
          body.classList.remove('scrollup')
        }
        scrollPos = body.getBoundingClientRect().top
      })
    }
  },
  finalize() {}
}
