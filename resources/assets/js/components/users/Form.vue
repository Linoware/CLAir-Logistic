<template>
    <div>
        <default-from v-bind:form-controls="formControls" v-bind:form-data="formData" v-bind:items="breadcrumb_items" v-bind:form-title="'Users Registration'"/>
    </div>
</template>
<script>
    import defaultFrom from '../templates/forms/defaultForm'
    export default {
        components:{
            defaultFrom
        },
        data() {
            return {
                formControls: [
                    { label: "First Name", class: 'col-xs-12 col-sm-6 col-md-6', name: 'first_name',type: 'text', require: true },
                    { label: "Last Name", class: 'col-xs-12 col-sm-6 col-md-6', name: 'last_name',type: 'text', require: true },
                    { label: "Telephone Number", class: 'col-xs-12 col-sm-6 col-md-6', name: 'telephone_number', type: 'text', require: false },
                    { label: "User Name", class: 'col-xs-12 col-sm-6 col-md-6', name: 'username',type: 'text', require: true },
                    { label: "Password", class: 'col-xs-12 col-sm-6 col-md-6', name: 'password',type: 'password', require: true },
                    { label: "Confirm Password", class: 'col-xs-12 col-sm-6 col-md-6', name: 'confirm_password',type: 'password', require: true },
                ],
                formData: {
                    first_name: 'test form'
                },
                breadcrumb_items:[
                    { text: 'User', href: '#' }, { text: 'Create', active: true }
                ]
            }
        }
    }
</script>