<x-admin-master>
    @section('content')

        <h1>Products</h1>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Products
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Product image</th>
{{--                            <th>Campaign</th>--}}
                            <th>Szerző</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Publish (bármely nap)</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Product image</th>
{{--                            <th>Campaign</th>--}}
                            <th>Szerző</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Publish (bármely nap)</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td><a href="{{route('product.edit',$product->id)}}">{{$product->title}}</a></td>
                                <td><img src="{{$product->product_image}}" alt="" width="100px"></td>
{{--                                <td>{{$product->campaign->title}}</td>--}}
                                <td>{{$product->user->name}}</td>
                                <td>{{$product->created_at->diffForHumans()}}</td>
                                <td>{{$product->updated_at->diffForHumans()}}</td>
                                <td>
                                    <form method="post" action="{{route('product.publish', $product->id)}}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                                class="btn btn-primary"
                                                @if($product->is_active === 1)
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
