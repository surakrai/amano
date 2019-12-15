export default {
  init() {
    const hamburger = document.querySelector('.hamburger-menu')

    hamburger.onclick = () => {
      document.querySelector('body').classList.toggle('open-menu')
    }
  },
  finalize() {}
}
