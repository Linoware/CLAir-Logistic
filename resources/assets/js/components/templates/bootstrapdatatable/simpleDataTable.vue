<template>
    <div>

        <left-align-button-group ref="childDialog"
             v-bind:enable-add-new-button="true"
             v-bind:enable-trash-button="selected.length > 0 ? true : false"
             v-bind:delete-multiple-records="deleteMultipleRecords"
             v-bind:route-url="routeUrl"
        />


        <b-card class="d-flex justify-content-center align-items-center">
            <b-card-header>
                <div class="row" style="width:auto !important;" v-show="!loading">

                    <div class="col-sm-3">
                        <b-form-group>
                            <b-input size="sm"  placeholder="Search..." class="d-inline-block w-auto float-sm-left" @input="filter($event)" />
                        </b-form-group>

                    </div>

                </div>
            </b-card-header>
            <b-card-body>
                <!-- Table -->
                <div class="table-responsive" style="height: 420px; overflow: scroll;">
                    <b-table ref="table" class="table-responsive-md"
                             :select-all="true"
                             :items="jsonData"
                             :fields="jsonData[0]['fields']"
                             :striped="isStriped"
                             :hover="isHoverable"
                             :bordered="isBordered"
                             :small="isSmall"
                             :fixed="isFixed"
                             :dark="isDark"
                             :foot-clone="isFootClone"
                             :head-variant="headerStyle"
                             :current-page="currentPage"
                             :per-page="perPage"
                             @head-clicked="selectAllRecord">
                        <template slot="HEAD_select_all" slot-scope="data">
                            <div class="btn-group btn-group-sm">
                                <b-check class="btn-group-sm" v-model="selectAll" @click.stop="selectAllRecord"></b-check>
                            </div>
                        </template>
                        <template slot="select_all" slot-scope="data">
                            <b-check v-model="selected" :value="data.item"></b-check>
                        </template>
                        <template :slot="jsonData.enable_status" slot-scope="data" class="justify-content-center text-center">
                            <!--<div class="justify-content-center justify-content-sm-end">-->
                                <!--<label class="switcher switcher-success">-->
                                    <!--<input type="checkbox" class="switcher-input" v-model="data.item.enable" @change="updateStatus(data.item[fields.action.id],data.item.enable)">-->
                                    <!--<span class="switcher-indicator">-->
                                        <!--<span class="switcher-yes"><span class="ion ion-md-checkmark"></span></span>-->
                                        <!--<span class="switcher-no"><span class="ion ion-md-close"></span></span>-->
                                    <!--</span>-->
                                <!--</label>-->
                            <!--</div>-->
                            {{ data.item.action.status ? 'Enabled' : 'Disabled' }}
                        </template>
                        <template :slot="jsonData.country_name" slot-scope="data">
                            <router-link :to="viewUrl + '/' + data.item.action.id">{{ data.item.action.name }}</router-link>
                        </template>
                        <template slot="action" slot-scope="row">

                            <b-btn-group class="btn-group-sm" style="margin-top: -18px !important;">
                                <b-btn title="View Rcord" @click.stop="viewRecord(row.item[fields.action.id])" size="sm" class="mt-3"><i class = "ion ion-md-eye"></i></b-btn>
                                <b-btn title="Delete Record" @click.stop="showConfirmDialog(row.item[fields.action.id])" size="sm" class="mt-3"><i class="ion ion-ios-trash"></i> </b-btn>
                                <b-btn size="sm" @click.stop="row.toggleDetails" class="mt-3">
                                    <i :class="row.detailsShowing ? 'fas fa-minus' : 'fas fa-plus'"></i>
                                </b-btn>
                            </b-btn-group>
                        </template>
                        <template slot = "row-details" slot-scope = "row">
                            <b-table  v-for="(child, c) in row.item.children" v-if="c==0" :key="c"
                                :items = "row.item.children"
                                :fields = "row.item.children[0]['fields']"
                                :striped="isStriped"
                                :hover="isHoverable"
                                :bordered="isBordered"
                                :small="isSmall"
                                :fixed="isFixed"
                                :dark="isDark"
                                :foot-clone="isFootClone"
                                :head-variant="headerStyle"
                            >
                                <template slot="action" slot-scope="row">
                                    <b-btn-group class="btn-group-sm" style="margin-top: -18px !important;">
                                        <b-btn title="View Rcord" @click.stop="viewRecord(row.item[fields.action.id])" size="sm" class="mt-3"><i class = "ion ion-md-eye"></i></b-btn>
                                        <b-btn title="Delete Record" @click.stop="showConfirmDialog(row.item[fields.action.id])" size="sm" class="mt-3"><i class="ion ion-ios-trash"></i> </b-btn>
                                        <b-btn size="sm" @click.stop="row.toggleDetails" class="mt-3">
                                            <i :class="row.detailsShowing ? 'fas fa-minus' : 'fas fa-plus'"></i>
                                        </b-btn>
                                    </b-btn-group>
                                </template>
                                <template slot = "row-details" slot-scope = "row">

                                    <b-table v-for="(child, c) in row.item.children" v-if="c==0" :key="c"
                                            :items = "row.item.children"
                                            :fields = "row.item.children[0]['fields']"
                                            :striped="isStriped"
                                            :hover="isHoverable"
                                            :bordered="isBordered"
                                            :small="isSmall"
                                            :fixed="isFixed"
                                            :dark="isDark"
                                            :foot-clone="isFootClone"
                                            :head-variant="headerStyle"
                                    >
                                        <template slot="action" slot-scope="row">
                                            <b-btn-group class="btn-group-sm" style="margin-top: -18px !important;">
                                                <b-btn title="View Rcord" @click.stop="viewRecord(row.item[fields.action.id])" size="sm" class="mt-3"><i class = "ion ion-md-eye"></i></b-btn>
                                                <b-btn title="Delete Record" @click.stop="showConfirmDialog(row.item[fields.action.id])" size="sm" class="mt-3"><i class="ion ion-ios-trash"></i> </b-btn>
                                            </b-btn-group>
                                        </template>
                                    </b-table>
                                </template>
                            </b-table>
                            <!--<div  class = "table-responsive">-->
                                <!--<table class = "table b-table table-striped table-bordered" width="100%">-->
                                    <!--<div v-for = "(items, index) in formControls" :key = "index"  class = "table b-table table-striped table-bordered" width="100%">-->
                                        <!--<thead v-if = "index == 0">-->
                                            <!--<th class = "text-center" v-for = "(fields, i) in items.fields" v-if="i !== 'has_child'">{{ i }}</th><th width="50px"></th><th v-if="items.fields.has_child"></th>-->
                                        <!--</thead>-->
                                    <!--<tbody style = "width:100%">-->
                                        <!--<tr>-->
                                            <!--<td v-if="items.id == row.item[fields.action.id] && i !=='has_child'" v-for = "(control, i) in items.fields" :key = "i" @change = "col++">-->
                                                <!--<b-input v-model="formControls[index][i]" :placeholder="i.replace('_', ' ').toUpperCase()"></b-input>-->
                                            <!--</td>-->

                                            <!--<td style=" width: 30px">-->
                                                <!--<b-btn class="bg-danger" size="sm" @click.stop = "formControls.splice(index,1)"><i class="fas fa-minus"></i> </b-btn>-->
                                            <!--</td>-->
                                            <!--<td v-if="items.fields.has_child">-->
                                                <!--<b-btn size="sm" @click.stop = "addRow(1, items.fields.formControls, items.fields.child_items)"><i class="fas fa-plus"></i> </b-btn>-->
                                            <!--</td>-->
                                        <!--</tr>-->
                                        <!--<tr v-if = "items.fields.has_child">-->
                                            <!--{{ col }}-->
                                            <!--<td colspan = "10">-->
                                                <!--<table>-->
                                                    <!--<div v-for = "(city, ci) in items.fields.formControls" :key="ci">-->
                                                        <!--<thead>-->
                                                        <!--<th>ljlkj</th><th>kljlj;l</th><th>kljlj;l</th>-->
                                                        <!--</thead>-->
                                                        <!--<tbody>-->
                                                        <!--<tr>-->
                                                            <!--<td v-for = "(col, cl) in city.fields" :key="cl">-->
                                                                <!--<b-input></b-input>-->
                                                            <!--</td>-->
                                                        <!--</tr>-->
                                                        <!--</tbody>-->
                                                    <!--</div>-->
                                                <!--</table>-->
                                            <!--</td>-->
                                        <!--</tr>-->
                                    <!--</tbody>-->
                                    <!--</div>-->
                                <!--</table>-->
                                <!--<div class="col-sm-12">-->
                                    <!--<b-btn class="float-sm-right" size="sm" @click = "addRow(row.item[fields.action.id], formControls, fields.action.child_items)">Add</b-btn>-->
                                <!--</div>-->
                            <!--</div>-->

                        </template>
                    </b-table>
                </div>

                <!-- Pagination -->
                <div class="row">
                    <div class="col-sm-2">
                        <b-form-group>
                            <label class="float-sm-left">Per page: &nbsp;</label>
                            <b-select size="sm" :options="perPageOptions" v-model="perPage" class="d-inline-block w-auto float-sm-left" />
                        </b-form-group>
                    </div>

                    <div class="col-sm">
                        <b-pagination class="justify-content-center justify-content-sm-end"
                          v-if="totalItems"
                          v-model="currentPage"
                          :total-rows="totalItems"
                          :per-page="perPage"
                          size="sm"
                        />
                    </div>
                </div>

            </b-card-body>
        </b-card>


        <div class="d-inline-block">
            <sweet-modal ref="confirmDialog">

                <h4 class="text-left">Message</h4>
                <h6 class="text-left">
                    Are you sure, you want to delete this record???
                </h6>

                <b-btn slot="button" @click="$refs.confirmDialog.close()">Close</b-btn>
                <b-btn slot="button" variant="primary" @click="deleteRecord(recordId)" class="ml-2">OK</b-btn>
            </sweet-modal>
        </div>
    </div>
