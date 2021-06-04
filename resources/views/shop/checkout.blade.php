<x-app-layout>
    <x-slot name="title">
        {{$title}}
    </x-slot>
    <div class="checkout">
        <div class="checkout_heading">
            <h1>Checkout</h1>
            <div>
            <a href="{{route('cart.index')}}">« back to Cart</a>
            <!-- <a href="#">Clear my cart</a> -->
            </div>
        </div>
        @if($errors->orderbag->any())
            @foreach ($errors->orderbag->all() as $error)
                <p class="red-col">{{$error}}</p>
            @endforeach
        @endif
        <form method="POST" action="{{route('checkout.order')}}" class="checkout_form">
            @csrf
            <div class="row">
            <div class="col-lg-6">
                <h1>Shipping Information</h1>
                <div class="row">
                <div class="col-lg-6">
                    <label for="">
                    *First Name
                    <input type="text" name="first_name" value="{{old('first_name')}}" id="">
                    </label>
                </div>
                <div class="col-lg-6">
                    <label for="">
                    *Last Name
                    <input type="text" name="last_name" value="{{old('last_name')}}" id="">
                    </label>
                </div>
                <div class="col-lg-12">
                    <label for="">
                    Company (optional)
                    <input type="text" name="company" value="{{old('company')}}" id="">
                    </label>
                </div>
                <div class="col-lg-12">
                    <label for="">
                    *Address
                    <input type="text" name="address" value="{{old('address')}}" id="">
                    </label>
                </div>
                <div class="col-lg-6">
                    <label for="">
                    *City
                    <input type="text" name="city" value="{{old('city')}}" id="">
                    </label>
                </div>
                <div class="col-lg-6">
                    <label for="">
                    *Zip Code
                    <input type="text" name="zip" value="{{old('zip')}}" id="">
                    </label>
                </div>
                <div class="col-lg-12">
                    <label for="">
                    *Country
                    <input type="text" name="country" value="{{old('country')}}" id="">
                    </label>
                </div>
                <div class="col-lg-12">
                    <label for="">
                    *Phone
                    <input type="text" name="phone" value="{{old('phone')}}" id="">
                    </label>
                </div>
                <div class="col-lg-12">
                    <label for="">
                    *Email
                    <input type="text" name="email" value="{{old('email')}}" id="">
                    </label>
                </div>
                </div>
                <h1>Additional Information</h1>
                <div class="row">
                <div class="col-lg-12">
                    <label for="">
                    Order Notes (optional)
                    <textarea name="notes" id="" cols="30" rows="5">{{old('notes')}}</textarea>
                    </label>
                </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="cart_qtyCostHeading">
                <div>
                    <h1>Your Order</h1>
                </div>
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
                                <div>
                                    <a href="{{route('product.detail',$car['product']->slug)}}">{{$car['product']->name}}</a>
                                    <?php print $car['product']->description; ?>
                                </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="cart_itemsSingleRight">
                                <span>{{$car['qty']}}</span>
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
                <div class="cart_total removeFlex">
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
                <br/>
                @endif
                <h1>Total</h1>
                <div>
                    <div>US ${{$total}}</div>
                </div>
                </div>
                <div class="cart_checkout">
                <div>
                    <button type="submit">Place Order</button>
                </div>
                </div>
            </div>
            </div>
        </form>
    </div>
@push('css')
<style>
.removeFlex {
    display: block;
}
.red-col{
    color: red;
}
.removeFlex h1 {
    display: inline-block;
}

.removeFlex > div {
    display: inline-block;
    float: right;
}
.cart_total > div > div{
    margin: 0px;
}
</style>
@endpush
@push('js')
<script>

</script>
@endpush
</x-app-layout>