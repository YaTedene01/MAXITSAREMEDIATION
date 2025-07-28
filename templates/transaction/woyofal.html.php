<?php $this->layout = "layout/baselayout.html.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mx-auto p-6">
        <form action="/paiement/woyofal/achat" method="POST" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6">Achat Woyofal</h2>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="compteur">
                    Numéro de compteur
                </label>
                <input type="text" 
                       name="compteur" 
                       id="compteur"
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"
                       required>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="montant">
                    Montant
                </label>
                <input type="number" 
                       name="montant" 
                       id="montant"
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"
                       required>
            </div>
            
            <button type="submit" 
                    class="w-full bg-orange-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-orange-600 transition-colors">
                Acheter
            </button>
        </form>
    </div>
</body>
</html>