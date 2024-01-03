@extends('layouts.main')

@section('title' , 'Dashboard')
@section('content')
         <div class="center-container shadow p-3 mb-5 bg-body-tertiary rounded">
         <div >
            <form class="form" action="{{route('storage')}}" method="post" class="d-flex flex-column justify-content-center align-items-center p-3" enctype="multipart/form-data">
                    @csrf
                    <label for="Nombre" class="form-label">Nombre completo: <input type="text" name="nombre" id="" required></label>
                    <input type="file" class="form-control pb-3" name="imagen" id="" required>
                    <textarea type="text" class="form-control mt-2" placeholder="Descripcion del candidato" name="descripcion" rows="3" id="descripcion" required></textarea>
                    <input type="submit" class="btn btn-primary mt-3" value="Crear">
            </form>
        </div>
    </div>
@endsection








