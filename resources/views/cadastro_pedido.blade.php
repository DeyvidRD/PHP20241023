<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar usuario</title>
</head>
<body>
  <div class="pedido">

    <form action="/cadastrar_pedido" method="post">
      @csrf
      <label for="user">User:</label>
      <select name="user" id="user">
      
        @foreach($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>  
        @endforeach
      </select>
      <ul>
        @foreach($produtos as $produto)
          <li>
              <span>{{ $produto->nome }} - ${{ $produto->preco }}</span>
              <input type="number" name="items[{{ $produto->id }}]" min="0" value="0">
          </li>
        @endforeach
    </ul>

      <button type="submit">Cadastrar</button>
    </form>
  </div>
</body>
</html>

