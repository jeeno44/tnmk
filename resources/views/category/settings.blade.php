@section("styles")

    <style type="text/css">

        li.borderless {
            border: 0 none;
            padding: 2px;
            margin: 3px;
        }
        li:empty{
            border-top: 0 none;
            border-left: 0 none;
            border-right: 0 none;
        }

    </style>

@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Категории</div>

                    <div class="card-body" id="cent">

                        <tree :node="list"></tree>

                        {{--Отображаем список категорий в произвольной форме со вложенностью--}}

                        <!--foreach-->
                        <!--endforeach-->

                        {{--END Отображаем список категорий в произвольной форме со вложенностью--}}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("comps")

    <template id="tree">
        <div class="">
            <draggable v-model="node" @sort="Sorted(node)">
                <ul class="list-group" v-for="i in node">
                    <li class="list-group-item"
                        :style="{marginLeft:(i.level-1) * 20 +'px'}">@{{ i.title }}</li>
                    <tree :node="i.children" v-if="i.children && i.children.length > 0"></tree>
                </ul>
            </draggable>
        </div>
    </template>

@endsection

@section("vue")
    <!-- CDNJS :: Sortable (https://cdnjs.com/) -->
    <script src="//cdn.jsdelivr.net/npm/sortablejs@1.8.4/Sortable.min.js"></script>
    <!-- CDNJS :: Vue.Draggable (https://cdnjs.com/) -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/Vue.Draggable/2.20.0/vuedraggable.umd.min.js"></script>

    <script type="text/javascript">

        Vue.component("tree",{
            props:['node'],
            template:"#tree",
            methods:{
                Sorted(val){
                    for(let i in val){
                        if ((parseInt(i)+1) != val[i].queue){
                            axios.post('/category/setnewcats',{id:val[i].id,queue:(parseInt(i)+1)}).then(response => {
                                console.log(response.data);
                            });
                        }
                    }
                }
            }
        });

        new Vue({
            el:'#app',
            data:{ list:[] },
            beforeMount() {
                axios.post('/category/getcats',{}).then(response => {
                    // console.log(response.data);
                    this.list = response.data;
                });
            }
        });

    </script>


@endsection
