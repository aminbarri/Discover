<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>holets</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div>
    @include('admin.navv')
    @include('admin.list')
 
    
    <div class="container mt-5">
        <h2 class="mb-4">Hotel List</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
                <!-- Example row -->
                @php
                    foreach ($hotel as $hotels){
                @endphp
                <tr>
                    <td>{{$hotels->id_hotel}}</td>
                    <td>{{$hotels->nom}}</td>
                  
                    <td>
                      
                         <a href="{{ route('hotels_edit', $hotels->id_hotel)}}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                      

                       
                       
                    </td>
                    <td>
                        <form action="{{ route('hotels_destroy', $hotels->id_hotel)}}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
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
