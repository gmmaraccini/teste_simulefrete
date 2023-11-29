<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('produtos.create') }}" class="btn btn-md btn-success mb-3">Cadastrar</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">CODIGO</th>
                                <th scope="col">NOME PRODUTO</th>
                                <th scope="col">PREÇO</th>
                                <th scope="col">ACOES</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($produtos as $produto)
                                <tr>
                                    <td>{{ $produto->codigo }}</td>
                                    <td>{{ $produto->nome_produto }}</td>
                                    <td>{!! $produto->preco !!}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Deseja apagar ?');" action="{{ route('produtos.destroy', $produto->id) }}" method="POST">
                                            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-sm btn-primary">EDITAR</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">EXCLUIR</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Nenhuma informação cadastrada
                                  </div>
                              @endforelse
                            </tbody>
                          </table>
                          {{ $produtos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()-> has('success'))

            toastr.success('{{ session('success') }}', 'SUCESSO!');

        @elseif(session()-> has('error'))

            toastr.error('{{ session('error') }}', 'ERRO!');

        @endif
    </script>

</body>
</html>
