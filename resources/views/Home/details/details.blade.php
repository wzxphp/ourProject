@extends('Home.layout')

@section('content')
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>商品详情</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">       
            <div class="col-md-12">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="">Home</a>
                        <a href="">Category Name</a>
                        <a href="">Sony Smart TV - 2015</a>
                    </div>
                    
                    
                    <div class="row">
                    @foreach($data as $k=>$v)
                        <div class="col-sm-6">
                            <div id="product-images" class="product-images">
                                <div id="product-main-img" class="product-main-img">
                                    <img id="smallImg" src="{{ $data[$k]->goods_original }}" alt="">
                                    <!-- <div id="move"></div> -->
                                </div>

<!--                                 <div id="big">
                                    <img id="bigImg" style="display:none;" src="{{ $data[$k]->goods_original }}">
                                </div> -->
                                
                                <div id="product-gallery" class="product-gallery">
                                    <img src="{{ $data[$k]->goods_original }}" alt="">
                                    <img src="{{ $data[$k]->goods_original }}" alt="">
                                    <img src="{{ $data[$k]->goods_original }}" alt="">
                                    <img src="{{ $data[$k]->goods_original }}" alt="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="product-inner">
                                <h2 class="product-name">{{$data[$k]->goods_name}}</h2>
                                <div class="product-inner-price">
                                    <ins>{{ $data[$k]->goods_price }}</ins> <del>$800.00</del>
                                </div>    
                                
                                <form action="{{ url('/home/cart') }}/{{ $data[$k]->goods_id }}" class="cart" method="POST">
                                {{ csrf_field() }}
                                    <div class="quantity">
                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="shopping_number" min="1" step="1">
                                    </div>
                                    @if($data[$k]->goods_status == 1)
                                        <button class="add_to_cart_button" type="submit">加入购物车</button>
                                        <a href="{{ url('/home/coll') }}/{{ $data[$k]->goods_id }}">收藏</a>
                                    @elseif($data[$k]->goods_status == 2)
                                        <button class="add_to_cart_button" disabled type="submit">商品已下架</button>
                                    @endif
                                </form>   
                                
                                <div class="product-inner-category">
                                    <p>Category: <a href="">Summer</a>. Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                                </div> 
                                
                                <div role="tabpanel">
                                    <ul class="product-tab" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">更多详情</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">评论</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            <h2>商品详情</h2>  
                                            <p>{{ $v->goods_info }}</p>
                                        </div>
                                        @endforeach
                                        <div role="tabpanel" class="tab-pane fade" id="profile">
                                            <h2>评论</h2>
                                            @if(empty($review))
                                                <span>评论空空如也！！</span>
                                            @else
                                            @foreach($review as $m=>$n)
                                            <div class="submit-review">
                                                <p>
                                                    @if($n['comment_type'] == 0)
                                                        <span style="color:red;">匿名评价</span>
                                                    @elseif($n['comment_type'] == 1)
                                                        @foreach($revuser as $i=>$j)
                                                        <span style="red">{{ $j->name }}</span>
                                                        @endforeach
                                                    @endif
                                                    @if($n['star'] == 1)
                                                        <span>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </span>
                                                    @elseif($n['star'] == 2)
                                                        <span>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </span>
                                                    @elseif($n['star'] == 3)
                                                        <span>差评！！！</span>
                                                    @endif
                                                </p>
                                                <p>
                                                <span>{{ $n['comment_info'] }}</span>
                                                </p>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    
                    </div>
                </div>                    
            </div>
        </div>
    </div>
</div>

@stop