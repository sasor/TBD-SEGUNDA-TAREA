<?php

namespace App\Observers;

use App\Usuario;

class UsuarioObserver
{
    // HELPING THIS URL--
    // https://laracasts.com/discuss/channels/general-discussion/model-events-and-observers-in-laravel-50?page=1
    // https://laracasts.com/discuss/channels/eloquent/where-to-register-model-events-observers
    // https://bosnadev.com/2014/12/28/laravel-model-observers/ ---- > GOOD
    public function retrieved(Usuario $user)
    {
        //
    }

    public function saving(Usuario $user)
    {
        //
    }

    public function saved(Usuario $user)
    {
        //
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
