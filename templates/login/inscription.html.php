<!DOCTYPE html>
<html lang="fr">

    <div class="bg-white rounded-3xl shadow-xl p-6 w-full max-w-md">
        <!-- Header avec logo et titre -->
        <div class="flex items-center justify-center mb-6">
            <div class="flex items-center space-x-2">
                <div class="bg-orange-500 rounded-full w-6 h-6 flex items-center justify-center">
                   <i class="fa-solid fa-user text-sm"></i>
                </div>
                <div class="text-xl font-bold">
                    <span class="text-orange-500">INSCRIPTION MAXIT</span>
                    <span class="text-gray-800">SA</span>
                </div>
            </div>
        </div>

        <!-- Formulaire -->
        <form action="/login" method="post" class="space-y-4">
            <!-- Nom et Prénom -->
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-1">Nom*</label>
                    <input type="text"  class="w-full px-3 py-2 border border-gray-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent text-sm"  name="nom" placeholder=" Entrez votre Nom">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-1">Prénom*</label>
                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent text-sm" name="prenom" placeholder="Entrez votre Prénom">
                </div>
            </div>

            <!-- Téléphone -->
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-1">Téléphone*</label>
                <input type="tel" class="w-full px-3 py-2 border border-gray-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent text-sm" name="téléphone" placeholder=" Entrez votre Téléphone">
            </div>

            <!-- Numero CNI -->
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-1">Numero CNI*</label>
                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent text-sm" name="numero CNI" placeholder=" Entrez votre Numero CNI">
            </div>

            <!-- Adresse -->
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-1">Adresse*</label>
                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent text-sm" name="adresse" placeholder=" Entrez votre Adresse">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-1">Login*</label>
                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent text-sm" name="login" placeholder=" Entrez votre login">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-1">Password*</label>
                <input type="password" class="w-full px-3 py-2 border border-gray-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent text-sm" name="password" placeholder=" Entrez votre mot de passe">
            </div>

            <!-- Photos -->
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-1">photo recto</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-2xl p-4 text-center hover:border-orange-500 transition-colors cursor-pointer">
                        <input type="file" class="hidden" id="photo-recto" accept="image/*">
                        <label for="photo-recto" class="cursor-pointer">
                            <svg class="w-6 h-6 mx-auto text-gray-400 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-gray-500 text-xs">Cliquer pour télécharger</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-1">photo verso</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-2xl p-4 text-center hover:border-orange-500 transition-colors cursor-pointer">
                        <input type="file" class="hidden" id="photo-verso" accept="image/*">
                        <label for="photo-verso" class="cursor-pointer">
                            <svg class="w-6 h-6 mx-auto text-gray-400 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-gray-500 text-xs">Cliquer pour télécharger</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Bouton d'inscription -->
            <button type="submit" class="w-full bg-orange-500 text-white font-bold py-2.5 px-6 rounded-2xl hover:bg-orange-600 transition-colors text-base">
                INSCRIPTION
            </button>
        </form>
    </div>

</html>