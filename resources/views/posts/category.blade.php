<x-app-layout>
<div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <h1 class="uppercase text-center text-3xl font-bold mt-4">
        categoria: {{$category->name}}
    </h1>
    @foreach ($posts as $post)
        <article class="ml-5 mb-5 bg-white shadow-lg rounded-3xl overflow-hidden p-5">
            <img class="w-full h-72 object-cover object-center" src="{{ Storage::url($post->image->url)}}" alt="">
            <div class="px-6 py-6">
                <h1 class="font-bold text-xl mb-2">
                    <a href="{{route('posts.show', $post)}}">{{$post->name}}</a>
                </h1>
            </div>
            <div>
                {{$post->extract}}
            </div>
            <div class="mt-4">
                @foreach ($post->tags as $tag)
                        <a class="bg-{{$tag->color}}-600 rounded-3xl p-1 text-white " href="">{{$tag->name}}</a>
                @endforeach
            </div>
        </article>
    @endforeach
    <div class="mt-4">
        {{$posts->links()}}
    </div>
</div>

</x-app-layout>