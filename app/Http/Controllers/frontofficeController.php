<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB ;
use App\inbox ;
use App\slider ;
use App\parametre ;
use App\produit ;
use App\employer ;
use App\client ;
use App\commande ;
use Illuminate\Http\Request;
use App\Mail\ContactParMail ;
use App\Mail\command ;
use Illuminate\Support\Facades\Input ;

class frontofficeController extends Controller
{
    
   
    public function index(Request $request)
    {
        $sliders = slider::latest()->paginate();
        $trustedby=DB::table('client')->where('categorie','LIKE','%'.'trusted by'.'%')->get();
        $info= parametre::latest()->first();  
        $nb_produit=produit::count();
        $nb_employers=employer::count();
        $nb_clients=client::count();
        $nb_sliders=slider::count();
        $business_growth=$nb_clients+$nb_produit ;

       
        return view('welcome', compact('trustedby','sliders','info','nb_produit','nb_employers','nb_clients','business_growth'));
    }
    public function store(Request $request){
        $name=$request->name ;
        $email=$request->email ;
        $subject=$request->subject ;
        $image=$request->file('cv');
        $input['imagename']= time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/files');
        $image->move($destinationPath,$input['imagename']);
        inbox::create([
            'name' => $name,
            'email' => $email,
            'subject'=>$subject ,
            'url_file'=> $input['imagename'],
            'categorie'=>'carrier'
        ]);
        $sliders = slider::latest()->paginate();
        $info= parametre::latest()->first();
        $nb_produit=produit::count();
        $trustedby=DB::table('client')->where('categorie','LIKE','%'.'trusted by'.'%')->get();
        return view('home.contact', compact('sliders','info','nb_produit','trustedby'))->with('flash_message','you request is sent successfully !');

    }
    public function contact(){
        $trustedby=DB::table('client')->where('categorie','LIKE','%'.'trusted by'.'%')->get();
        $sliders = slider::latest()->paginate();
        $info= parametre::latest()->first();
        $nb_produit=produit::count();
        return view('home.contact', compact('sliders','info','nb_produit','trustedby'));
    }
    public function news(){
        $trustedby=DB::table('client')->where('categorie','LIKE','%'.'trusted by'.'%')->get();
        $avis=DB::table('client')->where('categorie','LIKE','%'.'manager'.'%')->get();

        $sliders = slider::latest()->paginate();
    $info= parametre::latest()->first();
    $nb_produit=produit::count();
        return view('home.news', compact('sliders','info','nb_produit','trustedby','avis'));
    }
    public function services(){
        $trustedby=DB::table('client')->where('categorie','LIKE','%'.'trusted by'.'%')->get();
        $sliders = slider::latest()->paginate();
    $info= parametre::latest()->first();
    $nb_produit=produit::count();
        return view('home.services', compact('sliders','info','nb_produit','trustedby'));
    }
    public function about(){
        $trustedby=DB::table('client')->where('categorie','LIKE','%'.'trusted by'.'%')->get();
        $employers= employer::latest()->paginate(4);
        $sliders = slider::latest()->paginate();
    $info= parametre::latest()->first();
    $nb_produit=produit::count();
        return view('home.about', compact('sliders','info','nb_produit','employers','trustedby'));
    }
    public function touslesproduits(){
        $info= parametre::latest()->first();
        $produits= produit::latest()->paginate();
        return view('home.touslesproduits',compact('info','produits'));
    }
    public function edit($id){
        $info= parametre::latest()->first();
        $produit= produit::findOrFail($id);
        return view('home.produit',compact('info','produit'));
    }
    public function update(Request $request,$id){
        commande::create([
            'nomclient' => request('name'),
            'email' => request('email'),
            'idproduit'=>$id,
            'message'=>request('message'),
            'numero'=>request('phone_number'),
            'quantity'=>request('quantity')
        ]);
        \Mail::to('wiemfourati@outlook.fr')->send(new command($request)); //to('wiemfourati@outlook.fr')->
        \Mail::to($request->email)->send(new command($request)); //to('wiemfourati@outlook.fr')->

        $info= parametre::latest()->first();
        $produit= produit::findOrFail($id);
        $msg="your command is sent successfully";
        return view('home.produit',compact('info','produit','msg'));
    }
        public function sendMail(Request $request){
        $trustedby=DB::table('client')->where('categorie','LIKE','%'.'trusted by'.'%')->get();
        $sliders = slider::latest()->paginate();
    $info= parametre::latest()->first();
    $nb_produit=produit::count();
    inbox::create([
        'name' => request('name'),
        'email' => request('email'),
        'categorie'=>'contact',
        'message'=>request('message')
    ]);
        \Mail::to('wiemfourati@outlook.fr')->send(new ContactParMail($request)); //to('wiemfourati@outlook.fr')->
     return view('welcome', compact('sliders','info','nb_produit','trustedby'))->with('message', 'your message is sent successfuly .');
    }
 
}
