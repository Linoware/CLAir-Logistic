<template id="{{ $route.params.id }}">
    <div>
        <default-from
                v-bind:api="api"
                v-bind:record-id="id"
                v-bind:form-controls="formControls"
                v-bind:form-data="formData"
                @update="loadRecord"
                v-bind:items="breadcrumb_items"
                v-bind:form-title="'Users Registration'"/>
    </div>
</template>
<script>
    import defaultFrom from '../../templates/forms/defaultForm'
    export default {
        props: [
            'id'
        ],
        components:{
            defaultFrom
        },
        data() {
            return {
                api: '/api/roles',
                formControls: [
                    { label: "Name", class: 'col-xs-12 col-sm-5 col-md-5', name: 'name',type: 'text', require: true },
                    { label: "Description", class: 'col-xs-12 col-sm-5 col-md-5', name: 'guard_name',type: 'text', require: true },
                ],
                formData: {},
                breadcrumb_items:[
                    { text: 'User', href: '#' }, { text: 'Create', active: true }
                ]
            }
        },
        methods:{
            loadRecord(data){
                this.formData = data
            }
        }
    }
</script>