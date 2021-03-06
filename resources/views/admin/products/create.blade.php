<x-admin-master>
    @section('content')

        <h1>Create Product</h1>

        <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
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
{{--            <div class="form-group">--}}
{{--                <label for="campaign_id">Campaign</label>--}}
{{--                <select class="form-control" id="campaign_id" name="campaign_id">--}}
{{--                    @foreach($campaigns as $campaign)--}}
{{--                        <option value="{{$campaign->id}}">{{$campaign->title}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
            <div class="form-group">
                <label for="product_image">Product image</label>
                <input type="file"
                       name="product_image"
                       class="form-control-file"
                       id="product_image">
            </div>
            <div class="form-group">
                <textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    @endsection
</x-admin-master>
