<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un produit</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        form {
            width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px; 
        }
    </style>
</head>
<body>
    @auth
    <div class="container mt-5">
        <h1 class="text-center text-uppercase font-weight-bold">
            Supprimer (vent) un Quantité
        </h1>

        
            

            <div class="form-group">
                <label for="name">Nom de produit</label>
                <input type="text" id="name" disabled value="{{ $nom }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="catégorie">Catégorie</label>
                <input type="text" disabled id="catégorie" value="{{ $catégorie }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="quantité">Quantité</label>
                <input type="number" id="quantité" disabled value="{{ $quantité }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="prix">Prix (prix d'un élément)</label>
                <input type="number" disabled name="prix" id="prix" value="{{$prix}}" class="form-control">
            </div>
    
            <form action="{{ route('update_produit_sup', ['id' => $id]) }}" method="post" class="mt-4">
                @csrf
                @method('PUT')
            <div class="form-group">
                <label for="quantité">Supprimer (vent) Quantité</label>
                <input type="number" name="quantité" id="quantité" placeholder="Ajouter Quantité ( <= {{$quantité }})" class="form-control">
            </div>


            <div class="form-group">
                <label for="date">Date (YYYY-MM-DD)</label>
                <input type="date" name="date" id="date" value="{{ date('Y-m-d') }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="type_vent">Type de vent</label>
                <select class="form-control" name="type_vent" id="type_vent" required>
                    <option value="Normal">Normal</option>
                    <option value="Carte">Carte</option>
                    <option value="Euro">Euro</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endauth
    <!-- Link to Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