</template>

<style>
    .select-all-col{
        width: 40px !important;
    }
    .action-col{
        width:120px;
    }
</style>

<script>
    import { SweetModal, SweetModalTab } from 'sweet-modal-vue'
    import leftAlignButton from '../actionbuttons/leftAlignButton'
    import leftAlignButtonGroup from '../actionbuttons/leftAlignButtonGroup'
    import defaultFrom from '../forms/defaultForm'
    import TablesBootstrap from "../../tables/Bootstrap";
    import ChildTable from './childTable'
    export default{
        props:[
            'api',
            'loading',
            'routeUrl',
            'fields',
            'viewUrl',
            'multipleDeleteApi',
            'formControls',
            'formData'
        ],
        components:{
            TablesBootstrap,
            leftAlignButton,
            leftAlignButtonGroup,
            SweetModal,
            SweetModalTab,
            defaultFrom,
            ChildTable
        },
        data(){
            return{

                col: 0,

                isBusy: false,

                enable: false,

                btnText: 'Check All',
                jsonData: [],
                originalJsonData: [],
                selected:[],
                selectAll:false,

                recordId: null,

                // Pagination
                perPageOptions: [25, 50, 100],
                perPage: 15,
                currentPage: 1,

                // Table options
                headerStyleOptions: [{ text: 'Default', value: null }, { text: 'Light', value: 'light' }, { text: 'Dark', value: 'dark' }],
                isStriped: true,
                isHoverable: false,
                isBordered: true,
                isSmall: false,
                isFixed: true,
                isDark: false,
                isFootClone: false,
                headerStyle: 'dark',
                tmp_id: 0,
                tree:[
                    {
                        fields: {
                            name: '', email: ''
                        },
                        data: [
                            {
                                name:'hello'
                            }
                        ],
                        children: [
                            {
                                fields: {
                                    name: '', email: ''
                                },
                                data: [
                                    {
                                        name: 'h'
                                    }
                                ],
                                children: [
                                    {
                                        fields: {
                                            name: '', email: ''
                                        },
                                        data: [
                                            {
                                                name: ''
                                            }
                                        ]
                                    },
                                ]
                            },
                        ]
                    }
                ]

            }
        },
        watch:{

            selected(a,b){

                this.selectAll = (this.jsonData.length === a.length) ? true : false;

            }

        },
        created(){
            this.fetchUserList(this.api)

        },
        computed: {
            column(){
              this.col = this.col + 1;
            },
            totalItems () {
                return this.jsonData.length
            },
            totalPages () {
                return Math.floor(this.totalItems / this.perPage) || (this.totalItems ? 1 : 0)
            }
        },
        methods:{
            dataProvider(ctx){
                let promise = axios.get(this.api + '?page=' + ctx.currentPage + '&size=' + ctx.perPage)

                return promise.then((data) => {
                    const items =  data.data

                    return(items)
                })
            },
            fetchUserList(api){
                axios.get(api).then(res=>{
                    this.jsonData = res.data
                    this.originalJsonData = res.data.slice(0)
                    this.$emit('change',this.loading)
                    console.log(res.data)
                })
            },
            filter (value) {
                const val = value.toLowerCase()
                const filtered = this.originalJsonData.filter(d => {
                    // Concat data
                    return Object.keys(d)
                        .map(k => String(d[k]))
            .join('|')
                    .toLowerCase()
                    .indexOf(val) !== -1 || !val
            })
                this.jsonData = filtered
            },
            viewRecord(id){
                this.$router.push(this.viewUrl + '/' + id)
            },
            selectAllRecord(a){

                var vm = this
                this.selected = this.selectAll == false ? this.jsonData : []
                this.selectAll = this.jsonData.length === this.selected.length ? true : false
            },
            updateStatus(id, status){
                axios.put(this.api+ '/' +id,{enable_status: status}).then(res=>{
                    this.jsonData = res.data
                })
            },
            showConfirmDialog(id){
                this.recordId = id
                this.$refs.confirmDialog.open()
            },
            deleteMultipleRecords(){
                axios.post(this.multipleDeleteApi,this.selected).then(response => {
                   this.jsonData = response.data
                   this.$refs.childDialog.closeDialog()
                })
            },
            deleteRecord(id){
                axios.delete(this.api + '/' + id).then(response=>{
                    this.jsonData = response.data
                    this.$refs.confirmDialog.close()
                    console.log(response.data)
                })
            },
            addRow(id, dataContainer, dataItems){
                dataContainer.push({id: id, fields: dataItems})

                console.log(this.formControls)
            }
        }
    }
</script>

<style>
    div.my-table tr{
        width: 100% !important;
    }
</style>