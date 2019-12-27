import GLightbox from 'glightbox'

export default {
  init() {
    const glightbox = GLightbox({
      touchNavigation: true,
      loop: false
    })

    const form = document.forms.namedItem('galleryinfo')
    const output = document.querySelector('.gallery-row')
    const page = document.querySelector('input[name="page"]')
    const button = document.querySelector('.button')

    form.addEventListener(
      'submit',
      event => {
        const oData = new FormData(form)
        const request = new XMLHttpRequest()

        button.classList.add('is-loading')

        request.open('POST', `${AMANO.api_endpoint}amano/gallery`, true)

        request.onload = oEvent => {
          if (request.status === 200) {
            const data = JSON.parse(oEvent.target.response)
            output.insertAdjacentHTML('beforeend', data.content)
            page.value = data.page
            glightbox.reload()
            button.classList.remove('is-loading')
            if (data.success === true) form.innerHTML = ''
          } else {
            //
          }
        }

        request.send(oData)
        event.preventDefault()
      },
      false
    )
  },

  finalize() {}
}
