<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Patients - Administration Hospitalière</title>
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

        .patient-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .patient-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .patient-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 15px;
            border: 3px solid var(--accent-color);
        }

        .patient-info {
            display: flex;
            align-items: center;
        }

        .patient-details {
            flex-grow: 1;
        }

        .patient-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .patient-meta {
            color: var(--light-text);
            font-size: 0.9rem;
        }

        .patient-status {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-hospitalized {
            background: var(--warning-color);
            color: white;
        }

        .status-discharged {
            background: var(--success-color);
            color: white;
        }

        .status-emergency {
            background: var(--danger-color);
            color: white;
        }

        .search-box {
            background: white;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .filter-tags {
            display: flex;
            gap: 10px;
            margin-top: 15px;
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

        .add-patient-btn {
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

        .add-patient-btn:hover {
            transform: scale(1.1);
            background: var(--primary-color);
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

        .patient-actions {
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

        .btn-edit {
            background: var(--warning-color);
        }

        .btn-delete {
            background: var(--danger-color);
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
        <a href="hoppat.php" class="active"><i class="fas fa-procedures"></i> Patients</a>
        <a href="rdv.php"><i class="fas fa-calendar-check"></i> Rendez-vous</a>
        <a href="notif.php"><i class="fas fa-bell"></i> Notifications <span class="notification-badge">3</span></a>
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
                    <h2>Gestion des Patients</h2>
                    <p class="text-muted">Gérez les dossiers des patients</p>
                </div>
                <div class="text-end">
                    <p class="mb-0">Total Patients: <strong>150</strong></p>
                    <p class="mb-0">Hospitalisés: <strong>45</strong></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">150</div>
                    <div class="stats-label">Total Patients</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">45</div>
                    <div class="stats-label">Hospitalisés</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">12</div>
                    <div class="stats-label">Urgences</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">93</div>
                    <div class="stats-label">Consultations</div>
                </div>
            </div>
        </div>

        <div class="search-box">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="Rechercher un patient...">
                </div>
                <div class="col-md-4">
                    <select class="form-select">
                        <option value="">Tous les statuts</option>
                        <option value="hospitalized">Hospitalisé</option>
                        <option value="discharged">Sorti</option>
                        <option value="emergency">Urgence</option>
                    </select>
                </div>
            </div>
            <div class="filter-tags">
                <span class="filter-tag active">Tous</span>
                <span class="filter-tag">Hospitalisés</span>
                <span class="filter-tag">Sortis</span>
                <span class="filter-tag">Urgences</span>
                <span class="filter-tag">Consultations</span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="patient-card">
                    <div class="patient-info">
                        <img src="https://via.placeholder.com/60" alt="Patient" class="patient-avatar">
                        <div class="patient-details">
                            <div class="patient-name">Jean Dupont</div>
                            <div class="patient-meta">
                                <i class="fas fa-id-card"></i> ID: P12345
                                <i class="fas fa-phone ms-3"></i> 06 12 34 56 78
                                <i class="fas fa-envelope ms-3"></i> jean.dupont@email.com
                            </div>
                        </div>
                        <span class="patient-status status-hospitalized">Hospitalisé</span>
                    </div>
                    <div class="patient-actions">
                        <button class="action-btn btn-view"><i class="fas fa-eye"></i> Voir</button>
                        <button class="action-btn btn-edit"><i class="fas fa-edit"></i> Modifier</button>
                        <button class="action-btn btn-delete"><i class="fas fa-trash"></i> Supprimer</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="patient-card">
                    <div class="patient-info">
                        <img src="https://via.placeholder.com/60" alt="Patient" class="patient-avatar">
                        <div class="patient-details">
                            <div class="patient-name">Marie Martin</div>
                            <div class="patient-meta">
                                <i class="fas fa-id-card"></i> ID: P12346
                                <i class="fas fa-phone ms-3"></i> 06 98 76 54 32
                                <i class="fas fa-envelope ms-3"></i> marie.martin@email.com
                            </div>
                        </div>
                        <span class="patient-status status-emergency">Urgence</span>
                    </div>
                    <div class="patient-actions">
                        <button class="action-btn btn-view"><i class="fas fa-eye"></i> Voir</button>
                        <button class="action-btn btn-edit"><i class="fas fa-edit"></i> Modifier</button>
                        <button class="action-btn btn-delete"><i class="fas fa-trash"></i> Supprimer</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="patient-card">
                    <div class="patient-info">
                        <img src="https://via.placeholder.com/60" alt="Patient" class="patient-avatar">
                        <div class="patient-details">
                            <div class="patient-name">Pierre Durand</div>
                            <div class="patient-meta">
                                <i class="fas fa-id-card"></i> ID: P12347
                                <i class="fas fa-phone ms-3"></i> 06 11 22 33 44
                                <i class="fas fa-envelope ms-3"></i> pierre.durand@email.com
                            </div>
                        </div>
                        <span class="patient-status status-discharged">Sorti</span>
                    </div>
                    <div class="patient-actions">
                        <button class="action-btn btn-view"><i class="fas fa-eye"></i> Voir</button>
                        <button class="action-btn btn-edit"><i class="fas fa-edit"></i> Modifier</button>
                        <button class="action-btn btn-delete"><i class="fas fa-trash"></i> Supprimer</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="add-patient-btn">
            <i class="fas fa-plus"></i>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animation des cartes au survol
        document.querySelectorAll('.patient-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });

        // Filtrage des patients
        document.querySelectorAll('.filter-tag').forEach(tag => {
            tag.addEventListener('click', () => {
                document.querySelectorAll('.filter-tag').forEach(t => t.classList.remove('active'));
                tag.classList.add('active');
            });
        });

        // Animation du bouton d'ajout
        const addButton = document.querySelector('.add-patient-btn');
        addButton.addEventListener('mouseenter', () => {
            addButton.style.transform = 'scale(1.1)';
        });
        addButton.addEventListener('mouseleave', () => {
            addButton.style.transform = 'scale(1)';
        });
    </script>
</body>
</html>
