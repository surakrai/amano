/* eslint-disable no-undef */
export default {
  init() {
    const latitude = 13.741813
    const longitude = 100.524905

    const map = new google.maps.Map(document.getElementById('contact-map'), {
      zoom: 15,
      center: { lat: latitude, lng: longitude },
      scrollwheel: false,
      draggable: false,
      navigationControl: false,
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
      window.open(
        'https://www.google.com/maps/place/JWD+Art+Space/@13.7406798,100.52277,17z/data=!4m5!3m4!1s0x30e2993e4e7171df:0xe7b0cdcf6738b029!8m2!3d13.7418106!4d100.524905'
      )
    })
  },
  finalize() {}
}
