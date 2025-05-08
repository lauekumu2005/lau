<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètres - Administration Hospitalière</title>
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
        <a href="paiement.php"><i class="fas fa-money-bill-wave"></i> Paiements</a>
        <a href="abonnement.php">
            <i class="fas fa-crown"></i>
            Abonnement
        </a>

        <a href="parametre.php" class="active"><i class="fas fa-cog"></i> Paramètres</a>

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
                    <h2>Paramètres</h2>
                    <p class="text-muted">Gérez vos préférences et paramètres</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="settings-card">
                    <div class="settings-header">
                        <div class="settings-icon icon-profile">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <h3 class="settings-title">Profil</h3>
                            <p class="settings-description">Gérez vos informations personnelles</p>
                        </div>
                    </div>
                    <form>
                        <div class="form-group">
                            <label class="form-label">Photo de profil</label>
                            <div class="d-flex align-items-center">
                                <img src="https://via.placeholder.com/100" alt="Profile" class="rounded-circle me-3" style="width: 100px; height: 100px;">
                                <button type="button" class="btn btn-outline-primary">Changer</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nom complet</label>
                            <input type="text" class="form-control" value="Dr. Admin">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="admin@hopital.com">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" value="+33 6 12 34 56 78">
                        </div>
                        <button type="submit" class="btn btn-save">Enregistrer les modifications</button>
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="settings-card">
                    <div class="settings-header">
                        <div class="settings-icon icon-security">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div>
                            <h3 class="settings-title">Sécurité</h3>
                            <p class="settings-description">Gérez votre mot de passe et la sécurité</p>
                        </div>
                    </div>
                    <form>
                        <div class="form-group">
                            <label class="form-label">Mot de passe actuel</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nouveau mot de passe</label>
                            <input type="password" class="form-control" id="newPassword">
                            <div class="password-strength">
                                <div class="strength-bar strength-weak"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirmer le mot de passe</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="twoFactor">
                            <label class="form-check-label" for="twoFactor">Activer l'authentification à deux facteurs</label>
                        </div>
                        <button type="submit" class="btn btn-save">Mettre à jour la sécurité</button>
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="settings-card">
                    <div class="settings-header">
                        <div class="settings-icon icon-notifications">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div>
                            <h3 class="settings-title">Notifications</h3>
                            <p class="settings-description">Gérez vos préférences de notifications</p>
                        </div>
                    </div>
                    <form>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="emailNotif" checked>
                            <label class="form-check-label" for="emailNotif">Notifications par email</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="smsNotif" checked>
                            <label class="form-check-label" for="smsNotif">Notifications par SMS</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="appNotif" checked>
                            <label class="form-check-label" for="appNotif">Notifications dans l'application</label>
                        </div>
                        <div class="form-group mt-4">
                            <label class="form-label">Types de notifications</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="notifRdv" checked>
                                <label class="form-check-label" for="notifRdv">Rendez-vous</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="notifUrgence" checked>
                                <label class="form-check-label" for="notifUrgence">Urgences</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="notifSystem" checked>
                                <label class="form-check-label" for="notifSystem">Mises à jour système</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-save">Enregistrer les préférences</button>
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="settings-card">
                    <div class="settings-header">
                        <div class="settings-icon icon-appearance">
                            <i class="fas fa-paint-brush"></i>
                        </div>
                        <div>
                            <h3 class="settings-title">Apparence</h3>
                            <p class="settings-description">Personnalisez l'apparence de l'interface</p>
                        </div>
                    </div>
                    <form>
                        <div class="form-group">
                            <label class="form-label">Thème</label>
                            <div class="theme-selector">
                                <div class="theme-option theme-light active"></div>
                                <div class="theme-option theme-dark"></div>
                                <div class="theme-option theme-blue"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Taille de police</label>
                            <select class="form-control">
                                <option>Petite</option>
                                <option selected>Moyenne</option>
                                <option>Grande</option>
                            </select>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="compactMode">
                            <label class="form-check-label" for="compactMode">Mode compact</label>
                        </div>
                        <button type="submit" class="btn btn-save">Appliquer les changements</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animation des cartes au survol
        document.querySelectorAll('.settings-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });

        // Gestion de la force du mot de passe
        const passwordInput = document.getElementById('newPassword');
        const strengthBar = document.querySelector('.strength-bar');

        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;

            if (password.length >= 8) strength++;
            if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
            if (password.match(/\d/) && password.match(/[^a-zA-Z\d]/)) strength++;

            strengthBar.className = 'strength-bar';
            if (strength === 1) strengthBar.classList.add('strength-weak');
            else if (strength === 2) strengthBar.classList.add('strength-medium');
            else if (strength === 3) strengthBar.classList.add('strength-strong');
        });

        // Gestion des thèmes
        document.querySelectorAll('.theme-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.theme-option').forEach(opt => opt.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html> 