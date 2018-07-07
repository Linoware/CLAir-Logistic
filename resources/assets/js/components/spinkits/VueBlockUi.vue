<template>
    <div>
        <b-card>
            <BlockUI message="Loading..." :html="html" v-if="loading" />
        </b-card>
    </div>
</template>

<style>
    .loading-container .loading-backdrop {
        background: #fff !important;
        opacity: .7 !important;
    }
    .loading-container .loading {
        background: none !important;
        box-shadow: none !important;
    }
</style>

<script>
    import Vue from 'vue'
    import BlockUI from 'vue-blockui'

    Vue.use(BlockUI)

    export default {
        name: 'miscellaneous-vue-blockui',
        metaInfo: {
            title: 'Vue BlockUI - Miscellaneous'
        },
        data: () => ({
            loading: true,
            html: `
<div class="sk-wave sk-primary"><div class="sk-rect sk-rect1"></div><div class="sk-rect sk-rect2"></div><div class="sk-rect sk-rect3"></div><div class="sk-rect sk-rect4"></div><div class="sk-rect sk-rect5"></div></div>`
        }),
        methods: {
            blockPage () {
                this.loading = true
                setTimeout(() => { this.loading = false }, 4000)
            }
        }
    }
</script>
