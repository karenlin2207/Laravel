@if(session()->has('message'))
    <div class="container index-top">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('message') }}
                </div>
            </div>
        </div>
    </div>
@endif

@if(session()->has('warning'))
    <div class="container index-top">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul class="list-unstyled">
                        @foreach (session('warning') as $message)
                            <li>{!! $message !!}</li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
@endif

@if(session()->has('error'))
    <div class="container index-top">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('error')}}
                </div>
            </div>
        </div>
    </div>
@endif

@if($errors->any())
    <div class="container index-top">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $message)
                            <li>{!! $message !!}</li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
@endif