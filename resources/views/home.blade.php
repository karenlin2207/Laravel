@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Dashboard</h4>
            </div>
        </div>
        <div class="row">
             <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bk-clr-one">
                    <a href="{{ url('/admin/products') }}">
                    <i  class="fa fa-car dashboard-div-icon" ></i>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                    <h5>所有車款</h5>
                    </a>
                </div>
            </div>
             <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bk-clr-two">
                    <a href="{{ url('/admin/articles/news') }}">
                    <i  class="fa fa-edit dashboard-div-icon" ></i>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                    <h5>最新消息</h5>
                    </a>
                </div>
            </div>
             <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bk-clr-three">
                <a href="{{ url('/admin/articles/promotions') }}">
                    <i  class="fa fa-thumbs-up dashboard-div-icon" ></i>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>         
                    </div>  
                    <h5>口碑分享</h5>
                </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dashboard-div-wrapper bk-clr-four">
                <a href="{{ url('/admin/sliders') }}">
                    <i class="fa fa-bell-o dashboard-div-icon"></i>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                       
                    </div>
                    <h5>管理首頁圖片</h5>
                </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')

@endsection