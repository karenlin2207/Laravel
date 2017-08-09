<?php $__env->startSection('content'); ?>
<div class="content-wrapper" id="list">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">所有車款
                <input type="text" v-model:name.trim="search_string" v-on:keyup="fetch">
                <a class="btn btn-xs btn-primary" href="/admin/products/create">新增</a></h4>
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
                                <th>市價</th>
                                <th>售價</th>
                                <th>內容</th>
                                <th>是否顯示</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="product in products" :data-id="product.id">
                                <td><img :src="product.img_uri" style="width:30px;"></td>
                                <td>{{product.name}}</td>
                                <td>{{product.market_price}}</td>
                                <td>{{product.sale_price}}</td>
                                <td>{{product.short_describe}}</td>
                                <td v-if="product.is_show"><label @click="notshow(product)" class="label label-success">顯示</label></td>
                                <td v-else><label @click="show(product)"  class="label label-danger">不顯示</label></td>
                                <td>
                                    <a @click="edit(product)" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>編輯</a> 
                                    <a @click="remove(product)" class="btn btn-xs btn-danger"><i class="fa fa-pencil"></i>刪除</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/vue.resource/1.0.3/vue-resource.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/vue/dist/vue.js"></script>

        <script>
            $(function(){
                var vm = new Vue({
                    el : '#list',
                    data:{
                        products: [],
                        search_string: ''
                    },
                    created: function () {
                        this.fetch()
                    },
                    methods:{
                        fetch:function(){
                            var self = this;
                            var post_ary = { _method:'post', _token: "<?php echo e(csrf_token()); ?>", search_string: this.search_string};
                            $.post('/api/products/', post_ary, function(products){
                                self.products = products;
                            });
                        },
                        remove:function(product){
                            var post_ary = { _method:'delete', _token: "<?php echo e(csrf_token()); ?>"};
                            $.post('/api/products/'+product.id, post_ary, function(){
                                this.products.splice(this.products.indexOf(product),1);
                            }.bind(this));
                        },
                        edit:function(product){
                            window.location.href = '/admin/products/edit/' + product.id;
                        },
                        show:function(product){
                            var post_ary = { _method:'PUT', _token: "<?php echo e(csrf_token()); ?>", is_show:1};
                            $.post('/api/products/'+product.id, post_ary);
                            this.fetch();
                        },
                        notshow:function(product){
                            var post_ary = { _method:'PUT', _token: "<?php echo e(csrf_token()); ?>", is_show:0};
                            $.post('/api/products/'+product.id, post_ary);
                            this.fetch();
                        }
                    }
                });
            });

        </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>