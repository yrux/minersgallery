<x-app-layout>
    <div class="brand_heading">
        <h1>Welcome to Miner's Gallery</h1>
        <p>
            Home of fine minerals, rock specimens, lapidary slabs, colored
            gems, crystals, minerals and metals from around the world.
        </p>
    </div>
    <div class="row categories">
        @foreach($categories as $category)
            <div class="col-12 col-md-6">
                <div class="categories_card">
                <a href="{{route('category',$category)}}">
                    @if($category->image)
                    <img
                    src="{{asset('storage/'.$category->image->url)}}"
                    alt="category image"
                    />
                    @endif
                </a>
                <div>
                    <span><a href="{{route('category',$category)}}">{{$category->name}}</a> <!--[4]--></span>
                    <div>
                    @if($category->childs)
                    @foreach($category->childs as $child)
                        <a href="{{route('category',$child)}}">{{$child->name}}</a>@if(!$loop->last) ,@endif
                    @endforeach
                    @endif
                    </div>
                </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row newestItems">
        <div class="col-12">
            <h1 class="newestItems_heading">Newest Items</h1>
            <div class="newestItems_cards">
                @each('components.productcard',$products,'product')
            </div>
        </div>
    </div>
</x-app-layout>
