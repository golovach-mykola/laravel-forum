@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{__('thread.threads')}}</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <form>
                                <input type="hidden" name="page" value="{{$page}}">
                                <div class="col-md-6">
                                    <label>{{__('thread.sort_by')}}</label>
                                    <p>
                                        <select name="sort_by" class="form-control">
                                            <option value="created_at" {{$sort_by == 'created_at' ? 'selected=selected' : ''}}>{{__('thread.date')}}</option>
                                            <option value="title" {{$sort_by == 'title' ? 'selected=selected' : ''}}>{{__('thread.title')}}</option>
                                        </select>
                                    </p>
                                    <p>
                                        <select name="sort_type" class="form-control">
                                            <option value="asc" {{$sort_type == 'asc' ? 'selected=selected' : ''}}>{{__('thread.asc')}}</option>
                                            <option value="desc" {{$sort_type == 'desc' ? 'selected=selected' : ''}}>{{__('thread.desc')}}</option>
                                        </select>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <label>{{__('thread.filter_by')}}</label>
                                    <select name="filter_by[]" multiple="multiple" class="form-control">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}" {{in_array($user->id, $filter_by) ? 'selected=selected' : ''}}>{{$user->email}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn-default btn" type="submit">{{__('app.button.do')}}</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                            @foreach($threads as $thread)
                                <h2><a href="{{route('thread.show', $thread->id)}}">{{$thread->title}}</a></h2>
                                <div>{{str_limit($thread->content, 75)}}</div>
                            @endforeach
                        </div>
                        <div class="col-sm-12">{{$threads->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
