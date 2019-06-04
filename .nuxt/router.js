import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'

const _3cf23b9a = () => interopDefault(import('..\\resources\\nuxt\\pages\\about.vue' /* webpackChunkName: "pages_about" */))
const _39d22ae9 = () => interopDefault(import('..\\resources\\nuxt\\pages\\changes.vue' /* webpackChunkName: "pages_changes" */))
const _ea4c4e82 = () => interopDefault(import('..\\resources\\nuxt\\pages\\events\\index.vue' /* webpackChunkName: "pages_events_index" */))
const _57d48d8a = () => interopDefault(import('..\\resources\\nuxt\\pages\\gallery\\index.vue' /* webpackChunkName: "pages_gallery_index" */))
const _ce2afb76 = () => interopDefault(import('..\\resources\\nuxt\\pages\\news\\index.vue' /* webpackChunkName: "pages_news_index" */))
const _d7960232 = () => interopDefault(import('..\\resources\\nuxt\\pages\\events\\_id.vue' /* webpackChunkName: "pages_events__id" */))
const _0d5c6a72 = () => interopDefault(import('..\\resources\\nuxt\\pages\\gallery\\_id.vue' /* webpackChunkName: "pages_gallery__id" */))
const _034e51ed = () => interopDefault(import('..\\resources\\nuxt\\pages\\news\\_id.vue' /* webpackChunkName: "pages_news__id" */))
const _013ebcf8 = () => interopDefault(import('..\\resources\\nuxt\\pages\\index.vue' /* webpackChunkName: "pages_index" */))

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
      component: _3cf23b9a,
      name: "about"
    }, {
      path: "/changes",
      component: _39d22ae9,
      name: "changes"
    }, {
      path: "/events",
      component: _ea4c4e82,
      name: "events"
    }, {
      path: "/gallery",
      component: _57d48d8a,
      name: "gallery"
    }, {
      path: "/news",
      component: _ce2afb76,
      name: "news"
    }, {
      path: "/events/:id",
      component: _d7960232,
      name: "events-id"
    }, {
      path: "/gallery/:id",
      component: _0d5c6a72,
      name: "gallery-id"
    }, {
      path: "/news/:id",
      component: _034e51ed,
      name: "news-id"
    }, {
      path: "/",
      component: _013ebcf8,
      name: "index"
    }],

    fallback: false
  })
}
