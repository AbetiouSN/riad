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
            padding: 12px; /
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
            Ajouter un Quantité
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
            
            <form action="{{ route('update_produite', ['id' => $id]) }}" method="post" class="mt-4">
                @csrf
                @method('PUT')
            <div class="form-group">
                <label for="date">Date (YYYY-MM-DD)</label>
                <input type="date" name="date" id="date" value="{{ date('Y-m-d') }}" class="form-control">
            </div>
            

            <div class="form-group">
                <label for="quantité">Ajouter Quantité</label>
                <input type="number" name="quantité" id="quantité" placeholder="Ajouter Quantité" class="form-control">
            </div>
            

            <hr><br>

            <div class="text-center">
                <button type="submit" class="btn btn-primary ">Submit</button>
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
