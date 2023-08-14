<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Client;
use App\Models\Entre;
use App\Models\Spa;
use App\Models\Produit;
use App\Models\Produit_histoire;
use App\Models\ProduitVent;
use App\Models\Sortie;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProduitController extends Controller {


    public function chercher_client(){
        $user=Auth::user();
        $accesslevel=$user->type;
        if( $accesslevel === "admin" )
        {
            return view('clients.chercherclient');
        }
        else{
            return response()->json(['message ' => 'vous etes pas um admin !!']);
    
        }
    }
    
    public function find_client(Request $request){
        $user=Auth::user();
        $accesslevel=$user->type;
        if( $accesslevel === "admin" )
        {
        $nom = $request->input('prenom');
        $id_client = null;
        $nom_réceptionniste = null;
        $clients = Client::all();
        $agence = Agence::all();
        foreach($clients as $client){
            if($client->prenom === $nom){
                $id_client = $client->id;
                break;
            }
        }

        //
        


        if($id_client){
            foreach($agence as $singleAgence){
                if($singleAgence->id_client === $id_client){
                    $nom_réceptionniste = $singleAgence->nom_réceptionniste;
                    break;
                }
            }
            
            return view('riad.ajouterSpa',compact('id_client','nom_réceptionniste')); }
        else{return view('clients.chercherclient',['error'=>'Le client '.$nom." does not exist"]);}
        }
        else{
            return response()->json(['message ' => 'vous etes pas um admin !!']);
    
        }
    }



    public function storeSpa(Request $request,$id_client){
        $user=Auth::user();
        $accesslevel=$user->type;
        if($accesslevel==="admin")
        {
        $request->validate([
            'id_réservation' => 'required',
            'nom_réceptionniste' => 'required',
            'nom_soin' => 'required',
            // 'id_client' => 'required',
            'date' => 'required',
            'prix' => 'required',
        ]);
        $dateFormatted = Carbon::createFromFormat('Y-m-d', $request->input('date'))->toDateString();
       $spa = Spa::create([
            'id_réservation' =>$request->input('id_réservation'),
            'catégorie' => $request->input('catégorie'),
            'dépense' => $request->input('dépense'),
            'nom_réceptionniste' => $request->input('nom_réceptionniste'),
            'somme' => $request->input('somme'),
            'nom_soin' => $request->input('nom_soin'),
            'prix' => $request->input('prix'),
            'id_client' => $id_client,
            'type_payment' => $request->input('type_payment'),
            'date' => $dateFormatted,
            'name_riad' => $request->input('name_riad'),
        ]);
        return redirect()->route('afficherSpa');

    }else{
        return response()->json(['message ' => 'vous etes pas um admin !!']);


    }}
    
    public function ShowSpa(){
        $user=Auth::user();
        $accesslevel=$user->type;
        if( $accesslevel === "admin" )
        {
        $spas = Spa::all();
         return view('riad.afficherSpa',compact('spas'));
        }
        else{
            return response()->json(['message ' => 'vous etes pas um admin !!']);
    
        }
    }

    public function dashboard(){
          return view('dashboard');
        }
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
        $produit_h = Produit_histoire::create([
            'quantité' =>$request->input('quantité'),
            'nom' => $request->input('nom'),
            'catégorie' => $request->input('catégorie'),
            'prix' => $request->input('prix'),
            'date' => $produit->created_at,
            
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

    public function Add_quantite(Request $request , string $id ){

        $user=Auth::user();
        $accesslevel=$user->type;
        if( $accesslevel==="admin")
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
                // $produit->prix = $request->input('prix');
                //dd($produit->quantité,$qtu); 
                $produit->update();

                $entre = Entre::create([
                    'quantité' =>$request->input('quantité') ,
                    'id_produit' =>  $id_produit,
                    'date' => $request->input('date'),
                ]);
                //dd($entre);
                $entre->save();
                 
                $produit_h = Produit_histoire::create([
                    'quantité' =>$qtu +  $request->input('quantité'),
                    'nom' => $produit->nom,
                    'catégorie' => $produit->catégorie,
                    'prix' => $produit->prix,
                    'date' => $request->input('date'),
                    'etat' => 'ENTRER' ,                  
                ]);
                 return redirect()->route('affichage_produits'); 
                }else{
                    return response()->json(['message ' => 'vous etes pas um admin !!']);
            
                }  
                      
    }

    public function show_produit_sup(string $id){
        
        $user=Auth::user();
        $accesslevel=$user->type;
        if( $accesslevel === "admin" )
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
        if($accesslevel === "admin")
        {
         $produit = Produit::findOrFail($id);
         $id_produit = $produit->id;
         
         $qtu = $produit->quantité;
        // dd($qtu);
        $request->validate([
         'quantité' => 'required',
         'date' =>'required|date'
     ]);     
                 $produit->quantité = $request->input('quantité')  ;
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
                
                $produit_h = Produit_histoire::create([
                    'quantité' =>$qtu - $request->input('quantité'),
                    'nom' => $produit->nom,
                    'catégorie' => $produit->catégorie,
                    'prix' =>$produit->prix,
                    'date' => $request->input('date'),  
                    'etat' => 'SORTIE',                   
                ]);
                 return redirect()->route('affichage_produits');  
                }else{
                    return response()->json(['message ' => 'vous etes pas um admin !!']);
            
                }
           
            //  return view('stock.affichage');      
     }

     public function show_produits()
{
    $user = Auth::user();
    $accesslevel = $user->type;
    
    if ($accesslevel === "normal" || $accesslevel === "admin") {
        $produits = Produit::all();
        $sortie = ProduitVent::all();
        $entre = Entre::all();
        $produits_h = Produit_histoire::all();
       // dd($sortie);
       $totalPrixQuantiteEntree = 0;
        // Calculer la somme des prix * quantité pour l'état "SORTIE"
        $totalPrixQuantiteSortie = 0;
        
        foreach ($entre as $entreeItem) {
            $totalPrixQuantiteEntree += $entreeItem->produit->prix * $entreeItem->quantité;
        }
        
        foreach ($sortie as $sortieItem) {
            $totalPrixQuantiteSortie += $sortieItem->prix_produit * $sortieItem->quantité;
        }
        
        $totalQuantiteEntree = 0;
        $totalQuantiteSortie = 0;
        
        foreach ($entre as $entreeItem) {
            $totalQuantiteEntree += $entreeItem->quantité;
        }
        
        foreach ($sortie as $sortieItem) {
            $totalQuantiteSortie += $sortieItem->quantité;
        }
        
        return view('stock.affichage', compact('produits', 'entre', 'sortie', 'produits_h','totalPrixQuantiteEntree', 'totalPrixQuantiteSortie', 'totalQuantiteEntree', 'totalQuantiteSortie'));
    } else {
        return response()->json(['message' => 'Vous n\'êtes pas un admin !!']);
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
         
         $totalPrixQuantiteEntree = 0;
         $totalQuantiteEntree = 0;
         
         foreach ($entre as $entreItem) {
             $totalPrixQuantiteEntree += $entreItem->produit->prix * $entreItem->quantité;
         }
         
         
         
         foreach ($entre as $entreItem) {
             $totalQuantiteEntree += $entreItem->quantité;
         }
         return view('stock.entre', compact('entre','specificDate','totalPrixQuantiteEntree','totalQuantiteEntree'));
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
         $sortie = ProduitVent::getProductsForDate($specificDate); 
         //dd($sortie);
         $totalPrixQuantiteSortie = 0;
         $totalQuantiteSortie = 0;
         
         foreach ($sortie as $sortieItem) {
             $totalPrixQuantiteSortie += $sortieItem->prix_total;
         }
         
         
         
         foreach ($sortie as $sortieItem) {
             $totalQuantiteSortie += $sortieItem->quantité;
         }
         return view('stock.sorte', compact('sortie','specificDate','totalPrixQuantiteSortie','totalQuantiteSortie'));
        }else{
            return response()->json(['message ' => 'vous etes pas um admin !!']);
    
        }
     }
     public function showHistoriqueForDate(Request $request)
     {
        $user=Auth::user();
        $accesslevel=$user->type;
        if($accesslevel==="normal" ||$accesslevel==="admin" )
        {
         $specificDate = $request->input('date');
         $produits_h = Produit_histoire::getProductsForDate($specificDate); // Utiliser la bonne méthode

           
             // Calculer la somme des prix * quantité pour l'état "ENTRER"
             $totalPrixQuantiteEntree = 0;
             // Calculer la somme des prix * quantité pour l'état "SORTIE"
             $totalPrixQuantiteSortie = 0;
             
             foreach ($produits_h as $produit_h) {
                 if ($produit_h->etat === "ENTRER") {
                     $totalPrixQuantiteEntree += $produit_h->prix * $produit_h->quantité;
                 } elseif ($produit_h->etat === "SORTIE") {
                     $totalPrixQuantiteSortie += $produit_h->prix * $produit_h->quantité;
                 }
             }

             // Calculer la somme des quantité pour l'état "ENTRER"
             $totalQuantiteEntree = 0;
             // Calculer la somme des quantité pour l'état "SORTIE"
             $totalQuantiteSortie = 0;
             
             foreach ($produits_h as $produit_h) {
                 if ($produit_h->etat === "ENTRER") {
                     $totalQuantiteEntree +=  $produit_h->quantité;
                 } elseif ($produit_h->etat === "SORTIE") {
                     $totalQuantiteSortie += $produit_h->quantité;
                 }
             }
     
         return view('stock.historique', compact('produits_h','specificDate','totalPrixQuantiteEntree','totalPrixQuantiteSortie','totalQuantiteEntree','totalQuantiteSortie'));
        }else{
            return response()->json(['message ' => 'vous etes pas um admin !!']);
    
        }
     }
     
}
