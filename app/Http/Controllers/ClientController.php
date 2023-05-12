<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Repositories\ClientRepository;

class ClientController extends Controller
{
    protected $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function index()
    {
        $clients = $this->clientRepository->getAllClients();

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(CreateClientRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['image'] = $request->hasFile('image') ? Helper::uploadImage($request, 'image', 'public/images') : null;

        $this->clientRepository->createClient($validatedData);

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    public function show($id)
    {
        $client = $this->clientRepository->getClientById($id);

        return view('clients.show', compact('client'));
    }

    public function edit($id)
    {
        $client = $this->clientRepository->getClientById($id);

        return view('clients.edit', compact('client'));
    }

    public function update(UpdateClientRequest $request, $id)
    {
        $client = $this->clientRepository->getClientById($id);

        $validatedData = $request->validated();

        $image = Helper::uploadImage($request, 'image', 'public/images');

        if ($image) {
            $validatedData['image'] = $image;
        }

        $this->clientRepository->updateClient($client, $validatedData);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy($id)
    {
        $client = $this->clientRepository->getClientById($id);

        $this->clientRepository->deleteClient($client);

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
