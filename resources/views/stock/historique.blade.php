<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Liste historisation </title>
    <!-- Liens vers les fichiers Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @auth
<div class="container">
    <h3>Liste d'historisation a la date (L'etat du produits ) {{$specificDate}}</h3>
    
    <div class="table-responsive">
        {{-- <table class="table table-bordered " style=" width: 80%;">
                        
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
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Aucune donnée disponible</td>
                    </tr>
               
                @endif
            @endforeach
        </tbody>
    </table> --}}
    
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Stock</th>
                <th scope="col">Quantité</th>
                <th scope="col">Prix d'un élément</th>
                <th scope="col">Date de stock</th>
                <th scope="col">Etat</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produits_h as $produits_h)
                <tr>
                        <td>{{$produits_h->nom}}</td>
                        <td>{{$produits_h->quantité}}</td>
                        <td>{{$produits_h->prix}}</td>
                        <td>{{$produits_h->etat}}</td>
                        <td>{{$produits_h->date}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Aucune donnée disponible</td>
                </tr>
            @endforelse
            <tr style="border: 2px solid black">
                <td class="bg-dark text-white">TOTAL </td>
                <td > Total du Prix pour Entres : <b>{{$totalPrixQuantiteEntree}}</b></td>
                <td > Total du Prix pour Sortie : <b>{{$totalPrixQuantiteSortie}}</b></td>
                <td > Total du Quantité pour Entres : <b>{{$totalQuantiteEntree}}</b></td>
                <td > Total du Quantité pour Sortie : <b>{{$totalQuantiteSortie}}</b></td>
            </tr>
        </tbody>
    </table>

    </div>
</div>
@endauth
<!-- Liens vers les fichiers Bootstrap JavaScript (optionnel) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
