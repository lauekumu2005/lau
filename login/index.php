<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Système Hospitalier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .login-header h1 {
            color: #003366;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }
        .login-form input,
        .login-form select {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .login-form button {
            width: 100%;
            padding: 0.75rem;
            background-color: #003366;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .login-form button:hover {
            background-color: #002244;
        }
        .error-message {
            color: #dc3545;
            margin-top: 1rem;
            text-align: center;
            display: none;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Système Hospitalier</h1>
            <p>Connectez-vous pour accéder à votre espace</p>
        </div>
        <form class="login-form" id="loginForm">
            <input type="email" id="email" placeholder="Adresse email" required>
            <input type="password" id="password" placeholder="Mot de passe" required>
            <select id="role" required>
                <option value="">Sélectionnez votre rôle</option>
                <option value="medecin">Médecin</option>
                <option value="admin">Administrateur</option>
                <option value="receptionniste">Réceptionniste</option>
                <option value="caissier">Caissier</option>
            </select>
            <button type="submit">Se connecter</button>
        </form>
        <div class="error-message" id="errorMessage"></div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const role = document.getElementById('role').value;
            const errorMessage = document.getElementById('errorMessage');

            // Simulation d'authentification
            if (email && password && role) {
                // Redirection basée sur le rôle
                switch(role) {
                    case 'medecin':
                        window.location.href = '../medecin/index.php';
                        break;
                    case 'admin':
                        window.location.href = '../hopital/index.php';
                        break;
                    case 'receptionniste':
                        window.location.href = '../hopital/index.php';
                        break;
                    case 'caissier':
                        window.location.href = '../hopital/paiement.php';
                        break;
                }
            } else {
                errorMessage.style.display = 'block';
                errorMessage.textContent = 'Veuillez remplir tous les champs';
            }
        });
    </script>
</body>
</html> 