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
                <form method="POST" action="/admin/sliders/{{$slider->id}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                <div class="panel-body">
                    <label>名稱 : </label>
                    <input type="text" class="form-control" name="name" value="{{$slider->name}}" />
                    <label>圖片 :  <img src="{{$slider->img_uri}}" style="width: 30px;"></label>
                    <input type="file" class="form-control" id="user_icon_file" name="user_icon_file" placeholder="上傳圖片">
                    <label>超連結網址 :  </label>
                    <input type="text" class="form-control" name="link" value="{{$slider->link}}"/>
                    <label>超連結文字描述 : </label>
                    <textarea class="form-control" name="describe">{{$slider->describe}}</textarea>
                    <label><input type="checkbox" name="is_show" value='1' @if($slider->is_show==1) checked @endif>是否顯示</label>
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