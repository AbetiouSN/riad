<!DOCTYPE html>
<html>
<head>
    <title>Facture détaillée</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
   <style>
    body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

.invoice {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
}

.header {
    text-align: center;
    margin-bottom: 20px;
}

.from-to {
    display: flex;
}

.from, .to {
    flex: 1;
}

.from {
    padding-right: 10px;
}

.items {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.items th, .items td {
    border: 1px solid #ccc;
    padding: 8px;
}

.items th {
    background-color: #f0f0f0;
}

.subtotal, .tax, .total {
    text-align: right;
    font-weight: bold;
}

.total {
    background-color: #f0f0f0;
}

   </style>
</head>
<body>
    <div class="invoice">
        <div class="header">
            <h1>FACTURE</h1>
        </div>
        <div class="from-to">
            <div class="from">
                <strong>De :</strong>
                <address>
                    Votre entreprise<br>
                    123 Rue de la Facturation<br>
                    Ville, Code Postal<br>
                    Pays
                </address>
            </div>
            <div class="to">
                <strong>À :</strong>
                <address>
                    Client<br>
                    456 Rue du Client<br>
                    Ville, Code Postal<br>
                    Pays
                </address>
            </div>
        </div>
        <table class="items">
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total</th>
            </tr>
            <tr>
                <td>Produit 1</td>
                <td>2</td>
                <td>100.00 €</td>
                <td>200.00 €</td>
            </tr>
            <tr>
                <td>Produit 2</td>
                <td>1</td>
                <td>50.00 €</td>
                <td>50.00 €</td>
            </tr>
            <tr>
                <td colspan="3" class="subtotal">Sous-total</td>
                <td>250.00 €</td>
            </tr>
            <tr>
                <td colspan="3" class="tax">Taxes (TVA 20%)</td>
                <td>50.00 €</td>
            </tr>
            <tr>
                <td colspan="3" class="total">Total</td>
                <td>300.00 €</td>
            </tr>
        </table>
    </div>

    <hr>

    <div class="invoice">
        <div class="header">
            <h1>FACTURE</h1>
        </div>
        <div class="from-to">
            <div class="from">
                <strong>De :</strong>
                <address>
                    Votre entreprise<br>
                    123 Rue de la Facturation<br>
                    Ville, Code Postal<br>
                    Pays
                </address>
            </div>
            <div class="to">
                <strong>À :</strong>
                <address>
                    Client<br>
                    456 Rue du Client<br>
                    Ville, Code Postal<br>
                    Pays
                </address>
            </div>
        </div>
        <table class="items">
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total</th>
            </tr>
            <tr>
                <td>Produit 1</td>
                <td>2</td>
                <td>100.00 €</td>
                <td>200.00 €</td>
            </tr>
            <tr>
                <td>Produit 2</td>
                <td>1</td>
                <td>50.00 €</td>
                <td>50.00 €</td>
            </tr>
            <tr>
                <td colspan="3" class="subtotal">Sous-total</td>
                <td>250.00 €</td>
            </tr>
            <tr>
                <td colspan="3" class="tax">Taxes (TVA 20%)</td>
                <td>50.00 €</td>
            </tr>
            <tr>
                <td colspan="3" class="total">Total</td>
                <td>300.00 €</td>
            </tr>
        </table>
    </div>
    <hr>
    <div class="invoice">
        <div class="header">
            <h1>FACTURE</h1>
        </div>
        <div class="from-to">
            <div class="from">
                <strong>De :</strong>
                <address>
                    Votre entreprise<br>
                    123 Rue de la Facturation<br>
                    Ville, Code Postal<br>
                    Pays
                </address>
            </div>
            <div class="to">
                <strong>À :</strong>
                <address>
                    Client<br>
                    456 Rue du Client<br>
                    Ville, Code Postal<br>
                    Pays
                </address>
            </div>
        </div>
        <table class="items">
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total</th>
            </tr>
            <tr>
                <td>Produit 1</td>
                <td>2</td>
                <td>100.00 €</td>
                <td>200.00 €</td>
            </tr>
            <tr>
                <td>Produit 2</td>
                <td>1</td>
                <td>50.00 €</td>
                <td>50.00 €</td>
            </tr>
            <tr>
                <td colspan="3" class="subtotal">Sous-total</td>
                <td>250.00 €</td>
            </tr>
            <tr>
                <td colspan="3" class="tax">Taxes (TVA 20%)</td>
                <td>50.00 €</td>
            </tr>
            <tr>
                <td colspan="3" class="total">Total</td>
                <td>300.00 €</td>
            </tr>
        </table>
</body>
</html>
