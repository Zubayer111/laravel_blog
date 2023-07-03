@extends("master.admin.master")

@section("body")

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="text-center text-success text-bold h1">{{Session::get('message')}}</p>
                <h4 class="card-title">Blog Category Info</h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        
                    <tr>
                        <th>SL NO</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($categories as $category)
                            <td>{{$loop->iteration}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td><img src="{{$category->image}}" alt="" height="50" width="80"></td>
                            <td>{{$category->status ==1 ? "Published": "Unpublished"}}</td>
                            <td>
                                <a href="{{route("category.edit", ["id" => $category->id])}}" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route("category.delete", ["id" => $category->id])}}" class="btn btn-danger btn-sm"  onclick="deleteCategory({{$category->id}})">
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