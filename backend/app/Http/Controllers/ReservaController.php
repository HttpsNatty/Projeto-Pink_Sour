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
        
        $nome = $request->nome;
        $data = $request->input('data');
        $horas = $request->only('horas');
        $pessoas = $request->only('pessoas');
        
        $cliente = auth()->user();   
             
        $hoje = date('Y/m/d');

        if($nome==null){
            $nome = $cliente->nome;
        }
        
        if($data==null){
            return redirect(route('reservar'))->with('error', 'Reserva incompleta, escolha uma data');
        }elseif($data < $hoje){
            return redirect(route('reservar'))->with('error', 'A data já passou, escolha uma data futura');
        }
                
        $reserva = new Reserva;

        $reserva->nome = $request->nome;
        $reserva->data = $request->data;
        $reserva->horas = $request->horas;
        $reserva->pessoas = $request->pessoas;
        $reserva->cliente_id = $cliente->id;

        $reserva->save();

        return redirect(route('agendar'))->with('msg', 'Reserva criada com sucesso!'); //mudar pro dashboard

    }

    public function show() {

        $reserva = Reserva::findOrFail($id);

        $cliente = auth()->user();
        $doCliente = false;

        $reservasFeitas = $cliente->reservasFeitas;

        if($cliente) {

            $clienteReservas = $cliente->reservasFeitas->toArray();
            $doCliente = false;

            foreach($clienteReservas as $clienteReserva) {
                if($clienteReserva['id'] == $id) {
                    $doCliente = true;
                }
            }
        }
        $donoReserva = Cliente::where('id', $reserva->cliente_id)->first()->toArray();
        
        return view('reservas.show', ['reserva' => $reserva]);
    }

    public function dashboard() {

        $cliente = auth()->user();

        $reservas = $cliente->reservas->toArray();

        return view('reservas.dashboard', 
            ['reservas' => $reservas, 'reservasFeitas' => $reservasFeitas]
        );
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