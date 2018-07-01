import layoutHelpers from './layout/helpers.js'

export default function () {
  return {
    // Layout helpers
    layoutHelpers,

    // Check for RTL layout
    get isRTL () {
      return document.documentElement.getAttribute('dir') === 'rtl' ||
             document.body.getAttribute('dir') === 'rtl'
    },

    // Check if IE
    get isIE () {
      return typeof document['documentMode'] === 'number'
    },

    // Check if IE10
    get isIE10 () {
      return this.isIE && document['documentMode'] === 10
    },

    // Layout navbar color
    get layoutNavbarBg () {
      return 'navbar-theme'
    },

    // Layout sidenav color
    get layoutSidenavBg () {
      return 'sidenav-theme'
    },

    // Layout footer color
    get layoutFooterBg () {
      return 'footer-theme'
    }
  }
}
