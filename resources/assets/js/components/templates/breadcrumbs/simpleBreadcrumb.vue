<template>
    <div class="layout-wrapper layout-2 layout-container">
        <!-- Theme navbar -->
        <b-navbar toggleable="lg" variant="navbar-theme" class="navbar layout-navbar align-items-lg-center container-p-x navbar-expand-lg bg-navbar-theme" style="top:68px; padding:15px 0 2px 0;">
            <b-breadcrumb :items="items"/>
        </b-navbar>
    </div>
</template>
<script>
    export default{
        props:['items']
    }
</script>