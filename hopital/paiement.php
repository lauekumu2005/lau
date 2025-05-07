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

        .payment-id {
            font-size: 0.9rem;
            color: var(--light-text);
        }

        .payment-amount {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .payment-status {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-paid {
            background: var(--success-color);
            color: white;
        }

        .status-pending {
            background: var(--warning-color);
            color: white;
        }

        .status-overdue {
            background: var(--danger-color);
            color: white;
        }

        .payment-details {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid rgba(0,0,0,0.05);
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 0.9rem;
        }

        .detail-label {
            color: var(--light-text);
        }

        .detail-value {
            font-weight: 500;
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
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }

        .btn-view {
            background: var(--accent-color);
        }

        .btn-print {
            background: var(--secondary-color);
        }

        .btn-edit {
            background: var(--warning-color);
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

        .filter-tags {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .filter-tag {
            padding: 5px 15px;
            background: var(--light-bg);
            border-radius: 20px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-tag:hover {
            background: var(--accent-color);
            color: white;
        }

        .filter-tag.active {
            background: var(--accent-color);
            color: white;
        }

        .user-profile {
            display: flex;
            align-items: center;
            padding: 15px;
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: auto;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-info {
            color: white;
        }

        .user-info h6 {
            margin: 0;
            font-size: 0.9rem;
        }

        .user-info small {
            color: rgba(255,255,255,0.6);
        }

        .add-payment-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--accent-color);
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
            background: var(--primary-color);
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
        <div class="welcome-section">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2>Gestion des Paiements</h2>
                    <p class="text-muted">Gérez les paiements et factures</p>
                </div>
                <div class="text-end">
                    <p class="mb-0">Total Reçu: <strong>45,000 €</strong></p>
                    <p class="mb-0">En Attente: <strong>12,500 €</strong></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">45,000 €</div>
                    <div class="stats-label">Total Reçu</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">12,500 €</div>
                    <div class="stats-label">En Attente</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">150</div>
                    <div class="stats-label">Factures</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">45</div>
                    <div class="stats-label">En Retard</div>
                </div>
            </div>
        </div>

        <div class="filter-tags">
            <span class="filter-tag active">Tous</span>
            <span class="filter-tag">Payés</span>
            <span class="filter-tag">En Attente</span>
            <span class="filter-tag">En Retard</span>
            <span class="filter-tag">Consultations</span>
            <span class="filter-tag">Hospitalisations</span>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="payment-card">
                    <div class="payment-header">
                        <div>
                            <div class="payment-id">Facture #F12345</div>
                            <div class="payment-amount">1,200 €</div>
                        </div>
                        <span class="payment-status status-paid">Payé</span>
                    </div>
                    <div class="payment-details">
                        <div class="detail-item">
                            <span class="detail-label">Patient</span>
                            <span class="detail-value">Jean Dupont</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Date</span>
                            <span class="detail-value">20/03/2024</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Type</span>
                            <span class="detail-value">Hospitalisation</span>
                        </div>
                    </div>
                    <div class="payment-actions">
                        <button class="action-btn btn-view"><i class="fas fa-eye"></i> Voir</button>
                        <button class="action-btn btn-print"><i class="fas fa-print"></i> Imprimer</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="payment-card">
                    <div class="payment-header">
                        <div>
                            <div class="payment-id">Facture #F12346</div>
                            <div class="payment-amount">350 €</div>
                        </div>
                        <span class="payment-status status-pending">En Attente</span>
                    </div>
                    <div class="payment-details">
                        <div class="detail-item">
                            <span class="detail-label">Patient</span>
                            <span class="detail-value">Marie Martin</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Date</span>
                            <span class="detail-value">19/03/2024</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Type</span>
                            <span class="detail-value">Consultation</span>
                        </div>
                    </div>
                    <div class="payment-actions">
                        <button class="action-btn btn-view"><i class="fas fa-eye"></i> Voir</button>
                        <button class="action-btn btn-edit"><i class="fas fa-edit"></i> Modifier</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="payment-card">
                    <div class="payment-header">
                        <div>
                            <div class="payment-id">Facture #F12347</div>
                            <div class="payment-amount">2,500 €</div>
                        </div>
                        <span class="payment-status status-overdue">En Retard</span>
                    </div>
                    <div class="payment-details">
                        <div class="detail-item">
                            <span class="detail-label">Patient</span>
                            <span class="detail-value">Pierre Durand</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Date</span>
                            <span class="detail-value">15/03/2024</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Type</span>
                            <span class="detail-value">Chirurgie</span>
                        </div>
                    </div>
                    <div class="payment-actions">
                        <button class="action-btn btn-view"><i class="fas fa-eye"></i> Voir</button>
                        <button class="action-btn btn-edit"><i class="fas fa-edit"></i> Modifier</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="add-payment-btn">
            <i class="fas fa-plus"></i>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animation des cartes au survol
        document.querySelectorAll('.payment-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px)';
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
            });
        });

        // Animation du bouton d'ajout
        const addButton = document.querySelector('.add-payment-btn');
        addButton.addEventListener('mouseenter', () => {
            addButton.style.transform = 'scale(1.1)';
        });
        addButton.addEventListener('mouseleave', () => {
            addButton.style.transform = 'scale(1)';
        });
    </script>
</body>
</html> 