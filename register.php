<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Système Hospitalier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --background-color: #f5f7fa;
            --text-color: #2c3e50;
        }

        body {
            background-color: var(--background-color);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .register-container {
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 600px;
            margin: 2rem;
            animation: fadeIn 0.5s ease-in;
        }

        .register-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .register-header img {
            width: 100px;
            margin-bottom: 1.5rem;
        }

        .register-header h1 {
            color: var(--primary-color);
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            color: var(--text-color);
            font-weight: 500;
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-group label i {
            margin-right: 0.5rem;
            color: var(--secondary-color);
        }

        .form-control {
            border: 2px solid #e1e1e1;
            border-radius: 8px;
            padding: 0.8rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .btn-register {
            background-color: var(--primary-color);
            color: white;
            padding: 0.8rem;
            border-radius: 8px;
            width: 100%;
            font-size: 1rem;
            font-weight: 600;
            margin-top: 1rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-register:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .login-link a {
            color: var(--secondary-color);
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .subscription-info {
            background-color: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1.5rem;
        }

        .subscription-info h3 {
            color: var(--primary-color);
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        .subscription-info ul {
            list-style: none;
            padding: 0;
        }

        .subscription-info li {
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }

        .subscription-info li i {
            color: var(--secondary-color);
            margin-right: 0.5rem;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 576px) {
            .register-container {
                margin: 1rem;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <img src="../assets/images/logo.png" alt="Logo Hôpital">
            <h1>Inscription Hôpital</h1>
            <p>Créez votre compte pour accéder au système</p>
        </div>

        <form id="registerForm" onsubmit="return handleRegister(event)">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nom">
                            <i class="fas fa-hospital"></i> Nom de l'hôpital
                        </label>
                        <input type="text" 
                               class="form-control" 
                               id="nom" 
                               name="nom" 
                               required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">
                            <i class="fas fa-envelope"></i> Email
                        </label>
                        <input type="email" 
                               class="form-control" 
                               id="email" 
                               name="email" 
                               required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telephone">
                            <i class="fas fa-phone"></i> Téléphone
                        </label>
                        <input type="tel" 
                               class="form-control" 
                               id="telephone" 
                               name="telephone" 
                               required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="adresse">
                            <i class="fas fa-map-marker-alt"></i> Adresse
                        </label>
                        <input type="text" 
                               class="form-control" 
                               id="adresse" 
                               name="adresse" 
                               required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">
                            <i class="fas fa-lock"></i> Mot de passe
                        </label>
                        <input type="password" 
                               class="form-control" 
                               id="password" 
                               name="password" 
                               required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="confirm_password">
                            <i class="fas fa-lock"></i> Confirmer le mot de passe
                        </label>
                        <input type="password" 
                               class="form-control" 
                               id="confirm_password" 
                               name="confirm_password" 
                               required>
                    </div>
                </div>
            </div>

            <div class="subscription-info">
                <h3>Informations sur l'abonnement</h3>
                <ul>
                    <li><i class="fas fa-check-circle"></i> Essai gratuit d'un mois</li>
                    <li><i class="fas fa-check-circle"></i> Accès à toutes les fonctionnalités</li>
                    <li><i class="fas fa-check-circle"></i> Support technique inclus</li>
                </ul>
            </div>

            <button type="submit" class="btn-register">
                <i class="fas fa-user-plus"></i> Créer mon compte
            </button>
        </form>

        <div class="login-link">
            Déjà inscrit ? <a href="login.php">Se connecter</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function handleRegister(event) {
            event.preventDefault();
            
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            
            if (password !== confirmPassword) {
                alert("Les mots de passe ne correspondent pas");
                return false;
            }
            
            // Ici, vous pouvez ajouter la logique pour envoyer les données au serveur
            // Pour l'instant, on simule juste une redirection vers la page de connexion
            window.location.href = 'role.php';
            
            return false;
        }
    </script>
</body>
</html>