@extends('layout')

@section('title','Editar produtos')

@section('conteudo')

<br><br>
<main >
    <div class="container ">
    <div class="row">
        <div class="col align-self-center">
        <h1>Cadastro de produtos</h1><br><br>
    <form action="{{route('produtos.update',['id'=>$produto->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="form-group mb-3">
        <label for="exampleInputName1" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" aria-describedby="" value="{{$produto->nome}}">
    </div>
    <div class="form-group mb-3">
        <label for="exampleInputName1" class="form-label">Descrição</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricao" id="descricao" >{{$produto->descricao}}</textarea>
    </div>
    <div class="form-group mb-3">
        <label for="exampleInputNumber1" class="form-label">Imagem do produto</label>
        <input type="file" class="form-control" id="image" name="image" aria-describedby="" >
    </div>
    <div class="form-group mb-3">
        <label for="exampleInputNumber1" class="form-label">Estoque</label>
        <input type="number" class="form-control" id="quantidade" name="quantidade" aria-describedby="" value="{{$produto->quantidade}}">
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
    </div>
    </form>

  @if ($errors->any())
    <div style="color: red;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
  @endif

    </div>
    </div>
    </div>
</main>


@endsection
