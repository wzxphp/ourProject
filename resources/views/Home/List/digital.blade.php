@extends('Home.layout')

@section('content')

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>数码</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
        @foreach($digital as $k=>$v)
            <div class="col-md-3 col-sm-6">
                <div class="single-shop-product">
                    <div class="product-upper">
                        <a href="{{ url('/home/details') }}/{{$digital[$k]->goods_id}}"><img src="{{ $digital[$k]->goods_original }}" alt=""></a>
                    </div>
                    <h2><a href="{{ url('/home/details') }}/{{$digital[$k]->goods_id}}">{{ $digital[$k]->goods_name }}</a></h2>
                    <div class="product-carousel-price">
                        <ins>{{ $digital[$k]->goods_price }}</ins> <del>$999.00</del>
                    </div>  
                    
                    <div class="product-option-shop">
                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ url('/home/details') }}/{{$digital[$k]->goods_id}}">查看详情</a>
                    </div>                       
                </div>
            </div>
        @endforeach
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="product-pagination text-center">
                    <nav>
                        {!! $digital->render() !!}
                    </nav>                        
                </div>
            </div>
        </div>
    </div>
</div>

@stop