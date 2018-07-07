<template>
    <div>

        <breadcrumb v-bind:items="breadcrumb_items"/>

        <two-cube-spin v-show="loading"></two-cube-spin>

        <data-table v-bind:api="api" v-bind:route-url="'/users/create'" v-on:change="removeLoading" v-show="!loading"/>
    </div>
</template>

<script>
    import Breadcrumb from '../templates/breadcrumbs/simpleBreadcrumb'
    import TwoCubeSpin from '../spinkits/TwoCubeSpin'
    import DataTable from '../templates/bootstrapdatatable/simpleDataTable'
    export default{
        name:'users',
        metaInfo: {
            title: 'Users-List'
        },
        components:{
            Breadcrumb,
            TwoCubeSpin,
            DataTable
        },
        data(){
            return{
                loading: true,
                api: '/api/users',
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