<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètres - DOPAHO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
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

        .settings-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }

        .settings-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .settings-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .settings-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-right: 15px;
        }

        .icon-profile {
            background: rgba(52, 152, 219, 0.1);
            color: var(--accent-color);
        }

        .icon-security {
            background: rgba(231, 76, 60, 0.1);
            color: var(--danger-color);
        }

        .icon-notifications {
            background: rgba(46, 204, 113, 0.1);
            color: var(--success-color);
        }

        .icon-appearance {
            background: rgba(241, 196, 15, 0.1);
            color: var(--warning-color);
        }

        .settings-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin: 0;
        }

        .settings-description {
            color: var(--light-text);
            font-size: 0.9rem;
            margin: 5px 0 0 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--dark-text);
        }

        .form-control {
            border: 1px solid rgba(0,0,0,0.1);
            border-radius: 8px;
            padding: 12px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .form-check {
            margin-bottom: 15px;
        }

        .form-check-input:checked {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }

        .btn-save {
            background: var(--accent-color);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-save:hover {
            background: var(--primary-color);
            transform: translateY(-2px);
        }

        .theme-selector {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }

        .theme-option {
            width: 100px;
            height: 60px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .theme-option:hover {
            transform: translateY(-5px);
        }

        .theme-option.active {
            border-color: var(--accent-color);
        }

        .theme-light {
            background: #ffffff;
        }

        .theme-dark {
            background: #2c3e50;
        }

        .theme-blue {
            background: #3498db;
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

        .password-strength {
            height: 5px;
            background: #eee;
            border-radius: 3px;
            margin-top: 5px;
            overflow: hidden;
        }

        .strength-bar {
            height: 100%;
            width: 0;
            transition: all 0.3s ease;
        }

        .strength-weak {
            background: var(--danger-color);
            width: 33%;
        }

        .strength-medium {
            background: var(--warning-color);
            width: 66%;
        }

        .strength-strong {
            background: var(--success-color);
            width: 100%;
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
            <a href="paiement.php">
                <i class="fas fa-money-bill-wave"></i>
                Paiements
            </a>
            <a href="abonnement.php">
                <i class="fas fa-crown"></i>
                Abonnement
            </a>
            <a href="parametre.php" class="active">
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
            <h2>Paramètres</h2>
            <p>Configurez les paramètres de votre établissement</p>
        </div>

        <!-- Settings Sections -->
        <div class="row">
            <div class="col-md-6">
                <!-- Profile Settings -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profil de l'établissement</h5>
                        <form id="profileForm">
                            <div class="mb-3">
                                <label class="form-label">Nom de l'établissement</label>
                                <input type="text" class="form-control" value="DOPAHO" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Adresse</label>
                                <textarea class="form-control" rows="2" required>123 Rue de la Santé, 75000 Paris</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Téléphone</label>
                                <input type="tel" class="form-control" value="01 23 45 67 89" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="contact@dopaho.com" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>

                <!-- Notification Settings -->
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Paramètres de notification</h5>
                        <form id="notificationForm">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                                    <label class="form-check-label" for="emailNotifications">Notifications par email</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="smsNotifications">
                                    <label class="form-check-label" for="smsNotifications">Notifications par SMS</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="appNotifications" checked>
                                    <label class="form-check-label" for="appNotifications">Notifications dans l'application</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Security Settings -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sécurité</h5>
                        <form id="securityForm">
                            <div class="mb-3">
                                <label class="form-label">Mot de passe actuel</label>
                                <input type="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nouveau mot de passe</label>
                                <input type="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirmer le mot de passe</label>
                                <input type="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Changer le mot de passe</button>
                        </form>
                    </div>
                </div>

                <!-- Backup Settings -->
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Sauvegarde</h5>
                        <div class="mb-3">
                            <label class="form-label">Fréquence de sauvegarde</label>
                            <select class="form-select">
                                <option value="daily">Quotidienne</option>
                                <option value="weekly">Hebdomadaire</option>
                                <option value="monthly">Mensuelle</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-outline-primary" onclick="backupNow()">
                                <i class="fas fa-download"></i>
                                Sauvegarder maintenant
                            </button>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-outline-secondary" onclick="restoreBackup()">
                                <i class="fas fa-upload"></i>
                                Restaurer une sauvegarde
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fonction pour sauvegarder maintenant
        function backupNow() {
            alert('Sauvegarde en cours...');
        }

        // Fonction pour restaurer une sauvegarde
        function restoreBackup() {
            alert('Restauration de la sauvegarde...');
        }

        // Gestion des formulaires
        document.getElementById('profileForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Profil mis à jour avec succès!');
        });

        document.getElementById('notificationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Paramètres de notification mis à jour!');
        });

        document.getElementById('securityForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Mot de passe modifié avec succès!');
        });
    </script>
</body>
</html> 