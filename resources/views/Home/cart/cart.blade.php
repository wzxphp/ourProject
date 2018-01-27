@extends('Home.layout')

@section('content')
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>购物车</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">搜索主题商品</h2>
                        <form action="{{ url('home/seatch') }}" method="POST">
                        {{ csrf_field() }}
                            <input type="text" name="keywords" placeholder="全部商品">
                            <input type="submit" value="搜索">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>                             
                        </div>
                    </div>

            </div>
            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">
                    @if(session('info'))
                      <div class="alert alert-info">
                        {{ session('info') }}
                      </div>
                    @endif
                    
                        <form method="post" action="{{ url('home/reorder') }}">
                        {{ csrf_field() }}

                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-remove">移除商品</th>
                                        <th class="product-thumbnail">商品图片</th>
                                        <th class="product-name">宝贝名称</th>
                                        <th class="product-price">单价</th>
                                        <th class="product-quantity">数量</th>
                                        <th class="product-subtotal">总价</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($findcart as $k=>$v)
                                    <tr class="cart_item">
                                        <td class="product-remove">
                                            <a title="Remove this item" id="remove" onclick="return confirm('确认删除？');" class="remove" href="{{ url('home/cart/del') }}/{{ $v->id }}">×</a>
                                        </td>

                                        <td class="product-thumbnail">
                                            <a href="{{ url('home/details') }}/{{ $v->goods_id }}"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="{{ $v->goods_original }}"></a>
                                        </td>

                                        <td class="product-name">
                                            <a href="{{ url('home/details') }}/{{ $v->goods_id }}">{{ $v->goods_name }}</a>
                                            <input type="hidden" name="goods_name" value="{{ $v->goods_name }}">
                                        </td>

                                        <td class="product-price">
                                            <span id="price">{{ $v->goods_price }} 元</span>
                                            <input type="hidden" name="goods_price" value="{{ $v->goods_price }}">
                                        </td>

                                        <td class="product-quantity">
                                            <div class="quantity buttons_added">
                                                <input type="button" onclick="change(-1)" class="minus" value="-">
                                                
                                                <input type="" id="num" name="shopping_number" size="4" class="input-text qty text " title="Qty" value="{{$v->shopping_number}}" min="0" step="1">

                                                <input type="button" onclick="change(1)" class="plus" value="+">
                                            </div>
                                        </td>

                                        <td class="product-subtotal">
                                            <span id="amount">{{ $v->goods_price * $v->shopping_number }} </span>元
                                            <input id="total" type="hidden" name="goods_total" value="{{ $v->goods_price * $v->shopping_number }}">
                                            <input type="hidden" name="id" value="{{ $v->id }}">
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td class="actions" colspan="5"></td>
                                        <td colspan="1">
                                            <input type="submit" value="去结算" class="checkout-button button alt wc-forward">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    
                        <div class="cart-collaterals">
                            <div class="cross-sells">
                                <h2>你可能还喜欢...</h2>
                                <ul class="products">
                                    <li class="product">
                                        <a href="single-product.html">
                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="img/product-2.jpg">
                                            <h3>Ship Your Idea</h3>
                                            <span class="price"><span class="amount">£20.00</span></span>
                                        </a>

                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>
                                    </li>

                                    <li class="product">
                                        <a href="single-product.html">
                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="img/product-4.jpg">
                                            <h3>Ship Your Idea</h3>
                                            <span class="price"><span class="amount">£20.00</span></span>
                                        </a>

                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>                        
                </div>                    
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

function change(n)
{
    var num = $('#num').val();
    var price = $('#price').html();
    var total = $('#total').val();
    var amount = $('#amount').html();

    num = parseInt(num) + parseInt(n);

    if(num <= 0)
    {
        num = 1;
    }
    amount = parseInt(num) * parseInt(price);
    total = parseInt(num) * parseInt(price);
    $("#amount").html(amount);
    $("#price").html(price);
    $("#num").val(num);
    $("#total").val(total);
    

}
</script>
@stop