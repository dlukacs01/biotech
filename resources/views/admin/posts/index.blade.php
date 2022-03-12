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
                            <th>Campaign</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Post image</th>
                            <th>Campaign</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td><img src="{{$post->post_image}}" alt="" width="100px"></td>
                                <td>{{$post->campaign->title}}</td>
                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td>{{$post->updated_at->diffForHumans()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endsection
</x-admin-master>
