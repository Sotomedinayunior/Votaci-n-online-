@extends('layouts.main')
@section('title' , 'Home')

@section('content')

   <h1 class="h1  text-center  text-emphasis-60">Panel Admin</h1>
   <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Search for names..">
   <table id="myTable" class="table table-hover table-sm ">
    <tr class="header">
        <th>Id</th>
        <th>Name</th>
        <th>Descripcion</th>
        <th>Actions</th>

    </tr>
    <tbody>
        @foreach ( $candidato as $item )
          <tr>
            <td>{{$item->id }}</td>
            <td>{{$item->nombre }}</td>
            <td>{{$item->descripcion }}</td>
             <td>
                <form action="{{ route('dashboard.destroy',$item->id) }}" method="POST">
                        @csrf
                        <div class="btn-group">
                            <a class="btn btn-info" href="{{ route('dashboard.show',$item->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('dashboard.edit',$item->id) }}">Edit</a>
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
            </td>
          </tr>

        @endforeach
         <tr id="noResults" style="display:none;">
            <td colspan="4" class="text-center">No se encontraron resultados</td>
        </tr>

    </tbody>
</table>



@endsection
