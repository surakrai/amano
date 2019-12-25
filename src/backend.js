import Router from './util/Router'
import common from './routes/common'

import './backend.scss'

/**
 * Populate Router instance with DOM routes
 * @type {Router} routes - An instance of our router
 */
const routes = new Router({
  /** All pages */
  common
})

window.onload = () => {
  routes.loadEvents()
}
