<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Restaurant</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div>
    @include('admin.navv')
    @include('admin.list')
    
    <div class="container mt-5">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
       @endif

       @if (session('success'))
        <div class="alert alert-success">
        {{session()->get('message')}}
        </div>
       @endif
     
      
    
        <h2 class="mb-4">RESTAURANT List</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>List of plat</th>

                </tr>
            </thead>
            <tbody>
                <!-- Example row -->
                @php
                    foreach ($restau as $restaus){
                @endphp
                <tr>
                    <td>{{$restaus->id_rest}}</td>
                    <td>{{$restaus->nom}}</td>
                  
                    <td>
                      
                         <a href="{{ route('restau_edit', $restaus->id_rest)}}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                      

                       
                       
                    </td>
                    <td>
                        <form action="{{ route('restau_destroy', $restaus->id_rest)}}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </td>
                    <td>
                        <a href="{{route('plat_list',$restaus->id_rest)}}">show</a>
                    </td>
                   
                </tr>
                @php
               }
                @endphp
             </tbody>
        </table>
    </div>
   
    

    @include('layouts.footer')
    </div>  
</body>
</html>
