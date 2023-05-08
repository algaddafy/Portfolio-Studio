@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Edit</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        <form action="{{route('admin.portfolios.update', $portfolio->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-6 mt-6">
                    <h3>Image</h3>
                    <img style="height: 30vh" src="{{url('uploads/main/'.$portfolio->small_image)}}" class="img-thumbnail">
                    <input class="mt-3" type="file" name="small_image">
                </div>
                <div class="form-group col-md-4 mt-3">
                    <div class="mb-3">
                        <label for="title"><h4>Title</h4></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$portfolio->title}}">
                    </div>
                </div>
                <div class="form-group col-md-6 mt-3">
                    <h3>Description</h3>
                    <textarea class="form-control" name="description" rows="5">{{$portfolio->description}}</textarea>
                </div>
                <div class="form-group col-md-4 mt-3">
                    <div class="mb-5">
                        <label for="category"><h4>Category</h4></label>
                        <input type="text" class="form-control" id="category" name="category" value="{{$portfolio->category}}">
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" class="btn btn-primary mt-5">
        </div>
        </form>
    </main>
@endsection
                
                