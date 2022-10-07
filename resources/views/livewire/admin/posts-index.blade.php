<div class="card">
    {{-- Because she competes with no one, no one can compete with her. --}}

    <div class="card-header">
        <input wire:model="search" class="form-control" type="text" placeholder="ingrese el nombre de un post">
    </div>

    @if ($posts->count())
        <div class="card-body">
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th class="">Id</th>
                        <th class="">Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->name}}</td>
                            <td with="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.posts.edit' , $post)}}">editar</a>
                            </td>
                            <td with="10px">
                                <form action="{{route('admin.posts.destroy' , $post)}}" method="post">
                                    @csrf    
                                    @method('delete')
                                    <button class="btn btn-danger " type="submit">eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                
        </div>

        <div class="card-footer">
            {{$posts->links()}}
        </div>
    @else
        <div class="card-body">
            <strong class="ml-4"> no hay ningun registro...</strong>
        </div>
    @endif
</div>
