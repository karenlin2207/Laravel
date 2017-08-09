@extends('layouts.app')

@section('content')
    <div class="content-wrapper" id="list">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">首頁導覽圖列表
                    <input type="text" v-model:name="search_string" v-on:keyup="fetch">
                    <a class="btn btn-xs btn-primary" href="/admin/sliders/create">新增</a></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>縮圖</th>
                                <th>標題</th>
                                <th>超連結網址</th>
                                <th>是否顯示</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="slider in sliders" :data-id="slider.id">
                                <td><img :src="slider.img_uri" style="width:30px;"></td>
                                <td>@{{slider.name}}</td>
                                <td>@{{slider.link}}</td>
                                <td v-if="slider.is_show"><label @click="notshow(slider)" class="label label-success">
                                    顯示</label></td>
                                <td v-else><label @click="show(slider)"  class="label label-danger">不顯示</label></td>
                                <td>
                                    <a @click="edit(slider)" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>編輯</a>
                                    <a @click="remove(slider)" class="btn btn-xs btn-danger"><i
                                            class="fa fa-pencil"></i>刪除</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/vue.resource/1.0.3/vue-resource.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/vue/dist/vue.js"></script>

    <script>
        $(function () {
            var vm = new Vue({
                el: '#list',
                data: {
                    sliders: [],
                    search_string: ''
                },
                created: function () {
                    this.fetch()
                },
                methods: {
                    fetch: function () {
                        var self = this;
                        var post_ary = { _method: 'post', _token: "{{ csrf_token() }}", search_string: this.search_string};
                        $.post('/api/sliders/', post_ary, function (sliders) {
                            self.sliders = sliders;
                        });
                    },
                    remove: function (slider) {
                        var post_ary = {_method: 'delete', _token: "{{ csrf_token() }}"};
                        $.post('/api/sliders/' + slider.id, post_ary, function () {
                            this.sliders.splice(this.sliders.indexOf(slider), 1);
                        }.bind(this));
                    },
                    edit: function (slider) {
                        window.location.href = '/admin/sliders/edit/' + slider.id;
                    },
                    show: function (slider) {
                        var post_ary = {_method: 'PUT', _token: "{{ csrf_token() }}", is_show: 1};
                        $.post('/api/sliders/' + slider.id, post_ary);
                        this.fetch();
                    },
                    notshow: function (slider) {
                        var post_ary = {_method: 'PUT', _token: "{{ csrf_token() }}", is_show: 0};
                        $.post('/api/sliders/' + slider.id, post_ary);
                        this.fetch();
                    }
                }
            });
        });

    </script>
@endsection