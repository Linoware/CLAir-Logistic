<template>
    <div>
        <vue-bootstrap-table
                :columns="columns"
                :values="values"
                :show-filter="true"
                :show-column-picker="true"
                :sortable="true"
                :multi-column-sortable=true
                :paginated="true"
                :filter-case-sensitive=false
        >
        </vue-bootstrap-table>
    </div>
</template>

<script>
    import VueBootstrapTable from 'vue-bootstrap-table2'
    export default {
        components: {
            VueBootstrapTable
        },
        data() {
            return{
                columns: [
                    {
                        title:"id",
                    },
                    {
                        title:"name",
                        visible: true,
                        editable: true,
                    },
                    {
                        title:"age",
                        visible: true,
                        editable: true,
                    },
                    {
                        title:"country",
                        visible: true,
                        editable: true,
                    }
                ],
                values: [
                    {
                        "id": 1,
                        "name": "John",
                        "country": "UK",
                        "age": 25,
                    },
                    {
                        "id": 2,
                        "name": "Mary",
                        "country": "France",
                        "age": 30,
                    },
                    {
                        "id": 3,
                        "name": "Ana",
                        "country": "Portugal",
                        "age": 20,
                    }
                ]
            }
        },
    }
</script>

