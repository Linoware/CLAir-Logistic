<template>
    <div>

        <breadcrumb v-bind:items="breadcrumb_items"/>

        <!--<two-cube-spin v-show="loading"></two-cube-spin>-->
        <vue-block-ui v-if="loading"></vue-block-ui>

        <data-table
                v-bind:api="api"
                v-bind:route-url="'/components/city/create'"
                v-bind:view-url="'/components/city/view'"
                v-bind:multiple-delete-api="'/api/cities/multiple_delete'"
                v-on:change="removeLoading"
                v-show="!loading"
                v-bind:fields="tableFields"
                v-bind:form-data="tableFields.action.formData"
        />

    </div>
</template>

<script>
    import Breadcrumb from '../templates/breadcrumbs/simpleBreadcrumb'
    import TwoCubeSpin from '../spinkits/TwoCubeSpin'
    import VueBlockUi from '../spinkits/VueBlockUi'
    import DataTable from '../templates/bootstrapdatatable/simpleDataTable'
    export default{
        name:'users',
        metaInfo: {
            title: 'Users-List'
        },
        components:{
            Breadcrumb,
            TwoCubeSpin,
            VueBlockUi,
            DataTable,
        },
        data(){
            return{
                tableFields:{
                    select_all:{
                        label: "",
                        class: "select-all-col"
                    },
                    country_name:{
                        label: "Country Name",
                        sortable: true
                    },
                    country_code:{
                        label: "Country Code",
                        sortable: true
                    },
                    country_name_native:{
                        label: "Native Name",
                        sortable: true
                    },
                    enable_status:{
                        label: "Eanable",
                        class: "text-center"
                    },
                    action: {
                        label: ""
                    }
                },
                loading: true,
                api: '/api/cities',
                breadcrumb_items:[
                    { text: 'Admin', href: '#' }, { text: 'Manage', href: '#' }, { text: 'Library', active: true }
                ]
            }
        },
        methods:{
            removeLoading(){
                this.loading=!this.loading
            }
        }
    }
</script>
