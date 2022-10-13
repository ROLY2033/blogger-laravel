<x-app-layout>
<div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    @auth
        
    <h1 class="uppercase text-center text-3xl font-bold mt-4">
        categoria: {{$category->name}}
    </h1>
    @foreach ($posts as $post)
            <x-card-post :post="$post"/>
    @endforeach
    <div class="mt-4">
        {{$posts->links()}}
    </div>
</div>
@else
<article class="w-full  h-96 bg-cover bg-center "
        style="background-image: url('https://developers.google.com/site-assets/images/home/developers-social-media.png' ">
@endauth
</x-app-layout>