<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Hôpital</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f4f4f4; }
        .login-container { background: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .login-container h2 { margin-bottom: 20px; }
        .login-container input, .login-container select { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; }
        .login-container button { width: 100%; padding: 10px; background: #5cb85c; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .login-container button:hover { background: #4cae4c; }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Connexion - Hôpital</h2>
        <form id="loginForm">
            <input type="email" id="email" placeholder="Email" required>
            <input type="password" id="password" placeholder="Mot de passe" required>
            <select id="role" required>
                <option value="role">Sélectionnez votre rôle</option>
                <option value="receptionniste">Réceptionniste</option>
                <option value="caissier">Caissier</option>
            </select>
            <button type="submit">Se connecter</button>
        </form>
    </div>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const role = document.getElementById('role').value;
            // Simulation de l'authentification
            if (role === 'receptionniste') {
                alert('Connexion réussie ! Redirection vers la page du réceptionniste.');
                window.location.href = 'receptionniste.php';
            } else if (role === 'caissier') {
                alert('Connexion réussie ! Redirection vers la page du caissier.');
                window.location.href = 'caissier.php';
            } else {
                alert('Rôle non reconnu. Veuillez sélectionner un rôle valide.');
            }
        });
    </script>
</body>

</html>
