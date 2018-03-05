<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Lista De Tarefas</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

<body><div class="container">

    <div class="col-xs-12">
        <table class="table table-striped">

            <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Custo</th>
            <th>Data Limite</th>
            <th>Editar</th>
            <th>Excluir</th>
            <th colspan="2" align="center">Ordem</th>
            </thead>
            <tbody>
            @foreach($all as $item)
                @if($item -> custo >= 1000)
                    <tr style="background-color: yellow">

                        <td>{{$item ->id }}</td>
                        <td>{{$item ->nome}}</td>
                        <td>{{$item ->custo}}</td>
                        <td>{{$item ->datalimite}}</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editmodal" data-id="<?php echo $item['id']; ?>" data-nome="<?php echo $item['nome']; ?>" data-custo="<?php echo $item['custo']; ?>" data-datalimite="<?php echo $item['datalimite']; ?>">Editar</button></td>
                        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#excluirmodal" data-id="<?php echo $item['id']; ?>">Excluir</button></td>
                        <td><a href="#" class="up"><button type="button" class="btn btn-dark">Subir</button></a></td>
                        <td><a href="#" class="down"><button type="button" class="btn btn-dark">Descer</button></a></td>
                    </tr>
                @else
                    <tr >
                        <td>{{$item ->id }}</td>
                        <td>{{$item ->nome}}</td>
                        <td>{{$item ->custo}}</td>
                        <td>{{$item ->datalimite}}</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editmodal" data-id="<?php echo $item['id']; ?>" data-nome="<?php echo $item['nome']; ?>" data-custo="<?php echo $item['custo']; ?>" data-datalimite="<?php echo $item['datalimite']; ?>">Editar</button></td>
                        <td><form class="formulario" action="{{ route('destroy', ['id' => $item->id]) }}" method="POST">
                                {{ method_field('DELETE') }}
                                @csrf
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form></td>
                            <td><a href="#" class="up"><button type="button" class="btn btn-dark">Subir</button></a></td>
                            <td><a href="#" class="down"><button type="button" class="btn btn-dark">Descer</button></a></td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#cadmodal">
        Nova Tarefa
    </button>

    <!-- Modal -->
    <div class="modal fade" id="cadmodal" tabindex="-1" role="dialog" aria-labelledby="cadmodal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Cadastrar Tarefa</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nome:</label>
                            <input name="nome" id="nome" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Custo:</label>
                            <input name="custo" id="custo" type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Data Limite:</label>
                            <input name="datalimite" id="datalimite" type="date" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="cadmodal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title center"  id="editmodal"><strong>Editar Tarefa </strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="editform" action="{{ route('update',['id' => 1]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nome:</label>
                            <input name="nome" id="nome" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Custo:</label>
                            <input name="custo" id="custo" type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Data Limite:</label>
                            <input name="datalimite" id="datalimite" type="datetime" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="excluirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Excluir</h4>
                </div>
                <div class="modal-body">
                    Tem Certeza Que Deseja Excluir o registro ?
                </div>
                <div class="modal-footer">
                    <form class="formulario"  id="excluirform" action="" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-danger" value="Remove">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<script type="text/javascript">
    $('#editmodal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var nome = button.data('nome')
        var custo = button.data('custo')
        var datalimite = button.data('datalimite')
        var url = '\{'+'\{' + 'route' + '(\'update\',' + ' [id => '+ id + '])\}\}'

        var modal = $(this)
        modal.find('#editform').attr('action', url)
        console.log(url)
        modal.find('#nome').val(nome)
        modal.find('#custo').val(custo)
        modal.find('#datalimite').val(('dd M yy', datalimite))
        modal.find('#id').val(id)


    })
</script>
<script type="text/javascript">
    $('#excluirmodal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var url = '\{'+'\{' + 'route' + '(\'destroy\',' + ' [id => '+ id + '])\}\}'

        var modal = $(this)
        modal.find('#excluirform').attr('action', url)

    })
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".up,.down").click(function () {
            var $element = this;
            var row = $($element).parents("tr:first");

            if($(this).is('.up')){
                row.insertBefore(row.prev());
            }
            else{
                row.insertAfter(row.next());
            }
        })});

</script>

</body>
</html>
