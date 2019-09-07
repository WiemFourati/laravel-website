<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input ;
use App\employer ;
use App\commande ;
use App;
use DB ;
use App\inbox ;
use Illuminate\Http\Request;

class employerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = 25;
        if(Session::get('user')){

        $valeurs = employer::latest()->paginate($perPage);
        $messages=inbox::latest()->paginate(5);
        $message_number= inbox::count();
        $categories=DB::table('category')->where('type','LIKE','%'.'employer'.'%')->get();
        $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();
        return view('employer.index', compact('commandes','cmd_number','valeurs','messages','message_number','categories'));
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
        return view('employer.create');
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
        $nomemployer=$request->nomemployer;
        $email=$request->email;
        $message=$request->message;
        $categorie=$request->categorie;
        $image=$request->file('image');
        $input['imagename']= time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$input['imagename']);
        
        employer::create([
            'nomemployer'=>$nomemployer ,
            'email'=>$email,
            'categorie'=>$categorie,
            'url_photo'=> $input['imagename'],
            'message'=>$message
        ]);
      

        return redirect('/employer');
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
        $valeur = employer::findOrFail($id);

        return view('employer.show', compact('valeur'));
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
        $categories=DB::table('category')->where('type','LIKE','%'.'employer'.'%')->get();
        $valeur = employer::findOrFail($id);
        $messages=inbox::latest()->paginate(5);
        $message_number= inbox::count();
        $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();

        return view('employer.edit', compact('commandes','cmd_number','valeur','messages','message_number','categories'));
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
        $image=$request->file('image');
        $nomemployer=$request->nomemployer;
        $email=$request->email;
        $message=$request->message;
        $categorie=$request->categorie;
        $input['imagename']= time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$input['imagename']);
        DB::table('employer')
            ->where('id', $id)
            ->update(['nomemployer'=>$nomemployer, 'email'=>$email,'categorie'=>$categorie,'url_photo' => $input['imagename'],'message'=>$message]);
        
       

        return redirect('/employer');
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
        employer::destroy($id);
        
        return redirect('/employer');
        
    }
    public function getSearch(Request $request){
        $categories=DB::table('category')->where('type','LIKE','%'.'employer'.'%')->get();
        $nomemp=$request->nomemployer;
        $messages=inbox::latest()->paginate(5);
        $message_number= inbox::count();
        $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();
        if($nomemp!=""){
        $valeurs=DB::table('employer')->where('nomemployer','LIKE','%'.$nomemp.'%')->get();
    
        }else{
            $valeurs= employer::latest()->paginate();
       
        }
        return view('employer.index',compact('commandes','cmd_number','valeurs','messages','message_number','categories'))->with('flash_message','enter your research key !');
    }
}
