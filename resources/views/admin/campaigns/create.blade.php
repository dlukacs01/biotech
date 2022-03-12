<x-admin-master>
@section('content')

    <h1>Create</h1>

    <form method="post" action="{{route('campaign.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   id="title"
                   aria-describedby=""
                   placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status_id" name="status_id">
                @foreach($statuses as $status)
                <option value="{{$status->id}}">{{$status->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Start date</label>
            <input type="date"
                   name="start_date"
                   class="form-control"
                   id="start_date">
        </div>
        <div class="form-group">
            <label for="end_date">End date</label>
            <input type="date"
                   name="end_date"
                   class="form-control"
                   id="end_date">
        </div>
        <div class="form-group">
            <label for="campaign_image">Campaign image</label>
            <input type="file"
                   name="campaign_image"
                   class="form-control-file"
                   id="campaign_image">
        </div>
        <div class="form-group">
            <textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
</x-admin-master>
