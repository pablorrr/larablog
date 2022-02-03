<?php

namespace App\Http\Controllers;

use App\Models\SessionModel;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**public function getSessionData(Request $request)
     * {
     * if ($request->session()->has('name')) {
     * echo $request->session()->get('name');
     * }
     * else{
     * echo 'no dtata sesion';
     * }
     * }
     *
     * public  function storeSessionData(Request $request){
     * $request->session()->put('name','jennnifer');
     * echo 'data hass been aded to session';
     * }
     *
     *
     *
     * public  function deleteSessionData(Request $request){
     * $request->session()->forget('name');
     * echo 'data hass been removed from the session';
     * }*/

    public function storeSessionData(Request $request)
    {
        $session = new SessionModel;
        $session->name =  $request->session()->push('user.name', 'sandip');
        $session->save();

        echo 'data hass been aded to session';
    }


}
