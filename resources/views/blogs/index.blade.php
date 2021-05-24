<x-app-layout>
    <x-slot name="title">
        {{$title}}
    </x-slot>
    <div class="blogMain">
        <h1>
            Blog / News
            <a href="#"><img src="{{asset('images/rss-feed.png')}}" alt="" /></a>
        </h1>
        @foreach($blogs as $blog)
        <div class="blogMain_blog">
            <a href="{{route('blog',[$blog])}}"
            >{{$blog->blog_title}}</a
            >
            <p>{{date('m/d/Y h:m:i', strtotime($blog->created_at))}}</p>
            <?php print $blog->blog_shortdescription; ?>
        </div>
        @endforeach
        <div class="blog_pagination">
            {{$blogs->links()}}
        </div>
    </div>
</x-app-layout>
