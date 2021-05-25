<div class="newestItems_card">
    <a href="#">
    @if($product->thumb)
    <img
        src="{{asset('storage/'.$product->thumb->url)}}"
        alt="Newest Item Image"
    />
    @else
    <img
        src=""
        alt="Newest Item Image"
    />
    @endif
    </a>
    <a href="#">{{$product->name}}</a>
    <p>US ${{$product->price}}</p>
</div>