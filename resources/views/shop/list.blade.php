<x-app-layout>
    <x-slot name="title">
        {{$title}}
    </x-slot>
    @php
    $sortingQuery = [];
    if(!empty($_GET)){
        foreach($_GET as $getk=>$getv){
            if($getk!='sortBy'&&$getk!='type'){
                $sortingQuery[$getk]=$getv;
            }
        }
    }
    @endphp
    <div class="categorySingle">
        <div class="categorySingle_breadCrumb">
            @if($category->image)
            <img src="{{asset('storage/'.$category->image->url)}}" alt="">
            @endif
            <div>
            @foreach($breadcrumbs as $breadcrumb)
            <a href="{{$breadcrumb['url']}}">{{$breadcrumb['name']}}</a>@if(!$loop->last) »@endif
            @endforeach
            </div>
        </div>
        <div class="categorySingle_searchProduct">
            <div>
            <p>Search products within this category</p>
            <form action="{{route('category',$category->slug)}}">
                <label for="name">Name
                <input type="text" name="q" value="{{!empty($_GET['q'])?$_GET['q']:''}}" id="name" size="16">
                </label>
                <div>
                <p>Price</p>
                <div>
                    <label for="price_from">from <br>
                    <input type="text" name="price_from" value="{{!empty($_GET['price_from'])?$_GET['price_from']:''}}" id="price_from" size="7">
                    </label>
                    <label for="price_to">to <br>
                    <input type="text" name="price_to" value="{{!empty($_GET['price_to'])?$_GET['price_to']:''}}" id="price_to" size="7">
                    </label>
                </div>
                </div>
                <button type="submit">Find</button>
            </form>
            </div>
            <div>
            <p>
                Fossils, Petrified Wood Holbrook, Petrified Tule-Reed,
                Ammonite
            </p>
            <ul>
                @foreach($category->childs as $child)
                <li><a href="{{route('category',$child->slug)}}">{{$child->name}} </a> (4)</li>
                @endforeach
            </ul>
            </div>
        </div>
        <div class="categorySingle_sort textCenter">
            <p>
            Sort by: name (<a href="{{route('category',$category->slug)}}?sortBy=name&type=asc{{!empty($sortingQuery)?'&'.http_build_query($sortingQuery):''}}">ascending</a> |
            <a href="{{route('category',$category->slug)}}?sortBy=name&type=desc{{!empty($sortingQuery)?'&'.http_build_query($sortingQuery):''}}">descending</a>), price (<a href="{{route('category',$category->slug)}}?sortBy=price&type=asc{{!empty($sortingQuery)?'&'.http_build_query($sortingQuery):''}}">ascending</a> |
            <a href="{{route('category',$category->slug)}}?sortBy=price&type=desc{{!empty($sortingQuery)?'&'.http_build_query($sortingQuery):''}}">descending</a>), customer rating (<a href="#">ascending</a>
            | <a href="#">descending</a>)
            </p>
            <div class="paginationlinks">
            {{$products->links()}}
            </div>
        </div>
        <div class="categorySingle_products">
            @foreach($products as $product)
                <div class="categorySingle_product">
                    @if($product->thumb)
                    <img src="{{asset('storage/'.$product->thumb->url)}}" alt="">
                    @endif
                    <a href="{{route('product.detail',[$product->slug])}}">{{$product->name}}</a>
                    <?php print $product->description; ?>
                    <p class="categorySingle_productPrice">US ${{$product->price}}</p>
                    <form method="POST" action="{{route('product.addcart',$product->slug)}}">
                        @csrf
                        <input type="hidden" name="qty" value="1" />
                        <input type="hidden" value="cart" name="redirectTo" />
                        <input type="image" src="{{asset('images/add-to-cart.gif')}}" alt="add to cart">
                    </form>
                </div>
            @endforeach
        </div>
        <div class="textCenter">
            <div class="paginationlinks">
                {{$products->links()}}
            </div>
        </div>
        </div>
@push('css')
<style>
.paginationlinks svg {
    height: 25px;
}
</style>
@endpush
</x-app-layout>