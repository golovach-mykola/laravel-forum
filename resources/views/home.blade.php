@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{__('app.dashboard')}}</div>

                <div class="panel-body">
                    <a href="{{route('show_profile')}}">{{__('app.my_profile')}}</a>
                    <a href="{{route('thread.index')}}">{{__('app.my_threads')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
