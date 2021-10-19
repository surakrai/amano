/* eslint-disable no-undef */
import Contact from './contact-form'

export default {
  init() {
    Contact('.contact-form')
    window.onload = () => {
      const latitude = 13.649124128520986
      const longitude = 100.63920563199547
      const map = new google.maps.Map(document.getElementById('contact-map'), {
        zoom: 20,
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

      const latitude2 = 13.02911719603832
      const longitude2 = 101.05866013068933

      const map2 = new google.maps.Map(
        document.getElementById('contact-map-2'),
        {
          zoom: 19,
          center: { lat: latitude2, lng: longitude2 },
          scrollwheel: false,
          draggable: false,
          navigationControl: false,
          mapTypeControl: false,
          scaleControl: false,
          styles: []
        }
      )

      const marker2 = new google.maps.Marker({
        map: map2,
        draggable: true,
        // icon: "<?php echo IMG_URI . "/marker.png"; ?>",
        animation: google.maps.Animation.DROP,
        position: { lat: latitude2, lng: longitude2 }
      })

      google.maps.event.addListener(marker2, 'click', () => {
        window.open('https://www.google.com/maps?q=13.02912,101.05866')
      })
    }
  },
  finalize() {}
}
