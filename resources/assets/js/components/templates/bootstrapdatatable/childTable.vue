<template>
    <div>
        <notifications group="error-notifications" position="top center" />
        <notifications group="success-notifications" position="top center" />
        <b-table v-for="(child, c) in children" v-if="c==0" :key="c"
                 :items = "children"
                 :fields = "child.fields"
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
                    <b-btn title="View Rcord" @click.stop="viewRecord()" size="sm" class="mt-3"><i class = "ion ion-md-eye"></i></b-btn>
                    <b-btn title="Delete Record" @click.stop="showConfirmDialog(api,row.item[child.fields.action.id])" size="sm" class="mt-3"><i class="ion ion-ios-trash"></i> </b-btn>
                    <b-btn v-if="row.item.children" size="sm" @click.stop="row.toggleDetails" class="mt-3">
                        <i :class="row.detailsShowing ? 'fas fa-minus' : 'fas fa-plus'"></i>
                    </b-btn>
                </b-btn-group>
            </template>


            <template slot = "row-details" slot-scope = "row" v-if="row.item.children">

                <child-table v-bind:children="row.item.children" v-bind:pid="row.item[child.fields.action.id]" v-bind:form-controls="child.fields.action.formControls" v-bind:api="child.fields.action.api"></child-table>

            </template>


        </b-table>

        <table class="table b-table table-striped table-bordered" width="100%">
            <tr>
                <td v-for="(col, i) in formControls" :key="i">
                    <b-input v-model="formDatas[col]" :placeholder="col.toUpperCase()" :name = "col"></b-input>
                    <span class="text-danger">{{ backend_errors[col] }}</span><!--Backend validation message-->
                </td>
            </tr>
        </table>

        <b-btn class="float-sm-right" size="sm" @click = "saveRecord(api, formDatas)">Save</b-btn>

        <div class="d-inline-block">
            <sweet-modal ref="confirmDialog">

                <h4 class="text-left">Message</h4>
                <h6 class="text-left">
                    Are you sure, you want to delete this record???
                </h6>

                <b-btn slot="button" @click="$refs.confirmDialog.close()">Close</b-btn>
                <b-btn slot="button" variant="primary" @click="deleteRecord(childApi, recordId)" class="ml-2">OK</b-btn>
            </sweet-modal>
        </div>

    </div>
</template>
<script>
    import { SweetModal, SweetModalTab } from 'sweet-modal-vue'
    import ChildTable from './childTable'
    export default {
        name: 'child-table',
        props:[
            'api',
            'children',
            'jsonData',
            'formControls',
            'loading',
            'pid'
        ],
        components: {
            ChildTable,
            SweetModal,
            SweetModalTab,
        },
        data(){
          return {
              formDatas:{
                  pid: null
              },
              dataItem: null,
              headerStyleOptions: [{ text: 'Default', value: null }, { text: 'Light', value: 'light' }, { text: 'Dark', value: 'dark' }],
              isStriped: true,
              isHoverable: false,
              isBordered: true,
              isSmall: false,
              isFixed: true,
              isDark: false,
              isFootClone: false,
              headerStyle: 'dark',

              recordId: null,
              childApi: null,

              backend_errors:{}
          }
        },
        methods:{
            addItem(children,data){

                children.push({fields: data})
            },
            saveRecord(api, data){
                data.pid = this.pid
                axios.post(api, data).then(response=>{
                    this.showToast('success-notifications','bg-success text-white','Record successfully saved :)');
                    setTimeout(function () {
                        window.location.reload()
                    },1000)
                }).catch((err) => {
                    if(err.response.status === 422) {
                        this.backend_errors = err.response.data.errors
                    }
                })
            },
            refreshData(api){
                this.$emit('change', this.jsonData)
            },
            showConfirmDialog(api,id){
                this.childApi = api
                this.recordId = id
                this.$refs.confirmDialog.open()
            },
            deleteRecord(api,id){
                axios.delete(api + '/' + id).then(response=>{
                    this.$refs.confirmDialog.close()
                    window.location.reload()
                })
            },
            showToast(group,type,text){
                this.$notify({
                    group: group,
                    type: type,
                    title: 'Message',
                    text: text
                })
            }
        }
    }
</script>