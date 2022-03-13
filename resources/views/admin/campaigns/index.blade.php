<x-admin-master>
@section('content')

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
                        <th>Id</th>
                        <th>User</th>
                        <th>Status</th>
                        <th>Title</th>
                        <th>Campaign image</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Publish (csak Jóváhagyott)</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>User</th>
                        <th>Status</th>
                        <th>Title</th>
                        <th>Campaign image</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Publish (csak Jóváhagyott)</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($campaigns as $campaign)
                        <tr>
                            <td>{{$campaign->id}}</td>
                            <td>{{$campaign->user->name}}</td>
                            <td>{{$campaign->status->name}}</td>
                            <td>{{$campaign->title}}</td>
                            <td><img src="{{$campaign->campaign_image}}" alt="" width="100px"></td>
                            <td>{{$campaign->start_date}}</td>
                            <td>{{$campaign->end_date}}</td>
                            <td>{{$campaign->created_at->diffForHumans()}}</td>
                            <td>{{$campaign->updated_at->diffForHumans()}}</td>
                            <td>
                                <form method="post" action="{{route('campaign.publish', $campaign->id)}}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                            class="btn btn-primary"
                                            @if($campaign->is_active === 1 || $campaign->status->name !== "Jóváhagyott")
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
