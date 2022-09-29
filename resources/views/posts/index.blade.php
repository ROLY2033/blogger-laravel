<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 text-center pb-8">
       <h3>lista de publicaciones</h3>
        
    </div>

    <div class="grid grid-cols-3 gap-1">

        @foreach ($posts as $post)
            <article class="w-full h-80 bg-cover bg-center @if ($loop->first)
                col-span-2
            @endif" style="background-image: url({{ Storage::url($post->image->url) }})">
              <div class="h-full w-full px-8 flex flex-col justify-center">
                <div>
                        @foreach ($post->tags  as $tag)
                                <a href="" class="inline-block px-3 h-6 bg-gray-600 text-white rounded-full"> {{ $tag->name}}</a>
                        @endforeach   
                </div>               
                <h1 class="text-4xl text-white leading-8 font-bold">
                            <a href="">
                                {{$post->name}}
                            </a>
                </h1>
              </div>
            </article>
        @endforeach
    </div>
</x-app-layout>
{{-- https://youtu.be/hdBzjtaAgGE?list=PLZ2ovOgdI-kX3XFj77zlvSQYhJyJSYQWr&t=1027 --}}