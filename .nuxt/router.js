import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'

const _ed45b754 = () => interopDefault(import('../resources/nuxt/pages/about.vue' /* webpackChunkName: "pages/about" */))
const _4520704c = () => interopDefault(import('../resources/nuxt/pages/changes.vue' /* webpackChunkName: "pages/changes" */))
const _4dccb1ba = () => interopDefault(import('../resources/nuxt/pages/events/index.vue' /* webpackChunkName: "pages/events/index" */))
const _b82b08c4 = () => interopDefault(import('../resources/nuxt/pages/gallery/index.vue' /* webpackChunkName: "pages/gallery/index" */))
const _8c3a9fc6 = () => interopDefault(import('../resources/nuxt/pages/news/index.vue' /* webpackChunkName: "pages/news/index" */))
const _3c1d164b = () => interopDefault(import('../resources/nuxt/pages/events/_id.vue' /* webpackChunkName: "pages/events/_id" */))
const _cf0264f4 = () => interopDefault(import('../resources/nuxt/pages/gallery/_id.vue' /* webpackChunkName: "pages/gallery/_id" */))
const _58afd476 = () => interopDefault(import('../resources/nuxt/pages/news/_id.vue' /* webpackChunkName: "pages/news/_id" */))
const _add601ca = () => interopDefault(import('../resources/nuxt/pages/index.vue' /* webpackChunkName: "pages/index" */))

Vue.use(Router)

if (process.client) {
  if ('scrollRestoration' in window.history) {
    window.history.scrollRestoration = 'manual'

    // reset scrollRestoration to auto when leaving page, allowing page reload
    // and back-navigation from other pages to use the browser to restore the
    // scrolling position.
    window.addEventListener('beforeunload', () => {
      window.history.scrollRestoration = 'auto'
    })

    // Setting scrollRestoration to manual again when returning to this page.
    window.addEventListener('load', () => {
      window.history.scrollRestoration = 'manual'
    })
  }
}
const scrollBehavior = function (to, from, savedPosition) {
  // if the returned position is falsy or an empty object,
  // will retain current scroll position.
  let position = false

  // if no children detected and scrollToTop is not explicitly disabled
  if (
    to.matched.length < 2 &&
    to.matched.every(r => r.components.default.options.scrollToTop !== false)
  ) {
    // scroll to the top of the page
    position = { x: 0, y: 0 }
  } else if (to.matched.some(r => r.components.default.options.scrollToTop)) {
    // if one of the children has scrollToTop option set to true
    position = { x: 0, y: 0 }
  }

  // savedPosition is only available for popstate navigations (back button)
  if (savedPosition) {
    position = savedPosition
  }

  return new Promise((resolve) => {
    // wait for the out transition to complete (if necessary)
    window.$nuxt.$once('triggerScroll', () => {
      // coords will be used if no selector is provided,
      // or if the selector didn't match any element.
      if (to.hash) {
        let hash = to.hash
        // CSS.escape() is not supported with IE and Edge.
        if (typeof window.CSS !== 'undefined' && typeof window.CSS.escape !== 'undefined') {
          hash = '#' + window.CSS.escape(hash.substr(1))
        }
        try {
          if (document.querySelector(hash)) {
            // scroll to anchor by returning the selector
            position = { selector: hash }
          }
        } catch (e) {
          console.warn('Failed to save scroll position. Please add CSS.escape() polyfill (https://github.com/mathiasbynens/CSS.escape).')
        }
      }
      resolve(position)
    })
  })
}

export function createRouter() {
  return new Router({
    mode: 'history',
    base: decodeURI('/'),
    linkActiveClass: 'nuxt-link-active',
    linkExactActiveClass: 'nuxt-link-exact-active',
    scrollBehavior,

    routes: [{
      path: "/about",
      component: _ed45b754,
      name: "about"
    }, {
      path: "/changes",
      component: _4520704c,
      name: "changes"
    }, {
      path: "/events",
      component: _4dccb1ba,
      name: "events"
    }, {
      path: "/gallery",
      component: _b82b08c4,
      name: "gallery"
    }, {
      path: "/news",
      component: _8c3a9fc6,
      name: "news"
    }, {
      path: "/events/:id",
      component: _3c1d164b,
      name: "events-id"
    }, {
      path: "/gallery/:id",
      component: _cf0264f4,
      name: "gallery-id"
    }, {
      path: "/news/:id",
      component: _58afd476,
      name: "news-id"
    }, {
      path: "/",
      component: _add601ca,
      name: "index"
    }],

    fallback: false
  })
}
