<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Comment;
use App\Model\Admin\Goods;
use App\Model\Cate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $allData = Comment::get();   //获取总共有多少条评论
        $data = Comment::get();
        $goods = Goods::get();
        $cate = (new Cate)->getCate();
        $cates = array_column($cate,'name','id');
        return view('admin.comment.list',compact('allData','data','cates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除一行
        $res = Comment::find($id)->delete();
        //如果删除成功
        if($res){
            $data = ['status'=>0, 'message'=>'删除成功'];
        }else{
            $data = ['status'=>1, 'message'=>'删除失败'];
        }

        return $data;
    }
}
