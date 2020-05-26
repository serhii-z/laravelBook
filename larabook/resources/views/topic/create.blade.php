@extends('layouts.app')
@section('title', 'Page Title')
@section('menu')
    @parent
@endsection
@section('content')
<div class="container">
    <div class="label label–info" style="display:inline–block; width:100%;">{{$page}}</div>
    @if(count(session('errors')) > 0)
    <div class="alert alert–danger" style="color: red;">
        @foreach(session('errors')->all() as $er)
            {{$er}}<br/>
        @endforeach
    </div>
    @endif
    @if(session('message'))
        <div class="alert alert–success" style="color: green;">
            {{session('message')}}
        </div>
    @endif    
        {!! Form::model($topic, array('action'=>'TopicController@store')) !!}
        <div class='form–group'>
        {!! Form::label('topicname','Topicname', array('class'=>'label label-info'))!!}
        {!! Form::text('topicname', '', array('class'=>'text text-info'))!!}
        </div></br> 
        <div>
            <button class="btn btn-success" type="submit">Add Topic</button>
        </div> 
        {!! Form::close() !!}
</div>

@endsection

