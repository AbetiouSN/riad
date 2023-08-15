<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit {{$prods->nom}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .table {
            width: 80%;
        }
    </style>
</head>
<body>
    @auth
    <div class="container ">
    <h3 class="btn btn-warning my-5">Voici les details de produit {{$prods->nom}}</h3>

    
<table class="table table-bordered " style=" width: 80%;">
            <br>
                        
    <tr>
        <th>Stock</th>
        <th>Quantité</th>
        <th>Prix d'un élément</th>
        <th>Date de stock</th>
    </tr>

<tbody>
   
        @if($prods && $prods->quantité != 0)
            <tr>
                <td>{{$prods->nom}}</td>
                <td>{{$prods->quantité}}</td>
                <td>{{$prods->prix}}</td>
                <td>{{$prods->created_at}}</td>
                <td><a class="btn btn-success" href="{{route('show_produit_add',['id' => $prods->id])}}"> (+)</a></td>
                <td><a class="btn btn-danger" href="{{route('show_produit_sup',['id' => $prods->id])}}"> (-)</a></td>
            </tr>
        @endif
</tbody>
</table>
    
    

</div>
    @endauth
</body>
</html>