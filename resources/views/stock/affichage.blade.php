<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .table {
            width: 80%;
        }
    </style>
</head>
<body>
    @auth
    <center>
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <h3>Statistique générale</h3>
                <p id="message"></p>
                <div class="btn-group mb-3">
                    <button class="btn btn-primary" onclick="showTable(1)">Afficher Le stock total </button>
                    <button class="btn btn-primary" onclick="showTable(2)">Afficher Les entres </button>
                    <button class="btn btn-primary" onclick="showTable(3)">Afficher les sorties </button>
                    <button class="btn btn-primary" onclick="showTable(4)">Historisation des Produits </button>
                </div>
                <div id="table1">



                    {{-- chercher un produit  --}}

                    <div class="container mt-5 row">
                        <h4 class="col-md-3"> Chercher Un Produit </h4>
                        <form class="col-md-9 row" action="/search_produit" method="post">
                            @csrf
                            <div class="mb-3 col-md-9">
                                <input type="text" class="form-control" id="nom_produit" name="nom_produit" placeholder="Entrer le nom d'un produit">
                            </div>
                            <div class="col-md-3">
                            <button  type="submit" class="btn btn-warning">Search </button>
                            </div>
                        </form>
                    </div>

                    {{-- fin chercher --}}


                    <table class="table table-bordered " style=" width: 80%;">
                        
                            <tr>
                                <th>Stock</th>
                                <th>Quantité</th>
                                <th>Prix d'un élément</th>
                                <th>Date de stock</th>
                            </tr>
                        
                        <tbody>
                            @foreach ($produits as $produit)
                                @if($produit && $produit->quantité != 0)
                                    <tr>
                                        <td>{{$produit->nom}}</td>
                                        <td>{{$produit->quantité}}</td>
                                        <td>{{$produit->prix}}</td>
                                        <td>{{$produit->created_at}}</td>
                                        <td><a class="btn btn-success" href="{{route('show_produit_add',['id' => $produit->id])}}"> (+)</a></td>
                                        <td><a class="btn btn-danger" href="{{route('show_produit_sup',['id' => $produit->id])}}"> (-)</a></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        <a class="btn btn-primary" href="{{route('ajouter')}}">Ajouter un nouveau produit</a>
                               <br> <hr><hr>

                    </div>
                </div>

                <div id="table2" style="display: none; width: 80%;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Stock</th>
                                <th>Quantité</th>
                                <th>Prix </th>
                                <th>Date de stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entre as $entry)
                                @if($entry)
                                    <tr>
                                        <td>{{$entry->produit->nom}}</td>
                                        <td>{{$entry->quantité}}</td>
                                        <td>{{$entry->produit->prix}}</td>
                                        <td>{{$entry->date}}</td>
                                    </tr>
                                @endif
                            @endforeach
                            <tr style="border: 2px solid black">
                                <td class="bg-dark text-white" colspan="2">TOTAL </td>
                                <td > Total du Prix pour Entres : <b>{{$totalPrixQuantiteEntree}}</b></td>
                                <td > Total du Quantité pour Entres : <b>{{$totalQuantiteEntree}}</b></td>
                            </tr>
                        </tbody>
                    </table>
                    <form action="/entre" method="POST">
                        @csrf
                        <h4>Chercher les entres</h4>

                    <div class="form-group">
                        <label for="date">Date (YYYY-MM-DD)</label>
                        <input type="date" name="date" id="date" value="{{ date('Y-m-d') }}" class="form-control">
                    </div><br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            
                <div id="table3" style="display: none;  width: 80%;">
                    {{-- sorties--}}
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Stock</th>
                                <th>Quantité</th>
                                <th>Prix</th>
                                <th>Prix total</th>
                                <th>Type de vente</th>
                                <th>Date de stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sortie as $output)
                                @if($output)
                                    <tr>
                                        <td>{{$output->produit->nom}}</td>
                                        <td>{{$output->quantité}}</td>
                                        <td>{{$output->prix_produit}}</td>
                                        <td>{{$output->prix_total}}</td>
                                        <td>{{$output->type_vent}}</td>
                                        <td>{{$output->date}}</td>
                                    </tr>
                                @endif
                            @endforeach
                                   <tr style="border: 2px solid black">
                                      <td class="bg-dark text-white" colspan="2">TOTAL </td>
                                      <td colspan="2" > Total du Prix pour Sortie : <b>{{$totalPrixQuantiteSortie}}</b></td>
                                      <td colspan="2"> Total du Quantité pour Sortie : <b>{{$totalQuantiteSortie}}</b></td>
                                  </tr>
                        </tbody>
                    </table>
                    <br>
                    <form action="/sorte" method="POST">
                        @csrf
                        <h4>Chercher les sorties</h4>

                    <div class="form-group">
                        <label for="date">Date (YYYY-MM-DD)</label>
                        <input type="date" name="date" id="date" value="{{ date('Y-m-d') }}" class="form-control">
                    </div><br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
        <hr><br>
            
            <div id="table4" style="display: none;  width: 80%;">
                <table class="table table-bordered " style=" width: 80%;">
                        
                    <tr>
                        <th>Stock</th>
                        <th>Quantité</th>
                        <th>Prix d'un élément</th>
                        <th>Etat </th>
                        <th>Date de stock</th>
                        
                    </tr>
                
                <tbody>
                    @foreach ($produits_h as $produits_h)
                        @if($produits_h && $produits_h->quantité != 0)
                            <tr>
                                <td>{{$produits_h->nom}}</td>
                                <td>{{$produits_h->quantité}}</td>
                                <td>{{$produits_h->prix}}</td>
                                <td>{{$produits_h->etat}}</td>
                                <td>{{$produits_h->date}}</td>
                            </tr>
                            
                        @endif
                    @endforeach
                    {{-- <tr style="border: 2px solid black">
                        <td class="bg-dark text-white">TOTAL </td>
                        <td > Total du Prix pour Entres : <b>{{$totalPrixQuantiteEntree}}</b></td>
                        <td > Total du Prix pour Sortie : <b>{{$totalPrixQuantiteSortie}}</b></td>
                        <td > Total du Quantité pour Entres : <b>{{$totalQuantiteEntree}}</b></td>
                        <td > Total du Quantité pour Sortie : <b>{{$totalQuantiteSortie}}</b></td>
                    </tr> --}}
                </tbody>
            </table>
                <br>
                <form action="/historique" method="POST">
                    @csrf
                    <h4>Chercher les details Produits</h4>

                <div class="form-group">
                    <label for="date">Date (YYYY-MM-DD)</label>
                    <input type="date" name="date" id="date" value="{{ date('Y-m-d') }}" class="form-control">
                </div><br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
            <hr><hr><br>
        </div>
        </div>
        <!-- ... Le reste de votre contenu ... -->
    </div>
    </center>
    @endauth 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showTable(tableNumber) {
            document.getElementById('message').innerText = '';
            document.getElementById('table1').style.display = 'none';
            document.getElementById('table2').style.display = 'none';
            document.getElementById('table3').style.display = 'none';
            document.getElementById('table4').style.display = 'none';
            
            if (tableNumber === 1) {
                document.getElementById('table1').style.display = 'block';
            } else if (tableNumber === 2) {
                document.getElementById('table2').style.display = 'block';
            } else if (tableNumber === 3) {
                document.getElementById('table3').style.display = 'block';
            }else if (tableNumber === 4) {
                document.getElementById('table4').style.display = 'block';
            }else {
                document.getElementById('message').innerText = 'Choix invalide.';
            }
        }
    </script>
</body>
</html>
