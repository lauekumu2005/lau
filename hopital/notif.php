<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications - Administration Hospitalière</title>
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

        .notification-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(0,0,0,0.05);
            position: relative;
        }

        .notification-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .notification-card.unread::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: var(--accent-color);
            border-radius: 15px 0 0 15px;
        }

        .notification-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-right: 15px;
        }

        .icon-success {
            background: rgba(46, 204, 113, 0.1);
            color: var(--success-color);
        }

        .icon-warning {
            background: rgba(241, 196, 15, 0.1);
            color: var(--warning-color);
        }

        .icon-danger {
            background: rgba(231, 76, 60, 0.1);
            color: var(--danger-color);
        }

        .icon-info {
            background: rgba(52, 152, 219, 0.1);
            color: var(--accent-color);
        }

        .notification-content {
            flex-grow: 1;
        }

        .notification-title {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .notification-meta {
            color: var(--light-text);
            font-size: 0.9rem;
        }

        .notification-time {
            color: var(--light-text);
            font-size: 0.8rem;
        }

        .notification-actions {
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

        .btn-dismiss {
            background: var(--light-text);
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
        <a href="notif.php" class="active"><i class="fas fa-bell"></i> Notifications <span class="notification-badge">3</span></a>
        <a href="paiement.php"><i class="fas fa-money-bill-wave"></i> Paiements</a>
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
                    <h2>Notifications</h2>
                    <p class="text-muted">Gérez vos notifications et alertes</p>
                </div>
                <div class="text-end">
                    <p class="mb-0">Non lues: <strong>3</strong></p>
                    <p class="mb-0">Total: <strong>12</strong></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">3</div>
                    <div class="stats-label">Non lues</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">5</div>
                    <div class="stats-label">Aujourd'hui</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">12</div>
                    <div class="stats-label">Cette Semaine</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">45</div>
                    <div class="stats-label">Ce Mois</div>
                </div>
            </div>
        </div>

        <div class="filter-tags">
            <span class="filter-tag active">Toutes</span>
            <span class="filter-tag">Non lues</span>
            <span class="filter-tag">Urgentes</span>
            <span class="filter-tag">Rendez-vous</span>
            <span class="filter-tag">Patients</span>
            <span class="filter-tag">Système</span>
        </div>

        <div class="notification-card unread">
            <div class="d-flex align-items-start">
                <div class="notification-icon icon-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="notification-content">
                    <div class="notification-title">Urgence - Patient en détresse</div>
                    <div class="notification-meta">
                        Le patient Jean Dupont présente des symptômes critiques nécessitant une attention immédiate.
                    </div>
                    <div class="notification-time">
                        <i class="fas fa-clock"></i> Il y a 5 minutes
                    </div>
                </div>
            </div>
            <div class="notification-actions">
                <button class="action-btn btn-view"><i class="fas fa-eye"></i> Voir détails</button>
                <button class="action-btn btn-dismiss"><i class="fas fa-check"></i> Marquer comme lu</button>
            </div>
        </div>

        <div class="notification-card unread">
            <div class="d-flex align-items-start">
                <div class="notification-icon icon-warning">
                    <i class="fas fa-calendar-exclamation"></i>
                </div>
                <div class="notification-content">
                    <div class="notification-title">Rendez-vous annulé</div>
                    <div class="notification-meta">
                        Le rendez-vous de Marie Martin avec Dr. Sophie a été annulé.
                    </div>
                    <div class="notification-time">
                        <i class="fas fa-clock"></i> Il y a 15 minutes
                    </div>
                </div>
            </div>
            <div class="notification-actions">
                <button class="action-btn btn-view"><i class="fas fa-eye"></i> Voir détails</button>
                <button class="action-btn btn-dismiss"><i class="fas fa-check"></i> Marquer comme lu</button>
            </div>
        </div>

        <div class="notification-card unread">
            <div class="d-flex align-items-start">
                <div class="notification-icon icon-success">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="notification-content">
                    <div class="notification-title">Nouveau patient enregistré</div>
                    <div class="notification-meta">
                        Pierre Durand a été enregistré dans le système avec succès.
                    </div>
                    <div class="notification-time">
                        <i class="fas fa-clock"></i> Il y a 30 minutes
                    </div>
                </div>
            </div>
            <div class="notification-actions">
                <button class="action-btn btn-view"><i class="fas fa-eye"></i> Voir détails</button>
                <button class="action-btn btn-dismiss"><i class="fas fa-check"></i> Marquer comme lu</button>
            </div>
        </div>

        <div class="notification-card">
            <div class="d-flex align-items-start">
                <div class="notification-icon icon-info">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div class="notification-content">
                    <div class="notification-title">Mise à jour système</div>
                    <div class="notification-meta">
                        Une nouvelle mise à jour du système est disponible.
                    </div>
                    <div class="notification-time">
                        <i class="fas fa-clock"></i> Il y a 2 heures
                    </div>
                </div>
            </div>
            <div class="notification-actions">
                <button class="action-btn btn-view"><i class="fas fa-eye"></i> Voir détails</button>
                <button class="action-btn btn-dismiss"><i class="fas fa-check"></i> Marquer comme lu</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animation des cartes au survol
        document.querySelectorAll('.notification-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });

        // Filtrage des notifications
        document.querySelectorAll('.filter-tag').forEach(tag => {
            tag.addEventListener('click', () => {
                document.querySelectorAll('.filter-tag').forEach(t => t.classList.remove('active'));
                tag.classList.add('active');
            });
        });

        // Marquer comme lu
        document.querySelectorAll('.btn-dismiss').forEach(btn => {
            btn.addEventListener('click', function() {
                const card = this.closest('.notification-card');
                card.classList.remove('unread');
                this.innerHTML = '<i class="fas fa-check"></i> Lu';
                this.style.background = 'var(--success-color)';
            });
        });
    </script>
</body>

</html>
