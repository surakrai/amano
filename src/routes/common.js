export default {
  init() {
    const hamburger = document.querySelector('.hamburger-menu')

    hamburger.onclick = () => {
      document.body.classList.toggle('open-menu')
    }

    const accordions = document.querySelectorAll('.accordion__toggle')

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

  },
  finalize() {}
}
