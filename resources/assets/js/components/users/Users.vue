<template>
    <div>
        <two-cube-spin v-show="loading"></two-cube-spin>

        <data-table v-bind:api="api" v-bind:items="breadcrumb_items" v-bind:route-url="'/users/create'" v-on:change="removeLoading" v-show="!loading"/>
    </div>
</template>

<script>
    import TwoCubeSpin from '../spinkits/TwoCubeSpin'
    import DataTable from '../templates/bootstrapdatatable/simpleDataTable'
    export default{
        name:'users',
        metaInfo: {
            title: 'Users-List'
        },
        components:{
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