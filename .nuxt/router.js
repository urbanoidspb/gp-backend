import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'

const _db33db5a = () => interopDefault(import('../resources/nuxt/pages/about.vue' /* webpackChunkName: "pages/about" */))
const _2fa5d309 = () => interopDefault(import('../resources/nuxt/pages/changes.vue' /* webpackChunkName: "pages/changes" */))
const _37257286 = () => interopDefault(import('../resources/nuxt/pages/events/index.vue' /* webpackChunkName: "pages/events/index" */))
const _07581c9b = () => interopDefault(import('../resources/nuxt/pages/gallery/index.vue' /* webpackChunkName: "pages/gallery/index" */))
const _321ff840 = () => interopDefault(import('../resources/nuxt/pages/news/index.vue' /* webpackChunkName: "pages/news/index" */))
const _974b4324 = () => interopDefault(import('../resources/nuxt/pages/events/_id.vue' /* webpackChunkName: "pages/events/_id" */))
const _27ea89c3 = () => interopDefault(import('../resources/nuxt/pages/gallery/_id.vue' /* webpackChunkName: "pages/gallery/_id" */))
const _39cf0aa8 = () => interopDefault(import('../resources/nuxt/pages/news/_id.vue' /* webpackChunkName: "pages/news/_id" */))
const _9bc425d0 = () => interopDefault(import('../resources/nuxt/pages/index.vue' /* webpackChunkName: "pages/index" */))

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
      component: _db33db5a,
      name: "about"
    }, {
      path: "/changes",
      component: _2fa5d309,
      name: "changes"
    }, {
      path: "/events",
      component: _37257286,
      name: "events"
    }, {
      path: "/gallery",
      component: _07581c9b,
      name: "gallery"
    }, {
      path: "/news",
      component: _321ff840,
      name: "news"
    }, {
      path: "/events/:id",
      component: _974b4324,
      name: "events-id"
    }, {
      path: "/gallery/:id",
      component: _27ea89c3,
      name: "gallery-id"
    }, {
      path: "/news/:id",
      component: _39cf0aa8,
      name: "news-id"
    }, {
      path: "/",
      component: _9bc425d0,
      name: "index"
    }],

    fallback: false
  })
}
