<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Médecins - Administration Hospitalière</title>
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

        .doctor-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .doctor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .doctor-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 3px solid var(--accent-color);
        }

        .doctor-specialty {
            color: var(--accent-color);
            font-weight: 500;
            margin-bottom: 10px;
        }

        .doctor-stats {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }

        .stat-item {
            text-align: center;
            padding: 10px;
            background: var(--light-bg);
            border-radius: 8px;
            flex: 1;
        }

        .stat-value {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        .stat-label {
            font-size: 0.8rem;
            color: var(--light-text);
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

        .add-doctor-btn {
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

        .add-doctor-btn:hover {
            transform: scale(1.1);
            background: var(--primary-color);
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-active {
            background: var(--success-color);
            color: white;
        }

        .status-inactive {
            background: var(--light-text);
            color: white;
        }

        .status-busy {
            background: var(--warning-color);
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
        <a href="medecin.php" class="active"><i class="fas fa-user-md"></i> Médecins</a>
        <a href="hoppat.php"><i class="fas fa-procedures"></i> Patients</a>
        <a href="rdv.php"><i class="fas fa-calendar-check"></i> Rendez-vous</a>
        <a href="notif.php"><i class="fas fa-bell"></i> Notifications <span class="notification-badge">3</span></a>
        <a href="paiement.php"><i class="fas fa-money-bill-wave"></i> Paiements</a>
        <a href="abonnement.php">
            <i class="fas fa-crown"></i>
            Abonnement
        </a>
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
                    <h2>Gestion des Médecins</h2>
                    <p class="text-muted">Gérez votre équipe médicale</p>
                </div>
                <div class="text-end">
                    <p class="mb-0">Total Médecins: <strong>45</strong></p>
                    <p class="mb-0">Médecins Actifs: <strong>38</strong></p>
                </div>
            </div>
        </div>

        <div class="search-box">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="Rechercher un médecin...">
                </div>
                <div class="col-md-4">
                    <select class="form-select">
                        <option value="">Toutes les spécialités</option>
                        <option value="cardio">Cardiologie</option>
                        <option value="neuro">Neurologie</option>
                        <option value="pediatrie">Pédiatrie</option>
                        <option value="chirurgie">Chirurgie</option>
                    </select>
                </div>
            </div>
            <div class="filter-tags">
                <span class="filter-tag active">Tous</span>
                <span class="filter-tag">Cardiologie</span>
                <span class="filter-tag">Neurologie</span>
                <span class="filter-tag">Pédiatrie</span>
                <span class="filter-tag">Chirurgie</span>
                <span class="filter-tag">Dermatologie</span>
                <span class="filter-tag">Ophtalmologie</span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="doctor-card">
                    <div class="text-center">
                        <img src="https://via.placeholder.com/80" alt="Dr. Martin" class="doctor-avatar">
                        <h4>Dr. Martin</h4>
                        <div class="doctor-specialty">Cardiologue</div>
                        <span class="status-badge status-active">Actif</span>
                    </div>
                    <div class="doctor-stats">
                        <div class="stat-item">
                            <div class="stat-value">45</div>
                            <div class="stat-label">Patients</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">12</div>
                            <div class="stat-label">RDV Aujourd'hui</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">4.8</div>
                            <div class="stat-label">Note</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="doctor-card">
                    <div class="text-center">
                        <img src="https://via.placeholder.com/80" alt="Dr. Sophie" class="doctor-avatar">
                        <h4>Dr. Sophie</h4>
                        <div class="doctor-specialty">Pédiatre</div>
                        <span class="status-badge status-busy">Occupé</span>
                    </div>
                    <div class="doctor-stats">
                        <div class="stat-item">
                            <div class="stat-value">38</div>
                            <div class="stat-label">Patients</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">15</div>
                            <div class="stat-label">RDV Aujourd'hui</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">4.9</div>
                            <div class="stat-label">Note</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="doctor-card">
                    <div class="text-center">
                        <img src="https://via.placeholder.com/80" alt="Dr. Pierre" class="doctor-avatar">
                        <h4>Dr. Pierre</h4>
                        <div class="doctor-specialty">Chirurgien</div>
                        <span class="status-badge status-inactive">Inactif</span>
                    </div>
                    <div class="doctor-stats">
                        <div class="stat-item">
                            <div class="stat-value">25</div>
                            <div class="stat-label">Patients</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">8</div>
                            <div class="stat-label">RDV Aujourd'hui</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">4.7</div>
                            <div class="stat-label">Note</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="add-doctor-btn">
            <i class="fas fa-plus"></i>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animation des cartes au survol
        document.querySelectorAll('.doctor-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });

        // Filtrage des médecins
        document.querySelectorAll('.filter-tag').forEach(tag => {
            tag.addEventListener('click', () => {
                document.querySelectorAll('.filter-tag').forEach(t => t.classList.remove('active'));
                tag.classList.add('active');
            });
        });

        // Animation du bouton d'ajout
        const addButton = document.querySelector('.add-doctor-btn');
        addButton.addEventListener('mouseenter', () => {
            addButton.style.transform = 'scale(1.1)';
        });
        addButton.addEventListener('mouseleave', () => {
            addButton.style.transform = 'scale(1)';
        });
    </script>
</body>
</html>
