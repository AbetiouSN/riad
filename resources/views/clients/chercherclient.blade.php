<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Bootstrap</title>
    <!-- Inclure les liens vers les fichiers Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Ajouter un client : Etape 1 [Chaercher Le client ] </h1>
        {{-- <h4 style="color: red;">{{$error}}</h4> --}}
        <form action="{{route('find_client')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label"> Nom :</label>
                <input type="text" class="form-control" id="nom" name="prenom" placeholder="Entrez le nom">
            </div>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>

    <!-- Inclure le lien vers le fichier Bootstrap JS (optionnel, nécessaire pour certaines fonctionnalités) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
