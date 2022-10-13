<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 text-center pb-8">
       <h3>lista de publicaciones</h3>

    @auth
        
    <div class="grid grid-cols-1 md:grid-cols-3 gap-1">

        @foreach ($posts as $post)
        {{-- <article class="w-full h-80 bg-cover bg-center @if ($loop->first) --}}
            <article class="w-full h-96 bg-cover bg-center @if ($loop->first)
                col-span-2
            @endif" style="background-image: url(@if($post->image){{ Storage::url($post->image->url) }} @else https://developers.google.com/site-assets/images/home/developers-social-media.png @endif)">
              <div class="h-full w-full px-8 flex flex-col justify-center">
                <div>
                        @foreach ($post->tags  as $tag)

                            <a href="{{route('posts.tag', $tag)}}" class=" bg-{{$tag->color}}-600 inline-block px-3 h-6  text-white rounded-full"> {{ $tag->name}}</a>

                        @endforeach
                </div>
                <h1 class="text-4xl text-white leading-8 font-bold mt-4">
                            <a href="{{route('posts.show',$post)}}">
                                {{$post->name}}
                            </a>
                </h1>
              </div>
            </article>

        @endforeach

    </div>

    <div class="mt-4">
        {{$posts->links()}}
    </div>
</div>
@else

<div class="grid grid-cols-1 md:grid-cols-3 gap-1">

    @foreach ($posts as $post)
    {{-- <article class="w-full h-80 bg-cover bg-center @if ($loop->first) --}}
        <article class="w-full h-96 bg-cover bg-center "
        style="background-image: url('{{Storage::url('404.png')}}' ">
          <div class="h-full w-full px-8 flex flex-col justify-center">
            <div>
                    @foreach ($post->tags  as $tag)

                        {{-- <a href="{{route('posts.tag', $tag)}}" class=" bg-{{$tag->color}}-600 inline-block px-3 h-6  text-white rounded-full"> {{ $tag->name}}</a> --}}

                    @endforeach
            </div>
            <h1 class="text-4xl text-white leading-8 font-bold mt-4">
                        {{-- <a href="{{route('posts.show',$post)}}">
                           
                        </a> --}}
            </h1>
          </div>
        </article>

    @endforeach

</div>

{{-- <div class="mt-4">
    {{$posts->links()}}
</div> --}}
</div>

@endauth
</x-app-layout>
{{-- https://youtu.be/hdBzjtaAgGE?list=PLZ2ovOgdI-kX3XFj77zlvSQYhJyJSYQWr&t=1027 --}}
