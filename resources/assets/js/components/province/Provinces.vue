<template>
    <div>

        <breadcrumb v-bind:items="breadcrumb_items"/>

        <data-table
                v-bind:api="api"
                v-bind:route-url="'/components/province/create'"
                v-bind:view-url="'/components/province/view'"
                v-bind:multiple-delete-api="'/api/provinces/multiple_delete'"
                v-bind:fields="tableFields"
                v-bind:filter-controls="filterControls"
                v-bind:filter-data="filterData"
                v-bind:drop-down="dropdown"
                v-bind:is-filter="true"
        />

    </div>
</template>

<script>
    import Breadcrumb from '../templates/breadcrumbs/simpleBreadcrumb'
    import DataTable from '../templates/bootstrapdatatable/simpleDataTable'
    export default{
        name:'users',
        metaInfo: {
            title: 'Users-List'
        },
        components:{
            Breadcrumb,
            DataTable,
        },
        data(){
            return{
                filterControls: [
                    { label: "Country", class: 'col-xs-12 col-sm-12 col-md-12', name: 'country_id',type: 'select',items: 'countries', require: false },
                    { label: "Province", class: 'col-xs-12 col-sm-12 col-md-12', name: 'province_name',type: 'text', require: false },
                ],
                filterData: {
                    country_id: 1
                },
                dropdown: {
                    countries: [],
                },
                tableFields:{},
                api: '/api/provinces',
                breadcrumb_items:[
                    { text: 'Admin', href: '#' }, { text: 'Manage', href: '#' }, { text: 'Library', active: true }
                ]
            }
        },
        created(){
            this.getCountry()
        },
        methods:{
            removeLoading(){
                this.loading=!this.loading
            },
            getCountry(){
                axios.get(this.api+'/get_countries').then((res)=>{
                    this.dropdown.countries = res.data
                })
            }
        }
    }
</script>
