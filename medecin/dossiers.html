<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dopaho - Dossiers Médicaux</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #003366;
            --secondary-color: #17a2b8;
            --accent-color: #004d99;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }

        #wrapper {
            display: flex;
            min-height: 100vh;
        }

        #sidebar {
            background-color: var(--primary-color);
            color: white;
            min-height: 100vh;
            width: 250px;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }

        #sidebar .sidebar-header {
            font-size: 24px;
            font-weight: bold;
            color: #ffffff;
            padding: 20px;
            background-color: #002244;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        #sidebar ul {
            list-style: none;
            padding: 0;
        }

        #sidebar ul li {
            padding: 15px 25px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        #sidebar ul li a {
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
        }

        #sidebar ul li:hover {
            background-color: var(--secondary-color);
            padding-left: 30px;
        }

        #page-content-wrapper {
            flex-grow: 1;
            padding: 30px;
        }

        .navbar {
            background-color: #ffffff;
            padding: 15px 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-brand {
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-box {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .search-input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .filters {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .filter-group {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }

        .filter-label {
            font-weight: 500;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .filter-select {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: white;
        }

        .medical-records {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .record-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .patient-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .patient-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--secondary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
        }

        .patient-name {
            font-size: 1.2rem;
            font-weight: 500;
            color: var(--primary-color);
        }

        .patient-meta {
            color: #666;
            font-size: 0.9rem;
        }

        .record-actions {
            display: flex;
            gap: 10px;
        }

        .btn-action {
            padding: 8px 15px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-add {
            background-color: var(--success-color);
            color: white;
        }

        .btn-print {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-action:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .record-tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }

        .tab {
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .tab.active {
            background-color: var(--primary-color);
            color: white;
        }

        .tab:hover:not(.active) {
            background-color: #f0f0f0;
        }

        .record-content {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .record-section {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 500;
            color: var(--primary-color);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-content {
            display: grid;
            gap: 10px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 8px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .info-label {
            color: #666;
            font-size: 0.9rem;
        }

        .info-value {
            font-weight: 500;
            color: var(--primary-color);
        }

        .prescription-list {
            display: grid;
            gap: 10px;
        }

        .prescription-item {
            background-color: white;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .prescription-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .prescription-date {
            color: #666;
            font-size: 0.9rem;
        }

        .prescription-content {
            color: var(--primary-color);
        }

        .analysis-list {
            display: grid;
            gap: 10px;
        }

        .analysis-item {
            background-color: white;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .analysis-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .analysis-date {
            color: #666;
            font-size: 0.9rem;
        }

        .analysis-content {
            color: var(--primary-color);
        }

        .analysis-status {
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-pending {
            background-color: rgba(255, 193, 7, 0.1);
            color: var(--warning-color);
        }

        .status-completed {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--success-color);
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar">
            <div class="sidebar-header">
                <i class="bi bi-hospital"></i>
                Dopaho
            </div>
            <ul>
                <li>
                    <i class="bi bi-house"></i>
                    <a href="index.html">Accueil</a>
                </li>
                <li>
                    <i class="bi bi-calendar-check"></i>
                    <a href="rdv.html">Mes Rendez-vous</a>
                </li>
                <li>
                    <i class="bi bi-people"></i>
                    <a href="patients.html">Mes Patients</a>
                </li>
                <li>
                    <i class="bi bi-search"></i>
                    <a href="recherche-patients.html">Recherche Patients</a>
                </li>
                <li>
                    <i class="bi bi-file-medical"></i>
                    <a href="dossiers.html">Dossiers Médicaux</a>
                </li>
                <li>
                    <i class="bi bi-bell"></i>
                    <a href="notifications.html">Notifications</a>
                </li>
                <li>
                    <i class="bi bi-gear"></i>
                    <a href="parametres.html">Paramètres</a>
                </li>
            </ul>
        </div>

        <!-- Page content -->
        <div id="page-content-wrapper">
            <nav class="navbar">
                <div class="navbar-brand">
                    <i class="bi bi-file-medical"></i>
                    <span>Dossiers Médicaux</span>
                </div>
            </nav>

            <div class="search-box">
                <input type="text" class="search-input" placeholder="Rechercher un dossier médical...">
            </div>

            <div class="filters">
                <div class="filter-group">
                    <div>
                        <div class="filter-label">Spécialité</div>
                        <select class="filter-select">
                            <option>Toutes</option>
                            <option>Cardiologie</option>
                            <option>Pédiatrie</option>
                            <option>Dermatologie</option>
                        </select>
                    </div>
                    <div>
                        <div class="filter-label">Date de création</div>
                        <select class="filter-select">
                            <option>Toutes</option>
                            <option>Dernier mois</option>
                            <option>Dernier trimestre</option>
                            <option>Dernière année</option>
                        </select>
                    </div>
                    <div>
                        <div class="filter-label">Statut</div>
                        <select class="filter-select">
                            <option>Tous</option>
                            <option>Actif</option>
                            <option>Archivé</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="medical-records">
                <div class="record-header">
                    <div class="patient-info">
                        <div class="patient-avatar">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <div class="patient-name">Jean Dupont</div>
                            <div class="patient-meta">
                                <span>45 ans - Cardiologie</span>
                            </div>
                        </div>
                    </div>
                    <div class="record-actions">
                        <button class="btn-action btn-add">
                            <i class="bi bi-plus"></i> Nouvelle entrée
                        </button>
                        <button class="btn-action btn-print">
                            <i class="bi bi-printer"></i> Imprimer
                        </button>
                    </div>
                </div>

                <div class="record-tabs">
                    <div class="tab active">Informations générales</div>
                    <div class="tab">Prescriptions</div>
                    <div class="tab">Analyses</div>
                    <div class="tab">Historique</div>
                </div>

                <div class="record-content">
                    <div class="record-section">
                        <div class="section-title">
                            <i class="bi bi-info-circle"></i>
                            Informations personnelles
                        </div>
                        <div class="section-content">
                            <div class="info-item">
                                <span class="info-label">Date de naissance</span>
                                <span class="info-value">15/06/1979</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Groupe sanguin</span>
                                <span class="info-value">A+</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Allergies</span>
                                <span class="info-value">Pénicilline</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Antécédents familiaux</span>
                                <span class="info-value">Diabète, Hypertension</span>
                            </div>
                        </div>
                    </div>

                    <div class="record-section">
                        <div class="section-title">
                            <i class="bi bi-heart-pulse"></i>
                            État de santé
                        </div>
                        <div class="section-content">
                            <div class="info-item">
                                <span class="info-label">Poids</span>
                                <span class="info-value">75 kg</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Taille</span>
                                <span class="info-value">175 cm</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Tension artérielle</span>
                                <span class="info-value">130/80 mmHg</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Dernier examen</span>
                                <span class="info-value">15/03/2024</span>
                            </div>
                        </div>
                    </div>

                    <div class="record-section">
                        <div class="section-title">
                            <i class="bi bi-capsule"></i>
                            Prescriptions récentes
                        </div>
                        <div class="prescription-list">
                            <div class="prescription-item">
                                <div class="prescription-header">
                                    <span class="prescription-date">10/04/2024</span>
                                </div>
                                <div class="prescription-content">
                                    - Atorvastatine 20mg (1x/jour)<br>
                                    - Aspirine 100mg (1x/jour)<br>
                                    - Métoprolol 50mg (2x/jour)
                                </div>
                            </div>
                            <div class="prescription-item">
                                <div class="prescription-header">
                                    <span class="prescription-date">15/03/2024</span>
                                </div>
                                <div class="prescription-content">
                                    - Atorvastatine 20mg (1x/jour)<br>
                                    - Aspirine 100mg (1x/jour)
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="record-section">
                        <div class="section-title">
                            <i class="bi bi-droplet"></i>
                            Analyses récentes
                        </div>
                        <div class="analysis-list">
                            <div class="analysis-item">
                                <div class="analysis-header">
                                    <span class="analysis-date">05/04/2024</span>
                                    <span class="analysis-status status-completed">Terminé</span>
                                </div>
                                <div class="analysis-content">
                                    - Bilan lipidique<br>
                                    - Glycémie à jeun<br>
                                    - Numération formule sanguine
                                </div>
                            </div>
                            <div class="analysis-item">
                                <div class="analysis-header">
                                    <span class="analysis-date">22/04/2024</span>
                                    <span class="analysis-status status-pending">En attente</span>
                                </div>
                                <div class="analysis-content">
                                    - Échographie cardiaque<br>
                                    - Test d'effort
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 