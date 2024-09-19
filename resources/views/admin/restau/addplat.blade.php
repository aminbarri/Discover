<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List plat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div>
    @include('admin.navv')
    @include('admin.list')
 
    <div class="container">
        <div class="form-container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
         <h3 class="text-center">list plat of resturant: {{ $restau->nom }}</h3>
         <span class="a-add">
            <a href="{{route('addplt.show',$restau->id_rest)}}" class="add_plat">Add a plat</a>
         </span>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
    
                    </tr>
                </thead>
                <tbody>
                    <!-- Example row -->
                    @php
                        foreach ($plat as $plats){
                    @endphp
                    <tr>
                        <td>{{$plats->id_plat}}</td>
                        <td>{{$plats->nom}}</td>
                        


                      
                     
                       
                    </tr>
                    @php
                   }
                    @endphp
                 </tbody>
            </table>
    </div>
           
           
        </div>
    </div>
    

    @include('layouts.footer')
    </div>  
</body>
</html>
