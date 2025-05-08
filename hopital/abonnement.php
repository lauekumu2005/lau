<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abonnement - Système Hospitalier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --success-color: #2ecc71;
        }

        body {
            background-color: #f5f7fa;
            min-height: 100vh;
            padding: 2rem;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .subscription-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .subscription-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .subscription-header h1 {
            color: var(--primary-color);
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .plans-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .plan-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .plan-card:hover {
            transform: translateY(-5px);
        }

        .plan-card.popular::before {
            content: 'Populaire';
            position: absolute;
            top: 1rem;
            right: -2rem;
            background: var(--accent-color);
            color: white;
            padding: 0.5rem 3rem;
            transform: rotate(45deg);
        }

        .plan-title {
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .plan-price {
            font-size: 2.5rem;
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
        }

        .plan-price small {
            font-size: 1rem;
            color: #666;
        }

        .plan-features {
            list-style: none;
            padding: 0;
            margin-bottom: 2rem;
        }

        .plan-features li {
            padding: 0.5rem 0;
            color: #666;
        }

        .plan-features li i {
            color: var(--success-color);
            margin-right: 0.5rem;
        }

        .btn-subscribe {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 8px;
            background: var(--primary-color);
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-subscribe:hover {
            background: var(--secondary-color);
        }

        .payment-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            align-items: center;
            justify-content: center;
        }

        .payment-form {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            width: 100%;
            max-width: 500px;
        }

        .payment-form h2 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--primary-color);
        }

        .form-control {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #e1e1e1;
            border-radius: 8px;
        }

        .card-icons {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .card-icons img {
            height: 30px;
        }

        .payment-tabs {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .tab-btn {
            flex: 1;
            padding: 1rem;
            border: 2px solid #e1e1e1;
            border-radius: 8px;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .tab-btn.active {
            border-color: var(--secondary-color);
            background: var(--secondary-color);
            color: white;
        }

        .orange-money-logo {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .orange-money-logo img {
            height: 40px;
        }

        .payment-method {
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            .plans-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="subscription-container">
        <div class="subscription-header">
            <h1>Choisissez votre abonnement</h1>
            <p>Profitez de nos offres spéciales pour votre hôpital</p>
        </div>

        <div class="plans-container">
            <!-- Plan Mensuel -->
            <div class="plan-card">
                <h3 class="plan-title">Abonnement Mensuel</h3>
                <div class="plan-price">
                    4.99$<small>/mois</small>
                </div>
                <ul class="plan-features">
                    <li><i class="fas fa-check"></i> Accès complet au système</li>
                    <li><i class="fas fa-check"></i> Support technique 24/7</li>
                    <li><i class="fas fa-check"></i> Mises à jour gratuites</li>
                    <li><i class="fas fa-check"></i> Sauvegarde des données</li>
                </ul>
                <button class="btn-subscribe" onclick="showPaymentModal('mensuel')">
                    S'abonner
                </button>
            </div>

            <!-- Plan Annuel -->
            <div class="plan-card popular">
                <h3 class="plan-title">Abonnement Annuel</h3>
                <div class="plan-price">
                    49$<small>/an</small>
                </div>
                <ul class="plan-features">
                    <li><i class="fas fa-check"></i> Accès complet au système</li>
                    <li><i class="fas fa-check"></i> Support technique 24/7</li>
                    <li><i class="fas fa-check"></i> Mises à jour gratuites</li>
                    <li><i class="fas fa-check"></i> Sauvegarde des données</li>
                    <li><i class="fas fa-check"></i> 2 mois gratuits</li>
                </ul>
                <button class="btn-subscribe" onclick="showPaymentModal('annuel')">
                    S'abonner
                </button>
            </div>
        </div>
    </div>

    <!-- Modal de paiement -->
    <div id="paymentModal" class="payment-modal">
        <div class="payment-form">
            <h2>Paiement de l'abonnement</h2>
            
            <!-- Onglets de méthode de paiement -->
            <div class="payment-tabs">
                <button class="tab-btn active" onclick="switchPaymentMethod('card')">
                    <i class="fas fa-credit-card"></i> Carte bancaire
                </button>
                <button class="tab-btn" onclick="switchPaymentMethod('orange')">
                    <i class="fas fa-mobile-alt"></i> Orange Money
                </button>
            </div>

            <!-- Formulaire carte bancaire -->
            <div id="cardPayment" class="payment-method">
                <div class="card-icons">
                    <img src="https://cdn-icons-png.flaticon.com/512/196/196578.png" alt="Visa">
                    <img src="https://cdn-icons-png.flaticon.com/512/196/196561.png" alt="Mastercard">
                    <img src="https://cdn-icons-png.flaticon.com/512/196/196565.png" alt="PayPal">
                </div>
                <form id="cardPaymentForm" onsubmit="return handleCardPayment(event)">
                    <div class="form-group">
                        <label>Numéro de carte</label>
                        <input type="text" class="form-control" placeholder="1234 5678 9012 3456" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date d'expiration</label>
                                <input type="text" class="form-control" placeholder="MM/AA" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>CVV</label>
                                <input type="text" class="form-control" placeholder="123" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nom sur la carte</label>
                        <input type="text" class="form-control" placeholder="JOHN DOE" required>
                    </div>
                    <button type="submit" class="btn-subscribe">Payer maintenant</button>
                </form>
            </div>

            <!-- Formulaire Orange Money -->
            <div id="orangePayment" class="payment-method" style="display: none;">
                <div class="orange-money-logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Orange_Money_logo.svg/1200px-Orange_Money_logo.svg.png" alt="Orange Money">
                </div>
                <form id="orangePaymentForm" onsubmit="return handleOrangePayment(event)">
                    <div class="form-group">
                        <label>Numéro Orange Money</label>
                        <input type="tel" class="form-control" placeholder="+225 07 07 07 07 07" required>
                    </div>
                    <div class="form-group">
                        <label>Code Pin</label>
                        <input type="text" class="form-control" placeholder="Entrez le code reçu par SMS" required>
                    </div>
                    <button type="submit" class="btn-subscribe">
                        <i class="fas fa-mobile-alt"></i> Payer avec Orange Money
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let selectedPlan = '';

        function showPaymentModal(plan) {
            selectedPlan = plan;
            const modal = document.getElementById('paymentModal');
            modal.style.display = 'flex';
        }

        function switchPaymentMethod(method) {
            const cardPayment = document.getElementById('cardPayment');
            const orangePayment = document.getElementById('orangePayment');
            const tabs = document.querySelectorAll('.tab-btn');

            tabs.forEach(tab => tab.classList.remove('active'));
            event.currentTarget.classList.add('active');

            if (method === 'card') {
                cardPayment.style.display = 'block';
                orangePayment.style.display = 'none';
            } else {
                cardPayment.style.display = 'none';
                orangePayment.style.display = 'block';
            }
        }

        function handleCardPayment(event) {
            event.preventDefault();
            const submitButton = event.target.querySelector('button[type="submit"]');
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Traitement en cours...';
            submitButton.disabled = true;

            setTimeout(() => {
                alert('Paiement par carte effectué avec succès !');
                window.location.href = 'index.php';
            }, 2000);

            return false;
        }

        function handleOrangePayment(event) {
            event.preventDefault();
            const submitButton = event.target.querySelector('button[type="submit"]');
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Traitement en cours...';
            submitButton.disabled = true;

            setTimeout(() => {
                alert('Paiement Orange Money effectué avec succès !');
                window.location.href = 'index.php';
            }, 2000);

            return false;
        }

        // Fermer le modal en cliquant en dehors
        window.onclick = function(event) {
            const modal = document.getElementById('paymentModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html>