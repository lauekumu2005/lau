<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Système Hospitalier</title>
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

        .login-container {
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 450px;
            margin: 2rem;
            animation: fadeIn 0.5s ease-in;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .login-header img {
            width: 100px;
            margin-bottom: 1.5rem;
            animation: fadeIn 1s ease-in;
        }

        .login-header h1 {
            color: var(--primary-color);
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .login-header p {
            color: #666;
            font-size: 1rem;
            margin: 0;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
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
            width: 100%;
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
            outline: none;
        }

        .role-select {
            position: relative;
        }

        .role-select select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            padding-right: 2.5rem;
            background-color: white;
        }

        .role-select::after {
            content: '\f078';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            pointer-events: none;
        }

        .btn-login {
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
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-login:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }

        .btn-login i {
            font-size: 1.1rem;
        }

        .alert {
            border-radius: 8px;
            margin-bottom: 1.5rem;
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .alert i {
            font-size: 1.2rem;
        }

        .register-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .register-link a {
            color: var(--secondary-color);
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
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
            .login-container {
                margin: 1rem;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <img src="../assets/images/logo.png" alt="Logo Hôpital">
            <h1>Hôpital Saint-Joseph</h1>
            <p>Système de gestion hospitalière</p>
        </div>

        <div id="error-message" class="alert alert-danger" style="display: none;" role="alert">
            <i class="fas fa-exclamation-circle"></i>
            <span id="error-text"></span>
        </div>

        <form id="loginForm" onsubmit="return handleLogin(event)">
            <div class="form-group">
                <label for="email">
                    <i class="fas fa-envelope"></i> Email
                </label>
                <input type="email" 
                       class="form-control" 
                       id="email" 
                       name="email" 
                       placeholder="exemple@hopital.com"
                       required>
            </div>
            
            <div class="form-group">
                <label for="password">
                    <i class="fas fa-lock"></i> Mot de passe
                </label>
                <input type="password" 
                       class="form-control" 
                       id="password" 
                       name="password" 
                       placeholder="••••••••"
                       required>
            </div>

            <div class="form-group role-select">
                <label for="role">
                    <i class="fas fa-user-tag"></i> Rôle
                </label>
                <select class="form-control" id="role" name="role" required>
                    <option value="">Sélectionnez votre rôle</option>
                    <option value="admin">Administrateur</option>
                    <option value="medecin">Médecin</option>
                    <option value="receptionniste">Réceptionniste</option>
                    <option value="caissier">Caissier</option>
                </select>
            </div>
            
            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt"></i> Se connecter
            </button>
        </form>

        <div class="register-link">
            Nouvel hôpital ? <a href="register.php">Créer un compte</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function handleLogin(event) {
            event.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const role = document.getElementById('role').value;
            
            if (email && password && role) {
                // Simulation de vérification des identifiants
                // Dans un cas réel, vous feriez une requête AJAX vers votre serveur
                
                // Redirection selon le rôle
                switch(role) {
                    case 'admin':
                        window.location.href = 'hoppat.php';
                        break;
                    case 'medecin':
                        window.location.href = '../medecin/index.php';  // Redirection vers le dossier medecin
                        break;
                    case 'receptionniste':
                        window.location.href = 'index.php';
                        break;
                    case 'caissier':
                        window.location.href = 'paiement.php';
                        break;
                    default:
                        showError("Rôle non valide");
                }
            } else {
                showError("Veuillez remplir tous les champs");
            }
            
            return false;
        }

        function showError(message) {
            const errorDiv = document.getElementById('error-message');
            const errorText = document.getElementById('error-text');
            errorText.textContent = message;
            errorDiv.style.display = 'block';
            
            setTimeout(() => {
                errorDiv.style.display = 'none';
            }, 3000);
        }
    </script>
</body>
</html>