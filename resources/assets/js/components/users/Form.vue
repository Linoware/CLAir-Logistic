<template>
    <div>
        <default-from v-bind:api="api" v-bind:form-controls="formControls" v-bind:form-data="formData" v-bind:items="breadcrumb_items" v-bind:form-title="'Users Registration'"/>
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
                api: '/api/users',
                formControls: [
                    { label: "Username", class: 'col-xs-12 col-sm-5 col-md-5', name: 'name',type: 'text', require: true },
                    { label: "Email", class: 'col-xs-12 col-sm-5 col-md-5', name: 'email',type: 'text', require: true },
                    { label: "Password", class: 'col-xs-12 col-sm-5 col-md-5', name: 'password',type: 'password', require: true },
                ],
                formData: {},
                breadcrumb_items:[
                    { text: 'User', href: '#' }, { text: 'Create', active: true }
                ]
            }
        }
    }
</script>