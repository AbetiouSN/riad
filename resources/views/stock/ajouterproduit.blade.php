<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        .text-center {
            text-align: center;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .font-weight-bold {
            font-weight: bold;
        }

        .mt-5 {
            margin-top: 5rem;
        }

        form {
            width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 18px;
            font-weight: bold;
        }

        input {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
    @auth
    <div class="container">
        <h1 class="text-center text-uppercase font-weight-bold mt-5">
            Ajouter produit
        </h1>

        <form action="{{ route('store_produit') }}" method="post" class="mt-4">
            @csrf

            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="nom" id="name" placeholder="nom produit" class="form-control">
            </div>
            <div class="form-group">
                <label for="catégorie">Catégorie</label>
                <input type="text" name="catégorie" id="catégorie" placeholder="catégorie" class="form-control">
            </div>
            <div class="form-group">
                <label for="quantité">Quantité</label>
                <input type="number" name="quantité" id="quantité" placeholder="quantité produit" class="form-control">
            </div>

            <div class="form-group">
                <label for="prix">Prix (prix d'un élément)</label>
                <input type="number" name="prix" id="prix" placeholder="Prix" class="form-control">
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
