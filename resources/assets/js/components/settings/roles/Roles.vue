<template>
    <div>

        <breadcrumb v-bind:items="breadcrumb_items"/>

        <!--<two-cube-spin v-show="loading"></two-cube-spin>-->
        <vue-block-ui v-if="loading"></vue-block-ui>

        <data-table
                v-bind:api="api"
                v-bind:route-url="'/settings/roles/create'"
                v-bind:view-url="'/settings/roles/view'"
                v-bind:multiple-delete-api="'/api/roles/multiple_delete'"
                v-on:change="removeLoading"
                v-show="!loading"
                v-bind:fields="tableFields"
                v-bind:form-data="tableFields.action.formData"
        />

    </div>
</template>

<script>
    import Breadcrumb from '../../templates/breadcrumbs/simpleBreadcrumb'
    import TwoCubeSpin from '../../spinkits/TwoCubeSpin'
    import VueBlockUi from '../../spinkits/VueBlockUi'
    import DataTable from '../../templates/bootstrapdatatable/simpleDataTable'
    export default{
        name:'role',
        metaInfo: {
            title: 'Roles-List'
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
                    name:{
                        label: "Username",
                        sortable: true
                    },
                    email:{
                        label: "Email",
                        sortable: true
                    },
                    created_at:{
                        label: "Created By",
                        sortable: true
                    },
                    action:{
                        name:"name",
                        label: "",
                        id: "id",
                        class: "action-col text-center",
                    }
                },
                loading: true,
                api: '/api/roles',
                breadcrumb_items:[
                    { text: 'Admin', href: '#' }, { text: 'Manage', href: '#' }, { text: 'Roles', active: true }
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