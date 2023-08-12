<?php

namespace App\Http\Controllers;

use App\Models\Entre;
use App\Models\Produit;
use App\Models\ProduitVent;
use App\Models\Sortie;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProduitController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function ajouter_produit(){
        $user=Auth::user();
    $accesslevel=$user->type;
    if($accesslevel==="admin")
    {
        return view('stock.ajouterproduit');
    }
    else{
        return response()->json(['message ' => 'vous etes pas um admin !!']);

    }
    }
    public function add_Produit(Request $request)
    {
        $user=Auth::user();
        $accesslevel=$user->type;
        if($accesslevel==="admin")
        {
        $request->validate([
            'quantité' => 'required',
            'nom' => 'required',
            'catégorie' => 'required',
            'prix' => 'required',
        ]);

        $produit = Produit::create([
            'quantité' =>$request->input('quantité'),
            'nom' => $request->input('nom'),
            'catégorie' => $request->input('catégorie'),
            'prix' => $request->input('prix'),
            
        ]);
    //   dd($produit);
       //return $this->success([$produit],'the request was successful',200);
    
     return redirect()->route('affichage_produits');    
     
    }else{
        return response()->json(['message ' => 'vous etes pas um admin !!']);

    }

    }

    public function show_produit_add(string $id){
        $user=Auth::user();
        $accesslevel=$user->type;
        if($accesslevel==="admin")
        {
       $produit = Produit::findOrFail($id);
       $nom = $produit->nom;
       $quantité = $produit->quantité;
       $catégorie = $produit->catégorie;
       $prix = $produit->prix;
       $id = $produit->id;

    //    dd($nom); 

       return view('stock.ajoutquantite', compact('nom','quantité','catégorie','id','prix'));
    }else{
        return response()->json(['message ' => 'vous etes pas um admin !!']);

    }
    
    }

    public function Add_quantite(Request $request,string $id ){

        $user=Auth::user();
        $accesslevel=$user->type;
        if($accesslevel==="admin")
        {
        $produit = Produit::findOrFail($id);
        $id_produit = $produit->id;
        
        $qtu = $produit->quantité;
       // dd($qtu);
       $request->validate([
        'quantité' => 'required',
        'date' => 'required|date'
    ]);
      
           
                $produit->quantité = $request->input('quantité') + $qtu;
                //dd($produit->quantité,$qtu); 
                $produit->update();

                $entre = Entre::create([
                    'quantité' =>$request->input('quantité') ,
                    'id_produit' =>  $id_produit,
                    'date' => $request->input('date'),
                ]);
                //dd($entre);
                $entre->save();
                 return redirect()->route('affichage_produits'); 
                }else{
                    return response()->json(['message ' => 'vous etes pas um admin !!']);
            
                }  
                      
    }

    public function show_produit_sup(string $id){
        
        $user=Auth::user();
        $accesslevel=$user->type;
        if($accesslevel==="admin")
        {
        $produit = Produit::findOrFail($id);
        $nom = $produit->nom;
        $quantité = $produit->quantité;
        $catégorie = $produit->catégorie;
        $id = $produit->id;
        $prix = $produit->prix;
     //    dd($produit); 
        return view('stock.supquantite', compact('nom','quantité','catégorie','id','prix')); 
    }else{
        return response()->json(['message ' => 'vous etes pas um admin !!']);

    }  
     }
 
     public function Sup_quantite(Request $request,string $id ){
        $user=Auth::user();
        $accesslevel=$user->type;
        if($accesslevel==="admin")
        {
         $produit = Produit::findOrFail($id);
         $id_produit = $produit->id;
         
         $qtu = $produit->quantité;
        // dd($qtu);
        $request->validate([
         'quantité' => 'required',
         'date' =>'required|date'
     ]);     
                 $produit->quantité = $qtu - $request->input('quantité')  ;
                 //dd($produit->quantité,$qtu); 
                 $produit->save();
                 
                 $sortie = Sortie::create([
                     'quantité' =>$request->input('quantité') ,
                     'id_produit' =>  $id_produit,
                     'date' => $request->input('date'),
                 ]);
                 $sortie->save();


                 $produitvent = ProduitVent::create([
                    'type_vent' =>$request->input('type_vent'),
                    'id_produit' =>  $id_produit,
                    'quantité' => $request->input('quantité'),
                    'prix_produit' => $produit->prix,
                    'prix_total' =>  $produit->prix * $request->input('quantité'),
                    'date' => $request->input('date'),
                 ]);
                 $produitvent->save();
                // dd( $produit->prix);
                 return redirect()->route('affichage_produits');  
                }else{
                    return response()->json(['message ' => 'vous etes pas um admin !!']);
            
                }
           
            //  return view('stock.affichage');      
     }

     public function show_produits(){
        $user=Auth::user();
        $accesslevel=$user->type;
        if($accesslevel==="normal" || $accesslevel==="admin" )
        {
        $produits = Produit::all();
        $sortie = ProduitVent::All();
        $entre = Entre::all();
        //dd($sortie);
        return view('stock.affichage',compact('produits','entre','sortie'));
    }else{
        return response()->json(['message ' => 'vous etes pas um admin !!']);

    }
     }



     
     public function showentreForDate(Request $request)
     {
        $user=Auth::user();
        $accesslevel=$user->type;
        if($accesslevel==="normal" || $accesslevel==="admin" )
        {
         $specificDate = $request->input('date');
         $entre = Entre::getProductsForDate($specificDate); // Utiliser la bonne méthode
     
         return view('stock.entre', compact('entre','specificDate'));
        }else{
            return response()->json(['message ' => 'vous etes pas um admin !!']);
    
        }
     }
     public function showsortieForDate(Request $request)
     {
        $user=Auth::user();
        $accesslevel=$user->type;
        if($accesslevel==="normal" ||$accesslevel==="admin" )
        {
         $specificDate = $request->input('date');
         $sortie = ProduitVent::getProductsForDate($specificDate); // Utiliser la bonne méthode
     
         return view('stock.sorte', compact('sortie','specificDate'));
        }else{
            return response()->json(['message ' => 'vous etes pas um admin !!']);
    
        }
     }
     
}
