<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input ;
use App\slider;
use App\inbox ;
use App\commande ;
use Illuminate\Http\Request;
use DB ;

class sliderController extends Controller
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

            $values = slider::latest()->paginate($perPage);
            $messages=inbox::latest()->paginate(5);
            $message_number= inbox::count();
            $categories=DB::table('category')->where('type','LIKE','%'.'slider'.'%')->get();
            $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();

        return view('Admin.index', compact('commandes','cmd_number','values','messages','message_number','categories'));
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
        $title=$request->title ;
        $text=$request->text ;
        $url_button=$request->url_button;
        $image=$request->file('image');
        $input['imagename']= time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$input['imagename']);
        
        slider::create([
            'title' => $title,
            'text' => $text,
            'url_button'=>$url_button ,
            'url_image'=> $input['imagename']
        ]);
    
        return redirect('/Admin');
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
        $value = slider::findOrFail($id);

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
        $value = slider::findOrFail($id);
        $messages=inbox::latest()->paginate(5);
            $message_number= inbox::count();
            $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();

        return view('Admin.update', compact('commandes','cmd_number','value','messages','message_number'));
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
    { $image=$request->file('image');
        $title=$request->title;
        $text=$request->text;
        $url_button=$request->url_button;
        $input['imagename']= time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$input['imagename']);
        DB::table('slider')
            ->where('id', $id)
            ->update(['title'=>$title, 'text'=>$text,'url_button'=>$url_button,'url_image' => $input['imagename']]);
        $messages=inbox::latest()->paginate(5);
            $message_number= inbox::count();
            $values = slider::latest()->paginate();
            $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();

        return view('Admin.index',compact('commandes','cmd_number','messages','message_number','values'))->with('flash_message', ' updated!');
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
        slider::destroy($id);

        return redirect('/Admin')->with('flash_message', ' deleted!');
    }
    public function getSearch(Request $request){
        $title=$request->title;
        $text=$request->text ;
        $messages=inbox::latest()->paginate(5);
        $message_number= inbox::count();
        $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();
        if($title!=""||$text!=""){
        $first=DB::table('slider')->where('text','LIKE','%'.$text.'%');
        $values=DB::table('slider')->where('title','LIKE','%'.$title.'%')
        ->union($first)
        ->get();
        }else{
            $values=slider::latest()->paginate();
        }
        return view('Admin.index', compact('values','messages','message_number','commandes','cmd_number'));
    }
}
