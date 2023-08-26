<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Record;
use App\Models\User;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function getDataClients()
    {
        $clients = Client::all();

        return view('pages/clients', compact('clients'));
    }

    public function delete($id)
    {
        Client::where('id', $id)->delete();
        Record::where('client_id', $id)->update(['hidden' => 1]);

        return redirect()->route('clients')->with('success', 'Клиент успешно удалён');
    }
}
