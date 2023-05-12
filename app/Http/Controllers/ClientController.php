<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->paginate(10);

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }



    public function update(UpdateClientRequest $request, Client $client)
    {
        $validatedData = $request->validated();

        $image = Helper::uploadImage($request, 'image', 'public/images');

        if ($image) {
            $validatedData['image'] = $image;
        }

        $client->update($validatedData);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }


    public function store(CreateClientRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['image'] = $request->hasFile('image') ? Helper::uploadImage($request, 'image', 'public/images') : null;

        Client::create($validatedData);

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }


    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }



    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
