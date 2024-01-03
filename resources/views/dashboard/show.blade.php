@extends('layouts.main')
@section('title' , 'Candidato')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-center align-items-center flex-column" id="container">
          <img src="{{ asset('img/' . $candidato->imagen) }}" class="text-center" alt="{{$candidato->nombre }}">
          <h1 class="display-4 text-body-secondary text-center fw-medium">{{$candidato->nombre  }}</h1>
          <p class="text-center" style="width: 300px; height:300px;">{{ $candidato->descripcion }}</p>
    </div>

</div>


@endsection
