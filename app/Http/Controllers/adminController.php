<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input ;
use Redirect ;
use DB ;
use App\Admin ;
use App ;
use App\commande ;
use App\inbox ;
use App\slider ;
use App\parametre ;
use App\Http\Requests;

class adminController extends Controller
{
    //
    function index (){
       $username=Session::get('user');
        if(Session::get('user')){
            $values = slider::latest()->paginate();
            $val = DB::table('parametres')->first();
            $messages=inbox::latest()->paginate(5);
            $message_number= inbox::count();
            $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();
            $categories=DB::table('category')->where('type','LIKE','%'.'slider'.'%')->get();

            return view('Admin.index',compact('values','val','messages','message_number','categories','cmd_number','commandes','cmd_number'));
        }else{
            return view('Admin.loginadmin');
            
        }
    }
    public function login(Request $request)
   {
    $email = $request->email;
    $password = $request->password;
       
       if (!isset($request->email) || !isset($request->password))
       {
           $errorlogin = 'Vous devez remplir tous les champs !';            
           return view('Admin.loginadmin');//->with('errorlogin',$errorlogin);
       }
       $user = DB::table('users')->where([['email',$request->email],['password',$request->password]])->first();        
       if (isset($user))
       {
           Session::put('user',$user);
           return redirect('/Admin');
       }else{
           $errorlogin = 'Email et/ou mot de pass erroné(s) !';
           return view('Admin.loginadmin');//->with('errorlogin',$errorlogin);
       }
    }

    public function logout(Request $request){
        Session::flush();
        return redirect('/Admin');
    }
    public function profile(){
        $messages=inbox::latest()->paginate(5);
            $message_number= inbox::count();
            $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();
        return view('Admin.profile',compact('messages','message_number','commandes','cmd_number'));
    }

    public function fileUpload(Request $request){
        $image=$request->file('image');
        $name=$request->name;
        $email=$request->email;
        $password=$request->password;
        $input['imagename']= time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$input['imagename']);
        $iduser=Session::get('user')->id ;
        DB::table('users')
            ->where('id', $iduser)
            ->update(['name'=>$name, 'email'=>$email,'password'=>$password,'image_url' => $input['imagename']]);
            Session::get('user')->image_url=$input['imagename'];
            Session::get('user')->name=$name;
            Session::get('user')->email=$email;
            Session::get('user')->password=$password;
            $messages=inbox::latest()->paginate(5);
            $message_number= inbox::count();
            $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();
        return view('Admin.profile' ,compact('messages','message_number','commandes','cmd_number'));
    }
    public function fileUploadslider(Request $request){
        $image=$request->file('image');
        
        $input['imagename']= time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$input['imagename']);
        $iduser=Session::get('user')->id ;
        DB::table('users')
            ->where('id', $iduser)
            ->update(['image_url' => $input['imagename']]);

            $messages=inbox::latest()->paginate(5);
            $message_number= inbox::count();
            $commandes= commande::latest()->paginate(5);
            $cmd_number=commande::count();
        return view('Admin.profile',compact('messages','message_number','commandes','cmd_number'));
    }



}
