<template>
    <div>
        <breadcrumb v-bind:items="items"/>

        <left-align-button v-bind:enable-add-new-button="false" v-bind:enable-save-button="true" v-bind:method="saveOrUpdateRecord"/>

        <div class="container">
            <b-card :header="formTitle" header-tag="h6" class="mb-4​" style="margin-top: -10px;">

                <b-card-body>
                    <b-form @submit.prevent="saveOrUpdateRecord">
                        <b-form-row>
                            <b-form-group horizontal :label="formControl.require ? formControl.label+'*' : formControl.label" v-for="(formControl,f) in formControls" :key="f" :class="formControl.class">

                                <b-input v-if = "formControl.name == 'password'" v-validate = "formControl.require ? 'required' : ''" ref = "confirmation" :name="formControl.label" v-model = "formData[formControl.name]" :type="formControl.type"/>
                                <b-input v-else-if = "formControl.name == 'confirm_password'" v-validate="'required|confirmed:confirmation'" :name = "formControl.label" v-model = "formData[formControl.name]" :type = "formControl.type"/>
                                <b-input v-else-if = "formControl.name == 'email'" v-validate = "'required|email'" :name = "formControl.label" v-model = "formData[formControl.name]" :type = "formControl.type"/>
                                <b-input v-else :type = "formControl.type" v-validate = "formControl.require ? 'required' : ''" :name = "formControl.label"  v-model = "formData[formControl.name]" />
                                <span class="text-danger">{{ errors.first(formControl.label) }}</span>

                            </b-form-group>
                        </b-form-row>
                    </b-form>
                </b-card-body>

                <b-card-footer class="text-muted">

                </b-card-footer>
            </b-card>
        </div>

    </div>
</template>

<script>
    import axios from 'axios'
    import breadcrumb from '../breadcrumbs/simpleBreadcrumb'
    import leftAlignButton from '../actionbuttons/leftAlignButton'
    export default {
        props:[
            'formTitle',
            'formControls',
            'formData',
            'items',
            'recordId',
            'api'
        ],
        components:{
            breadcrumb,
            leftAlignButton
        },
        data(){

            return{
                valid:null,
            }

        },
        created(){

        },
        methods:{
            saveOrUpdateRecord() {

                this.$validator.validate().then(result=>{
                    if(result){
                        if(this.recordId){
                            axios.put(this.api+'/'+this.recordId,this.formData).then(response=>{
                                console.log(response.data);
                            }).catch((err) => {
                                if(err.response.status === 401) {
                                    this.$store.commit('logout');
                                    this.$router.push('/Login');
                                }
                            })
                        }else{
                            axios.post(this.api,this.formData).then((response)=>{
                                console.log(response.data);
                            }).catch((err) => {
                                if(err.response.status === 401) {
                                    this.$store.commit('logout');
                                    this.$router.push('/Login');
                                }
                            })
                        }
                    }else{
                        //console.log(result)
                    }
                })
            }
        }
    }
</script>