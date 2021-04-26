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

        .bless1{margin-left: 0px;}
        .bless2{margin-left: 20px;}
        .bless3{margin-left: 40px;}
        .bless4{margin-left: 60px;}
        .bless5{margin-left: 80px;}
        .bless6{margin-left: 100px;}
        .bless7{margin-left: 120px;}
        .bless8{margin-left: 140px;}
        .bless9{margin-left: 160px;}
        .bless10{margin-left: 180px;}
        .bless11{margin-left: 200px}
        .bless12{margin-left: 220px}
        .bless13{margin-left: 240px}
        .bless14{margin-left: 260px}
        .bless15{margin-left: 280px}
        .bless16{margin-left: 300px}
        .bless17{margin-left: 320px}
        .bless18{margin-left: 340px}
        .bless19{margin-left: 360px}
        .bless20{margin-left: 380px}
        .bless21{margin-left: 400px}
        .bless22{margin-left: 420px}
        .bless23{margin-left: 440px}
        .bless24{margin-left: 460px}
        .bless25{margin-left: 480px}
        .bless26{margin-left: 500px}
        .bless27{margin-left: 520px}
        .bless28{margin-left: 540px}
        .bless29{margin-left: 560px}
        .bless30{margin-left: 580px}
        .bless31{margin-left: 600px}
        .bless32{margin-left: 620px}
        .bless33{margin-left: 640px}
        .bless34{margin-left: 660px}
        .bless35{margin-left: 680px}
        .bless36{margin-left: 700px}
        .bless37{margin-left: 720px}
        .bless38{margin-left: 740px}
        .bless39{margin-left: 760px}
        .bless40{margin-left: 780px}
        .bless41{margin-left: 800px}
        .bless42{margin-left: 820px}
        .bless43{margin-left: 840px}
        .bless44{margin-left: 860px}
        .bless45{margin-left: 880px}
        .bless46{margin-left: 900px}
        .bless47{margin-left: 920px}
        .bless48{margin-left: 940px}
        .bless49{margin-left: 960px}
        .bless50{margin-left: 980px}

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

                            <div v-if="nothing">
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
                <li class="list-group-item" :class="'bless'+i.level"
                    :style="(find.includes(i.id)) ? 'background-color: #ff8991' : ''">@{{ i.title }}</li>
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
                    if (this.search.trim().length >= 3){
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
