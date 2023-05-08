@extends('layouts.admin_layout')
@section('content')
    
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Main</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Main</li>
        </ol>
        
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
    
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
    
                <div class="card">
                    <div class="card-body">
    
                        <form action="{{url('admin/main/'.$main->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
    
                            <div class="form-group mb-3">
                                <label for="">Title</label>
                                <input type="text" name="title" value="{{$main->title}}" class="form-control">
                            </div>
                            {{-- value="{{$main->title}}"  --}}
                            <div class="form-group mb-3">
                                <label for="">Sub Title</label>
                                <input type="text" name="sub_title" value="{{$main->sub_title}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Upload resume</label>
                                <input type="file" name="resume" class="form-control">
                            </div>
                            <div>
                                <a class="btn btn-primary btn-xl text-uppercase" 
                                href="{{ asset('uploads/main/'.$main->resume) }}" download>Resume Download</a>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Background Image</label>
                                <input type="file" name="bg_image" class="form-control">
                                <img src="{{ asset('uploads/main/'.$main->bg_image) }}" width="300px" height="200px" alt="Image">
                                {{-- {{ asset('uploads/main/'.$main->profile_image) }} --}}
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            

    
                        </form>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection