<x-admin-master>

    @section('content')

        <div class="row">
            <div class="col-sm-3">

                <form method="post" action="{{route('statuses.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">

                        <div>
                            @error('name')
                            <span><strong>{{$message}}</strong></span>
                            @enderror
                        </div>

                    </div>
                    <button class="btn btn-primary" type="submit">Create</button>
                </form>

            </div>

            <div class="col-sm-9">

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($statuses as $status)
                                <tr>
                                    <td>{{$status->id}}</td>
                                    <td>{{$status->name}}</td>
                                    <td>{{$status->created_at->diffForHumans()}}</td>
                                    <td>{{$status->updated_at->diffForHumans()}}</td>
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
