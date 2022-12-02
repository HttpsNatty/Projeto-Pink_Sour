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

        $reserva = new Reserva;
        
        $hoje = date('d/m/Y');
        
        $reserva->data = $request->data;
        $reserva->horas = $request->horas;
        $reserva->pessoas = $request->pessoas;

        if($reserva->data < $hoje){
            return redirect(route('reserva'))->with('error', 'A data já passou');
        }

        $cliente = auth()->user();
        $reserva->cliente_id = $cliente->id;
        
        $reserva->save();

        return redirect(route('agendar'))->with('msg', 'Reserva criada com sucesso!');

    }

    public function show($id) {

        $reserva = Reserva::findOrFail($id);

        $cliente = auth()->user();
        $hasclienteJoined = false;

        if($cliente) {

            $clienteReservas = $cliente->reservasFeitas->toArray();

            foreach($clienteReservas as $clienteReserva) {
                if($clienteReserva['id'] == $id) {
                    $hasclienteJoined = true;
                }
            }
        }

        $reservaOwner = Cliente::where('id', $reserva->cliente_id)->first()->toArray();

        return view('reserva.show', ['reserva' => $reserva, 'reservaOwner' => $reservaOwner,  'hasclienteJoined' => $hasclienteJoined]);
        
    }

    public function dashboard() {

        $cliente = auth()->cliente();

        $reservas = $cliente->reservas;

        $reservasFeitas = $cliente->reservasFeitas;

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