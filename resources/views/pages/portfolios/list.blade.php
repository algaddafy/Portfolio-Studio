@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">List of Portfolios</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">List of Portfolios</li>
            </ol>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($portfolios) > 0)
                        @foreach ($portfolios as $portfolio)
                            <tr>
                                <th scope="row">{{$portfolio->id}}</th>
                                <td>{{$portfolio->title}}</td>
                                <td>
                                    <img style="height: 10vh" src="{{url('uploads/main/'.$portfolio->small_image)}}" alt="small_image">
                                </td>
                                <td>{{Str::limit(strip_tags($portfolio->description),40)}}</td>
                                <td>{{$portfolio->category}}</td>
                                <td>
                                    <div class="row">
                                        <div>
                                            <a href="{{route('admin.portfolios.edit', $portfolio->id)}}" class="btn btn-primary m-2">Edit</a>
                                        </div>
                                        <div>
                                            <form action="{{route('admin.portfolios.destroy', $portfolio->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" name="submit" value="Delete" class="btn btn-danger m-2">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        
                    @endif
                  
                </tbody>
              </table>
    </main>
@endsection
                
                