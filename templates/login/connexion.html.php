<!DOCTYPE html>
<html lang="fr">

    <div class="bg-white rounded-3xl shadow-xl p-12 w-full max-w-md border border-gray-200">
        <!-- Logo -->
        <div class="flex justify-center mb-12">
            <div class="bg-orange-500 rounded-2xl px-8 py-4 shadow-lg">
                <div class="text-white text-3xl font-bold text-center">MAXIT</div>
                <div class="text-white text-3xl font-bold text-center">SA</div>
            </div>
        </div>

        <!-- Formulaire de connexion -->
        <form action="/login" method="post" class="space-y-6">
            <!-- Numéro de téléphone -->
            <div>
                <label class="block text-gray-700 text-base font-medium mb-3">Login*</label>
                <input type="tel" class="w-full px-4 py-4 border border-gray-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent text-base" name="login" placeholder="Entrez votre login">
                <small class="text-red-500">
                    <?php
                        if (empty($_SESSION['error']['login']) ) {
                            echo $_SESSION['error']['login'];
                        }
                    ?>
                </small>
            </div>

            <!-- Mot de passe -->
            <div>
                <label class="block text-gray-700 text-base font-medium mb-3">Mot de passe*</label>
                <input type="password" class="w-full px-4 py-4 border border-gray-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent text-base" name="password" placeholder="Entrez votre mot de passe">
                 <small class="text-red-500">
                    <?php
                        if (($_SESSION['error']['password'])) {
                            # code...
                            echo $_SESSION['error']['password'];
                        }
                    ?>
                </small>
            </div>

            <!-- Mot de passe oublié -->
            <div class="text-center">
                <a href="#" class="text-gray-600 text-base hover:text-orange-500">Mot de passe oublié?</a>
            </div>

            <!-- Bouton de connexion -->
            <div class="pt-6">
                <button type="submit" class="w-full bg-orange-500 text-white font-bold py-4 px-6 rounded-2xl hover:bg-orange-600 transition-colors text-xl">
                    Connexion
                </button>
            </div>

            <!-- Lien d'inscription -->
            <div class="text-center pt-4">
                <span class="text-gray-600 text-base">vous n'avez pas de compte ? </span>
                <a href="/inscription" class="text-orange-500 text-base hover:text-orange-600 font-medium">s'inscrire</a>
            </div>
        </form>
    

    
</body>
</html>