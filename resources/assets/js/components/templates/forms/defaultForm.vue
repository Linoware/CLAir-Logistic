<template>
    <div>
        <breadcrumb v-bind:items="items"/>

        <left-align-button-group
                v-bind:record-id="recordId"
                v-bind:enable-unlock-button="recordId > 0 ? true : false"
                v-bind:enable-add-new-button = "false"
                v-bind:enable-save-button = "true"
                v-bind:enable-close-button = "true"
                v-bind:save-or-update-record = "saveOrUpdateRecord"
                v-bind:unlock-record="unlockRecord"
                v-bind:enable-trash-button = "false"
                v-bind:enable-update-button = "false"
                v-bind:enable-copy-button = "false"
                v-bind:enable-print-button = "false"
        />

        <notifications group="error-notifications" position="top center" />
        <notifications group="success-notifications" position="top center" />
        <div class="container">

            <!--<h4 class="display-4">{{ formTitle }}</h4>-->

            <b-card :header="formTitle" header-tag="h4" class="mb-4​" style="margin-top: 15px;">

                <b-card-body>
                    <b-form @submit.prevent="saveOrUpdateRecord">
                        <b-form-row>
                            <b-form-group  :label="formControl.type == 'checkbox' ? '' : formControl.require ? formControl.label+'*' : formControl.label" v-for="(formControl,f) in formControls" :key="f" :class="formControl.type == 'checkbox' ? formControl.class + ' text-left' : formControl.class + ' text-left'">

                                <b-input
                                        v-if = "formControl.name == 'password'"
                                        v-validate = "formControl.require ? 'required' : ''"
                                        ref = "confirmation"
                                        :name="formControl.label"
                                        v-model = "formData[formControl.name]"
                                        :type="formControl.type"
                                        :disabled = "recordId > 0 && !unlock"
                                />
                                <b-input
                                        v-else-if = "formControl.name == 'confirm_password'"
                                        v-validate="'required|confirmed:confirmation'"
                                        :name = "formControl.label"
                                        v-model = "formData[formControl.name]"
                                        :type = "formControl.type"
                                        :disabled = "recordId > 0 && !unlock"
                                />
                                <b-input v-else-if = "formControl.name == 'email'"
                                         v-validate = "'required|email'"
                                         :name = "formControl.label"
                                         v-model = "formData[formControl.name]"
                                         :type = "formControl.type"
                                         :disabled = "recordId > 0 && !unlock"
                                />
                                <b-select
                                        v-else-if = "formControl.type == 'select'"
                                        plain
                                        v-validate = "formControl.require ? 'required' : ''"
                                        :name = "formControl.label"
                                        v-model = "formData[formControl.name]"
                                        :options="dropDown[formControl.items]"
                                        :disabled = "recordId > 0 && !unlock"
                                />
                                <b-check
                                        v-else-if = "formControl.type == 'checkbox'"
                                        v-validate = "formControl.require ? 'required' : ''"
                                        :name = "formControl.label"
                                        v-model = "formData[formControl.name]"
                                        :disabled = "recordId > 0 && !unlock"
                                        :checked = "formData[formControl.name] == 1 ? true : false"
                                >
                                    {{ formControl.label }}
                                </b-check>
                                <b-input
                                        v-else :type = "formControl.type"
                                        v-validate = "formControl.require ? 'required' : ''"
                                        :name = "formControl.label"
                                        v-model = "formData[formControl.name]"
                                        :disabled = "recordId > 0 && !unlock"
                                />

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
    import leftAlignButtonGroup from '../actionbuttons/leftAlignButtonGroup'

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
            leftAlignButtonGroup
        },
        data(){

            return{
                valid:null,
                backend_errors:{},
                loading: false,
                unlock: false
            }

        },
        created(){
            this.loadRecord(this.recordId)
        },
        methods:{
            saveOrUpdateRecord() {

                this.$validator.validate().then(result=>{
                    if(result){
                        if(this.recordId){
                            axios.put(this.api+'/'+this.recordId,this.formData).then(response=>{

                                this.showToast('error-notifications','bg-success text-white', 'Record successfully updated');

                                setTimeout(function () {
                                    window.history.back()
                                },1000)

                            }).catch((err) => {

                            })
                        }else{
                            axios.post(this.api,this.formData).then((response)=>{
                                console.log(response.data);
                                this.showToast('success-notifications','bg-success text-white','Record successfully saved :)');
                                setTimeout(function () {
                                    window.history.back()
                                },1000)
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
            loadRecord(id){

                if(id > 0){
                    axios.get(this.api + '/' + id + '/edit').then(response => {
                        this.$emit('update', response.data)
                    })
                }

            },
            unlockRecord(){
                this.unlock = !this.unlock
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