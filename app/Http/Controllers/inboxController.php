<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input ;
use App\inbox ;
use App\commande ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB ;

class inboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if(Session::get('user')){
            $messages = inbox::latest()->paginate(5);
            $message_number= inbox::count();
            $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();
        return view('inbox.index', compact('messages','message_number','commandes','cmd_number'));
    } else{
        return view('Admin.loginadmin');
    }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $message = inbox::findOrFail($id);

        return view('.show', compact(''));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        inbox::destroy($id);

        return redirect('/inbox')->with('flash_message', ' deleted!');
    }
}
