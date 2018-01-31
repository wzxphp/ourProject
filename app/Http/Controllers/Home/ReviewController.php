<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Order;
use App\Model\Home\Good;
use App\Model\Home\Comm;

class ReviewController extends Controller
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
        $review = $request -> except('_token');
// dd($review);
//        $res = Comm::create($review);
        $res = Comm::insert($review);
        if($res)
        {
            $orders = Order::where('cargo_message_id',$review['goods_id'])->get();

            $ord = [];
            foreach($orders as $k=>$v)
            {
                $ord['status'] = 4;
            }
            Order::where('cargo_message_id',$review['goods_id'])->update($ord);

            return redirect('home/center/order')->with(['info'=>'评论成功']);
            
        }else{
            return redirect('home/center/order')->with(['info'=>'评论失败']);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $redata = Order::where('id',$id)->get();

        return view('Home.order.reviews',compact('redata'));
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
        // 
    }
}
