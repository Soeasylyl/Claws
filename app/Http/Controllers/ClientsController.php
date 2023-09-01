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
        $clients = Client::where('hidden', false)
            ->orderBy('created_at', 'desc') // Сортировка по убыванию даты создания
            ->paginate(7);

        return view('pages.clients', compact('clients'));
    }

    public function addClient(
        Request $request,
    )
    {
        $errors = [];

        $description = $request->input('description');
        if (strlen($description) < 3 || strlen($description) > 500) {
            $errors[] = [
                'type' => 'description',
                'message' => 'Ошибка в описании. Допустимая длина: от 3 до 500 символов.',
            ];
        }

        $name = $request->input('name');
        if (strlen($name) < 3 || strlen($name) > 40) {
            $errors[] = [
                'type' => 'name',
                'message' => 'Ошибка в имени. Допустимая длина: от 3 до 40 символов.',
            ];
        }

        $contacts = $request->input('contacts');
        if (strlen($contacts) < 5 || strlen($contacts) > 40) {
            $errors[] = [
                'type' => 'contacts',
                'message' => 'Ошибка в контактах. Допустимая длина: от 5 до 40 символов.',
            ];
        }

        if (!empty($errors)) {
            return [
                'status' => false,
                'errors' => $errors,
            ];
        }

        try {
            $newClient = new Client();
            $newClient->name = $request->input('name');
            $newClient->description = $description;
            $newClient->contacts = $request->input('contacts');
            $newClient->hidden = false;
            $newClient->save();
        } catch (\Exception $e) {
            return [
                'status' => false,
                'errors' => $e->getMessage(),
            ];
        }

        return [
            'status' => true,
        ];
    }

    public function updateClient(
        Request $request
    )
    {
        $errors = [];

        $description = $request->input('description');
        if (strlen($description) < 3 || strlen($description) > 500) {
            $errors[] = [
                'type' => 'description',
                'message' => 'Ошибка в описании. Допустимая длина: от 3 до 500 символов.',
            ];
        }

        $name = $request->input('name');
        if (strlen($name) < 3 || strlen($name) > 40) {
            $errors[] = [
                'type' => 'name',
                'message' => 'Ошибка в имени. Допустимая длина: от 3 до 40 символов.',
            ];
        }

        $contacts = $request->input('contacts');
        if (strlen($contacts) < 5 || strlen($contacts) > 40) {
            $errors[] = [
                'type' => 'contacts',
                'message' => 'Ошибка в контактах. Допустимая длина: от 5 до 40 символов.',
            ];
        }

        if (!empty($errors)) {
            return [
                'status' => false,
                'errors' => $errors,
            ];
        }

        try {
            Client::where('id', $request->input('id'))
                ->update(
                    [
                        'name' => $request->input('name'),
                        'description' => $request->input('description'),
                        'contacts' => $request->input('contacts'),
                    ]
                );

        } catch (\Exception $e) {
            return [
                'status' => false,
                'errors' => $e->getMessage(),
            ];
        }

        return [
            'status' => true,
        ];
    }


    public function deleteClient($id)
    {
        $client = Client::find($id);
        $recordsExist = Record::where('client_id', $id)->exists();

        if ($recordsExist) {
            Record::where('client_id', $id)->update(['hidden' => 1]);
            $client->update(['hidden' => 1]);
        } else {
            $client->delete();
        }


        return redirect()->route('clients')->with('success', 'Клиент успешно удалён');
    }
}
