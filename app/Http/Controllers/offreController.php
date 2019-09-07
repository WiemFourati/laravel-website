<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App;
use App\offre ;
use App\inbox ;
use App\commande ;
use Illuminate\Support\Facades\Input ;


use DB ;

use Illuminate\Http\Request;

class offreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if(Session::get('user')){
            $offres = offre::latest()->paginate();
            $messages=inbox::latest()->paginate(5);
            $message_number= inbox::count();
            $categories=DB::table('category')->where('type','LIKE','%'.'offre'.'%')->get();
            $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();

        return view('offre.index', compact('commandes','cmd_number','offres','messages','message_number','categories'));
    } else{
        return view('Admin.loginadmin');
    }
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
        
        offre::create([
            'nomoffre' => request('nomoffre'),
            'description' => request('description'),
            'categorie'=>request('categorie')
        ]);

        return redirect('/offre');
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
        $offre = offre::findOrFail($id);

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
        $offre = offre::findOrFail($id);
        $messages=inbox::latest()->paginate(5);
            $message_number= inbox::count();
            $categories=DB::table('category')->where('type','LIKE','%'.'offre'.'%')->get();
            $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();
        return view('offre.edit', compact('commandes','cmd_number','offre','messages','message_number','categories'));
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
        
        $offre = offre::findOrFail($id);
        $offre->update($requestData);

        return redirect('/offre');
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
        offre::destroy($id);

        return redirect('/offre');
    }
}
