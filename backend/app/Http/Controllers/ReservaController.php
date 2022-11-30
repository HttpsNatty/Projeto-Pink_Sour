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

        // $user = auth()->user();
        // $reserva->user_id = $user->id;
        
        $reserva->save();

        return redirect('/reserva')->with('msg', 'Reserva criada com sucesso!');

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