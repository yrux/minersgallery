<x-app-layout>
    <x-slot name="title">
        {{$title}}
    </x-slot>
    <div class="productSingle">
        <div class="productSingle_breadCrumb">
            <div>
            @foreach($breadcrumbs as $breadcrumb)
                <a href="{{$breadcrumb['url']}}">{{$breadcrumb['name']}}</a>@if(!$loop->last) »@endif
            @endforeach
            </div>
        </div>
        <div class="productSingle_images">
            <h1>{{$product->name}}</h1>
            @if($product->image)
            <img src="{{asset('storage/'.$product->image->url)}}" alt="">
            @endif
            <?php print $product->brief_description; ?>
        </div>
        <div class="productSingle_detail">
            <p class="productSingle_productPrice">US ${{$product->price}}</p>
            <p>In Stock: {{$product->in_stock}}</p>
            <p>Handling charge: US ${{$product->shipping_freight}}</p>
            <p>Weight: {{$product->weight}} lbs</p>
        </div>
        <form method="POST" action="{{route('product.addcart',$product->slug)}}">
        @csrf
        <div class="productSingle_quantity">
            <label> Qty: <input type="text" name="qty" value="1" id="" size="5"> </label>
            <input name="addToCart" type="image" src="{{asset('images/add-to-cart.gif')}}" alt="add to cart" class="productSingle_addToCart">
        </div>
        </form>
        <form method="POST" action="{{route('product.saveInquiry',[$product->slug])}}">
            @csrf
            @if($errors->productinquiry->any())
            @foreach ($errors->productinquiry->all() as $error)
            <p class="red-col">{{$error}}</p>
            @endforeach
            @endif
            <div class="productSingle_query">
                <h4>Any Questions?</h4>
                <p>Please use the following form to request information.</p>
                <label>Your Name: <br>
                <input type="text" name="name" value="{{old('name')}}" id="" size="40">
                </label>
                <br>
                <label>Email: <br>
                <input type="email" name="email" value="{{old('email')}}" id="" size="40">
                </label>
                <br>
                <p>
                Please specify your question about Angel Wing Agate Specimen A:
                <br>
                <textarea name="message" id="" value="{{old('message')}}" cols="50" rows="10"></textarea>
                </p>
                <div>
                    <div class="g-recaptcha" data-sitekey="6Lce2uEaAAAAAM-xvFW_LKVbOat1OMScCHXeKmvD"></div>
                </div>
                <br>
                <input type="submit" value="OK">
            </div>
        </form>
    </div>
@push('css')
<style>
.red-col{
    color: red;
}
</style>
@endpush
@push('js')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush
</x-app-layout>