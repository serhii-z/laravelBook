@extends('layouts.app')
@section('menu')
    @parent
@endsection
@section('content')
    <div class="container">      
        <div class="col-lg-3">
            {!! Form::open(array('action'=>'TopicController@search', 'class'=>'form')) !!}
            <div class="input-group">
                {!! Form::text('searchform', '', array('class'=>'form–control', 'placeholder'=>'Enter topic')) !!}
            </div>
            <div class="input-group-btn">
                <button class="btn btn-success" type="submit">Search</button>
            </div></br> 
            {!! Form::close() !!}
            <ul class="nav nav-pills">
            @foreach($topics as $t)
                <li>
                    <a href="{{url('topic/'.$t->id)}}">{{$t->topicname}}</a>
                </li>
            @endforeach
            </ul>
        </div>   
        <div class="col-lg–7">
        @if($id != 0)
            @foreach($blocks as $b)   
                <h2>{{$b->title}}</h2>
                @if($b->imagesPath != "")
                <a href="{{url($b->imagesPath)}}" style="float:left;
                    margin–right:20px;" target="_blank" class="wrap–image">
                    <img src="{{asset($b->imagesPath)}}" height="250px" alt=""/></a>
                @endif     
                <p class="text-2xl">{{$b->content}}</p>     
                {!! Form::open(array('route'=>array('block.destroy',$b->id))) !!}      
                {{ Form::hidden('_method','DELETE')}}
                <button class="btn btn-danger" style="float:right; mergin-right: 5px;"
                        type="submit">&#x2717;</button>
                </button>
                {!! Form::close() !!}       
                {!! Form::model($b,array('route'=>array('block.update',$b->id))) !!}           
                {{ Form::hidden('_method','PUT')}}
                <a class="btn btn-info" style="float:right;"
                    href="{{url('block/'.$b->id.'/edit')}}">&#10003;</a>
                {!! Form::close() !!}  
            @endforeach
        @endif
        </div>
    </div>
@endsection






