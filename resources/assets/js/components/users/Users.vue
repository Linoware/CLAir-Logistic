<template>
    <div>

        <breadcrumb v-bind:items="breadcrumb_items"/>

        <!--<two-cube-spin v-show="loading"></two-cube-spin>-->
        <vue-block-ui v-if="loading"></vue-block-ui>

        <data-table v-bind:api="api" v-bind:route-url="'/users/create'" v-on:change="removeLoading" v-show="!loading"/>

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