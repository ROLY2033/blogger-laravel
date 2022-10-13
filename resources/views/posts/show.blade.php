<x-app-layout>


   @auth
       
    <div class="container py-8">
            <h1 class="text-4xl font-bold text-gray-600 ">{{$post->name }}</h1>
    </div>
    <div class="text-lg text-gray-500 mb-2">
        {!! $post->extract !!}
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3  gap-4">
        {{-- contenido principal--}}
        <div class="col-span-2">
            <figure class="grid place-content-center m-3">
              
                @if ($images)
                @foreach ($images as $image)
                    
                    <img class="w-96  h-full object-cover object-center m-5" src="{{Storage::url($image->url) }}" alt="">

                @endforeach
                <h2 class="text-center font-bold text-pink-600 "> @autor: {{ $post->user->name }}</h2>
                @else
                <img class="w-60 h-36 object-cover" src="{{Storage::url($parecido->image->url)}}" alt="">
                @endif
                
            </figure>
            <div class="text-base color-gray-500 mt-4 text-justify ml-5 mr-5">
                {!! $post->body !!}
            </div>
        </div>
        <aside class="text-2xl font-bold text-gray-600 mb-4 ">
            <h1>MAS DE {{$post->category->name}}</h1>
            <ul>
                @foreach ($parecidos as $parecido)
                    <li class="mb-4">
                        <a class="flex" href="{{ route('posts.show', $parecido)}}">
                                @if ($post->category->image)
                                 <img class="w-60 h-36 object-cover" src="{{Storage::url($parecido->image->url)}}" alt="">
                                @else
                                <img class="w-60 h-36 object-cover" src="{{Storage::url($parecido->image->url)}}" alt="">
                                @endif
                                <span class="ml-2 text-base">
                                    {!! $parecido->name !!}
                                </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>
    </div>
    @else
    <a href="{{route('login')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">login</a>
    <a href="{{route('register')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">registrar</a>
    
    @endauth
</x-app-layout>
