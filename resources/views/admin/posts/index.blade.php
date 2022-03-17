<x-admin-master>
    @section('content')

        <h1>Posts</h1>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Posts
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Post image</th>
{{--                            <th>Campaign</th>--}}
                            <th>Szerző</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Publish (csak hétköznap)</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Post image</th>
{{--                            <th>Campaign</th>--}}
                            <th>Szerző</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Publish (csak hétköznap)</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a></td>
                                <td><img src="{{$post->post_image}}" alt="" width="100px"></td>
{{--                                <td>{{$post->campaign->title}}</td>--}}
                                <td>{{$post->user->name}}</td>
                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td>{{$post->updated_at->diffForHumans()}}</td>
                                <td>
                                    <form method="post" action="{{route('post.publish', $post->id)}}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                                class="btn btn-primary"
                                                @if($post->is_active === 1 || $post->isWeekend())
                                                disabled
                                                @endif
                                        >Publish
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endsection
</x-admin-master>
