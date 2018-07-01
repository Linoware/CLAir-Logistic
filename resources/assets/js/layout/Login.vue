<template>
	<router-view></router-view>
</template>

<script type="text/javascript">
	import LoginForm from '../components/auth/login'

	export default{
		name:'login',
		components:{LoginForm}
	}
</script>