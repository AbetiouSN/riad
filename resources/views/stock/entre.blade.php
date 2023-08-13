<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Liste d'entres </title>
    <!-- Liens vers les fichiers Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @auth
<div class="container">
    <h1>Liste d'entres a la date {{$specificDate}}</h1>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Stock</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Prix</th> 
                    <th scope="col">Prix x Quantité</th>
                    <th scope="col">Date de stock</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($entre as $entry)
                    <tr>
                        <td>{{ $entry->produit->nom }}</td>
                        <td>{{ $entry->quantité }}</td>
                        <td>{{ $entry->produit->prix }}</td>
                        <td>{{ $entry->produit->prix }} <span> X </span>{{ $entry->quantité }}</td>
                        <td>{{ $entry->date }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Aucune donnée disponible</td>
                    </tr>
                @endforelse
                <tr style="border: 2px solid black">
                    <td class="bg-dark text-white" colspan="3">TOTAL </td>
                    <td > Total du Prix pour Entres : <b>{{$totalPrixQuantiteEntree}}</b></td>
                    <td > Total du Quantité pour Entres : <b>{{$totalQuantiteEntree}}</b></td>
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
