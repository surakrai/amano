/* eslint-disable no-undef */
import Contact from './contact-form'

export default {
  init() {
    Contact('.contact-form')
    window.onload = () => {
      const latitude = 13.649095
      const longitude = 100.639207
      const map = new google.maps.Map(document.getElementById('contact-map'), {
        zoom: 19,
        center: { lat: latitude, lng: longitude },
        scrollwheel: false,
        draggable: false,
        // navigationControl: false,
        mapTypeControl: false,
        scaleControl: false,
        styles: []
      })

      const marker = new google.maps.Marker({
        map,
        draggable: true,
        // icon: "<?php echo IMG_URI . "/marker.png"; ?>",
        animation: google.maps.Animation.DROP,
        position: { lat: latitude, lng: longitude }
      })

      google.maps.event.addListener(marker, 'click', () => {
        window.open('https://goo.gl/maps/NHfSAEvoYFrUifxX8')
      })
    }
  },
  finalize() {}
}
