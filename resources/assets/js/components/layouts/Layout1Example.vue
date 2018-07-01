<template>
  <div>
    <froala :tag="'textarea'" :config="config" v-model="model">Init text</froala>
  </div>
</template>

<script>
export default {
  name: 'layout-1-example',
  metaInfo: {
    title: 'Layout 1 - Layouts'
  },
  data () {
    return {
      config: {
        events: {
          'froalaEditor.initialized': function () {
            console.log('initialized')
          }
        },
		placeholderText: 'Edit Your Content Here!',
		charCounterCount: false
      },
      model: ''
    }
  }
}
</script>
