<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Données</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Données de la Réservation</h2>
        <table class="table table-bordered">
            @auth
            <tbody>
                <tr>
                    <th>ID Réservation</th>
                    <th>Catégorie</th>
                    <th>Dépense</th>
                    <th>Nom Réceptionniste</th>
                    <th>Somme</th>
                    <th>Nom Soin</th>
                    <th>Prix</th>
                    <th>ID Client</th>
                    <th>Type de Paiement</th>
                    <th>Date</th>
                    <th>Nom Riad</th>
                    <th>Nom client</th>
                </tr>
                @foreach ($spas as $spa)
                    @if($spa)
                        <tr>
                            <td>{{$spa->id_réservation}}</td>
                            <td>{{$spa->catégorie}}</td>
                            <td>{{$spa->dépense}}</td>
                            <td>{{$spa->nom_réceptionniste}}</td>
                            <td>{{$spa->somme}}</td>
                            <td>{{$spa->nom_soin}}</td>
                            <td>{{$spa->prix}}</td>
                            <td>{{$spa->id_client}}</td>
                            <td>{{$spa->type_payment}}</td>
                            <td>{{$spa->date}}</td>
                            <td>{{$spa->name_riad}}</td>
                            <td>{{$spa->client->prenom}}</td>
                        </tr>
                    @endif
                @endforeach
               @endauth



              


            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
