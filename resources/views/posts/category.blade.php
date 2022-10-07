<x-app-layout>
<div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
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

</x-app-layout>