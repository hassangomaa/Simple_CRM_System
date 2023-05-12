<?php

namespace App\Repositories;

use App\Models\Client;

class ClientRepository
{
    public function getAllClients()
    {
        return Client::latest()->paginate(10);
    }

    public function createClient($data)
    {
        return Client::create($data);
    }

    public function getClientById($id)
    {
        return Client::findOrFail($id);
    }

    public function updateClient($client, $data)
    {
        return $client->update($data);
    }

    public function deleteClient($client)
    {
        return $client->delete();
    }
}
