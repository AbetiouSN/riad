<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Un Spa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h3>Ajouter Un Spa</h3>
        <form action="{{Route('storeSpa',['id_client'=>$id_client])}}" method="post">
            @csrf
            <div class="form-group">
                <label for="nom_soin">Nom soin :</label>
                <input type="text" class="form-control" name="nom_soin" id="nom_soin">
            </div>

            <div class="form-group">
                <label for="catégorie">Catégorie :</label>
                <input type="text" class="form-control" name="catégorie" id="catégorie">
            </div>

            <div class="form-group">
                <label for="id_réservation">ID réservation :</label>
                <input type="number" class="form-control" name="id_réservation" id="id_réservation">
            </div>

            <div class="form-group">
                <label for="dépense">Dépense :</label>
                <input type="number" class="form-control" name="dépense" id="dépense">
            </div>

            <div class="form-group">
                <label for="nom_réceptionniste">Nom réceptionniste :</label>
                <input type="text" class="form-control" name="nom_réceptionniste" id="nom_réceptionniste" value="{{$nom_réceptionniste }}">
            </div>

            <div class="form-group">
                <label for="somme">Somme :</label>
                <input type="number" class="form-control" name="somme" id="somme">
            </div>

            <div class="form-group">
                <label for="prix">Prix :</label>
                <input type="number" class="form-control" name="prix" id="prix">
            </div>

            <div class="form-group">
                <label for="type_payment">Type de paiement :</label>
                <input type="text" class="form-control" name="type_payment" id="type_payment">
            </div>

            <div class="form-group">
                <label for="id_client">ID client :</label>
                <input type="number" class="form-control" name="id_client" id="id_client" value="{{$id_client}}">
            </div>

            <div class="form-group">
                <label for="date">Date :</label>
                <input type="date" class="form-control" name="date" id="date" value="{{ date('Y-m-d')}}">
            </div>

            <div class="form-group">
                <label for="name_riad">Nom riad :</label>
                <input type="text" class="form-control" name="name_riad" id="name_riad">
            </div>

            <button type="submit" class="btn btn-primary">Soumettre</button>
            <hr>
        </form>
        <hr><br>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
