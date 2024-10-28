@extends('admin.appdash')

@section('main', 'Reservation')
@section('content')
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
    
    <table class="table table_css ">
        <thead class="thead_border">
            <tr>
                <th class="br-req">ID</th>
                <th>Name</th>
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
                <td>{{$reserations->id_vor}}</td>
                <td>{{$reserations->phone}}</td>
                <td>{{$reserations->email}}</td>
              
                <td>
                  
                     <a href="{{route('reservationv_edit',$reserations->id_vor)}}" class="btn-style">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                  

                   
                   
                </td>
                <td>
                    <form action="{{route('reservationv_destroy',$reserations->id_vor)}}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-style-t">
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



@endsection