@extends('layout')

@section('title', 'Home')

@section('conteudo')

<main>

  <section class="py-5 text-center container">
    <img src="/img/produtos.webp" alt="produtos" class="img-fluid">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Produtos cadastrados</h1>
        <p class="lead text-body-secondary">Cadastrando produtos através do Laravel utilizando mySQL e Bootstrap.</p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        @yield('produtos')

      </div>
    </div>
  </div>

</main>

<footer class="text-body-secondary py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Voltar para o topo da página</a>
    </p>
  </div>
</footer>
@endsection
