<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Paiements - Administration Hospitalière</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #003366;
            --secondary-color: #002244;
            --accent-color: #003366;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --light-bg: #f4f6f9;
            --dark-text: #003366;
            --light-text: #666666;
            --orange-color: #ff6b00;
        }

        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: var(--light-bg);
            color: var(--dark-text);
        }

        .sidebar { 
            background: linear-gradient(180deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white; 
            padding: 20px; 
            height: 100vh; 
            position: fixed; 
            width: 280px;
            box-shadow: 2px 0 15px rgba(0,0,0,0.1);
            z-index: 1000;
        }

        .sidebar-header {
            padding: 20px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
            text-align: center;
        }

        .sidebar-header h3 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
            color: white;
        }

        .sidebar-header img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
            border: 3px solid rgba(255,255,255,0.2);
        }

        .sidebar a { 
            color: rgba(255,255,255,0.8); 
            text-decoration: none; 
            display: flex;
            align-items: center;
            padding: 12px 15px;
            margin-bottom: 8px;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .sidebar a i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }

        .sidebar a:hover { 
            background-color: rgba(255,255,255,0.1);
            color: white;
            transform: translateX(5px);
        }

        .sidebar a.active {
            background-color: var(--accent-color);
            color: white;
        }

        .main-content { 
            margin-left: 280px; 
            padding: 30px;
        }

        .welcome-section {
            background: white;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .invoice-form {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .invoice-items {
            margin: 20px 0;
        }

        .invoice-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #eee;
            border-radius: 8px;
        }

        .invoice-item:hover {
            background: #f8f9fa;
        }

        .remove-item {
            color: var(--danger-color);
            cursor: pointer;
            padding: 5px;
        }

        .payment-methods-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
        }

        .payment-methods-content {
            position: relative;
            background: white;
            width: 90%;
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 15px;
            max-height: 90vh;
            overflow-y: auto;
        }

        .close-modal {
            position: absolute;
            right: 20px;
            top: 20px;
            font-size: 24px;
            cursor: pointer;
            color: var(--light-text);
        }

        .close-modal:hover {
            color: var(--danger-color);
        }

        .payment-method-card {
            background: #fff;
            border: 1px solid rgba(0,0,0,0.1);
            border-radius: 10px;
            padding: 20px;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .payment-method-card:hover {
            border-color: var(--primary-color);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .payment-summary {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
        }

        .form-label {
            color: var(--dark-text);
            font-weight: 500;
            margin-bottom: 8px;
        }

        .form-control {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 12px;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(0, 51, 102, 0.25);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        /* Styles Orange Money */
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
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="assets/img/hospital-logo.png" alt="Logo Hôpital">
            <h3>Administration</h3>
        </div>
        <nav>
            <a href="index.php">
                <i class="fas fa-home"></i>
                Tableau de bord
            </a>
            <a href="medecin.php">
                <i class="fas fa-user-md"></i>
                Médecins
            </a>
            <a href="hoppat.php">
                <i class="fas fa-users"></i>
                Patients
            </a>
            <a href="rdv.php">
                <i class="fas fa-calendar-check"></i>
                Rendez-vous
            </a>
            <a href="notif.php">
                <i class="fas fa-bell"></i>
                Notifications
            </a>
            <a href="paiement.php" class="active">
                <i class="fas fa-credit-card"></i>
                Paiements
            </a>
            <a href="abonnement.php">
                <i class="fas fa-crown"></i>
                Abonnement
            </a>
            <a href="parametre.php">
                <i class="fas fa-cog"></i>
                Paramètres
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="welcome-section">
            <h1>Gestion des Paiements</h1>
            <p>Créez une facture et gérez les paiements des patients</p>
        </div>

        <!-- Formulaire de facturation -->
        <div class="invoice-form">
            <h3 class="mb-4">Nouvelle Facture</h3>
            <form id="invoiceForm">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Patient</label>
                        <select class="form-control" required>
                            <option value="">Sélectionner un patient</option>
                            <option value="1">Jean Dupont</option>
                            <option value="2">Marie Martin</option>
                            <option value="3">Pierre Durand</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Date de facturation</label>
                        <input type="date" class="form-control" required>
                    </div>
                </div>

                <div class="invoice-items">
                    <h4 class="mb-3">Articles</h4>
                    <div id="itemsList">
                        <!-- Les articles seront ajoutés ici dynamiquement -->
                    </div>
                    <button type="button" class="btn btn-outline-primary" onclick="addInvoiceItem()">
                        <i class="fas fa-plus me-2"></i>Ajouter un article
                    </button>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="payment-summary">
                            <h4>Résumé</h4>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Sous-total</span>
                                <span id="subtotal">$0.00</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>TVA (20%)</span>
                                <span id="tax">$0.00</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <strong>Total</strong>
                                <strong class="text-primary" id="total">$0.00</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="button" class="btn btn-primary btn-lg" onclick="showPaymentMethods()">
                        <i class="fas fa-credit-card me-2"></i>Procéder au paiement
                    </button>
                </div>
            </form>
        </div>

        <!-- Modal des méthodes de paiement -->
        <div class="payment-methods-modal" id="paymentMethodsModal">
            <div class="payment-methods-content">
                <span class="close-modal" onclick="closePaymentMethods()">&times;</span>
                <h3 class="mb-4">Choisir le mode de paiement</h3>
                
                <!-- Carte Bancaire -->
                <div class="payment-method-card mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-credit-card fa-2x text-primary me-3"></i>
                        <h4 class="mb-0">Carte Bancaire</h4>
                    </div>
                    <form id="cardPaymentForm">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Numéro de carte</label>
                                <input type="text" class="form-control" placeholder="1234 5678 9012 3456">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Date d'expiration</label>
                                <input type="text" class="form-control" placeholder="MM/AA">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">CVV</label>
                                <input type="text" class="form-control" placeholder="123">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Nom sur la carte</label>
                                <input type="text" class="form-control" placeholder="JEAN DUPONT">
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Mobile Money -->
                <div class="payment-method-card mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-mobile-alt fa-2x text-primary me-3"></i>
                        <h4 class="mb-0">Mobile Money</h4>
                    </div>
                    <form id="mobileMoneyForm">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Numéro de téléphone</label>
                                <input type="tel" class="form-control" placeholder="+225 07 12 34 56 78">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Opérateur</label>
                                <select class="form-control">
                                    <option value="">Sélectionner un opérateur</option>
                                    <option value="mtn">MTN</option>
                                    <option value="airtel">Airtel</option>
                                    <option value="moov">Moov</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Orange Money -->
                <div class="payment-method-card">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-wallet fa-2x text-primary me-3"></i>
                        <h4 class="mb-0">Orange Money</h4>
                    </div>
                    <form id="orangeMoneyForm">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Numéro Orange Money</label>
                                <input type="tel" class="form-control" id="orangeNumber" placeholder="+225 07 12 34 56 78">
                                <small class="text-muted">Entrez votre numéro Orange Money enregistré</small>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Montant</label>
                                <input type="text" class="form-control" id="orangeAmount" readonly>
                                <small class="text-muted">Montant à débiter de votre compte Orange Money</small>
                            </div>
                        </div>
                        <button type="button" class="btn btn-warning w-100" onclick="requestOrangePayment()">
                            Continuer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal du code secret Orange Money -->
    <div class="modal fade" id="orangePasswordModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Variables globales
        let invoiceItems = [];
        let currentTotal = 0;

        // Ajouter un article à la facture
        function addInvoiceItem() {
            const item = {
                id: Date.now(),
                description: '',
                quantity: 1,
                price: 0
            };
            invoiceItems.push(item);
            updateInvoiceItems();
        }

        // Mettre à jour l'affichage des articles
        function updateInvoiceItems() {
            const itemsList = document.getElementById('itemsList');
            itemsList.innerHTML = '';

            invoiceItems.forEach((item, index) => {
                const itemElement = document.createElement('div');
                itemElement.className = 'invoice-item';
                itemElement.innerHTML = `
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Description" 
                               value="${item.description}" onchange="updateItem(${index}, 'description', this.value)">
                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control" placeholder="Qté" 
                               value="${item.quantity}" onchange="updateItem(${index}, 'quantity', this.value)">
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" placeholder="Prix" 
                               value="${item.price}" onchange="updateItem(${index}, 'price', this.value)">
                    </div>
                    <div class="col-md-2">
                        <span class="text-primary">$${(item.quantity * item.price).toFixed(2)}</span>
                    </div>
                    <div class="col-md-1">
                        <i class="fas fa-times remove-item" onclick="removeItem(${index})"></i>
                    </div>
                `;
                itemsList.appendChild(itemElement);
            });

            updateTotals();
        }

        // Mettre à jour un article
        function updateItem(index, field, value) {
            invoiceItems[index][field] = value;
            updateTotals();
        }

        // Supprimer un article
        function removeItem(index) {
            invoiceItems.splice(index, 1);
            updateInvoiceItems();
        }

        // Mettre à jour les totaux
        function updateTotals() {
            currentTotal = invoiceItems.reduce((sum, item) => sum + (item.quantity * item.price), 0);
            const tax = currentTotal * 0.20;
            const total = currentTotal + tax;

            document.getElementById('subtotal').textContent = `$${currentTotal.toFixed(2)}`;
            document.getElementById('tax').textContent = `$${tax.toFixed(2)}`;
            document.getElementById('total').textContent = `$${total.toFixed(2)}`;
        }

        // Afficher les méthodes de paiement
        function showPaymentMethods() {
            if (currentTotal <= 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: 'Veuillez ajouter au moins un article à la facture'
                });
                return;
            }

            // Mettre à jour le montant Orange Money
            const total = document.getElementById('total').textContent;
            document.getElementById('orangeAmount').value = total;

            document.getElementById('paymentMethodsModal').style.display = 'block';
        }

        // Fermer les méthodes de paiement
        function closePaymentMethods() {
            document.getElementById('paymentMethodsModal').style.display = 'none';
        }

        // Fonctions Orange Money
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
            closePaymentMethods();

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
                confirmButtonText: 'Retour à la facturation',
                allowOutsideClick: false,
                confirmButtonColor: '#28a745'
            }).then(() => {
                // Réinitialiser le formulaire
                invoiceItems = [];
                updateInvoiceItems();
                document.getElementById('invoiceForm').reset();
            });
        }

        // Formater automatiquement le numéro de carte
        document.querySelector('input[placeholder="1234 5678 9012 3456"]').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s/g, '').replace(/[^0-9]/gi, '');
            let newValue = '';
            for(let i = 0; i < value.length; i++) {
                if(i > 0 && i % 4 === 0) {
                    newValue += ' ';
                }
                newValue += value[i];
            }
            e.target.value = newValue;
        });

        // Formater automatiquement la date d'expiration
        document.querySelector('input[placeholder="MM/AA"]').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s/g, '').replace(/[^0-9]/gi, '');
            if(value.length > 2) {
                value = value.substr(0,2) + '/' + value.substr(2);
            }
            e.target.value = value;
        });
    </script>
</body>
</html>