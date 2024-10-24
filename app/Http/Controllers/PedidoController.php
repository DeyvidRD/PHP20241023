<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\User;
use App\Models\Pedido;
use App\Models\PedidoProduto;
class PedidoController extends Controller
{
    public function formCadastrarPedido() {
        $users = User::all();
        $produtos = Produto::all();
        return view("cadastro_pedido", ["users"=>$users, "produtos"=>$produtos]);
    }

    public function listar() {
        $pedidos = Pedido::all();
        
        // Criar uma view para mostrar os pedidos realizados

        // {"id":1,"name":"Rafael da silva","cpf":"33333","email":"email@email.com","created_at":"2024-10-21T10:25:11.000000Z","updated_at":"2024-10-21T10:25:11.000000Z"}
        // [{"id":1,"nome":"batata","descricao":"batata","preco":10,"created_at":"2024-10-21T10:25:26.000000Z","updated_at":"2024-10-21T10:25:26.000000Z","pivot":{"pedido_id":1,"produto_id":1,"quantidade":2,"created_at":"2024-10-21T10:25:34.000000Z"}}]
        return view("pedido", ["pedidos"=>$pedidos]);
    }

    public function deletar($id) {
        $pedido = new Pedido;
        $pedido->find($id)->delete();
        return redirect('/listar_pedidos');
    }

    public function cadastrar(Request $request)
    {
      $items = $request->input('items');
      $user = $request->input('user');
      $pedido = new Pedido;
      $pedido->user_id = $user;
      $pedido->save();
      foreach ($items as $itemId => $quantity) {
          if ($quantity > 0) {
              $pedidoProduto = new PedidoProduto;
              $pedidoProduto->pedido_id = $pedido->id;
              $pedidoProduto->produto_id = $itemId;
              $pedidoProduto->quantidade = $quantity;
              $pedidoProduto->save();
          }
      }

      return redirect('/listar_pedidos');
   }
}
