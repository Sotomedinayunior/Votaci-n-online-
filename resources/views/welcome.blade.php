<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Votacion 2024</title>
    </head>
    <body class="antialiased">


        <div class="wrap">


        @foreach ( $candidatos as  $item)

           <div class="card" title="El candidato ideal para ti">
              <div class="cover-head"></div>
              <div class="container-body"><img  title=" el candidato {{$item->nombre}}" src="{{asset('img/' . $item->imagen)}}" alt="{{$item->nombre}}"></div>
              <span class="name"> {{$item->nombre}} </span>
                <button class="Button-submit" data-nombre="{{$item->nombre}}" data-descripcion="{{$item->descripcion}}" data-imagen="{{asset('img/' . $item->imagen)}}">Votar</button>
              <div class="container-footer">
                <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-success"  id="barra"></div>
                </div>


                <span  class="pt-3 fw-bold"  id="Votos">0%</span>
              </div>



           </div>

        @endforeach
      </div>
        @if ($message=Session::get('error'))
           <div class="alert alert-success alert-dismissible fade show" role="alert">

  <strong>{{ $message }}</strong>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>

        @endif



        <div class="modal" id="myModal">
            <div class="modal-content">
                <div class="head-modal"></div>
                <img class="modal-image" src="" alt="Imagen del candidato">

                <h1 class="modal-title">Candidato</h1>
                <p class="modal-description">Descripción del candidato...</p>
               <form action="{{ route('votar') }}" method="post">
                @csrf
                <input type="hidden" name="candidato_id_hidden" value="{{ $item->id }}">
                <input type="checkbox" name="candidato_id_checkbox" id="checkbox">
                 <input class="hide" type="submit" id="input" value="Votar">
               </form>


            </div>
        </div>



        <script src="{{asset('js/app.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>





    </body>
</html>
