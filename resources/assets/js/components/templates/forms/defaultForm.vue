<template>
    <div>
        <breadcrumb v-bind:items="items"/>

        <left-align-button v-bind:enable-add-new-button="false" v-bind:enable-save-button="true" v-bind:enable-cancel-button="true" v-bind:method="saveOrUpdateRecord"/>
        <notifications group="error-notifications" position="top center" />
        <notifications group="success-notifications" position="top center" />
        <div class="container">
            <b-card :header="formTitle" header-tag="h6" class="mb-4​" style="margin-top: -10px;">

                <b-card-body>
                    <b-form @submit.prevent="saveOrUpdateRecord">
                        <b-form-row>
                            <b-form-group horizontal :label="formControl.require ? formControl.label+'*' : formControl.label" v-for="(formControl,f) in formControls" :key="f" :class="formControl.class" class="text-right">

                                <b-input v-if = "formControl.name == 'password'" v-validate = "formControl.require ? 'required' : ''" ref = "confirmation" :name="formControl.label" v-model = "formData[formControl.name]" :type="formControl.type"/>
                                <b-input v-else-if = "formControl.name == 'confirm_password'" v-validate="'required|confirmed:confirmation'" :name = "formControl.label" v-model = "formData[formControl.name]" :type = "formControl.type"/>
                                <b-input v-else-if = "formControl.name == 'email'" v-validate = "'required|email'" :name = "formControl.label" v-model = "formData[formControl.name]" :type = "formControl.type"/>
                                <b-select v-else-if = "formControl.type == 'select'" plain v-validate = "formControl.require ? 'required' : ''" :name = "formControl.label" v-model = "formData[formControl.name]" :options="dropDown[formControl.items]" />
                                <b-input v-else :type = "formControl.type" v-validate = "formControl.require ? 'required' : ''" :name = "formControl.label"  v-model = "formData[formControl.name]" />
                                <span class="text-danger">{{ errors.first(formControl.label) }}</span><!--Client validation message-->
                                <span class="text-danger">{{ backend_errors[formControl.name] }}</span><!--Backend validation message-->
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
            'dropDown',
            'recordId',
            'api',
            'backRoute'
        ],
        components:{
            breadcrumb,
            leftAlignButton,
        },
        data(){

            return{
                valid:null,
                backend_errors:{},
                loading: false,
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
                                this.showToast('error-notifications','bg-danger text-white',this.authError);
                            }).catch((err) => {

                            })
                        }else{
                            axios.post(this.api,this.formData).then((response)=>{
                                console.log(response.data);
                                this.showToast('success-notifications','bg-success text-white','Record successfully saved :)');
                                setTimeout(function () {
                                    window.history.back()
                                },3000)
                            }).catch((err) => {
                                if(err.response.status === 422) {
                                    this.backend_errors = err.response.data.errors
                                }
                            })
                        }
                    }else{
                        //console.log(result)
                    }
                })
            },
            showToast(group,type,text){
                this.$notify({
                    group: group,
                    type: type,
                    title: 'Message',
                    text: text
                })
            }
        }
    }
</script>