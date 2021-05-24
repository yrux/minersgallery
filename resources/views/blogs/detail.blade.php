<x-app-layout>
    <x-slot name="title">
        {{$title}}
    </x-slot>
    <div class="singleBlog">
    <h1>
        Blog / News
        <a href="{{route('blogs')}}"><img src="{{asset('images/rss-feed.png')}}" alt="" /></a>
        </h1>
        <h2 class="singleBlog_title">
            {{$blog->blog_title}}
        </h2>
        <p class="singleBlog_date">{{date('m/d/Y h:m:i', strtotime($blog->created_at))}}</p>
        <?php print $blog->blog_description; ?>
        <a href="{{route('blogs')}}">See all posts...</a>
    </div>
</x-app-layout>
