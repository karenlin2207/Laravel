@extends('layouts.app')
@include('vendor.ueditor.assets')
@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">編輯車款</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                 <div class="Compose-Message">               
            <div class="panel panel-success">
                <div class="panel-heading">
                    編輯車款
                </div>
                <form method="POST" action="/admin/products/{{$product->id}}" enctype="multipart/form-data"> 
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                <div class="panel-body">
                    <label>名稱 : </label>
                    <input type="text" class="form-control" name="name" value="{{$product->name}}" />
                    <label>市價 : </label>
                    <input type="text" class="form-control" name="market_price" value="{{$product->market_price}}" />
                    <label>售價 : </label>
                    <input type="text" class="form-control" name="sale_price" value="{{$product->sale_price}}" />
                    <label>商品tags : </label>
                    <input type="text" class="form-control" name="tags"
                    value="@foreach($product->tags as $tag)@if($tag){{$tag->name}},@endif @endforeach" />
                    <label>商品圖片 :  <img src="{{$product->img_uri}}" style="width: 30px;"></label>
                    <input type="file" class="form-control" id="user_icon_file" name="user_icon_file" placeholder="上傳圖片">
                    <label>商品介紹 : </label>
                        <script id="container" name="describe" type="text/plain">
                        {!!$product->describe!!}
                        </script>

                        <!-- 实例化编辑器 -->
                        <script type="text/javascript">
                            var ue = UE.getEditor('container');
                                ue.ready(function() {
                                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
                            });
                        </script>
                    <label><input type="checkbox" name="is_show" value='1' checked>是否顯示</label>
                    <hr />
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
                </form>
                <div class="panel-footer text-muted">
                    
                </div>
            </div>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection