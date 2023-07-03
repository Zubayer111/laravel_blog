@extends("master.admin.master")

@section("body")

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="text-center text-success text-bold">{{Session::get('message')}}</p>
                <h4 class="card-title">User Info</h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        
                    <tr>
                        <th>SL NO</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($users as $user)
                            <td >{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="{{route("edit-user", ["id" => $user->id])}}" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route("delete-user", ["id" => $user->id])}}" class="btn btn-danger btn-sm {{$user->id ==2 ? "disabled" : "" }}" >
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection