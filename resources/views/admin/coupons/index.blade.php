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
{{--                            <th>Campaign</th>--}}
                            <th>Szerző</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Publish (első 3 - utolsó 3)</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Coupon image</th>
{{--                            <th>Campaign</th>--}}
                            <th>Szerző</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Publish (első 3 - utolsó 3)</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($coupons as $coupon)
                            <tr>
                                <td>{{$coupon->id}}</td>
                                <td><a href="{{route('coupon.edit', $coupon->id)}}">{{$coupon->title}}</a></td>
                                <td><img src="{{$coupon->coupon_image}}" alt="" width="100px"></td>
{{--                                <td>{{$coupon->campaign->title}}</td>--}}
                                <td>{{$coupon->user->name}}</td>
                                <td>{{$coupon->created_at->diffForHumans()}}</td>
                                <td>{{$coupon->updated_at->diffForHumans()}}</td>
                                <td>
                                    <form method="post" action="{{route('coupon.publish', $coupon->id)}}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                                class="btn btn-primary"
                                                @if($coupon->is_active === 1 || !$coupon->canWePublish())
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
