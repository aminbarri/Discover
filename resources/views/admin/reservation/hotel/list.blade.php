<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
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
      
      
    
        <h2 class="mb-4">Reseration List</h2>
        <div class="listyu">
            
        <span class="encours">En cours</span>
        <span class="accepte">Acceptée</span>
        <span class="refuse">Refusée</span>
        </div>
        <table class="table htl-re table_css ">
            <thead class="thead_border">
                <tr>
                    <th>ID</th>
                    <th>Phone</th>
                    <th>email</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
                <!-- Example row -->
                @php
                    foreach ($reseration as $reserations){
                @endphp
                <tr>
                    <td>{{$reserations->id_resh}}</td>
                    <td>{{$reserations->phone}}</td>
                    <td>{{$reserations->email}}</td>
                  
                    <td>
                      
                         <a href="{{ route('reservationh_edit',$reserations->id_resh)}}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                      

                       
                       
                    </td>
                    <td>
                        <form action="{{route('reservation_destroy',$reserations->id_resh)}}" method="POST" style="display:inline-block;">
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
