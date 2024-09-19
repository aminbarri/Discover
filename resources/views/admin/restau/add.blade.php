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
            <h3 class="text-center">Add plat to restau {{$id_rest}}</h3>
           @foreach ($palt as $palts)
              
               
               <table class="table">
                <tbody>

                   <tr>
                    <td class="fixed-width">{{$palts->nom}}</td>
                    @php
                       $exists = DB::table('platofrest')
                            ->where('id_rest', $id_rest)
                             ->where('id_plat', $palts->id_plat)
                             ->whereNull('deleted_at') // Check if 'deleted_at' is null (not soft-deleted)
                             ->exists();
                    @endphp     
                    <td class="fixed-width"> 
                        @if ($exists)
                        <form action="{{route('addplt.destroy',['id_plat' => $palts->id_plat, 'id_rest' => $id_rest])}}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-style-t">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                                
                        @else
                        <a href="{{route('addplt.store',['id_plat' => $palts->id_plat, 'id_rest' => $id_rest])}}" class="btn-style">
                            <i class="fas fa-edit"></i> add
                               </a>
                        @endif
                      
                        
                </td>

               
                   </tr>
                </tbody>
               </table>
           @endforeach
           
        </div>
    </div>
    

    @include('layouts.footer')
    </div>  
</body>
</html>
