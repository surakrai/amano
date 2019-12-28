export default function(selector) {
  const form = document.querySelector(selector)
  const response = form.querySelector('.contact-form__response')
  const button = form.querySelector('.submit-contact')
  const firstname = form.querySelector('.contact-firstname')
  const phone = form.querySelector('.contact-phone')
  const email = form.querySelector('.contact-email')

  const checkmark = `
  <svg
    class="checkmark"
    version="1.1"
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 130.2 130.2"
  >
    <circle
      class="checkmark-path circle"
      fill="none"
      stroke="#73AF55"
      stroke-width="6"
      stroke-miterlimit="10"
      cx="65.1"
      cy="65.1"
      r="62.1"
    />
    <polyline
      class="checkmark-path check"
      fill="none"
      stroke="#73AF55"
      stroke-width="6"
      stroke-linecap="round"
      stroke-miterlimit="10"
      points="100.2,40.2 51.5,88.8 29.8,67.5 "
    />
  </svg>`

  form.addEventListener(
    'submit',
    e => {
      const oData = new FormData(form)
      const request = new XMLHttpRequest()

      button.classList.add('is-loading')
      response.innerHTML = ''

      const errorItems = form.querySelectorAll('.has-error')
      const input = form.querySelectorAll('input')

      if (typeof errorItems !== 'undefined' && errorItems != null) {
        for (let i = 0; i < errorItems.length; i++) {
          const errorMessages = errorItems[i].querySelector('em')
          errorItems[i].classList.remove('has-error')
          errorMessages.parentNode.removeChild(errorMessages)
        }
      }

      request.open('POST', `${AMANO.api_endpoint}amano/contact`, true)

      request.onload = oEvent => {
        if (request.status === 200) {
          const data = JSON.parse(oEvent.target.response)
          button.classList.remove('is-loading')
          if (data.errors === true) {
            if (data.firstname) {
              firstname.insertAdjacentHTML(
                'beforeend',
                `<em>${data.firstname}</em>`
              )
              firstname.classList.add('has-error')
            }

            if (data.phone) {
              phone.insertAdjacentHTML('beforeend', `<em>${data.phone}</em>`)
              phone.classList.add('has-error')
            }

            if (data.email) {
              email.insertAdjacentHTML('beforeend', `<em>${data.email}</em>`)
              email.classList.add('has-error')
            }
          } else {
            if (typeof input !== 'undefined' && input != null) {
              for (let i = 0; i < input.length; i++) {
                input[i].value = ''
              }
            }
            response.innerHTML = `<div>${checkmark}<h4>${data.msg}</h4><p>${data.msg_description}</p></div>`
          }
        } else {
          //
        }
      }

      request.send(oData)
      e.preventDefault()
    },
    false
  )
}
