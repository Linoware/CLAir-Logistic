<template>
    <div>
        <default-from
                v-bind:api="api"
                v-bind:record-id="id"
                v-bind:form-controls="formControls"
                v-bind:form-data="formData"
                v-bind:items="breadcrumb_items"
                @update="loadRecord"
                v-bind:drop-down="dropdown"
                v-bind:form-title="'Country Registration'"
        />
    </div>
</template>
<script>
    import defaultFrom from '../templates/forms/defaultForm'
    export default {
        props: [
          'id'
        ],
        components:{
            defaultFrom
        },
        data() {
            return {
                api: '/api/countries',
                formControls: [
                    { label: "Country Name", class: 'col-xs-12 col-sm-5 col-md-5', name: 'country_name',type: 'text', require: true },
                    { label: "Country Name Native", class: 'col-xs-12 col-sm-5 col-md-5', name: 'country_name_native',type: 'text', require: false },
                    { label: "Country Code", class: 'col-xs-12 col-sm-5 col-md-5', name: 'country_code',type: 'text', require: true },
                    { label: "Country Short Code", class: 'col-xs-12 col-sm-6 col-md-5', name: 'country_short_code',type: 'text', require: true },
                    { label: "Enable", class: 'col-xs-12 col-sm-6 col-md-5', name: 'enable_status',type: 'checkbox',items: 'status_option', require: true },
                ],
                formData: {
                    enable_status: true
                },
                dropdown: {
                    status_option: [
                        {'text': 'Enable', 'value': 1},
                        {'text': 'Disable', 'value': 0}
                    ],
                },
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