export default {
  init() {
    const categorySelect = document.querySelector('.category-select')
    categorySelect.addEventListener('change', event => {
      let link = AMANO.producturl
      if (event.target.value !== '0')
        link = `${AMANO.producturl}category/${event.target.value}`
      window.open(link, '_parent')
    })
  },

  finalize() {}
}
