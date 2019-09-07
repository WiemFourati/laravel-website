<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input ;
use App\inbox ;
use App;
use App\commande ;
use Illuminate\Http\Request;
use App\category ;
use DB ;
use Illuminate\Support\Facades\Session;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if(Session::get('user')){
        $categories = category::latest()->paginate();
        $messages=inbox::latest()->paginate(5);
        $message_number= inbox::count();
        $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();
        return view('category.index', compact('categories','messages','message_number','commandes','cmd_number'));
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
        category::create([
            'namecategory' => request('namecategory'),
            
            'type'=>Input::get('type')
        ]);
        return redirect('/category');
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
        $categ = category::findOrFail($id);
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
        $categ = category::findOrFail($id);
        $messages=inbox::latest()->paginate();
        $message_number= inbox::count();
        $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();
     

        return view('category.edit', compact('categ','messages','message_number','commandes','cmd_number'));
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
        
        $categ =category::findOrFail($id);
        $categ->update($requestData);
 

        return redirect('/category');
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
        category::destroy($id);
      

        return redirect('/category');
    }
    public function getSearch(Request $request){
        
        $messages=inbox::latest()->paginate(5);
        $message_number= inbox::count();
        $categoryname=$request->namecategory;
        $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();
        if($categoryname!=""){
        $categories=DB::table('category')->where('namecategory','LIKE','%'.$categoryname.'%')->get();
    
        return view('category.index', compact('categories','messages','message_number','commandes','cmd_number'));
        }else{
            $categories = category::latest()->paginate();
            return view('category.index',compact('categories','messages','message_number','commandes','cmd_number'))->with('flash_message','enter your research key !');
        }
    }
    
}
