@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{__('thread.threads')}}</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <form action="{{isset($thread) ? route('thread.update', $thread->id) : route('thread.store')}}" method="post">
                                {{ csrf_field() }}
                                @isset($thread)
                                    {{ method_field('PUT') }}
                                @endisset
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <p class="row">
                                    <label>{{__('thread.title')}}:</label>
                                    <input type="text" class="form-control" name="title" value="{{old('title') ?? (isset($thread) ? $thread->title : '')}}">
                                </p>
                                <p class="row">
                                    <label>{{__('thread.content')}}:</label>
                                    <textarea class="form-control" name="content">{{old('content') ?? (isset($thread) ? $thread->content : '')}}</textarea>
                                </p>
                                <p class="row">
                                    <button type="submit" class="btn-default btn">{{__('app.button.save')}}</button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
