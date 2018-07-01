function _exec (fn) {
  return window.layoutHelpers && fn()
}

export default {
  getLayoutSidenav () {
    return _exec(() => window.layoutHelpers.getLayoutSidenav()) || null
  },

  getSidenav () {
    return _exec(() => window.layoutHelpers.getSidenav()) || null
  },

  getLayoutNavbar () {
    return _exec(() => window.layoutHelpers.getLayoutNavbar()) || null
  },

  getLayoutContainer () {
    return _exec(() => window.layoutHelpers.getLayoutContainer()) || null
  },

  isSmallScreen () {
    return _exec(() => window.layoutHelpers.isSmallScreen())
  },

  isLayout1 () {
    return _exec(() => window.layoutHelpers.isLayout1())
  },

  isCollapsed () {
    return _exec(() => window.layoutHelpers.isCollapsed())
  },

  isFixed () {
    return _exec(() => window.layoutHelpers.isFixed())
  },

  isOffcanvas () {
    return _exec(() => window.layoutHelpers.isOffcanvas())
  },

  isNavbarFixed () {
    return _exec(() => window.layoutHelpers.isNavbarFixed())
  },

  isReversed () {
    return _exec(() => window.layoutHelpers.isReversed())
  },

  setCollapsed (collapsed, animate = true) {
    _exec(() => window.layoutHelpers.setCollapsed(collapsed, animate))
  },

  toggleCollapsed (animate = true) {
    _exec(() => window.layoutHelpers.toggleCollapsed(animate))
  },

  setPosition (fixed, offcanvas) {
    _exec(() => window.layoutHelpers.setPosition(fixed, offcanvas))
  },

  setNavbarFixed (fixed) {
    _exec(() => window.layoutHelpers.setNavbarFixed(fixed))
  },

  setReversed (reversed) {
    _exec(() => window.layoutHelpers.setReversed(reversed))
  },

  update () {
    _exec(() => window.layoutHelpers.update())
  },

  setAutoUpdate (enable) {
    _exec(() => window.layoutHelpers.setAutoUpdate(enable))
  },

  on (event, callback) {
    _exec(() => window.layoutHelpers.on(event, callback))
  },

  off (event) {
    _exec(() => window.layoutHelpers.off(event))
  },

  init () {
    _exec(() => window.layoutHelpers.init())
  },

  destroy () {
    _exec(() => window.layoutHelpers.destroy())
  },

  // Internal
  //

  _removeClass (cls) {
    _exec(() => window.layoutHelpers._removeClass(cls))
  }
}
