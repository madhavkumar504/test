@extends('master')
@section('content')
<div class="container" style="height: 500px;">
    @if(session()->has('user'))
    <h1>Welcome to Dashboard {{Session::get('user')['firstname']}}</h1>
    @endif
    <div class="container mt-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
          Add Products
        </button>
      </div>
      
      <!-- The Modal -->
      <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Products</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
                <form action="addproducts" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-3">
                      <label for="name" class="form-label">Name:</label>
                      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                    </div>
                    <div class="mb-3">
                      <label for="desc" class="form-label">Description:</label>
                      <input type="text" class="form-control" id="desc" placeholder="Enter desc" name="desc">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image:</label>
                        <input type="file" class="form-control" id="image" name="image">
                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>      
          </div>
        </div>
    </div>
    <div class="container mt-3">
        <h2>Products List</h2>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Name</th>
              <th>Description</th>
              <th>Images</th>
              <th>Operations</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->desc}}</td>
                <td><img src="{{ asset('storage/app/public/images/'.$product->image) }}" alt=""></td>
                <td>
                  <a href=""><i class="far fa-trash-alt" style="color:red;"></i></a>
                  <a href=""> <i class="fas fa-edit"></i> </a>            
                </td>
            </tr>    
            @endforeach
          </tbody>
        </table>
      </div>
</div>
@endsection