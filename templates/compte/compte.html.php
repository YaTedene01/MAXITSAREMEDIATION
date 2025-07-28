<!DOCTYPE html>
<html lang="fr">

<?php
//  var_dump($_SESSION);
// var_dump($transactions);die;
            $solde = $this->session->get('solde');
            // var_dump('solde',$solde);
           

?>
        <!-- Main Content -->
        <div class="flex-1 p-4 overflow-hidden">
            <!-- Header -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <div class="bg-orange-500 rounded-full w-12 h-12 flex items-center justify-center shadow-lg">
                                <i class="fas fa-user text-white text-lg"></i>
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white"></div>
                        </div>
                        <div>
                            <div class="text-xl font-bold text-black">YA TEDENE</div>
                            <div class="text-orange-500 font-semibold">777571251</div>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-6">
                        <!-- Balance Card -->
                        <div class="bg-slate-800 text-white p-4 rounded-xl shadow-lg">
                            <div class="text-sm font-medium text-gray-300">Solde actuel</div>
                            <div class="text-2xl font-bold">
            <?= number_format($solde ?? 0, 0, ',', ' ') ?> FCFA
                            </div>
                        </div>
                        
                        <!-- Quick Actions -->
                        <div class="flex space-x-3">
                            <button class="bg-gray-100 hover:bg-gray-200 rounded-xl p-3 transition-all duration-200">
                                <i class="fas fa-eye text-black"></i>
                                <div class="text-xs font-medium text-black mt-1">Voir solde</div>
                            </button>
                            
                            <button class="bg-orange-500 hover:bg-orange-600 text-white p-3 rounded-xl transition-all duration-200 shadow-lg">
                                <i class="fas fa-qrcode"></i>
                                <div class="text-xs font-medium mt-1">Scanner</div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="grid grid-cols-4 gap-4 mb-6">
                <div class="bg-white rounded-2xl shadow-lg p-4 text-center hover:shadow-xl transition-all duration-200">
                    <div class="bg-orange-500 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3 shadow-lg">
                        <i class="fas fa-plus text-white text-lg"></i>
                    </div>
                    <div class="text-sm font-bold text-black">Dépôt</div>
                    <div class="text-xs text-gray-500 mt-1">Ajouter argent</div>
                </div>
                
                <div class="bg-white rounded-2xl shadow-lg p-4 text-center hover:shadow-xl transition-all duration-200">
                    <a href="/paiement">
                    <div class="bg-orange-500 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3 shadow-lg">
                        <i class="fas fa-credit-card text-white text-lg"></i>
                    </div>
                    <div class="text-sm font-bold text-black">Paiement</div>
                    <div class="text-xs text-gray-500 mt-1">Régler facture</div>
                    </a>
                </div>
                
                <div class="bg-white rounded-2xl shadow-lg p-4 text-center hover:shadow-xl transition-all duration-200">
                    <div class="bg-orange-500 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3 shadow-lg">
                        <i class="fas fa-user-plus text-white text-lg"></i>
                    </div>
                    <div class="text-sm font-bold text-black">Créer compte</div>
                    <div class="text-xs text-gray-500 mt-1">Nouveau compte</div>
                </div>
                
                <div class="bg-white rounded-2xl shadow-lg p-4 text-center hover:shadow-xl transition-all duration-200">
                    <div class="bg-orange-500 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3 shadow-lg">
                        <i class="fas fa-sync-alt text-white text-lg"></i>
                    </div>
                    <div class="text-sm font-bold text-black">Changer compte</div>
                    <div class="text-xs text-gray-500 mt-1">Basculer</div>
                </div>
            </div>

            <!-- Transactions Section -->
            <div class="bg-white rounded-2xl shadow-lg p-6 flex-1">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold text-black">Historique des transactions</h2>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                            <span class="text-xs text-gray-600">Dépôt</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                            <span class="text-xs text-gray-600">Paiement</span>
                        </div>
                        <button class="text-orange-500 hover:text-orange-600 font-semibold flex items-center space-x-1 transition-colors text-sm">
                            <a href="/transaction">Voir plus</a>
                            <i class="fas fa-arrow-right text-xs"></i>
                        </button>
                    </div>
                </div>

                <!-- Transactions List -->
               <div class="space-y-3 overflow-y-auto h-72 pr-2 scrollbar-thin scrollbar-thumb-orange-400 scrollbar-track-gray-100">
    <?php foreach ($transactions as $transaction): 
        // Déterminer la couleur selon le type de transaction (dépôt = vert, paiement = rouge)
        $isCredit = $transaction->getMontant() > 0;
        $status = $transaction->getStatutTransaction();
        $type=$transaction->getTypeTransaction();
        
        // Couleurs selon le type : dépôt vert, paiement rouge
        if ($isCredit) {
            if($type==='depot'){
            // Dépôt = vert
            $gradientClass = 'from-orange-50 to-orange-100';
            $borderClass = 'border-orange-500';
            $iconBgClass = 'bg-orange-500';
            $amountClass = 'text-green-600';
            }
         elseif($type==='paiement') {
            // Paiement = rouge
            $gradientClass = 'from-orange-50 to-orange-100';
            $borderClass = 'border-orange-500';
            $iconBgClass = 'bg-orange-500';
            $amountClass = 'text-red-600';
        }
        elseif($type==='retrait') {
            // retrait = rouge
            $gradientClass = 'from-orange-50 to-orange-100';
            $borderClass = 'border-orange-500';
            $iconBgClass = 'bg-orange-500';
            $amountClass = 'text-red-600';
        }
        }
        
        // Couleurs du statut
        if ($status === 'Reussi') {
            $statusClass = 'text-green-600';
            $statusDotClass = 'bg-green-500';
        } elseif ($status === 'Attente') {
            $statusClass = 'text-orange-600';
            $statusDotClass = 'bg-orange-500';
        } else { // Échec
            $statusClass = 'text-red-600';
            $statusDotClass = 'bg-red-500';
        }
        
        // Signe pour le montant
        $amountSign = $isCredit ? '+' : '-';
        $montantAbs = abs($transaction->getMontant());
    ?>
    
    <div class="bg-gradient-to-r <?= $gradientClass ?> border-l-4 <?= $borderClass ?> rounded-xl p-4 shadow-sm">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="<?= $iconBgClass ?> rounded-full w-10 h-10 flex items-center justify-center shadow-md">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-5 14H4v-6h11v6zm0-8H4V8h11v2zm5 8h-3V8h3v10z"/>
                    </svg>
                </div>
                <div>
                    <div class="font-semibold text-gray-800">
                        <?= htmlspecialchars($transaction->getTypeTransaction()) ?>
                    </div>
                    <div class="text-sm text-gray-600">
                        <?= $isCredit ? '': 'Paiement' ?>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <div class="<?= $amountClass ?> font-bold text-lg">
                    <?= $amountSign . number_format($montantAbs, 0, ',', ' ') ?> CFA
                </div>
                <div class="text-xs text-gray-500">
                    <?= htmlspecialchars($transaction->getDateTransaction()) ?>
                </div>
                <div class="flex items-center justify-end space-x-1 mt-1">
                    <div class="w-2 h-2 <?= $statusDotClass ?> rounded-full"></div>
                    <span class="<?= $statusClass ?> text-xs font-medium">
                        <?= htmlspecialchars($transaction->getStatutTransaction()) ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
    
    <?php endforeach; ?>
</div>
    </div>
        </div>

</html>