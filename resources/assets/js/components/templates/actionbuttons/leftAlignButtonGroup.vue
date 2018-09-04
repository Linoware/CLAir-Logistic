<template>
    <div class="layout-wrapper layout-2 layout-container">
        <!-- Theme navbar -->
        <b-navbar toggleable="lg" variant="navbar-theme" class="navbar layout-navbar align-items-lg-center container-p-x navbar-expand-lg bg-navbar-theme" style="top:120px; padding:10px 0; border-top: 1px solid rgba(204, 204, 204, 0.31);">

            <b-btn-toolbar key-nav>

                <b-btn-group class="mr-2">
                    <b-btn :disabled = "!enableAddNewButton"  title="New" @click="addNew"><i class = "ion ion-ios-document"></i></b-btn>
                    <b-btn :disabled = "!enableUnlockButton" title="Unlock" @click.prevent="unlockRecord"><i :class="$parent.unlock ? 'ion ion-md-unlock' : 'ion ion-ios-lock'"></i> </b-btn>
                    <b-btn :disabled = "(!$parent.unlock && recordId > 0)  || !enableSaveButton" title="Save" @click.prevent="saveOrUpdateRecord"><i class="ion ion-ios-save"></i></b-btn>
                    <b-btn :disabled = "!enableTrashButton" title="Delete" @click.prevent="showDialog"><i class="ion ion-ios-trash"></i> </b-btn>
                    <b-btn :disabled = "!enableCopyButton" title="Copy" @click.prevent="cancel"><i class="ion ion-ios-copy"></i> </b-btn>
                    <b-btn :disabled = "!enablePrintButton" title="Print" @click.prevent="cancel"><i class="ion ion-ios-print"></i> </b-btn>
                    <b-btn :disabled = "!enableCloseButton" title="Close" @click.prevent="cancel"><i class="ion ion-ios-backspace"></i> </b-btn>
                </b-btn-group>
                <b-btn title="Select All" @click="selectAll">{{selectAllText}}</b-btn>
            </b-btn-toolbar>

        </b-navbar>

        <div class="d-inline-block">
            <sweet-modal ref="confirmDialog">

                <h4 class="text-left">Message</h4>
                <h6 class="text-left">
                    Are you sure, you want to delete these records???
                </h6>

                <b-btn slot="button" @click="$refs.confirmDialog.close()">Close</b-btn>
                <b-btn slot="button" variant="primary" @click="deleteMultipleRecords" class="ml-2">OK</b-btn>
            </sweet-modal>
        </div>

    </div>
</template>

<style>
    button:disabled:hover, button[disabled]:hover{
        cursor: no-drop;
    }
</style>

<script>
    import { SweetModal, SweetModalTab } from 'sweet-modal-vue'
    export default{
        props:[
            'routeUrl',
            'enableSaveButton',
            'enableUnlockButton',
            'enableAddNewButton',
            'enableCloseButton',
            'enableTrashButton',
            'enablePrintButton',
            'enableCopyButton',
            'saveOrUpdateRecord',
            'deleteMultipleRecords',
            'selectAll',
            'selectAllText',
            'unlockRecord',
            'recordId'

        ],
        components:{
            SweetModal,
            SweetModalTab
        },
        data(){
            return{

            }
        },
        methods:{
            addNew(){
                this.$router.push(this.routeUrl)
            },
            cancel(){
                window.history.back();
            },
            showDialog(){
                this.$refs.confirmDialog.open()
            },
            closeDialog(){
                this.$refs.confirmDialog.close()
            }
        }
    }
</script>