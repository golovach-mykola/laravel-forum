@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{__('user.profile')}}</div>

                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="row">{{__('user.email')}}: {{Auth::user()->email}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
