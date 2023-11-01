@extends('home')

@section('produtos')

    @foreach ($produtos as $produto)

        <div class="col">
          <div class="card shadow-sm">
            <img class="bd-placeholder-img card-img-top " width="100%" height="225" src="{{ asset("img/produtos/$produto->image")}}" role="img" />
            <div class="card-body" >
                <h4 class="card-title">{{ $produto->nome}}</h4>
              <p class="card-text " style="min-height: 5rem">{{ $produto->descricao}}</p>
              <div class="d-flex justify-content-between align-items-center">
                @auth
                <div class="btn-group">
                  <a href="{{ route('produtos.edit',['id'=>$produto->id])}}" type="button" class="btn btn-sm btn-warning" >Editar</a>
                  <form id="{{$produto->id}}" action="{{route('produtos.destroy',['id'=>$produto->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a type="button" class="btn btn-sm btn-danger" onclick="confirmarDelete()">
                    Delete</a></form>
                    <script>
                        function confirmarDelete(){
                            if(confirm("Tem certeza que quer excluir esse produto?")){
                                document.getElementById('{{$produto->id}}').submit();
                            }else{
                                //
                            }
                        }
                    </script>
                </div>
                @endauth
                <small class="text-body-secondary">{{$produto->quantidade}}
                    @if($produto->quantidade > 1)
                    Produtos
                    @else
                    Produto
                    @endif
                </small>
              </div>
            </div>
          </div>
        </div>

    @endforeach

@endsection
