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

        .bless1{margin-left: 0px;cursor: pointer;}
        .bless2{margin-left: 20px;cursor: pointer;}
        .bless3{margin-left: 40px;cursor: pointer;}
        .bless4{margin-left: 60px;cursor: pointer;}
        .bless5{margin-left: 80px;cursor: pointer;}
        .bless6{margin-left: 100px;cursor: pointer;}
        .bless7{margin-left: 120px;cursor: pointer;}
        .bless8{margin-left: 140px;cursor: pointer;}
        .bless9{margin-left: 160px;cursor: pointer;}
        .bless10{margin-left: 180px;cursor: pointer;}
        .bless11{margin-left: 200px;cursor: pointer;}
        .bless12{margin-left: 220px;cursor: pointer;}
        .bless13{margin-left: 240px;cursor: pointer;}
        .bless14{margin-left: 260px;cursor: pointer;}
        .bless15{margin-left: 280px;cursor: pointer;}
        .bless16{margin-left: 300px;cursor: pointer;}
        .bless17{margin-left: 320px;cursor: pointer;}
        .bless18{margin-left: 340px;cursor: pointer;}
        .bless19{margin-left: 360px;cursor: pointer;}
        .bless20{margin-left: 380px;cursor: pointer;}
        .bless21{margin-left: 400px;cursor: pointer;}
        .bless22{margin-left: 420px;cursor: pointer;}
        .bless23{margin-left: 440px;cursor: pointer;}
        .bless24{margin-left: 460px;cursor: pointer;}
        .bless25{margin-left: 480px;cursor: pointer;}
        .bless26{margin-left: 500px;cursor: pointer;}
        .bless27{margin-left: 520px;cursor: pointer;}
        .bless28{margin-left: 540px;cursor: pointer;}
        .bless29{margin-left: 560px;cursor: pointer;}
        .bless30{margin-left: 580px;cursor: pointer;}
        .bless31{margin-left: 600px;cursor: pointer;}
        .bless32{margin-left: 620px;cursor: pointer;}
        .bless33{margin-left: 640px;cursor: pointer;}
        .bless34{margin-left: 660px;cursor: pointer;}
        .bless35{margin-left: 680px;cursor: pointer;}
        .bless36{margin-left: 700px;cursor: pointer;}
        .bless37{margin-left: 720px;cursor: pointer;}
        .bless38{margin-left: 740px;cursor: pointer;}
        .bless39{margin-left: 760px;cursor: pointer;}
        .bless40{margin-left: 780px;cursor: pointer;}
        .bless41{margin-left: 800px;cursor: pointer;}
        .bless42{margin-left: 820px;cursor: pointer;}
        .bless43{margin-left: 840px;cursor: pointer;}
        .bless44{margin-left: 860px;cursor: pointer;}
        .bless45{margin-left: 880px;cursor: pointer;}
        .bless46{margin-left: 900px;cursor: pointer;}
        .bless47{margin-left: 920px;cursor: pointer;}
        .bless48{margin-left: 940px;cursor: pointer;}
        .bless49{margin-left: 960px;cursor: pointer;}
        .bless50{margin-left: 980px;cursor: pointer;}

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
                    <li class="list-group-item" :class="'bless'+i.level">@{{ i.title }}</li>
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
