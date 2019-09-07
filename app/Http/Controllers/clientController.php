<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input ;
use Illuminate\Support\Facades\Session;

use App\client;
use App\inbox ;
use App\category ;
use App\commande ;
use DB ;

use Illuminate\Http\Request;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if(Session::get('user')){
            $clients = client::latest()->paginate();
            $messages=inbox::latest()->paginate(5);
            $message_number= inbox::count();
            $categories=DB::table('category')->where('type','LIKE','%'.'client'.'%')->get();
            $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();

        return view('client.index', compact('clients','messages','message_number','categories','commandes','cmd_number'));
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
        $nom=$request->nom ;
        $image=$request->file('image');
        $input['imagename']= time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$input['imagename']);

        $image1=$request->file('image1');
        $input['imagename1']= time().'.'.$image1->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image1->move($destinationPath,$input['imagename1']);
        
        client::create([
            'nom' => $nom,
            'nomsociete'=>request('nomsociete'),
            'image_manager'=>$input['imagename1'],
            'categorie'=>Input::get('categorie'),
            'phone_number'=>request('phone_number'),
            'email'=>request('email'),
            'message'=>request('message'),
            'url_logo'=> $input['imagename']
        ]);
        
       
        return redirect('/client');
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
        $client = client::findOrFail($id);

        return redirect('/client', compact('client'));
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
        $valeur = client::findOrFail($id);
        $messages=inbox::latest()->paginate(5);
        $message_number= inbox::count();
        $categories=DB::table('category')->where('type','LIKE','%'.'client'.'%')->get();
        $commandes= commande::latest()->paginate(5);
        $cmd_number=commande::count();

        return view('client.edit', compact('commandes','cmd_number','messages','message_number','valeur','categories'));
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
        
        $client = client::findOrFail($id);
        $client->update($requestData);

        return redirect('/client');
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
        client::destroy($id);

        return redirect('/client')->with('flash_message', ' deleted!');
    }
}
