export default function(vidcontrol) {
  const videoPlayer = document.querySelector('.video-player')
  const iframe = document.querySelector('.video-player__iframe')

  const iframeContentWindow = iframe.contentWindow

  iframe.setAttribute('width', videoPlayer.clientWidth)
  iframe.setAttribute('height', videoPlayer.clientHeight)

  if (vidcontrol === 'playVideo') {
    videoPlayer.classList.add('is-playing')
  } else {
    videoPlayer.classList.remove('is-playing')
  }

  iframeContentWindow.postMessage(
    `{"event":"command","func":"${vidcontrol}","args":""}`,
    '*'
  )
}
