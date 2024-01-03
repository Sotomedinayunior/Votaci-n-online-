@extends('layouts.main')

@section('title' , 'Dashboard edit')

@section('content')

<form action="{{route('dashboard.update', $candidato->id)}}" method="post"  class="center-container shadow p-3 mb-5 bg-body-tertiary rounded" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="Nombre" class="form-label">Nombre completo: <input type="text" name="nombre" id="" value="{{ $candidato->nombre }}" required></label>
    <div class="mb-3">
    <label for="imagen" class="form-label">Imagen actual:</label>
    <img src="{{ asset('img/' . $candidato->imagen) }}" class="rounded" width="200" height="200" alt="Imagen actual">
</div>
<div class="mb-3">
    <label for="imagen" class="form-label">Seleccionar nueva imagen:</label>
    <input type="file" class="form-control pb-1" name="imagen" id="imagen" required>
</div>

    <textarea type="text" class="form-control mt-2" placeholder="Descripcion del candidato" name="descripcion" rows="3" id="descripcion"  required>{{$candidato->descripcion}}</textarea>
    <button type="submit" class="btn btn-success">Enviar</button>
</form>

@endsection
