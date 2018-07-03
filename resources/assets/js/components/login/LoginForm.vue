<template>
<div>
  <div class="authentication-wrapper authentication-1 px-4">
	<notifications group="error-notifications" position="top center" />
	<notifications group="-success-notifications" position="top center" />
	<div class="row">
		<b-card no-body img-alt="Card image cap" class="card-condenced" style="width: 280px;">
			<b-card-body>
				<div style="width:245px;">
				  <!-- Logo -->
				  <div class="d-flex justify-content-center align-items-center" style="margin-top:30px;">
					<div style="width:76px; height:76px;">
						<a href="javascript:void(0)" class="img-thumbnail">
						  <img src="/static/img/logo/CL-Air-Logo.png" alt class="img-fluid">
						</a>
					</div>

				  </div>
				  <!-- / Logo -->
					<div class="sm-12 text-center" style="margin-top:10px; color:#E50000;">
						<span class="text-danger">CL AIR EXPRESS</span>
					</div>
				  <!-- Form -->
				  <form class="my-3" @submit.prevent="authenticate" style="width: 100%; margin-top:30px !important;">
					<!--<div class="form-group row" v-if="authError">
						<p class="error">
							{{ authError }}
						</p>
					</div>-->

					<b-form-group style="margin-bottom:10px;">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text bg-light" id="basic-addon1"><i style="color:lightgray;" class="ion d-block ion-ios-person"></i></span>
							</div>
							<b-input v-model="form.name" placeholder="Username" />
						</div>
					</b-form-group>
					<b-form-group style="margin-bottom:20px;">
					  <div class="input-group">
						<div class="input-group-prepend">
						 <span class="input-group-text bg-light" id="basic-addon1"><i style="color:lightgray;" class="ion d-block ion-ios-key"></i></span>
						</div>
						<b-input type="password" v-model="form.password" placeholder="Password"/>
					  </div>
					</b-form-group>

					<div class="d-flex justify-content-between align-items-center m-0">
					  <ladda-btn type="submit" :loading="loading" data-style="expand-left" style="background-color:#E50000;" class="btn btn-danger col-sm-12 col-md-12 col-xl-12 mb-12">Submit</ladda-btn>
					</div>
				  </form>
				  <!-- / Form -->

				</div>
				<div class="dropdown-divider"></div>
				<div class="sm-12 text-center">
					<small class="text-gray">CL Air System V 1.0</small>
				</div>

			</b-card-body>

		</b-card>
	</div>
  </div>
	<div class="layout-footer fixed-bottom footer">
		<div class="text-center container-p-x pb-3">

			<div class=" sm-12 xs-12 md-12 text-center">
				<span class="footer-text font-weight-normal">Copyright  © CL AIR EXPRESS 2018, All Right Reserved</span>
			</div>

		</div>
	</div>
</div>
</template>

<!-- Custom template animation -->
<style>
  .v-fade-left-enter-active,
  .v-fade-left-leave-active,
  .v-fade-left-move {
    transition: all .5s;
  }
  .v-fade-left-enter,
  .v-fade-left-leave-to {
    opacity: 0;
    transform: translateX(-500px) scale(0.2);
  }
</style>
<script>
    import {login} from '../../helpers/auth';
    import axios from 'axios'
	import LaddaBtn from '../../vendor/libs/ladda/Ladda'
    export default {
        name: "login",
		components:{LaddaBtn},
        data() {
            return {
                form: {
                    name: '',
                    password: ''
                },
                error: null,
				loading: false,
				progress: false
            };
        },
        methods: {
            authenticate() {
				this.loading=!this.loading
                this.$store.dispatch('login');

                login(this.$data.form)
                    .then((res) => {
					this.showToast('error-notifications','bg-success text-white','Login Successfull');
                        this.$store.commit("loginSuccess", res);
                        this.$router.push('/');
                    })
                    .catch((error) => {
                        this.$store.commit("loginFailed", {error});
						this.loading=!this.loading
						this.showToast('error-notifications','bg-danger text-white',this.authError);
                    });
            },
			showToast(group,type,text){
				this.$notify({
					group: group,
					type: type,
					title: 'Authentication Message',
					text: text
				})
			}
        },
        computed: {
            authError() {
                return this.$store.getters.authError;
            }
        }
    }
</script>

<style scoped>
.error {
    text-align: center;
    color: red;
}
</style>
