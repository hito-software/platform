<?php

namespace Hito\Platform\Http\Controllers;

use Hito\Platform\Models\Client;
use Hito\Platform\Services\ClientService;
use Hito\Platform\Services\CountryService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ClientController extends Controller
{
    public function __construct(private ClientService  $clientService)
    {
        $clientClass = Client::class;
        $this->middleware("can:clients.view,{$clientClass}")->only(['index']);
    }

    /**
     * @return View
     */
    public function index()
    {
        $clients = $this->clientService->getAllPaginated();

        return view('hito::clients-index', compact('clients'));
    }

    /**
     * @param Client $client
     * @return View
     */
    public function show(Client $client)
    {
        $country = $client->country;

        return view('hito::clients-show', compact('client', 'country'));
    }
}
