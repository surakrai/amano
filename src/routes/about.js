import Video from './video'

export default {
  init() {
    const playVideo = document.querySelector('.video-player__play')
    playVideo.onclick = event => {
      Video('playVideo')
      event.preventDefault()
    }
  },
  finalize() {}
}
