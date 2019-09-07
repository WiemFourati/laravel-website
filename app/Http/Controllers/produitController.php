<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input ;
use Illuminate\Support\Facades\Session;

use App\produit ;
use App\category ;
use App\inbox ;
use App\commande ;
use DB ;
use App;
use Illuminate\Http\Request;

class produitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if(Session::get('user')){
            $produits = produit::latest()->paginate();
        
            $categories=DB::table('category')->where('type','LIKE','%'.'produit'.'%')->get();
        $messages=inbox::latest()->paginate(5);
            $message_number= inbox::count();
            $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();
        return view('produit.index', compact('commandes','cmd_number','produits','categories','message_number','messages'));
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
        
        produit::create([
            'nomproduit' => request('nomproduit'),
            'designation' => request('designation'),
            'categorie'=>Input::get('categorie')
        ]);
        $flash_message='added!';
        return redirect('/produit')->with(compact($flash_message));
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
        $valeur = produit::findOrFail($id);

        return view('produit.show', compact('valeurs'));
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
        $categories= DB::table('category')->where('type', 'LIKE','%'.'produit'.'%')->get();
        $valeur = produit::findOrFail($id);
        $messages=inbox::latest()->paginate(5);
            $message_number= inbox::count();
            $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();

        return view('produit.edit', compact('categories','commandes','cmd_number','valeur','messages','message_number'));
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
        $input['imagename']= time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$input['imagename']);
        
        DB::table('imageproduit')->insert(
            ['idproduit' => $id,
            'url'=> $input['imagename']]
        );
            
        
        
        $requestData = $request->all();
        
        $valeur = produit::findOrFail($id);
        $valeur->update($requestData);

        return redirect('/produit')->with('flash_message', ' updated!');
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
        produit::destroy($id);

        return redirect('/produit')->with('flash_message', ' deleted!');
    }
    public function getSearch(Request $request){
        $recherche=$request->nomproduit;
        $categories=category::pluck('namecategory');
        $messages=inbox::latest()->paginate(5);
            $message_number= inbox::count();
            $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();
        if($recherche!=""){
        $produits=DB::table('produit')->where('nomproduit','LIKE','%'.$recherche.'%')->get();
 
        }else{
            $produits = produit::latest()->paginate();
            
        }
        return view('produit.index',compact('commandes','cmd_number','produits','categories','messages','message_number'))->with('flash_message','enter your research key !');
    }
}
