<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur DOPAHO - Système de Gestion Hospitalière</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #003366;
            --secondary-color: #002244;
            --accent-color: #00a8e8;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --orange-color: #ff6b00;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .pricing-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin: 20px 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            position: relative;
        }

        .pricing-card:hover {
            transform: translateY(-10px);
        }

        .trial-badge {
            background: var(--warning-color);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            position: absolute;
            top: -10px;
            right: 20px;
        }

        .feature-list {
            list-style: none;
            padding: 0;
        }

        .feature-list li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .feature-list li i {
            color: var(--success-color);
            margin-right: 10px;
        }

        .payment-method {
            border: 2px solid #eee;
            border-radius: 10px;
            padding: 15px;
            margin: 10px 0;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }

        .payment-method:hover {
            border-color: var(--primary-color);
            background-color: rgba(0, 51, 102, 0.05);
        }

        .payment-method.selected {
            border-color: var(--primary-color);
            background-color: rgba(0, 51, 102, 0.05);
        }

        .payment-icon {
            font-size: 2rem;
            margin-right: 15px;
            color: var(--primary-color);
        }

        .orange-money-form {
            background: #fff;
            border-radius: 10px;
            padding: 1.5rem;
        }

        .orange-money-header {
            text-align: center;
            margin-bottom: 1.5rem;
            color: var(--orange-color);
        }

        .orange-money-logo {
            width: 60px;
            height: 60px;
            background: var(--orange-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
        }

        .orange-money-receipt {
            background: #fff;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .receipt-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .receipt-logo {
            width: 80px;
            height: 80px;
            background: var(--orange-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 2rem;
        }

        .receipt-details {
            border-top: 1px dashed #dee2e6;
            border-bottom: 1px dashed #dee2e6;
            padding: 1.5rem 0;
            margin-bottom: 1.5rem;
        }

        .receipt-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            color: #666;
        }

        .receipt-row:last-child {
            margin-bottom: 0;
        }

        .receipt-row strong {
            color: var(--primary-color);
        }

        .receipt-footer {
            text-align: center;
            color: #666;
            font-size: 0.9rem;
        }

        .spinner-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255,255,255,0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid var(--orange-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .notification-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--danger-color);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Section Hero -->
    <div class="hero-section">
        <div class="container">
            <h1 class="display-4 mb-4">Bienvenue sur DOPAHO</h1>
            <p class="lead">La solution complète de gestion hospitalière</p>
            <div class="mt-5">
                <a href="#pricing" class="btn btn-light btn-lg">Découvrir nos offres</a>
            </div>
        </div>
    </div>

    <!-- Section Présentation DOPAHO -->
    <div class="container py-5">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <h2 class="display-5 mb-4">Transformez votre Gestion Hospitalière avec DOPAHO</h2>
                <p class="lead text-muted">Une solution innovante qui révolutionne la gestion des établissements de santé en Afrique.</p>
                <div class="mt-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-hospital-user fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Gestion Complète des Patients</h5>
                            <p class="text-muted mb-0">Suivez l'historique médical, les rendez-vous et les traitements de chaque patient.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-calendar-check fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Planification Intelligente</h5>
                            <p class="text-muted mb-0">Optimisez les emplois du temps des médecins et réduisez les temps d'attente.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-file-medical fa-2x text-primary me-3"></i>
                        <div>
                            <h5 class="mb-1">Dossiers Médicaux Numériques</h5>
                            <p class="text-muted mb-0">Accédez instantanément aux dossiers médicaux sécurisés et partageables.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                         alt="Hôpital moderne" 
                         class="img-fluid rounded-3 shadow-lg">
                    <div class="position-absolute top-0 start-0 bg-primary text-white p-3 rounded-3 m-3">
                        <h3 class="mb-0">+500</h3>
                        <p class="mb-0">Hôpitaux Satisfaits</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 text-center mb-5">
                <h2 class="display-6">Pourquoi Choisir DOPAHO ?</h2>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-shield-alt fa-3x text-primary mb-3"></i>
                        <h4>Sécurité Maximale</h4>
                        <p class="text-muted">Protection des données sensibles conforme aux normes internationales.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-chart-line fa-3x text-primary mb-3"></i>
                        <h4>Performance Optimale</h4>
                        <p class="text-muted">Interface rapide et intuitive pour une productivité accrue.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-headset fa-3x text-primary mb-3"></i>
                        <h4>Support 24/7</h4>
                        <p class="text-muted">Une équipe dédiée à votre service pour une assistance continue.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Tarifs -->
    <div id="pricing" class="container py-5">
        <h2 class="text-center mb-5">Choisissez votre plan</h2>
        
        <div class="row">
            <!-- Plan Gratuit -->
            <div class="col-md-4">
                <div class="pricing-card">
                    <div class="trial-badge">Essai gratuit</div>
                    <h3>Plan Découverte</h3>
                    <div class="display-4 my-4">Gratuit</div>
                    <p class="text-muted">Pendant 30 jours</p>
                    <ul class="feature-list">
                        <li><i class="fas fa-check"></i> Accès à toutes les fonctionnalités</li>
                        <li><i class="fas fa-check"></i> Gestion des patients</li>
                        <li><i class="fas fa-check"></i> Gestion des rendez-vous</li>
                        <li><i class="fas fa-check"></i> Support par email</li>
                    </ul>
                    <button class="btn btn-outline-primary w-100 mt-4" onclick="startTrial()">
                        Commencer l'essai gratuit
                    </button>
                </div>
            </div>

            <!-- Plan Mensuel -->
            <div class="col-md-4">
                <div class="pricing-card">
                    <h3>Plan Mensuel</h3>
                    <div class="display-4 my-4">4.99$</div>
                    <p class="text-muted">par mois</p>
                    <ul class="feature-list">
                        <li><i class="fas fa-check"></i> Toutes les fonctionnalités du plan gratuit</li>
                        <li><i class="fas fa-check"></i> Support prioritaire 24/7</li>
                        <li><i class="fas fa-check"></i> Sauvegarde automatique</li>
                        <li><i class="fas fa-check"></i> Mises à jour régulières</li>
                    </ul>
                    <button class="btn btn-primary w-100 mt-4" onclick="selectPlan('monthly')">
                        Choisir ce plan
                    </button>
                </div>
            </div>

            <!-- Plan Annuel -->
            <div class="col-md-4">
                <div class="pricing-card">
                    <h3>Plan Annuel</h3>
                    <div class="display-4 my-4">49$</div>
                    <p class="text-muted">par an</p>
                    <div class="text-success mb-3">Économisez 17%</div>
                    <ul class="feature-list">
                        <li><i class="fas fa-check"></i> Toutes les fonctionnalités du plan mensuel</li>
                        <li><i class="fas fa-check"></i> Formation personnalisée</li>
                        <li><i class="fas fa-check"></i> API personnalisée</li>
                        <li><i class="fas fa-check"></i> Support dédié</li>
                    </ul>
                    <button class="btn btn-primary w-100 mt-4" onclick="selectPlan('yearly')">
                        Choisir ce plan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de paiement -->
    <div class="modal fade" id="paymentModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Paiement de l'abonnement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Méthodes de paiement</h6>
                            <div class="payment-method" onclick="selectPayment('card')">
                                <i class="fas fa-credit-card payment-icon"></i>
                                <span>Carte bancaire</span>
                            </div>
                            <div class="payment-method" onclick="selectPayment('mobile')">
                                <i class="fas fa-mobile-alt payment-icon"></i>
                                <span>Mobile Money</span>
                            </div>
                            <div class="payment-method" onclick="selectPayment('orange')">
                                <i class="fas fa-wallet payment-icon"></i>
                                <span>Orange Money</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6>Récapitulatif</h6>
                            <div class="card">
                                <div class="card-body">
                                    <h5 id="planName">Plan Mensuel</h5>
                                    <p id="planPrice">4.99$/mois</p>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <span>Total</span>
                                        <strong id="totalPrice">4.99$</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Formulaires de paiement -->
                    <div class="mt-4">
                        <!-- Carte bancaire -->
                        <div id="cardForm" class="payment-form">
                            <div class="mb-3">
                                <label class="form-label">Numéro de carte</label>
                                <input type="text" class="form-control" placeholder="1234 5678 9012 3456">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Date d'expiration</label>
                                        <input type="text" class="form-control" placeholder="MM/AA">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">CVV</label>
                                        <input type="text" class="form-control" placeholder="123">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Mobile Money -->
                        <div id="mobileForm" class="payment-form" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label">Numéro de téléphone</label>
                                <input type="tel" class="form-control" placeholder="+225 07 12 34 56 78">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Opérateur</label>
                                <select class="form-control">
                                    <option value="">Sélectionner un opérateur</option>
                                    <option value="mtn">MTN Mobile Money</option>
                                    <option value="moov">Moov Money</option>
                                    <option value="wave">Wave</option>
                                </select>
                            </div>
                        </div>

                        <!-- Orange Money -->
                        <div id="orangeForm" class="payment-form" style="display: none;">
                            <div class="orange-money-form">
                                <div class="orange-money-header">
                                    <div class="orange-money-logo">
                                        <i class="fas fa-wallet"></i>
                                    </div>
                                    <h5>Paiement Orange Money</h5>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Numéro Orange Money</label>
                                    <input type="tel" class="form-control" id="orangeNumber" placeholder="+225 07 12 34 56 78">
                                    <small class="text-muted">Entrez votre numéro Orange Money enregistré</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Montant</label>
                                    <input type="text" class="form-control" id="orangeAmount" readonly>
                                    <small class="text-muted">Montant à débiter de votre compte Orange Money</small>
                                </div>
                                <button class="btn btn-warning w-100" onclick="requestOrangePayment()">
                                    Continuer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal du code secret Orange Money -->
    <div class="modal fade" id="orangePasswordModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-lock me-2"></i>
                        Code secret
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <div class="orange-money-logo mb-3">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <h6>Entrez votre code secret</h6>
                        <p class="text-muted small">Pour valider la transaction</p>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control form-control-lg text-center" 
                               id="orangePassword" maxlength="4" placeholder="****"
                               style="letter-spacing: 8px; font-size: 24px;">
                        <small class="text-muted d-block text-center mt-2">Code secret à 4 chiffres</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-warning" onclick="confirmOrangePayment()">
                        Valider
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
        let selectedPlan = '';

        function startTrial() {
            Swal.fire({
                title: 'Commencer votre essai gratuit',
                html: 'Profitez de 30 jours gratuits pour tester toutes nos fonctionnalités !',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Commencer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'register.php';
                }
            });
        }

        function selectPlan(plan) {
            selectedPlan = plan;
            const planName = document.getElementById('planName');
            const planPrice = document.getElementById('planPrice');
            const totalPrice = document.getElementById('totalPrice');

            if (plan === 'monthly') {
                planName.textContent = 'Plan Mensuel';
                planPrice.textContent = '4.99$/mois';
                totalPrice.textContent = '4.99$';
            } else {
                planName.textContent = 'Plan Annuel';
                planPrice.textContent = '49$/an';
                totalPrice.textContent = '49$';
            }
            paymentModal.show();
        }

        function selectPayment(method) {
            document.querySelectorAll('.payment-method').forEach(el => {
                el.classList.remove('selected');
            });
            event.currentTarget.classList.add('selected');

            document.querySelectorAll('.payment-form').forEach(form => {
                form.style.display = 'none';
            });
            document.getElementById(method + 'Form').style.display = 'block';

            if (method === 'orange') {
                const amount = selectedPlan === 'monthly' ? '4.99' : '4.99';
                document.getElementById('orangeAmount').value = amount + ' $';
            }
        }

        function requestOrangePayment() {
            const orangeNumber = document.getElementById('orangeNumber').value;

            if (!orangeNumber) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: 'Veuillez entrer votre numéro Orange Money'
                });
                return;
            }

            // Fermer le modal de paiement
            paymentModal.hide();

            // Afficher le modal de mot de passe
            const orangePasswordModal = new bootstrap.Modal(document.getElementById('orangePasswordModal'));
            orangePasswordModal.show();

            // Focus sur le champ de mot de passe
            setTimeout(() => {
                document.getElementById('orangePassword').focus();
            }, 500);
        }

        function confirmOrangePayment() {
            const password = document.getElementById('orangePassword').value;
            const orangeNumber = document.getElementById('orangeNumber').value;
            const amount = document.getElementById('orangeAmount').value;

            if (password.length !== 4) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: 'Le code secret doit contenir 4 chiffres'
                });
                return;
            }

            // Fermer le modal de mot de passe
            bootstrap.Modal.getInstance(document.getElementById('orangePasswordModal')).hide();

            // Afficher la demande de confirmation
            Swal.fire({
                title: 'Confirmer la transaction',
                html: `
                    <div class="text-center">
                        <div class="orange-money-logo mb-3">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <p>Voulez-vous confirmer le paiement de <strong>${amount}</strong> ?</p>
                        <p class="text-muted">Numéro: ${orangeNumber}</p>
                    </div>
                `,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Confirmer',
                cancelButtonText: 'Annuler',
                confirmButtonColor: '#ff6b00',
                cancelButtonColor: '#6c757d'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Simuler le traitement
                    Swal.fire({
                        title: 'Traitement en cours',
                        html: `
                            <div class="text-center">
                                <div class="spinner-border text-warning mb-3" role="status"></div>
                                <p>Veuillez patienter pendant que nous traitons votre paiement...</p>
                            </div>
                        `,
                        allowOutsideClick: false,
                        showConfirmButton: false
                    });

                    // Simuler un délai de traitement
                    setTimeout(() => {
                        showOrangeReceipt(orangeNumber, amount);
                    }, 3000);
                }
            });
        }

        function showOrangeReceipt(number, amount) {
            const date = new Date().toLocaleString();
            const transactionId = 'OM' + Math.random().toString(36).substr(2, 9).toUpperCase();

            Swal.fire({
                title: 'Paiement réussi !',
                html: `
                    <div class="orange-money-receipt">
                        <div class="receipt-header">
                            <div class="receipt-logo">
                                <i class="fas fa-wallet"></i>
                            </div>
                            <h5>Orange Money</h5>
                            <p class="text-success">Transaction réussie</p>
                        </div>
                        <div class="receipt-details">
                            <div class="receipt-row">
                                <span>Numéro</span>
                                <strong>${number}</strong>
                            </div>
                            <div class="receipt-row">
                                <span>Montant</span>
                                <strong>${amount}</strong>
                            </div>
                            <div class="receipt-row">
                                <span>Date</span>
                                <strong>${date}</strong>
                            </div>
                            <div class="receipt-row">
                                <span>Transaction ID</span>
                                <strong>${transactionId}</strong>
                            </div>
                        </div>
                        <div class="receipt-footer">
                            <p class="mb-1">Un SMS de confirmation a été envoyé à votre numéro</p>
                            <small class="text-muted">Conservez ce reçu comme preuve de paiement</small>
                        </div>
                    </div>
                `,
                confirmButtonText: 'Accéder à mon espace',
                allowOutsideClick: false,
                confirmButtonColor: '#28a745'
            }).then(() => {
                window.location.href = 'register.php';
            });
        }
    </script>
</body>
</html>