@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{__('thread.threads')}}</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <h2>{{$thread->title}}</h2>
                            <div>{{$thread->content}}</div>
                        </div>
                        <div class="col-md-12">
                            <form method="post" action="{{route('add_thread_comment', $thread->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <label>{{__('thread.reply')}}</label>
                                <textarea name="content" class="form-control">{{old('content')}}</textarea>
                                <button class="btn btn-default" type="submit">{{__('app.button.save')}}</button>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <ul>
                                @foreach($thread->comments as $comment)
                                    <li>{{$comment->content}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
