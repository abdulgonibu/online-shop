@extends('admin.components.layout')

@section('title')
    Manage Sliders | Online Shop
@endsection
@section('content')

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Sliders</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            @includeIf('message.message')
            <div class="panel b-primary bt-md">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Sliders</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('sliders.create') }}" class="btn btn-primary pull-right">Add Slider</a>
                        </div>
                    </div>
                    <hr style="margin-top: 0">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Sub Title</th>
                                    <th>Date</th>
                                    <th>URL</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $slider)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ substr($slider->title,0,20) }}</td>
                                        <td><img style="width: 60px" src="{{ asset('uploads/slider/'.$slider->image) }}" alt=""></td>
                                        <td>{{ substr($slider->sub_title,0,30) }}</td>
                                        <td>{{ $slider->start .' - '. $slider->end }}</td>
                                        <td>
                                            <a href="{{ $slider->url }}" target="_blank" class="btn btn-primary btn-xs">Click Here</a>
                                        </td>
                                        <td>
                                            <input type="checkbox" {{ $slider->status === 'active' ? 'checked':'' }} id="sliderStatus" data-id="{{ $slider->id }}" data-toggle="toggle" data-on="Active" data-off="Inactive"
                                                   data-size="mini">
                                        </td>
                                        <td>
                                            <a href="{{ route('sliders.edit', base64_encode($slider->id)) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="{{ route('sliders.delete', base64_encode($slider->id)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a>
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
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection
