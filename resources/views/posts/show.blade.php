<x-app-layout>

    <div class="container py-8">
            <h1 class="text-4xl font-bold text-gray-600 ">{{$post->name }}</h1>
    </div>
    <div class="text-lg text-gray-500 mb-2">
        {{$post->extract}}
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3  gap-4">
        {{-- contenido principal--}}
        <div class="col-span-2">
            <figure>
                <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url) }}" alt="">
            </figure>
            <div class="text-base color-gray-500 mt-4">
                {{$post->body}}
            </div>
        </div>
        <aside class="text-2xl font-bold text-gray-600 mb-4 ">
            <h1>MAS DE {{$post->category->name}}</h1>
            <ul>
                @foreach ($parecidos as $parecido)
                    <li class="mb-4">
                        <a class="flex" href="{{ route('posts.show', $parecido)}}">
                                <img class="w-60 h-36 object-cover" src="{{Storage::url($parecido->image->url)}}" alt="">
                                <span class="ml-2 text-base">
                                    {{$parecido->name}}
                                </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>
    </div>
</x-app-layout>
