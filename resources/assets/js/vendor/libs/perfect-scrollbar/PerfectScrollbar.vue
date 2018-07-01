<template>
  <div><slot></slot></div>
</template>



<script>
import PerfectScrollbar from 'perfect-scrollbar'

export default {
  name: 'perfect-scrollbar',
  props: {
    options: {
      default: () => {}
    }
  },
  mounted () {
    this.$ps = new PerfectScrollbar(this.$el, this.options)
  },
  beforeDestroy () {
    if (!this.$ps) return
    this.$ps.destroy()
    this.$ps = null
  }
}
</script>
