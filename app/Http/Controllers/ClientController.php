<?php

namespace App\Http\Controllers;

use App\Events\ClientStateChanged;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function connect(): JsonResponse
    {

        // Get the user and change its client state
        $user = auth()->user();
        $user->client_connected = true;
        $user->save();

        // Emit the event
        event(new ClientStateChanged($user->client_connected));

        return response()->json([
            'status' => 'ok'
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function disconnect(): JsonResponse {
        // Get the user and change its client state
        $user = auth()->user();
        $user->client_connected = false;
        $user->save();

        // Emit the event
        event(new ClientStateChanged($user->client_connected));

        return response()->json([
            'status' => 'ok'
        ]);
    }
}
