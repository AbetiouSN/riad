<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Liste de sortie </title>
    <!-- Liens vers les fichiers Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @auth

<div class="container">
    <h1>Liste de sorties a la date {{$specificDate}}</h1>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Stock</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Prix total</th>
                    <th scope="col">Type de vente</th>
                    <th scope="col">Date de stock</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sortie as $sortie)
                    <tr>
                        <td>{{$sortie->produit->nom}}</td>
                        <td>{{$sortie->quantité}}</td>
                        <td>{{$sortie->prix}}</td>
                        <td>{{$sortie->prix_total}}</td>
                        <td>{{$sortie->type_vent}}</td>
                        <td>{{$sortie->date}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Aucune donnée disponible</td>
                    </tr>
                @endforelse
                <tr style="border: 2px solid black">
                    <td class="bg-dark text-white" colspan="2">TOTAL </td>
                    <td colspan="2"> Total du Prix pour Sortie : <b>{{$totalPrixQuantiteSortie}}</b></td>
                    <td colspan="2"> Total du Quantité pour Sortie : <b>{{$totalQuantiteSortie}}</b></td>
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
