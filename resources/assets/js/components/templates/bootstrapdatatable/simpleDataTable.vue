<template>
    <div>

        <left-align-button-group ref="childDialog"
             v-bind:enable-add-new-button="true"
             v-bind:enable-trash-button="selected.length > 0 ? true : false"
             v-bind:delete-multiple-records="deleteMultipleRecords"
             v-bind:route-url="routeUrl"
        />

        <div class="row" style="width:auto !important;" v-show="!loading">

            <div class="col-sm-3">
                <b-form-group>
                    <b-input size="sm"  placeholder="Search..." class="d-inline-block w-auto float-sm-left" @input="filter($event)" />
                </b-form-group>

            </div>

        </div>

        <!-- Table -->
        <div class="table-responsive">

            <b-table style="width: auto !important;" ref="table" id="my-table"
                    :select-all="true"
                    :items="jsonData"
                    :fields="fields"
                    :striped="isStriped"
                    :hover="isHoverable"
                    :bordered="isBordered"
                    :small="isSmall"
                    :fixed="isFixed"
                    :dark="isDark"
                    :foot-clone="isFootClone"
                    :head-variant="headerStyle"
                    :current-page="currentPage"
                    :per-page="perPage">
                <template slot="HEAD_select_all" slot-scope="data" ><div class="btn-group btn-group-sm"><b-btn class="btn-group-sm" @click.stop="selectAllRecord">{{ btnText }}</b-btn></div></template>
                <template slot="select_all" slot-scope="data">
                    <b-check v-model="selected" :value="data.item"></b-check>
                </template>
                <template :slot="fields.action.status" slot-scope="data">
                    <label class="switcher switcher-success">
                        <input type="checkbox" class="switcher-input" v-model="data.item.enable" @change="updateStatus(data.item[fields.action.id],data.item.enable)">
                        <span class="switcher-indicator">
                          <span class="switcher-yes"><span class="ion ion-md-checkmark"></span></span>
                          <span class="switcher-no"><span class="ion ion-md-close"></span></span>
                        </span>
                    </label>
                </template>
                <template :slot="fields.action.name" slot-scope="data">
                    <router-link to="record/view">{{ data.item[fields.action.name] }}</router-link>
                </template>
                <template slot="action" slot-scope="data">

                    <b-btn-group class="mr-2">
                        <b-btn title="View Rcord" @click.stop="viewRecord(data.item[fields.action.id])"><i class = "ion ion-md-eye"></i></b-btn>
                        <b-btn title="Delete Record" @click.stop="showConfirmDialog(data.item[fields.action.id])"><i class="ion ion-ios-trash"></i> </b-btn>
                    </b-btn-group>

                </template>
            </b-table>
        </div>

        <!-- Pagination -->
        <div class="row">
            <div class="col-sm-2">
                <b-form-group>
                    Per page: &nbsp;
                    <b-select size="sm" :options="perPageOptions" v-model="perPage" class="d-inline-block w-auto" />
                </b-form-group>
            </div>
            <!--<div class="col-sm-2 text-sm-left text-center mb-3 mb-sm-0">-->

                <!--<span class="text-muted" v-if="totalPages">Page {{ currentPage }} of {{ totalPages }}</span>-->
            <!--</div>-->
            <div class="col-s-8">
                <b-pagination class="justify-content-center justify-content-sm-end"
                              v-if="totalItems"
                              v-model="currentPage"
                              :total-rows="totalItems"
                              :per-page="perPage"
                              size="sm" />
            </div>
        </div>

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

<script>
    import { SweetModal, SweetModalTab } from 'sweet-modal-vue'
    import leftAlignButton from '../actionbuttons/leftAlignButton'
    import leftAlignButtonGroup from '../actionbuttons/leftAlignButtonGroup'
    export default{
        props:[
            'api',
            'loading',
            'routeUrl',
            'fields',
            'viewUrl',
            'multipleDeleteApi'
        ],
        components:{
            leftAlignButton,
            leftAlignButtonGroup,
            SweetModal,
            SweetModalTab
        },
        data(){
            return{
                enable: false,

                btnText: 'Check All',
                jsonData: [],
                originalJsonData: [],
                selected:[],
                selectAll:false,

                recordId: null,

                // Pagination
                perPageOptions: [25, 50, 100],
                perPage: 25,
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
            }
        },
        watch:{

            selected(a,b){

                this.btnText = (this.jsonData.length === a.length) ? 'Uncheck All' : 'Check All';

            }

        },
        created(){
            this.fetchUserList(this.api)

        },
        computed: {
            totalItems () {
                return this.jsonData.length
            },
            totalPages () {
                return Math.floor(this.totalItems / this.perPage) || (this.totalItems ? 1 : 0)
            }
        },
        methods:{
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
                this.selected = this.btnText == 'Check All' ? this.jsonData : []
                this.btnText = this.jsonData.length === this.selected.length ? 'Uncheck All' : 'Check All'
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
            }
        }
    }
</script>