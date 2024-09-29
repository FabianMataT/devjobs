<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    public function __invoke(Request $request)
    {
        $notificaciones = auth()->user()->unreadNotifications;
        $historialNotificaciones = auth()->user()->readNotifications;

        //Limpiar notificaciones 
        auth()->user()->unreadNotifications->markAsRead();

        return view('notificaciones.index', [
            'notificaciones' => $notificaciones,
            'historialNotificaciones' => $historialNotificaciones
        ]);
    }
}
