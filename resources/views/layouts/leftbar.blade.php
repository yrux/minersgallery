<div class="col-12 col-md-2">
    <div class="leftSidebar">
    <a href="index.html" class="leftSidebar_logo">
        <img src="{{asset('images/brand_logo.jpg')}}" alt="" />
    </a>
    <div>
        <div class="leftSidebar_catalogHeading">Catalog</div>
        <ul class="leftSidebar_list">
        @foreach($leftCatalogue as $leftCatalogu)
        <li>
            <a href="{{route('category',$leftCatalogu)}}"
            >{{$leftCatalogu->name}}</a
            >
        </li>
        @endforeach
        </ul>
        <div class="leftSidebar_search">
        <div class="leftSidebar_searchHeading">Search</div>
        <form action="{{route('category',['root'])}}">
            <input name="q" type="text" placeholder="Search Products" />
            <button>Find</button>
        </form>
        </div>
    </div>
    </div>
</div>