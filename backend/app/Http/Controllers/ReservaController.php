<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DateTime;
use App\Models\Reserva;
use App\Models\Cliente;

class ReservaController extends Controller
{
    public function create() {
        return view('reserva');
    }

    public function store(Request $request) {
        
        // Variaveis para completar a reserva
        $nome = $request->input('nome');
        $data = $request->input('data');
        $horas = $request->only('horas');
        $pessoas = $request->only('pessoas');
        
        // Cliente precisa estar autenticado
        $cliente = auth()->user();   
        
        // Variavel com a data de hoje para comparação
        $hoje = date('Y/m/d');
        
        // Confere se a data foi preenchida
        if($data==null){
            return redirect(route('reservar'))->with('error', 'Reserva incompleta, escolha uma data');
        // Confere se a data preenchida é anterior ao dia de hoje
        }elseif($data < $hoje){
            return redirect(route('reservar'))->with('error', 'A data já passou, escolha uma data futura');
        }
              
        // Nova Reserva
        $reserva = new Reserva;

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
        return redirect(route('autenticado'))->with('msg', 'Reserva criada com sucesso!');
    }

    public function show($id) {

        // $reserva = Reserva::findOrFail($id);

        // $cliente = auth()->user();
        // $doCliente = false;

        // $reservasFeitas = $cliente->reservasFeitas;

        // if($cliente) {

        //     $clienteReservas = $cliente->reservasFeitas->toArray();
        //     $doCliente = false;

        //     foreach($clienteReservas as $clienteReserva) {
        //         if($clienteReserva['id'] == $id) {
        //             $doCliente = true;
        //         }
        //     }
        // }
        // $donoReserva = Cliente::where('id', $reserva->cliente_id)->first()->toArray();
        
        return view(route('reserva_dashboard'));
    }

    public function dashboard() {

        $cliente = auth()->user();

        $reservas = $cliente->reservas->toArray();

        return view(route('reservas_dashboard'));
    }

    public function destroy($id){

        Reserva::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Reserva excluída com sucesso!');
    }

    public function edit($id) {

        $reserva = Reserva::findOrFail($id);

        return view('reservas.edit', ['reserva' => $reserva]);

    }

    public function update(Request $request) {

        $data = $request->all();

        Reserva::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'A reserva foi editada com sucesso!');
    }
}