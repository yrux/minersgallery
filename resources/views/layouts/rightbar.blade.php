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
        <a href="#">My Shopping Cart</a>
        <p>(Empty)</p>
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
            <a href="">
            {{$recentBlog->blog_title}}
            </a>
        </div>
        @endforeach
        <a href="">See all post...</a>
        <form action="#" class="rightSidebar_form">
            <label for="#">
            Subscribe for email newsletter (blog):
            <input type="email" placeholder="Email" />
            </label>
            <button type="submit">OK</button>
        </form>
        </div>
    </div>
    </div>
</div>