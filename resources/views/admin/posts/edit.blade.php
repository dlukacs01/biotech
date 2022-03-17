<x-admin-master>
    @section('content')

        <div class="row">
            <div class="col-sm-6">

                <h1>Edit Post</h1>

                <form method="post" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"
                               name="title"
                               class="form-control"
                               id="title"
                               aria-describedby=""
                               placeholder="Enter title"
                               value="{{$post->title}}">
                    </div>
                    {{--            <div class="form-group">--}}
                    {{--                <label for="campaign_id">Campaign</label>--}}
                    {{--                <select class="form-control" id="campaign_id" name="campaign_id">--}}
                    {{--                    @foreach($campaigns as $campaign)--}}
                    {{--                        <option value="{{$campaign->id}}">{{$campaign->title}}</option>--}}
                    {{--                    @endforeach--}}
                    {{--                </select>--}}
                    {{--            </div>--}}
                    <div class="form-group">
                        <div><img height="100px" src="{{$post->post_image}}" alt=""></div>
                        <label for="post_image">Post image</label>
                        <input type="file"
                               name="post_image"
                               class="form-control-file"
                               id="post_image">
                    </div>
                    <div class="form-group">
                        <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{$post->body}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-10">

                <h1>Campaigns</h1>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Campaigns
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Options</th>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Attach (ha nincs átfedés)</th>
                                    <th>Detach</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Options</th>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Attach (ha nincs átfedés)</th>
                                    <th>Detach</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($campaigns as $campaign)
                                    <tr>
                                        <td>
                                            <input type="checkbox"
                                                   @foreach($post->campaigns as $post_campaign)
                                                   @if($post_campaign->title == $campaign->title)
                                                   checked
                                                @endif
                                                @endforeach
                                            >
                                        </td>
                                        <td>{{$campaign->id}}</td>
                                        <td>{{$campaign->title}}</td>
                                        <td>{{$campaign->start_date}}</td>
                                        <td>{{$campaign->end_date}}</td>
                                        <td>
                                            <form method="post" action="{{route('post.campaign.attach', $post)}}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="campaign" value="{{$campaign->id}}">
                                                <button type="submit"
                                                        class="btn btn-primary"
                                                        @if($post->campaigns->contains($campaign))
                                                        disabled
                                                        @endif

                                                        @foreach($post->campaigns as $post_campaign)
                                                        @if($post_campaign->start_date <= Carbon\Carbon::today()
                                                        &&
                                                        $post_campaign->end_date >= Carbon\Carbon::today())
                                                        disabled
                                                    @endif
                                                    @endforeach

                                                >Attach
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form method="post" action="{{route('post.campaign.detach', $post)}}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="campaign" value="{{$campaign->id}}">
                                                <button type="submit"
                                                        class="btn btn-danger"
                                                        @if(!$post->campaigns->contains($campaign))
                                                        disabled
                                                    @endif
                                                >Detach
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

            </div>
        </div>

    @endsection
</x-admin-master>
