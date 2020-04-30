import 'waypoints/lib/noframework.waypoints.min'
import 'retinajs'
import 'vanilla-ripplejs'
import './frontend.scss'

import Router from './util/Router'
import common from './routes/common'
import home from './routes/home'
/**
 * Populate Router instance with DOM routes
 * @type {Router} routes - An instance of our router
 */
const routes = new Router({
  common,
  home,
})

window.addEventListener('DOMContentLoaded', () => {
  routes.loadEvents()
})
