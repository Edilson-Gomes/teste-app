@extends('layout')

@section('title', 'Registro de usuários')

@section('conteudo')

<br><br><br>


    <main >
<div class="container ">
  <div class="row">
    <div class="col align-self-center">
        <h1>Registrar usuário</h1><br>
  <form action="{{route('registro.store')}}" method="POST">
    @csrf
    @method('POST')
  <div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">Nome completo</label>
    <input type="text" class="form-control" id="nome_completo" name="name" aria-describedby="" value="{{old('name')}}">
  </div>
  <div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="{{old('email')}}">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="form-group mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  </form>
 </div>
</div>
</div>
    </main>

@if ($errors->any())
    <div style="color: red;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@endsection
