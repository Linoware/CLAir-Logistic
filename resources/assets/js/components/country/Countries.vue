<template>
    <div>

        <breadcrumb v-bind:items="breadcrumb_items"/>

        <!--<two-cube-spin v-show="loading"></two-cube-spin>-->
        <vue-block-ui v-if="loading"></vue-block-ui>

        <data-table
            v-bind:api="api"
            v-bind:route-url="'/components/country/create'"
            v-bind:view-url="'/components/country/view'"
            v-bind:multiple-delete-api="'/api/countries/multiple_delete'"
            v-on:change="removeLoading"
            v-show="!loading"
            v-bind:fields="tableFields"
            v-bind:is-filter="false"
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
                tableFields:{},
                loading: true,
                api: '/api/countries',
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
