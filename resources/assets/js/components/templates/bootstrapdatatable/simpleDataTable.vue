<template>
    <div>

        <left-align-button v-bind:enable-add-new-button="true" v-bind:route-url="routeUrl"/>

        <div class="row" v-show="!loading">

            <div class="col">
                <b-form-group>
                    Per page: &nbsp;
                    <b-select size="sm" :options="perPageOptions" v-model="perPage" class="d-inline-block w-auto" />
                </b-form-group>
            </div>
            <div class="col">
                <b-form-group>
                    <b-input size="sm"  placeholder="Search..." class="d-inline-block w-auto float-sm-right" @input="filter($event)" />
                </b-form-group>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <b-table
                    :items="jsonData"
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
            </b-table>
        </div>

        <!-- Pagination -->
        <div class="row">
            <div class="col-sm text-sm-left text-center mb-3 mb-sm-0">
                <span class="text-muted" v-if="totalPages">Page {{ currentPage }} of {{ totalPages }}</span>
            </div>
            <div class="col-sm">
                <b-pagination class="justify-content-center justify-content-sm-end"
                              v-if="totalItems"
                              v-model="currentPage"
                              :total-rows="totalItems"
                              :per-page="perPage"
                              size="sm" />
            </div>
        </div>
    </div>
</template>
<script>

    import leftAlignButton from '../actionbuttons/leftAlignButton'
    export default{
        props:[
            'api',
            'loading',
            'routeUrl'
        ],
        components:{
            leftAlignButton
        },
        data(){
            return{
                jsonData: [],
                originalJsonData: [],

                // Pagination
                perPageOptions: [1,10, 20, 30, 40, 50],
                perPage: 10,
                currentPage: 1,

                // Table options
                headerStyleOptions: [{ text: 'Default', value: null }, { text: 'Light', value: 'light' }, { text: 'Dark', value: 'dark' }],
                isStriped: true,
                isHoverable: false,
                isBordered: true,
                isSmall: false,
                isFixed: false,
                isDark: false,
                isFootClone: false,
                headerStyle: 'dark',
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
                }).catch((err) => {
                    if(err.response.status === 401) {
                        this.$store.commit('logout');
                        this.$router.push('/Login');
                    }
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
            }
        }
    }
</script>