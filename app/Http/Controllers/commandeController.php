<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB ;
use App\commande;
use App\inbox ;
use Illuminate\Http\Request;

class commandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
            $commandetot = commande::latest()->paginate();
            $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();
            $messages=inbox::latest()->paginate(5);
        $message_number= inbox::count();
      
        return view('commande.index', compact('messages','message_number','commandes','cmd_number','commandetot'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        commande::create($requestData);

        return view('home.produit')->with('flash_message', ' your command was sent successfully !');
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
        $x = commande::findOrFail($id);

        return view('.show', compact(''));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $commande = commande::findOrFail($id);
        $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();
            $messages=inbox::latest()->paginate(5);
        $message_number= inbox::count();

        return view('.edit', compact(''));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $commande = commande::findOrFail($id);
        $commande->update($requestData);

        return redirect('/commande')->with('flash_message', ' updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        commande::destroy($id);

        return redirect('/commande')->with('flash_message', ' deleted!');
    }
}
