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
                        <th class=" text-center ">Image</th>
                        <th>category</th>
                        <th>Status</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->name}}</td>
                            <td>
                                @if ($post->image)
                                    <div class=" offset-2 w-50 h-50">
                                {{-- width="357" height="240" --}}
                                     <img class="img-thumbnail"   src="{{Storage::url($post->image->url)}}" alt="">
                                    </div>
                            </td>
                                @else
                                  <img width="307" height="240"  src="https://developers.google.com/site-assets/images/home/developers-social-media.png" alt="">
                                @endif
                                <td>{{$post->category->name}}</td>
                                @if ($post->status ==  2)
                                    <td>Publicado</a></td>
                                @else
                                    <td>Borrador</td>
                                @endif
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
