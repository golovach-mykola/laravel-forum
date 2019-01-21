@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{__('thread.threads')}}</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <a href="{{route('thread.create')}}" class="btn btn-default pull-right">{{__('app.button.new')}}</a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>{{__('thread.title')}}</td>
                                        <td style="width: 150px">{{__('app.actions')}}</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($threads as $thread)
                                    <tr>
                                        <td>{{$thread->title}}</td>
                                        <td>
                                            <form action="{{route('thread.destroy', $thread->id)}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button onclick="return confirm('{{__('app.question.are_you_sure')}}')" class="btn btn-default pull-right" type="submit">{{__('app.button.delete')}}</button>
                                            </form>
                                            <a class="btn btn-default pull-right" href="{{route('thread.edit', $thread->id)}}">{{__('app.button.edit')}}</a>
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
    </div>
@endsection
