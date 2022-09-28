<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-red-600">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque natus dignissimos accusamus numquam maxime et officia, eveniet ratione asperiores consectetur sed nihil atque! Explicabo mollitia ad asperiores repellat nobis aspernatur.
        
    </div>

    <div class="grid grid-cols-3 gap-1">

        @foreach ($posts as $post)
            <article>
                {{ $post->image }}
            </article>
        @endforeach
    </div>
</x-app-layout>
{{-- https://www.youtube.com/watch?v=hdBzjtaAgGE&list=PLZ2ovOgdI-kX3XFj77zlvSQYhJyJSYQWr&index=7 --}}