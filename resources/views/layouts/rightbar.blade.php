<div class="col-12 col-md-2">
    <div class="rightSidebar">
    <ul class="rightSidebar_list">
        <li><a href="{{route('auxpage_2')}}">Shipping and Handling</a></li>
        <li><a href="{{route('auxpage_3')}}">About/Contact/Privacy</a></li>
        <li><a href="{{route('auxpage_4')}}">Metaphysical Characteristics of Crystals and Gemstones</a></li>
    </ul>
    <div class="rightSidebar_currency">
        <form action="#">
        <label for="currency">
            Currency:
            <select name="currency" id="currency">
            <option value="dollar">Dollar</option>
            </select>
        </label>
        </form>
    </div>
    <div class="rightSidebar_cart">
        <a href="{{route('cart.index')}}">My Shopping Cart</a>
        @if($cartTotal==0)
        <p>(Empty)</p>
        @else
        <p class="total_sidecart">$ {{$cartTotal}}</p>
        @endif
    </div>
    <div class="rightSidebar_language">
        <p>
        Google Translate here
        </p>
    </div>
    <div class="rightSidebar_blogNews">
        <p>Blog / News</p>
        <div class="rightSidebar_blogs">
        @foreach($recentBlogs as $recentBlog)
        <div class="rightSidebar_blogSingle">
            <small>{{date('m/d/Y h:m:i', strtotime($recentBlog->created_at))}}</small>
            <a href="{{route('blog',[$recentBlog])}}">
            {{$recentBlog->blog_title}}
            </a>
        </div>
        @endforeach
        <a href="{{route('blogs')}}">See all post...</a>
        <form method="POST" action="{{route('newsletter')}}" class="rightSidebar_form">
            @csrf
            <label for="#">
            Subscribe for email newsletter (blog):
            <input name="email" type="email" placeholder="Email" />
            </label>
            @if($errors->newsletter->any())
            @foreach ($errors->newsletter->all() as $error)
            <p class="">{{$error}}</p>
            @endforeach
            @endif
            <button type="submit">OK</button>
        </form>
        </div>
    </div>
    </div>
</div>