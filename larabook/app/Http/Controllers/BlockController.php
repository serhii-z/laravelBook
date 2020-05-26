<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Block;
use Illuminate\Support\Facades\Auth;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check())
        {
            return redirect('login');
        }
        $block=new Block;
        $topics=Topic::pluck('topicname','id');
        return view('block.create', ['block'=>$block,'topics'=>$topics,'page'=>'AddBlock']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $block=new Block;
        $fname=$request->file('imagepath');
        if($fname != null)
        {
            $originalname=$request->file('imagepath')->getClientOriginalName();
            $request->file('imagepath')->move(public_path().'/images',$originalname);
            $block->imagesPath='/images/'.$originalname;
        }
        else
        {
            $block->imagesPath='';
        }
        $block->title=$request->title;
        $block->topicid=$request->topicid;
        $block->content=$request->content;
        if(!$block->save())
        {
            $err=$block->getErrors();
            return redirect()->action('BlockController@create')->
                with('errors',$err)->withInput();
        }
        return redirect()->action('BlockController@create')->
            with('message','New block '.$block->id.' has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $block=Block::find($id);
        $topics=Topic::pluck('topicname','id');
        return view('block.edit')->with('block',$block)->with('topics',$topics)->with('page','Main Page');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $block=Block::find($id);
        $block->title=$request->title;
        $block->content=$request->content;
        $block->topicid=$request->topicid;
        //upload new image from edit form
        $fname=$request->file('imagepath');
        if($fname != null)
        {
            $originalname=$request->file('imagepath')->getClientOriginalName();
            $request->file('imagepath')->
                move(public_path().'/images',$originalname);
            $block->imagesPath='/images/'.$originalname;
        }
        $block->save();
        return redirect('topic/'.$block->topicid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $block=Block::find($id);
        $block->delete();
        return redirect('topic');
    }
}
