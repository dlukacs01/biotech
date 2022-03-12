<x-admin-master>
    @section('content')

        <h1>Coupons</h1>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Coupons
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Coupon image</th>
                            <th>Campaign</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Coupon image</th>
                            <th>Campaign</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($coupons as $coupon)
                            <tr>
                                <td>{{$coupon->id}}</td>
                                <td>{{$coupon->title}}</td>
                                <td><img src="{{$coupon->coupon_image}}" alt="" width="100px"></td>
                                <td>{{$coupon->campaign->title}}</td>
                                <td>{{$coupon->created_at->diffForHumans()}}</td>
                                <td>{{$coupon->updated_at->diffForHumans()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endsection
</x-admin-master>
