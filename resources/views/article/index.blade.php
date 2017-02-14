@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">{{$type}}</h4>
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
                        @foreach($articles as $article)
                            <tr id="list">
                                <td><img src="/uploads/{{ $article->img_uri }}" style="width:30px;"></td>
                                <td>{{$article->title}}</td>
                                <td>{!!$article->describe!!}</td>
                                <td><label class="label label-success">顯示</label></td>
                                <td>
                                    <form action="{{$article->id}}" method="POST">
                                    <a href="edit/{{$article->id}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>編輯</a>
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}    
                                    <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-pencil"></i>刪除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
@endsection