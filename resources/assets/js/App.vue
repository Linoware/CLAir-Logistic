<template>
  <div id="app">
    <router-view/>
  </div>
</template>

<script>
  
export default {
  name: 'app',
  metaInfo: {
    title: 'Index',
    titleTemplate: '%s - Vue Starter'
  },
  created(){
	 
  },
  updated () {
    // Remove loading state
    setTimeout(() => document.body.classList.remove('app-loading'), 1)
  }
}
</script>
