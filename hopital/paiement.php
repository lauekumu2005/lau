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

        .payment-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .payment-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .payment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .payment-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .payment-status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-paid {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--success-color);
        }

        .status-pending {
            background-color: rgba(255, 193, 7, 0.1);
            color: var(--warning-color);
        }

        .status-overdue {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--danger-color);
        }

        .payment-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 15px;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
        }

        .detail-label {
            font-size: 0.8rem;
            color: var(--light-text);
            margin-bottom: 5px;
        }

        .detail-value {
            font-weight: 500;
            color: var(--dark-text);
        }

        .payment-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .action-btn {
            padding: 8px 15px;
            border-radius: 8px;
            border: none;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .btn-view {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-print {
            background-color: var(--light-bg);
            color: var(--dark-text);
        }

        .btn-edit {
            background-color: var(--warning-color);
            color: white;
        }

        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .stats-value {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .stats-label {
            color: var(--light-text);
            font-size: 0.9rem;
        }

        .filter-section {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .filter-tags {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 15px;
        }

        .filter-tag {
            padding: 5px 15px;
            border-radius: 20px;
            background-color: var(--light-bg);
            color: var(--dark-text);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-tag:hover, .filter-tag.active {
            background-color: var(--primary-color);
            color: white;
        }

        .add-payment-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .add-payment-btn:hover {
            transform: scale(1.1);
            background-color: var(--secondary-color);
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="https://via.placeholder.com/80" alt="Logo Hôpital">
            <h3>Hôpital Central</h3>
        </div>
        <a href="index.php"><i class="fas fa-home"></i> Tableau de Bord</a>
        <a href="medecin.php"><i class="fas fa-user-md"></i> Médecins</a>
        <a href="hoppat.php"><i class="fas fa-procedures"></i> Patients</a>
        <a href="rdv.php"><i class="fas fa-calendar-check"></i> Rendez-vous</a>
        <a href="notif.php"><i class="fas fa-bell"></i> Notifications <span class="notification-badge">3</span></a>
        <a href="paiement.php" class="active"><i class="fas fa-money-bill-wave"></i> Paiements</a>
        <a href="parametre.php"><i class="fas fa-cog"></i> Paramètres</a>

        <div class="user-profile">
            <img src="https://via.placeholder.com/40" alt="Admin">
            <div class="user-info">
                <h6>Dr. Admin</h6>
                <small>Administrateur</small>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Gestion des Paiements</h2>
            <div class="d-flex gap-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Rechercher un paiement...">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <button class="btn btn-primary">
                    <i class="fas fa-download"></i> Exporter
                </button>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">€45,250</div>
                    <div class="stats-label">Total reçu ce mois</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">€12,500</div>
                    <div class="stats-label">En attente</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">156</div>
                    <div class="stats-label">Factures émises</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">€3,200</div>
                    <div class="stats-label">Retards de paiement</div>
                </div>
            </div>
        </div>

        <div class="filter-section">
            <h5>Filtres</h5>
            <div class="filter-tags">
                <span class="filter-tag active">Tous</span>
                <span class="filter-tag">Payés</span>
                <span class="filter-tag">En attente</span>
                <span class="filter-tag">En retard</span>
                <span class="filter-tag">Ce mois</span>
                <span class="filter-tag">Ce trimestre</span>
            </div>
        </div>

        <div class="payment-list">
            <div class="payment-card">
                <div class="payment-header">
                    <div class="payment-title">Consultation Dr. Smith</div>
                    <span class="payment-status status-paid">Payé</span>
                </div>
                <div class="payment-details">
                    <div class="detail-item">
                        <span class="detail-label">Patient</span>
                        <span class="detail-value">Jean Dupont</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Date</span>
                        <span class="detail-value">15/03/2024</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Montant</span>
                        <span class="detail-value">€120.00</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Méthode</span>
                        <span class="detail-value">Carte bancaire</span>
                    </div>
                </div>
                <div class="payment-actions">
                    <button class="action-btn btn-view">
                        <i class="fas fa-eye"></i> Voir détails
                    </button>
                    <button class="action-btn btn-print">
                        <i class="fas fa-print"></i> Imprimer
                    </button>
                    <button class="action-btn btn-edit">
                        <i class="fas fa-edit"></i> Modifier
                    </button>
                </div>
            </div>

            <div class="payment-card">
                <div class="payment-header">
                    <div class="payment-title">Analyse sanguine</div>
                    <span class="payment-status status-pending">En attente</span>
                </div>
                <div class="payment-details">
                    <div class="detail-item">
                        <span class="detail-label">Patient</span>
                        <span class="detail-value">Marie Martin</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Date</span>
                        <span class="detail-value">14/03/2024</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Montant</span>
                        <span class="detail-value">€85.00</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Méthode</span>
                        <span class="detail-value">En attente</span>
                    </div>
                </div>
                <div class="payment-actions">
                    <button class="action-btn btn-view">
                        <i class="fas fa-eye"></i> Voir détails
                    </button>
                    <button class="action-btn btn-print">
                        <i class="fas fa-print"></i> Imprimer
                    </button>
                    <button class="action-btn btn-edit">
                        <i class="fas fa-edit"></i> Modifier
                    </button>
                </div>
            </div>

            <div class="payment-card">
                <div class="payment-header">
                    <div class="payment-title">Radiographie</div>
                    <span class="payment-status status-overdue">En retard</span>
                </div>
                <div class="payment-details">
                    <div class="detail-item">
                        <span class="detail-label">Patient</span>
                        <span class="detail-value">Pierre Durand</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Date</span>
                        <span class="detail-value">10/03/2024</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Montant</span>
                        <span class="detail-value">€150.00</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Méthode</span>
                        <span class="detail-value">Non payé</span>
                    </div>
                </div>
                <div class="payment-actions">
                    <button class="action-btn btn-view">
                        <i class="fas fa-eye"></i> Voir détails
                    </button>
                    <button class="action-btn btn-print">
                        <i class="fas fa-print"></i> Imprimer
                    </button>
                    <button class="action-btn btn-edit">
                        <i class="fas fa-edit"></i> Modifier
                    </button>
                </div>
            </div>
        </div>

        <div class="add-payment-btn" onclick="openNewPaymentModal()">
            <i class="fas fa-plus"></i>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animation des cartes de paiement
        document.querySelectorAll('.payment-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-5px)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });

        // Filtrage des paiements
        document.querySelectorAll('.filter-tag').forEach(tag => {
            tag.addEventListener('click', () => {
                document.querySelectorAll('.filter-tag').forEach(t => t.classList.remove('active'));
                tag.classList.add('active');
                // Logique de filtrage à implémenter
            });
        });

        // Fonction pour ouvrir la modale de nouveau paiement
        function openNewPaymentModal() {
            // À implémenter
            alert('Fonctionnalité à venir');
        }
    </script>
</body>
</html> 