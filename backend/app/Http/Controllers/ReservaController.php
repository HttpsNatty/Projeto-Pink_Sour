<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reserva;

class ReservaController extends Controller
{
    public function create() {
        return view('reserva');
    }

    public function store(Request $request) {

        $reserva = new Reserva;

        $reserva->date = $request->date;
        $reserva->horas = $request->horas;
        $reserva->pessoas = $request->pessoas;

        $cliente = auth()->cliente();
        $reserva->cliente_id = $cliente->id;
        
        $reserva->save();

        return redirect('/reserva')->with('msg', 'Reserva criada com sucesso!');

    }

    public function show($id) {

        $reserva = Reserva::findOrFail($id);

        $cliente = auth()->cliente();
        $hasClienteJoined = false;

        if($cliente) {

            $clienteEvents = cliente->reservasAsParticipant->toArray();

            foreach($clienteReservas as $clienteReserva) {
                if($clienteReserva['id'] == $id) {
                    $hasClienteJoined = true;
                }
            }

        }

        $reservaOwner = Cliente::where('id', $reserva->cliente_id)->first()->toArray();

        return view('reserva.show', ['reserva' => $reserva, 'reservaOwner' => $reservaOwner, 'hasClienteJoined' => $hasClienteJoined]);
        
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