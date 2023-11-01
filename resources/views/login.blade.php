@extends('layout')

@section('title', 'Login')

@section('conteudo')

<br><br><br><br>

<main class="form-signin w-100 m-auto">

  @if($mensagem = Session::get('erro'))
    {{ $mensagem }}
  @endif

  <form action="{{ route('login.auth')}}" method="POST">
    @csrf

    <h1 class="h3 mb-3 fw-normal">Entre com email Cadastrado.</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" value="{{old('email')}}">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Senha</label>
    </div>

    <button class="btn btn-primary w-100 py-2" type="submit">Entrar</button>
    <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
  </form>

  @if ($errors->any())
    <div style="color: red;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
  @endif

</main>

@endsection
