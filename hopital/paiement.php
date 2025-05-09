<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiements - DOPAHO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <style>
        .orange-money-form {
            background: #fff;
            border-radius: 10px;
            padding: 1.5rem;
        }

        .orange-money-header {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #ff6b00;
        }

        .orange-money-logo {
            width: 60px;
            height: 60px;
            background: #ff6b00;
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
            background: #ff6b00;
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
            color: #003366;
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
            border-top: 5px solid #ff6b00;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Styles pour l'impression */
        @media print {
            body * {
                visibility: hidden;
            }
            #printableInvoice, #printableInvoice * {
                visibility: visible;
            }
            #printableInvoice {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            .no-print {
                display: none !important;
            }
            .invoice-header {
                text-align: center;
                margin-bottom: 30px;
                border-bottom: 2px solid #000;
                padding-bottom: 20px;
            }
            .invoice-details {
                margin-bottom: 30px;
            }
            .invoice-table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 30px;
            }
            .invoice-table th, .invoice-table td {
                border: 1px solid #000;
                padding: 10px;
            }
            .invoice-footer {
                margin-top: 50px;
                text-align: center;
                border-top: 1px solid #000;
                padding-top: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="assets/images/hospital-logo.png" alt="Logo Hôpital">
            <h3>Hôpital Central</h3>
        </div>
        <nav>
            <a href="index.php">
                <i class="fas fa-home"></i>
                Tableau de bord
            </a>
            <a href="hoppat.php">
                <i class="fas fa-users"></i>
                Patients
            </a>
            <a href="medecin.php">
                <i class="fas fa-user-md"></i>
                Médecins
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
                <i class="fas fa-money-bill-wave"></i>
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
        <div class="user-profile">
            <img src="assets/images/admin-avatar.png" alt="Admin">
            <div class="user-info">
                <h6>Admin</h6>
                <small>Administrateur</small>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="welcome-section">
            <h2>Gestion des Paiements</h2>
            <p>Gérez les paiements et les transactions de votre établissement</p>
            <div class="quick-actions">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newPaymentModal">
                    <i class="fas fa-plus"></i>
                    Nouveau Paiement
                </button>
                <button class="btn btn-outline-primary" onclick="exportPayments()">
                    <i class="fas fa-download"></i>
                    Exporter
                </button>
                <button class="btn btn-outline-primary" onclick="refreshPayments()">
                    <i class="fas fa-sync-alt"></i>
                    Actualiser
                </button>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="stats-value">15,000 €</div>
                        <div class="stats-label">
                            <i class="fas fa-money-bill-wave text-primary"></i>
                            Revenus du mois
                        </div>
                        <div class="progress-info">
                            <small>+2,500 € ce mois</small>
                            <div class="progress">
                                <div class="progress-bar bg-primary" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="stats-value">250</div>
                        <div class="stats-label">
                            <i class="fas fa-receipt text-success"></i>
                            Transactions
                        </div>
                        <div class="progress-info">
                            <small>+25 aujourd'hui</small>
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width: 85%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="stats-value">12</div>
                        <div class="stats-label">
                            <i class="fas fa-clock text-warning"></i>
                            En attente
                        </div>
                        <div class="progress-info">
                            <small>-3 aujourd'hui</small>
                            <div class="progress">
                                <div class="progress-bar bg-warning" style="width: 60%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="stats-value">98%</div>
                        <div class="stats-label">
                            <i class="fas fa-check-circle text-info"></i>
                            Taux de succès
                        </div>
                        <div class="progress-info">
                            <small>+1% ce mois</small>
                            <div class="progress">
                                <div class="progress-bar bg-info" style="width: 98%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payments List -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title mb-0">Liste des Paiements</h5>
                    <div class="d-flex gap-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Rechercher...">
                            <button class="btn btn-outline-secondary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <select class="form-select" id="paymentFilter">
                            <option value="">Tous les statuts</option>
                            <option value="completed">Complété</option>
                            <option value="pending">En attente</option>
                            <option value="failed">Échoué</option>
                        </select>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Patient</th>
                                <th>Montant</th>
                                <th>Date</th>
                                <th>Méthode</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="paymentsList">
                            <!-- Les paiements seront chargés dynamiquement ici -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- New Payment Modal -->
    <div class="modal fade" id="newPaymentModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouveau Paiement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="paymentForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Patient</label>
                                <select class="form-select" name="patient_id" required>
                                    <option value="">Sélectionner un patient</option>
                                    <option value="1">Jean Dupont</option>
                                    <option value="2">Marie Martin</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Montant</label>
                                <input type="number" class="form-control" name="amount" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 mb-3">
                                <label class="form-label">Devise</label>
                                <select class="form-select" name="devise" required onchange="updateAmountPlaceholder()">
                                    <option value="CDF">CDF</option>
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Motif</label>
                                <select class="form-select" name="motif" required>
                                    <option value="">Sélectionner</option>
                                    <option value="echographie">Échographie</option>
                                    <option value="consultation">Consultation</option>
                                    <option value="analyse">Analyse médicale</option>
                                    <option value="operation">Opération</option>
                                    <option value="medicament">Médicaments</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Méthode de paiement</label>
                                <select class="form-select" name="payment_method" id="paymentMethod" required onchange="showPaymentDetails()">
                                    <option value="">Sélectionner</option>
                                    <option value="card">Carte bancaire</option>
                                    <option value="cash">Espèces</option>
                                    <option value="orange">Orange Money</option>
                                    <option value="transfer">Virement bancaire</option>
                                </select>
                            </div>
                        </div>
                        <div id="cardDetails" class="payment-details" style="display: none;">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Numéro de carte</label>
                                    <input type="text" class="form-control" placeholder="1234 5678 9012 3456">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nom sur la carte</label>
                                    <input type="text" class="form-control" placeholder="JOHN DOE">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Date d'expiration</label>
                                    <input type="text" class="form-control" placeholder="MM/AA">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">CVV</label>
                                    <input type="text" class="form-control" placeholder="123">
                                </div>
                            </div>
                        </div>
                        <div id="orangeDetails" class="payment-details" style="display: none;">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Numéro Orange Money</label>
                                    <input type="tel" class="form-control" placeholder="+225 07 07 07 07 07">
                                </div>
                            </div>
                        </div>
                        <div id="transferDetails" class="payment-details" style="display: none;">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">IBAN</label>
                                    <input type="text" class="form-control" placeholder="FR76 XXXX XXXX XXXX XXXX XXXX XXX">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">BIC/SWIFT</label>
                                    <input type="text" class="form-control" placeholder="BNPAFRPP">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Référence du virement</label>
                                    <input type="text" class="form-control" placeholder="REF-XXXX-XXXX">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" name="notes" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" onclick="savePayment()">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmation Orange Money -->
    <div class="modal fade" id="orangeConfirmModal" tabindex="-1" data-bs-backdrop="static">
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

    <!-- Modal de reçu Orange Money -->
    <div class="modal fade" id="orangeReceiptModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="orange-money-receipt">
                        <div class="receipt-header">
                            <div class="receipt-logo">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <h4>Orange Money</h4>
                            <p class="text-success mb-0">Transaction réussie</p>
                        </div>
                        <div class="receipt-details">
                            <div class="receipt-row">
                                <span>Date</span>
                                <strong><span id="receiptDate"></span></strong>
                            </div>
                            <div class="receipt-row">
                                <span>Numéro de transaction</span>
                                <strong><span id="receiptTransactionId"></span></strong>
                            </div>
                            <div class="receipt-row">
                                <span>Montant</span>
                                <strong><span id="receiptAmount"></span> FCFA</strong>
                            </div>
                            <div class="receipt-row">
                                <span>Numéro Orange Money</span>
                                <strong><span id="receiptPhone"></span></strong>
                            </div>
                            <div class="receipt-row">
                                <span>Statut</span>
                                <strong class="text-success">Payé</strong>
                            </div>
                        </div>
                        <div class="receipt-footer">
                            <p>Merci d'avoir utilisé Orange Money</p>
                            <p>Un reçu a été envoyé sur votre numéro</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" onclick="printReceipt()">
                        <i class="fas fa-print"></i> Imprimer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de facture -->
    <div class="modal fade" id="invoiceModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Facture de paiement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="invoiceContent">
                    <div class="text-center mb-4">
                        <img src="assets/images/hospital-logo.png" alt="Logo Hôpital" style="height: 60px;">
                        <h4>Hôpital Central</h4>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6>Détails du paiement</h6>
                            <p>Date: <span id="invoiceDate"></span></p>
                            <p>Numéro de facture: <span id="invoiceNumber"></span></p>
                            <p>Motif: <span id="invoiceMotif"></span></p>
                        </div>
                        <div class="col-md-6">
                            <h6>Patient</h6>
                            <p>Nom: <span id="invoicePatient"></span></p>
                            <p>ID: <span id="invoicePatientId"></span></p>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Montant</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span id="invoiceMotifDetail"></span></td>
                                    <td><span id="invoiceAmount"></span> FCFA</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th><span id="invoiceTotal"></span> FCFA</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="text-center mt-4">
                        <p>Méthode de paiement: <span id="invoiceMethod"></span></p>
                        <p>Statut: <span class="badge bg-success">Payé</span></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" onclick="printInvoice()">
                        <i class="fas fa-print"></i> Imprimer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Template de facture pour l'impression -->
    <div id="printableInvoice" style="display: none;">
        <div class="invoice-header">
            <img src="assets/images/hospital-logo.png" alt="Logo Hôpital" style="height: 80px;">
            <h2>Hôpital Central</h2>
            <p>123 Avenue de la Santé, Kinshasa</p>
            <p>Tél: +243 123 456 789</p>
        </div>
        
        <div class="invoice-details">
            <div class="row">
                <div class="col-6">
                    <h4>Facture à</h4>
                    <p><strong>Patient:</strong> <span id="printPatient"></span></p>
                    <p><strong>ID Patient:</strong> <span id="printPatientId"></span></p>
                </div>
                <div class="col-6 text-end">
                    <h4>Détails de la facture</h4>
                    <p><strong>N° Facture:</strong> <span id="printInvoiceNumber"></span></p>
                    <p><strong>Date:</strong> <span id="printDate"></span></p>
                    <p><strong>Statut:</strong> <span class="badge bg-success">Payé</span></p>
                </div>
            </div>
        </div>

        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><span id="printMotif"></span></td>
                    <td><span id="printAmount"></span></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    <th><span id="printTotal"></span></th>
                </tr>
            </tfoot>
        </table>

        <div class="invoice-footer">
            <p><strong>Méthode de paiement:</strong> <span id="printMethod"></span></p>
            <p>Merci de votre confiance</p>
            <p>Cette facture est une preuve de paiement officielle</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Fonction pour exporter les paiements
        function exportPayments() {
            alert('Exportation des paiements...');
        }

        // Fonction pour rafraîchir la liste
        function refreshPayments() {
            loadPayments();
            alert('Liste actualisée');
        }

        // Fonction pour afficher les détails de paiement selon la méthode sélectionnée
        function showPaymentDetails() {
            const method = document.getElementById('paymentMethod').value;
            document.querySelectorAll('.payment-details').forEach(el => el.style.display = 'none');
            
            if (method === 'card') {
                document.getElementById('cardDetails').style.display = 'block';
            } else if (method === 'orange') {
                document.getElementById('orangeDetails').style.display = 'block';
            } else if (method === 'transfer') {
                document.getElementById('transferDetails').style.display = 'block';
            }
        }

        // Fonction pour mettre à jour le placeholder du montant selon la devise
        function updateAmountPlaceholder() {
            const devise = document.querySelector('select[name="devise"]').value;
            const amountInput = document.querySelector('input[name="amount"]');
            amountInput.placeholder = devise === 'CDF' ? 'Montant en Francs Congolais' : 'Montant en Dollars';
        }

        // Fonction pour traiter le paiement
        function processPayment(method, amount, devise, patient, motif) {
            const submitButton = document.querySelector('#paymentForm button[type="submit"]');
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Traitement en cours...';
            submitButton.disabled = true;

            // Générer un numéro de facture
            const invoiceNumber = 'INV-' + Date.now().toString().slice(-6);
            const paymentId = 'PAY-' + Date.now().toString().slice(-6);
            const patientName = document.querySelector('select[name="patient_id"] option:checked').text;
            const currentDate = new Date().toLocaleString();
            
            // Créer le nouveau paiement
            const newPayment = {
                id: paymentId,
                patient: patientName,
                amount: amount,
                devise: devise,
                date: currentDate,
                method: method === 'orange' ? 'Orange Money' : 
                       method === 'card' ? 'Carte bancaire' : 
                       method === 'transfer' ? 'Virement bancaire' : 'Espèces',
                status: 'Complété',
                motif: motif,
                invoiceNumber: invoiceNumber
            };

            // Récupérer les paiements existants
            let payments = JSON.parse(localStorage.getItem('payments')) || [];
            
            // Ajouter le nouveau paiement au début de la liste
            payments.unshift(newPayment);
            
            // Sauvegarder dans le localStorage
            localStorage.setItem('payments', JSON.stringify(payments));

            // Afficher une notification de succès
            Swal.fire({
                icon: 'success',
                title: 'Paiement enregistré !',
                text: 'Redirection vers la page des paiements...',
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                // Rediriger vers la page des paiements
                window.location.href = 'paiement.php';
            });
        }

        // Fonction pour sauvegarder un nouveau paiement
        function savePayment() {
            const method = document.getElementById('paymentMethod').value;
            const amount = document.querySelector('input[name="amount"]').value;
            const devise = document.querySelector('select[name="devise"]').value;
            const patient = document.querySelector('select[name="patient_id"]').value;
            const motif = document.querySelector('select[name="motif"]').value;

            if (!amount || !devise || !patient || !motif) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: 'Veuillez remplir tous les champs obligatoires'
                });
                return;
            }

            if (method === 'orange') {
                const phoneNumber = document.querySelector('#orangeDetails input[placeholder="+225 07 07 07 07 07"]').value;
                if (!phoneNumber) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur',
                        text: 'Veuillez entrer votre numéro Orange Money'
                    });
                    return;
                }

                // Afficher le modal de code PIN
                new bootstrap.Modal(document.getElementById('orangeConfirmModal')).show();
                return;
            }

            processPayment(method, amount, devise, patient, motif);
        }

        // Fonction pour confirmer le paiement Orange Money
        function confirmOrangePayment() {
            const password = document.getElementById('orangePassword').value;
            const phoneNumber = document.querySelector('#orangeDetails input[placeholder="+225 07 07 07 07 07"]').value;
            const amount = document.querySelector('input[name="amount"]').value;
            const devise = document.querySelector('select[name="devise"]').value;
            const patient = document.querySelector('select[name="patient_id"]').value;
            const motif = document.querySelector('select[name="motif"]').value;

            if (password.length !== 4) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: 'Le code secret doit contenir 4 chiffres'
                });
                return;
            }

            // Fermer le modal de mot de passe
            bootstrap.Modal.getInstance(document.getElementById('orangeConfirmModal')).hide();

            // Afficher la demande de confirmation
            Swal.fire({
                title: 'Confirmer la transaction',
                html: `
                    <div class="text-center">
                        <div class="orange-money-logo mb-3">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <p>Voulez-vous confirmer le paiement de <strong>${amount} ${devise}</strong> ?</p>
                        <p class="text-muted">Numéro: ${phoneNumber}</p>
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
                        showOrangeReceipt(phoneNumber, amount, devise, motif);
                    }, 3000);
                }
            });
        }

        function showOrangeReceipt(number, amount, devise, motif) {
            const date = new Date().toLocaleString();
            const transactionId = 'OM' + Math.random().toString(36).substr(2, 9).toUpperCase();
            const motifText = {
                'echographie': 'Échographie',
                'consultation': 'Consultation médicale',
                'analyse': 'Analyse médicale',
                'operation': 'Opération chirurgicale',
                'medicament': 'Médicaments'
            }[motif] || motif;

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
                                <span>Motif</span>
                                <strong>${motifText}</strong>
                            </div>
                            <div class="receipt-row">
                                <span>Montant</span>
                                <strong>${amount} ${devise}</strong>
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
                confirmButtonText: 'Retour à la liste',
                allowOutsideClick: false,
                confirmButtonColor: '#28a745'
            }).then(() => {
                // Traiter le paiement et rediriger
                processPayment('orange', amount, devise, patient, motif);
            });
        }

        // Fonction pour charger la liste des paiements
        function loadPayments() {
            // Récupérer les paiements du localStorage
            let payments = JSON.parse(localStorage.getItem('payments')) || [];
            
            const container = document.getElementById('paymentsList');
            container.innerHTML = payments.map(payment => `
                <tr>
                    <td>${payment.id}</td>
                    <td>${payment.patient}</td>
                    <td>${payment.amount} ${payment.devise}</td>
                    <td>${payment.date}</td>
                    <td>${payment.method}</td>
                    <td>
                        <span class="badge ${payment.status === 'Complété' ? 'bg-success' : 'bg-warning'}">
                            ${payment.status}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary" onclick="editPayment('${payment.id}')">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger" onclick="deletePayment('${payment.id}')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `).join('');
        }

        // Fonction pour supprimer un paiement
        function deletePayment(paymentId) {
            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "Cette action est irréversible !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Récupérer les paiements
                    let payments = JSON.parse(localStorage.getItem('payments')) || [];
                    
                    // Filtrer le paiement à supprimer
                    payments = payments.filter(payment => payment.id !== paymentId);
                    
                    // Sauvegarder les paiements mis à jour
                    localStorage.setItem('payments', JSON.stringify(payments));
                    
                    // Recharger la liste
                    loadPayments();
                    
                    Swal.fire(
                        'Supprimé !',
                        'Le paiement a été supprimé avec succès.',
                        'success'
                    );
                }
            });
        }

        // Fonction pour éditer un paiement
        function editPayment(paymentId) {
            // Récupérer les paiements
            let payments = JSON.parse(localStorage.getItem('payments')) || [];
            
            // Trouver le paiement à éditer
            const payment = payments.find(p => p.id === paymentId);
            
            if (payment) {
                // Afficher le modal d'édition avec les données du paiement
                Swal.fire({
                    title: 'Modifier le paiement',
                    html: `
                        <form id="editPaymentForm">
                            <div class="mb-3">
                                <label class="form-label">Montant</label>
                                <input type="number" class="form-control" id="editAmount" value="${payment.amount}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Statut</label>
                                <select class="form-select" id="editStatus">
                                    <option value="Complété" ${payment.status === 'Complété' ? 'selected' : ''}>Complété</option>
                                    <option value="En attente" ${payment.status === 'En attente' ? 'selected' : ''}>En attente</option>
                                </select>
                            </div>
                        </form>
                    `,
                    showCancelButton: true,
                    confirmButtonText: 'Enregistrer',
                    cancelButtonText: 'Annuler',
                    preConfirm: () => {
                        const amount = document.getElementById('editAmount').value;
                        const status = document.getElementById('editStatus').value;
                        
                        // Mettre à jour le paiement
                        payment.amount = amount;
                        payment.status = status;
                        
                        // Sauvegarder les modifications
                        localStorage.setItem('payments', JSON.stringify(payments));
                        
                        // Recharger la liste
                        loadPayments();
                        
                        return true;
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Modifié !',
                            'Le paiement a été modifié avec succès.',
                            'success'
                        );
                    }
                });
            }
        }

        // Fonction pour imprimer la facture
        function printInvoice() {
            const printContent = document.getElementById('invoiceContent').innerHTML;
            const originalContent = document.body.innerHTML;

            document.body.innerHTML = `
                <div class="container mt-4">
                    ${printContent}
                </div>
            `;

            window.print();
            document.body.innerHTML = originalContent;
            loadPayments();
        }

        // Fonction pour imprimer le reçu
        function printReceipt() {
            const printContent = document.querySelector('.orange-money-receipt').innerHTML;
            const originalContent = document.body.innerHTML;

            document.body.innerHTML = `
                <div class="container mt-4">
                    ${printContent}
                </div>
            `;

            window.print();
            document.body.innerHTML = originalContent;
        }

        // Charger les paiements au chargement de la page
        document.addEventListener('DOMContentLoaded', function() {
            loadPayments();
        });
    </script>
</body>
</html>