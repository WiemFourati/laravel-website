<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App;
use DB ;
use App\inbox ;
use App\commande ;
use App\parametre ;
use App\slider ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input ;

class parametreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
    
        if(Session::get('user')){
        $val = DB::table('parametres')->first();
        $message_number= inbox::count();
        $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();

        return view('Admin.index', compact('val','message_number'));
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
        
        $requestData = $request->all();
        
        
        parametre::create($requestData);

        return view('Admin.index',compact('message_number'))->with('flash_message', ' added!');
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
        $val = parametre::findOrFail($id);

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
        $val = parametre::findOrFail($id);
        $messages=inbox::latest()->paginate(5);
            $message_number= inbox::count();
            $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();

        return view('Admin.index', compact('val','message_number','messages','commandes','cmd_number'));
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
        $messages=inbox::latest()->paginate(5);
            $message_number= inbox::count();
            $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();
        
        $val = parametre::findOrFail($id);
        $val->update($requestData);
        $values = slider::latest()->paginate();

        return view('Admin.index',compact('values','val','message_number','messages','commandes','cmd_number'))->with('flash_message', ' updated!');
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
        parametre::destroy($id);

        return redirect('/Admin')->with('flash_message', ' deleted!');
    }
}
