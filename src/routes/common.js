import WebFont from 'webfontloader'

export default {
  init() {
    const hamburger = document.querySelector('.hamburger-menu')
    const accordions = document.querySelectorAll('.accordion__toggle')
    const navigationItems = document.querySelectorAll('.site-navigation a')
    const { body } = document

    WebFont.load({
      google: {
        families: [
          'Prompt:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i&display=swap&subset=thai'
        ]
      }
    })

    hamburger.onclick = () => {
      body.classList.toggle('open-menu')
    }

    // if (typeof playVideo !== 'undefined' && playVideo != null) {
    //   playVideo.onclick = function(event) {
    //     videoPlayer.classList.add('is-playing')
    //     event.preventDefault()
    //   }
    // }

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

    for (let i = 0; i < navigationItems.length; i++) {
      navigationItems[i].addEventListener('click', function(event) {
        body.classList.remove('open-menu')
        setTimeout(() => {
          window.open(this.getAttribute('href'), '_parent')
        }, 300)
        event.preventDefault()
      })
    }

    window.onload = () => {
      const header = document.querySelector('.site-header')
      const content = document.querySelector('.main-content')
      const sidebar = document.querySelector('.sidebar')

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
