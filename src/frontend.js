import 'waypoints/lib/noframework.waypoints.min'
import 'retinajs'
import 'vanilla-ripplejs'
import './frontend.scss'

import Router from './util/Router'
import common from './routes/common'
import home from './routes/home'
import contactUs from './routes/contact'
import archiveProduct from './routes/archive-product'
import search from './routes/archive-product'
import product from './routes/product'
import gallery from './routes/gallery'
import aboutCompany from './routes/about'
/**
 * Populate Router instance with DOM routes
 * @type {Router} routes - An instance of our router
 */
const routes = new Router({
  common,
  home,
  contactUs,
  product,
  search,
  archiveProduct,
  gallery,
  aboutCompany
})

window.addEventListener('DOMContentLoaded', () => {
  routes.loadEvents()
})
