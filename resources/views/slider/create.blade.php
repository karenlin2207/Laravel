@extends('layouts.app')
@include('vendor.ueditor.assets')
@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">新增首頁導覽圖</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                 <div class="Compose-Message">               
            <div class="panel panel-success">
                <div class="panel-heading">
                    新增
                </div>
                <form method="POST" action="/admin/sliders/" enctype="multipart/form-data"> 
                     {{ csrf_field() }}
                <div class="panel-body">
                    <label>名稱 : </label>
                    <input type="text" class="form-control" name="name"/>
                    <label>圖片 :  </label>
                    <input type="file" class="form-control" id="user_icon_file" name="user_icon_file" placeholder="上傳圖片">
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