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

                        <div class="col-md-6">
                            <form method="post" @submit.prevent="searchGost">

                                <div class="form-group">
                                    <label for="search">Поиск :</label>
                                    <input type="text" class="form-control" id="search" name="search" v-model="search">
                                </div>

                                <input type="submit" value="Send" class="btn btn-primary">
                                <button type="button" class="btn btn-warning" @click="clearField">Clear</button>

                            </form>

                            <div v-if="nothing && this.search.trim().length > 0">
                                <p></p>
                                <hr>
                                <p></p>
                                <div class="alert alert-danger" role="alert">
                                    <i><b>Ничего не найдено...</b></i>
                                </div>
                            </div>
                        </div>



                        <p></p>
                        <hr>
                        <p></p>

                        <tree :list="listCats" :find="finded"></tree>

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
            <ul class="list-group" v-for="i in list">
                <li class="list-group-item"
                    :style="{backgroundColor:(find.includes(i.id)) ? '#ff8991' : '',marginLeft:(i.level-1) * 20 +'px'}">@{{ i.title }}</li>
                <tree :list="i.children" v-if="i.children && i.children.length > 0" :find="find"></tree>
            </ul>
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
            data(){ return { treeList:[] }},
            props:['list','find'],
            template:"#tree",
        });

        new Vue({
            el:'#app',
            data:{
                listCats:[],
                nothing:false,
                search:'',
                finded:''
            },
            methods:{
                clearField(){
                    this.search = '';
                    this.nothing = false;
                    this.finded = '';
                },
                searchGost(){
                    if (this.search.trim().length > 0){
                        axios.post('/category/findprods',{search:this.search}).then(response => {
                            // console.log(response.data);
                            if (response.data == "empty"){
                                this.nothing = true;
                            }
                            else {
                                this.nothing = false;
                                this.finded = response.data;
                            }
                        });
                    }
                }
            },
            beforeMount() {
                axios.post('/category/getcats',{}).then(response => {
                    // console.log(response.data);
                    this.listCats = response.data;
                });
            },
        });

    </script>


@endsection
