@extends('layouts.app')
@section('menu')
    @parent
@endsection
@section('content')
{!! Form::model($block, array('route'=>array('block.update', $block->id),'method'=>'PUT','files'=>true)) !!}
<div class='container'>
    <div>
        {!! Form::label('topicid', 'Select Topic', array('class'=>'label label-info')) !!}
    </div>
        <div>
        {!! Form::select('topicid', $topics, $block->topicid, array('class'=>'col-md-4')) !!}
    </div> 
</div></br> 
<div class='container'>
    <div>
         {!! Form::label('title', 'Edit title', array('class'=>'label label-info')) !!}
    </div>
    <div>
         {!! Form::text('title', $block->title, array('class'=>'col-md-4')) !!}
    </div> 
</div></br>
<div class='container'>
    {!! Form::label('content', 'Edit Content', array('class'=>'label label-info')) !!}
</div> 
<div class='container'>
    {!! Form::textarea('content', $block->content, array('class'=>'col-md-4')) !!}
</div></br> 
<div class='container'>
    {!! Form::label('imagesPath', 'Edit Image', array('class'=>'label label-info')) !!}
    {!! Form::file( 'imagesPath', '', array('class'=>'col-md-4')) !!}
</div></br> 
<div class='container'>
    {!! Form::submit('Save edit block', array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
@endsection


