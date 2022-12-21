<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DateTime;
use App\Http\Requests;
use App\Models\Reserva;
use App\Models\Cliente;

class ReservaController extends Controller
{
    public function index(){
        // $reservas = Reserva::all();

        $reservas = "teste";
        
        return ($reservas);
    }
    
    public function create() {
        return view('reserva');
    }

    public function store(Request $request) {
        
        // Nova Reserva
        $reserva = new Reserva;

        // Variaveis para completar a reserva
        $nome = $request->input('nome');
        $data = $request->input('data');
        $horas = $request->only('horas');
        $pessoas = $request->only('pessoas');
        
        // Cliente precisa estar autenticado
        // $cliente = auth()->user();   
        
        // Variavel com a data de hoje para comparação
        $hoje = date('Y/m/d');

        // Confere se a data foi preenchida
        if($data==null){
            return redirect(route('reservar'))->with('error', 'Reserva incompleta, escolha uma data');
        // Confere se a data preenchida é anterior ao dia de hoje
        }elseif($data < $hoje){
            return redirect(route('reservar'))->with('error', 'A data já passou, escolha uma data futura');
        }

        // Se o cliente não preencher o nome, pegamos o nome do cliente logado
        if($nome==null){
            $request->nome = $cliente->nome;
        }
        // Pegando os valores
        $reserva->nome = $request->nome;
        $reserva->data = $request->data;
        $reserva->horas = $request->horas;
        $reserva->pessoas = $request->pessoas;
        $reserva->cliente_id = $cliente->id;

        // Salvando a reserva no banco
        $reserva->save();

        // Feedback de sucesso
        return redirect(route('painel'))->with('msg', 'Reserva criada com sucesso!');
    }

    public function dashboard() {

        // Cliente precisa estar autenticado
        // $cliente = auth()->user();

        // As reservas tem que ser no cliente
        $reservas = $cliente->reservas;

        return view('dashboard', ['reservas' => $reservas]);
    }

    public function destroy($id){

        // Procura a reserva pelo id
        Reserva::findOrFail($id)->delete();

        // Feedback de exclusão com sucesso
        return redirect('/dashboard')->with('msg', 'Reserva excluída com sucesso!');
    }

    public function edit($id) {

        // Cliente precisa estar autenticado
        // $cliente = auth()->user();

        // Procura o id da reserva
        $reserva = Reserva::findOrFail($id);

        // Se não encontrar leva para o painel
        if($cliente->id != $reserva->cliente_id) {
            return redirect('/dashboard');
        }

        // Direciona para edição
        return view('reserva/edit', ['reserva' => $reserva]);

    }

    public function update(Request $request) {

        // Puxa todos os dados da reserva em forma de array
        // $dados = $request->all();

        // // Variavel com a data de hoje para comparação
        // $hoje = date('Y/m/d');

        //  // Confere se a data foi preenchida
        //  if($request->data==null){
        //     return redirect(url('reserva/edit/' . $request->id ))->with('error', 'Reserva incompleta, escolha uma data');
        // // Confere se a data preenchida é anterior ao dia de hoje
        // }elseif($request->data < $hoje){
        //     return redirect(url('/reserva/edit/' . $request->id ))->with('error', 'A data já passou, escolha uma data futura');
        // }

        // // Procura o id da reserva e atualiza os dados
        // Reserva::findOrFail($request->id)->update($dados);
    
        // // Feedback de sucesso
        // return redirect(route('painel'))->with('msg', 'Reserva editada com sucesso!');
    }
}