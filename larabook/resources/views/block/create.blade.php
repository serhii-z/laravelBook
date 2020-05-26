@extends('layouts.app')
@section('menu')
    @parent
@endsection
@section('content')
    <div class="label lable–info">{{$page}}</div>
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
    {!! Form::model($block, array('action'=>'BlockController@store', 'files'=>true,'class'=>'form')) !!}
<div class='container'>
    {!! Form::label('topicid', 'Select Topic', array('class'=>'label label-info'))!!}
    {!! Form::select('topicid', $topics, '',array('class'=>'col–md–6'))!!}
    <a href="{{url('topic/create')}}" class="btn btn–sm btn–info col–md–3"
        type="submit">Add new Topic</a>
</div></br> 
<div class='container'>
    <div>
        {!! Form::label('title', 'Block Title', array('class'=>'label label-info'))!!}
    </div>
    <div>
        {!! Form::text('title', '', array('class'=>'col-md-4'))!!}
    </div>
</div></br></br>
<div class='container'>
    <div>
        {!! Form::label('content', 'Add Content', array('class'=>'label label-info'))!!}
    </div>
    <div>
        {!! Form::textarea('content', '', array('class'=>'col-md-4','cols'=>'','rows'=>''))!!}
    </div>


</div></br></br></br> 
<div class='container'>
    {!! Form::label('imagepath', 'Add Image', array('class'=>'label label-info'))!!}  
    {!! Form::file('imagepath', '', array('class'=>'col-md-4'))!!}
</div></br>
<div class='container'>
    <button class="btn btn-success" type="submit">Add Block</button>
</div>

    {!! Form::close() !!}
@endsection

