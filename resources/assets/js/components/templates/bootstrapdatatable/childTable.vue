<template>
    <div>
        <table class="table table-responsive table-striped table-bordered">
            <thead class="thead-dark">
                <tr v-for="(n, i) in node.children" v-if="i==0">
                    <th v-for="(col, c) in node.fields" :key="c">{{ col }}</th><th></th>
                </tr>
            </thead>

            <tbody>

                <div  v-for="(items, i) in node" class="fields" :key="i">
                    <tr>
                        <td v-for="(col, c) in items.fields"><input type="text"/></td>
                        <td>
                            <b-btn-group class="btn-group-sm" >


                                <b-btn size="sm" @click="node.splice(i, 1)" class="bg-danger"  v-if="i>0">
                                    <i class="fas fa-minus"></i>
                                </b-btn>
                            </b-btn-group>
                        </td>
                    </tr>
                    <tr>
                        <b-btn size="sm" @click="addItem(node, items.fields)">
                            <i class="fas fa-plus"></i>
                        </b-btn>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <table class="table table-responsive"  v-if="node.children && node.children.length">

                                <node v-for="(child,i) in node.children" :node="child" :key="i"></node>

                            </table>

                        </td>
                    </tr>
                </div>

            </tbody>

        </table>

    </div>
</template>
<script>
    export default {
        name: 'node',
        props:[
            'node'
        ],
        data(){
          return {
              dataItem: null,
          }
        },
        methods:{
            addItem(children,data){

                children.push({fields: data})
            }
        }
    }
</script>