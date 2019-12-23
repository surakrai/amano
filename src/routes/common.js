export default {
  init() {
    const hamburger = document.querySelector('.hamburger-menu')

    hamburger.onclick = () => {
      document.body.classList.toggle('open-menu')
    }
  },
  finalize() {}
}
