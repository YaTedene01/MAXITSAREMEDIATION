<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard MAXIT SA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
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
                        <?= $isCredit ? 'Dépôt' : 'Paiement' ?>
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
    
</body>
</html>