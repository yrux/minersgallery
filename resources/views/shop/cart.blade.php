<x-app-layout>
    <x-slot name="title">
        {{$title}}
    </x-slot>
    <div class="cart">
        <div class="cart_heading">
            <h1>Shopping Cart</h1>
            <div>
            <a href="{{route('category',['root'])}}">« back to shopping</a>
            <a href="{{route('cart.clear')}}">Clear my cart</a>
            </div>
        </div>
        <div class="cart_qtyCostHeading">
            <div>
                <p>Qty</p>
                <p>Cost</p>
            </div>
            </div>
            @php
            $total=0;
            @endphp
            <div class="cart_items">
                @foreach($cart as $car)
                    <div class="cart_itemsSingle">
                        <div class="row align-items-center">
                        <div class="col-7">
                            <div class="cart_itemsSingleLeft">
                            @if($car['product']->thumb)
                                <img src="{{asset('storage/'.$car['product']->thumb->url)}}" alt="Image">
                            @endif
                            <div>
                                <a href="{{route('product.detail',$car['product']->slug)}}">{{$car['product']->name}}</a>
                                <?php print $car['product']->description; ?>
                            </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="cart_itemsSingleRight">
                            <form method="POST" action="{{route('product.addcart',[$car['product']->slug])}}">
                                @csrf
                                <input type="hidden" value="cart" name="redirectTo" />
                                <input type="text" size="5" maxlength="10" name="qty" value="{{$car['qty']}}" class="textCenter">
                            </form>
                            <p>US ${{$car['row_price']}}</p>
                            <a href="{{route('cart.clear',$car['product']->slug)}}">
                                <img src="{{asset('images/remove.gif')}}" alt="deleteBtn">
                            </a>
                            </div>
                        </div>
                        </div>
                    </div>
                    @php
                    $total+=$car['subtotal'];
                    @endphp
                @endforeach
            </div>
            <div class="cart_discountCoupon">
            <h5>Discount Coupon (optional):&nbsp;</h5>
            <form method="POST" action="{{route('cart.coupon')}}">
                @csrf
                <input name="code" type="text" maxlength="10" size="12">&nbsp;
                <button>Apply</button>
            </form>
            </div>
            <div class="cart_total">
            @if($coupon>0)
            @php
            $discountAmount = (($total/100)*$coupon);
            $total = $total-$discountAmount;
            @endphp
            <h1>Discount</h1>
            <div>
                <div>
                    % {{$coupon}}
                </div>
            </div>
            @endif
            <h1>Total</h1>
            <div>
                <!-- <button>Recalculate</button> -->
                <div>US ${{$total}}</div>
            </div>
            </div>
            <div class="cart_checkout">
            <div>
                <button onclick="gotoCheckout()">Checkout</button>
                <p>—— or use ——</p>
                <input type="image" src="{{asset('images/btn_xpressCheckoutsm.webp')}}">
            </div>
        </div>
    </div>
@push('css')
<style>

</style>
@endpush
@push('js')
<script>
function gotoCheckout () {
    window.location.href='{{route('checkout.index')}}'
}
</script>
@endpush
</x-app-layout>