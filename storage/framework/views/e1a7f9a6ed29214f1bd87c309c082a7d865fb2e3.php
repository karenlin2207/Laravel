<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line"><?php echo e($type); ?></h4>
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
                                <th>內容</th>
                                <th>是否顯示</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tbody id="list" >
                            <tr v-for="article in articles" :data-id="article.id">
                                <td><img :src="article.img_uri" style="width:30px;"></td>
                                <td>{{article.title}}</td>
                                <td v-html="article.describe"></td>
                                <td v-if="article.is_show"><label @click="notshow(article)" class="label label-success">顯示</label></td>
                                <td v-else><label @click="show(article)"  class="label label-danger">不顯示</label></td>
                                <td>
                                    <a @click="edit(article)" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>編輯</a>
                                    <a @click="remove(article)" class="btn btn-xs btn-danger"><i class="fa fa-pencil"></i>刪除</a>
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
        $(function () {
            var type_enum = '<?php echo e($type_enum); ?>';
            console.log(type_enum);
            var vm = new Vue({
                el: '#list',
                data: {
                    articles: []
                },
                created: function () {
                    this.fetch()
                },
                methods: {
                    fetch: function () {
                        var self = this;
                        $.get('http://homestead.app/api/articles/' + type_enum, function (articles) {
                            self.articles = articles;
                        });
                    },
                    remove: function (article) {
                        var post_ary = {_method: 'delete', _token: "<?php echo e(csrf_token()); ?>"};
                        $.post('http://homestead.app/api/articles/' + article.id, post_ary, function () {
                            this.articles.splice(this.articles.indexOf(article), 1);
                        }.bind(this));
                    },
                    edit: function (article) {
                        window.location.href = '/admin/articles/edit/' + article.id;
                    },
                    show: function (article) {
                        var post_ary = {_method: 'PUT', _token: "<?php echo e(csrf_token()); ?>", is_show: 1};
                        $.post('http://homestead.app/api/articles/' + article.id, post_ary);
                        this.fetch();
                    },
                    notshow: function (article) {
                        var post_ary = {_method: 'PUT', _token: "<?php echo e(csrf_token()); ?>", is_show: 0};
                        $.post('http://homestead.app/api/articles/' + article.id, post_ary);
                        this.fetch();
                    }
                }
            });
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>