@extends('admin.components.layout')

@section('title')
    ManageBrand | Online Shop
@endsection

@section('content')
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Brand</a></li>
            </ul>
        </div>
    </div>
    <div class="col-sm-8 col-sm-offset-2">
        <div class="row animated fadeInRight">
            @includeIf('message.message');
            <div class="col-sm-12">
                <div class="panel b-primary bt-md">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>Brands</h3>
                            </div>
                            <div class="col-sm-6">
                                <a href="{{ route('brand.create')}}" class="btn btn-primary pull-right">Add Brand</a>
                            </div>
                        </div>
                        <hr style="margin-top: 0">
                        <div class="table-responsive">
                            <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Brand Name</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $brand)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td> <input type="checkbox" {{ $brand->status === 1 ? 'checked' : '' }} data-toggle="toggle" id="brandStatus" data-id="{{ $brand->id }}" data-on="Active" data-off="Inactive" data-size="mini">
                                    </td>
                                    <td>
                                        <a href="{{ route('brand.edit', base64_encode($brand->id)) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i>Edit</a>
                                        <a href="{{ route('brand.delete', base64_encode($brand->id)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Delete</a>
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
    </div>
    </div>


@endsection
