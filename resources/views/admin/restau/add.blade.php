@extends('admin.appdash')

@section('main', 'List restarant')
@section('content')

<div class="container p-4">
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
            <h3 class="text-center">Add plat to restau {{$restau->nom}}</h3>
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
                    <button type="button" class="btn-style-t" data-bs-toggle="modal" data-bs-target="#deletePlatModal{{ $palts->id_plat }}">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>

                    <div class="modal fade" id="deletePlatModal{{ $palts->id_plat }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to remove this plat from the restaurant?
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('addplt.destroy', ['id_plat' => $palts->id_plat, 'id_rest' => $id_rest]) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                        </div>
                    </div>
                    </div>

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


@endsection
