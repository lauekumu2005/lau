<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création des Comptes - Administration Hospitalière</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #003366;
            --secondary-color: #002244;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
        }

        .main-content {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
        }

        .setup-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .setup-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .setup-header img {
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
        }

        .form-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .btn-create {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-create:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        .btn-finish {
            background: var(--success-color);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .btn-finish:hover {
            background: #218838;
            transform: translateY(-2px);
        }

        .accounts-list {
            margin-top: 30px;
        }

        .account-card {
            background: white;
            border: 1px solid #eee;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .account-info {
            flex-grow: 1;
        }

        .account-role {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            margin-left: 10px;
        }

        .role-admin { background: var(--primary-color); color: white; }
        .role-doctor { background: var(--success-color); color: white; }
        .role-receptionist { background: var(--warning-color); color: white; }
        .role-cashier { background: var(--danger-color); color: white; }

        .success-message {
            display: none;
            background: var(--success-color);
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="setup-card">
            <div class="setup-header">
                <img src="https://via.placeholder.com/100" alt="Logo Hôpital">
                <h2>Création des Comptes</h2>
                <p>Créez les comptes pour votre équipe</p>
            </div>

            <div id="successMessage" class="success-message">
                <i class="fas fa-check-circle"></i> Compte créé avec succès !
            </div>

            <form id="accountForm" onsubmit="return handleSubmit(event)">
                <div class="form-section">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nom</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Rôle</label>
                                <select class="form-select" name="role" required>
                                    <option value="">Sélectionner un rôle</option>
                                    <option value="doctor">Médecin</option>
                                    <option value="receptionist">Réceptionniste</option>
                                    <option value="cashier">Caissier</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-create">
                        <i class="fas fa-plus"></i> Créer le compte
                    </button>
                </div>
            </form>

            <div class="accounts-list">
                <h4>Comptes créés</h4>
                <div id="accountsList"></div>
            </div>

            <button id="finishButton" class="btn btn-finish" onclick="finishSetup()" style="display: none;">
                <i class="fas fa-check"></i> Terminer la configuration
            </button>
        </div>
    </div>

    <script>
        let createdAccounts = [];

        function handleSubmit(event) {
            event.preventDefault();
            
            const formData = new FormData(event.target);
            const account = {
                name: formData.get('name'),
                email: formData.get('email'),
                password: formData.get('password'),
                role: formData.get('role')
            };

            // Ajouter le compte à la liste
            createdAccounts.push(account);

            // Afficher le message de succès
            const successMessage = document.getElementById('successMessage');
            successMessage.style.display = 'block';
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 3000);

            // Mettre à jour la liste des comptes
            updateAccountsList();

            // Afficher le bouton de fin si au moins un compte est créé
            document.getElementById('finishButton').style.display = 'block';

            // Réinitialiser le formulaire
            event.target.reset();

            return false;
        }

        function updateAccountsList() {
            const accountsList = document.getElementById('accountsList');
            accountsList.innerHTML = createdAccounts.map((account, index) => `
                <div class="account-card">
                    <div class="account-info">
                        <strong>${account.name}</strong>
                        <span class="account-role role-${account.role}">${account.role}</span>
                        <div class="text-muted">${account.email}</div>
                    </div>
                    <button class="btn btn-sm btn-danger" onclick="deleteAccount(${index})">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `).join('');
        }

        function deleteAccount(index) {
            createdAccounts.splice(index, 1);
            updateAccountsList();
            if (createdAccounts.length === 0) {
                document.getElementById('finishButton').style.display = 'none';
            }
        }

        function finishSetup() {
            // Afficher un message de confirmation
            if (confirm('Voulez-vous terminer la configuration et accéder à la page de connexion ?')) {
                // Rediriger vers la page de connexion
                window.location.href = 'login/index.php';
            }
        }
    </script>
</body>
</html>