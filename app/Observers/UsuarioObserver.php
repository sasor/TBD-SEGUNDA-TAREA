<?php

namespace App\Observers;

use App\Session;
use App\Usuario;
use App\Bitacora;
use Illuminate\Support\Facades\Auth;

class UsuarioObserver
{
    // HELPING THIS URL--
    // https://laracasts.com/discuss/channels/general-discussion/model-events-and-observers-in-laravel-50?page=1
    // https://laracasts.com/discuss/channels/eloquent/where-to-register-model-events-observers
    // https://bosnadev.com/2014/12/28/laravel-model-observers/ ---- > GOOD
    
    public function retrieved(Usuario $user)
    {
        $token = session()->get('username');

        /*$current_session = Session::where('token', $token)->get()->first();
        $usuario = '';
        if (!isset($current_session)) {
            $usuario = $token;
        } else {
            $id = $current_session->usuario_id;
            $usuario = Usuario::find($id);
        }*/

        $data_old = implode(',', [$user->username, $user->password]);

        Bitacora::create([
            'data_old' => $data_old,
            'operacion' => 'SELECT',
            'on_table' => 'usuario',
            'usuario' => $token//$logged->username
        ]);
    }

    public function saving(Usuario $user)
    {
        $token = session()->get('username');
        $data_old = implode(',', [$user->username, $user->password]);

        Bitacora::create([
            'data_new' => $data_old,
            'operacion' => 'INSERT-saving',
            'on_table' => 'usuario',
            'usuario' => $token
        ]);
    }

    public function saved(Usuario $user)
    {
        $token = session()->get('username');
        $data_old = implode(',', [$user->username, $user->password]);

        Bitacora::create([
            'data_new' => $data_old,
            'operacion' => 'INSERT-saved',
            'on_table' => 'usuario',
            'usuario' => $token
        ]);
    }

    public function created(Usuario $user)
    {
        //
    }

    public function creating(Usuario $user)
    {
        //
    }

    public function updating(Usuario $user)
    {
        //
    }

    public function updated(Usuario $user)
    {
        //
    }

    public function deleting(Usuario $user)
    {
        //
    }

    public function deleted(Usuario $user)
    {
        //
    }

    public function restoring(Usuario $user)
    {
        //
    }

    public function restored(Usuario $user)
    {
        //
    }
}
