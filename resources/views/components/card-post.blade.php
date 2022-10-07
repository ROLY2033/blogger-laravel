@props(['post'])

<article class="ml-5 mb-5 bg-white shadow-lg rounded-3xl overflow-hidden p-5">
    @if ($post->image)
        <img class="w-full h-72 object-cover object-center" src="{{ Storage::url($post->image->url)}}" alt="">
    @else
        <img src="https://developers.google.com/site-assets/images/home/developers-social-media.png" alt="">
    @endif
    <div class="px-6 py-6">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{route('posts.show', $post)}}">{{$post->name}}</a>
        </h1>
    </div>
    <div>
        {!! $post->extract !!}
    </div>
    <div class="mt-4">
        @foreach ($post->tags as $tag)
                <a class="bg-green-600 rounded-3xl p-1 text-white " href="{{route('posts.tag', $tag)}}">{{$tag->name}}</a>
        @endforeach
    </div>
</article>