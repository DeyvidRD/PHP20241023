<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
</head>
<body>
    @if(count($pedidos) == 0)
    <h3>Sem pedidos</h3>
    @else
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Itens</th>
            <th>Total</th>
            <th>Ações</th>
        </tr>
        @foreach ($pedidos as $pedido) @foreach ($produtos as $produto)
        <tr>
            <td>{{$pedido->id}}</td>
            <td><h3>Nome Preço Qtde</h3>{{$pedido->items}}</td>
            <td>{{$pedido->preco}}</td>
            <td>
            <form method="POST" action="/deletar_pedido/{{$pedido->id}}">
                @csrf
                {{ method_field("DELETE") }}
                <input type="submit" value="delete pedido">
            </form>
            </td>
        </tr>
        @endforeach
    </table>
    @endif
</body>
</html>