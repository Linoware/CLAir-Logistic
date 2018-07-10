<template>
    <div class="layout-wrapper layout-2 layout-container">
        <!-- Theme navbar -->
        <b-navbar toggleable="lg" variant="navbar-theme" class="navbar layout-navbar align-items-lg-center container-p-x navbar-expand-lg bg-navbar-theme" style="top:120px; padding:10px 0; border-top: 1px solid rgba(204, 204, 204, 0.31);">

            <div class="cui-example cui-example-inline-spacing">
                <b-btn :disabled="!enableAddNewButton" variant="outline-primary" @click="addNew">Add New</b-btn>
                <b-btn :disabled="!enableSaveButton" variant="outline-secondary" @click.prevent="method">Save</b-btn>
                <b-btn :disabled="!enableUpdateButton" variant="outline-success" @click.prevent="method">Update</b-btn>
                <b-btn :disabled="!enableCancelButton" variant="outline-danger" @click.prevent="cancel">Close</b-btn>
            </div>

        </b-navbar>
    </div>
</template>

<style>
    button:disabled:hover, button[disabled]:hover{
        cursor: no-drop;
    }
</style>

<script>
    export default{
        props:[
            'routeUrl',
            'enableSaveButton',
            'enableUpdateButton',
            'enableAddNewButton',
            'enableCancelButton',
            'method'

        ],
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
            }
        }
    }
</script>