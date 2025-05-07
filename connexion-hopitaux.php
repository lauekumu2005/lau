<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dopaho - Système de Partage de Dossiers Médicaux</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #003366;
            --secondary-color: #002244;
            --accent-color: #0066cc;
            --success-color: #2e7d32;
            --warning-color: #ef6c00;
            --danger-color: #dc3545;
            --light-bg: #f4f6f9;
            --white: #ffffff;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
            margin: 0;
            padding: 0;
        }

        .navbar {
            background: linear-gradient(90deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: var(--white);
            font-size: 1.5rem;
            font-weight: 600;
            text-decoration: none;
        }

        .navbar-brand i {
            margin-right: 10px;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .auth-section {
            background: var(--white);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            max-width: 500px;
            margin: 2rem auto;
        }

        .auth-title {
            color: var(--primary-color);
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #444;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 51, 102, 0.1);
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: var(--white);
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
        }

        .search-section {
            background: var(--white);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            display: none;
        }

        .search-title {
            color: var(--primary-color);
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .search-box {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .search-input {
            flex: 1;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .search-input:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 51, 102, 0.1);
        }

        .btn-search {
            background-color: var(--primary-color);
            color: var(--white);
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-search:hover {
            background-color: var(--secondary-color);
        }

        .results-section {
            background: var(--white);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            display: none;
        }

        .results-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .results-title {
            color: var(--primary-color);
            font-size: 1.2rem;
            font-weight: 600;
            margin: 0;
        }

        .patient-card {
            background: var(--white);
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .patient-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .patient-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .patient-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .patient-hospital {
            color: #666;
            font-size: 0.9rem;
        }

        .patient-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #666;
        }

        .detail-item i {
            color: var(--primary-color);
            width: 20px;
        }

        .patient-actions {
            display: flex;
            gap: 1rem;
        }

        .btn-action {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-view {
            background-color: var(--accent-color);
            color: var(--white);
        }

        .btn-view:hover {
            background-color: #0052a3;
            color: var(--white);
        }

        .btn-request {
            background-color: var(--warning-color);
            color: var(--white);
        }

        .btn-request:hover {
            background-color: #d45a00;
            color: var(--white);
        }

        .modal-content {
            border-radius: 12px;
            border: none;
        }

        .modal-header {
            background-color: var(--primary-color);
            color: var(--white);
            border-radius: 12px 12px 0 0;
            padding: 1rem 1.5rem;
        }

        .modal-title {
            font-weight: 600;
        }

        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            background: var(--white);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transform: translateX(120%);
            transition: transform 0.3s ease;
            z-index: 1000;
        }

        .notification.show {
            transform: translateX(0);
        }

        .notification-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }

        .notification-success {
            background-color: #e8f5e9;
            color: var(--success-color);
        }

        .notification-error {
            background-color: #ffebee;
            color: var(--danger-color);
        }

        .notification-content {
            flex: 1;
        }

        .notification-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .notification-message {
            color: #666;
            font-size: 0.9rem;
        }

        .user-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .user-details {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-color);
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .user-name {
            font-weight: 600;
            color: var(--primary-color);
        }

        .user-hospital {
            color: #666;
            font-size: 0.9rem;
        }

        .btn-logout {
            background-color: var(--danger-color);
            color: var(--white);
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background-color: #c82333;
        }

        .dossier-details {
            padding: 1rem;
        }

        .dossier-section {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .dossier-section h4 {
            color: var(--primary-color);
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--primary-color);
        }

        .dossier-section p {
            margin-bottom: 0.5rem;
            color: #444;
            line-height: 1.6;
        }

        .dossier-section p strong {
            color: var(--primary-color);
            font-weight: 600;
            margin-right: 0.5rem;
        }

        .dossier-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .dossier-card {
            background: var(--white);
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .dossier-card-title {
            color: var(--primary-color);
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dossier-card-title i {
            color: var(--accent-color);
        }

        .dossier-card-content {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .dossier-timeline {
            position: relative;
            padding-left: 2rem;
            margin-top: 1rem;
        }

        .dossier-timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--primary-color);
            opacity: 0.2;
        }

        .timeline-item {
            position: relative;
            padding-bottom: 1.5rem;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -2rem;
            top: 0.25rem;
            width: 1rem;
            height: 1rem;
            border-radius: 50%;
            background: var(--primary-color);
            border: 2px solid var(--white);
        }

        .timeline-date {
            color: var(--primary-color);
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .timeline-content {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="index.html" class="navbar-brand">
            <i class="fas fa-hospital"></i>
            Dopaho - Système de Partage de Dossiers Médicaux
        </a>
    </nav>

    <div class="container">
        <!-- Section d'authentification -->
        <div class="auth-section" id="authSection">
            <h2 class="auth-title">Connexion</h2>
            <form id="authForm">
                <div class="form-group">
                    <label for="userType">Type d'utilisateur</label>
                    <select class="form-control" id="userType" required>
                        <option value="">Sélectionnez votre rôle</option>
                        <option value="medecin">Médecin</option>
                        <option value="infirmier">Infirmier</option>
                        <option value="admin">Administrateur</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="hospital">Hôpital</label>
                    <select class="form-control" id="hospital" required>
                        <option value="">Sélectionnez votre hôpital</option>
                        <option value="1">Hôpital Saint-Joseph</option>
                        <option value="2">Clinique Ngaliema</option>
                        <option value="3">Centre Médical de Matete</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" required>
                </div>
                <button type="button" class="btn-primary" onclick="authenticate()">
                    <i class="fas fa-sign-in-alt"></i> Se connecter
                </button>
            </form>
        </div>

        <!-- Section de recherche (visible après authentification) -->
        <div class="search-section" id="searchSection">
            <div class="user-info">
                <div class="user-details">
                    <div class="user-avatar" id="userAvatar">JD</div>
                    <div>
                        <div class="user-name" id="userName">Dr. Jean Dupont</div>
                        <div class="user-hospital" id="userHospital">Hôpital Saint-Joseph</div>
                    </div>
                </div>
                <button class="btn-logout" onclick="logout()">
                    <i class="fas fa-sign-out-alt"></i> Déconnexion
                </button>
            </div>
            <h2 class="search-title">Recherche de Patient</h2>
            <div class="search-box">
                <input type="text" class="search-input" id="searchInput" 
                    placeholder="Entrez le nom du patient pour rechercher dans tous les hôpitaux...">
                <button class="btn-search" onclick="searchPatients()">
                    <i class="fas fa-search"></i> Rechercher
                </button>
            </div>
        </div>

        <!-- Section des résultats -->
        <div class="results-section" id="resultsSection">
            <div class="results-header">
                <h3 class="results-title">Résultats de la Recherche</h3>
                <span class="results-count">0 résultat(s) trouvé(s)</span>
            </div>
            <div id="searchResults">
                <!-- Les résultats seront générés dynamiquement ici -->
            </div>
        </div>
    </div>

    <!-- Modal de Demande d'Accès -->
    <div class="modal fade" id="accessRequestModal" tabindex="-1" aria-labelledby="accessRequestModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="accessRequestModalLabel">Demande d'Accès au Dossier</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="accessRequestForm">
                        <div class="form-group">
                            <label for="requestReason">Raison de la demande</label>
                            <textarea class="form-control" id="requestReason" rows="3" required 
                                placeholder="Expliquez la raison de votre demande d'accès..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Type d'accès requis</label>
                            <div class="permission-list">
                                <div class="permission-item">
                                    <input type="checkbox" id="viewHistory" checked>
                                    <label for="viewHistory">Voir l'historique médical</label>
                                </div>
                                <div class="permission-item">
                                    <input type="checkbox" id="viewTreatments" checked>
                                    <label for="viewTreatments">Voir les traitements</label>
                                </div>
                                <div class="permission-item">
                                    <input type="checkbox" id="addNotes">
                                    <label for="addNotes">Ajouter des notes</label>
                                </div>
                                <div class="permission-item">
                                    <input type="checkbox" id="addTreatments">
                                    <label for="addTreatments">Ajouter des traitements</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="accessDuration">Durée d'accès</label>
                            <select class="form-control" id="accessDuration" required>
                                <option value="1">1 jour</option>
                                <option value="7">7 jours</option>
                                <option value="30">30 jours</option>
                                <option value="90">90 jours</option>
                                <option value="permanent">Permanent</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-modal btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn-modal btn-primary" onclick="submitAccessRequest()">Envoyer la demande</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Notification -->
    <div class="notification" id="notification">
        <div class="notification-icon">
            <i class="fas fa-check"></i>
        </div>
        <div class="notification-content">
            <div class="notification-title">Succès</div>
            <div class="notification-message">L'opération a été effectuée avec succès</div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Données simulées des utilisateurs
        const users = [
            {
                username: "lau5",
                password: "lau2005",
                name: "Dr. Lau Ekumu",
                type: "medecin",
                hospital: "Hôpital Saint-Joseph"
            },
            {
                username: "mlambert",
                password: "pass123",
                name: "Dr. Marie Lambert",
                type: "medecin",
                hospital: "Clinique Ngaliema"
            }
        ];

        // Données simulées des patients
        const patients = [
            {
                id: "P001",
                name: "Lauclass Ekumu",
                age: 25,
                gender: "M",
                hospital: "Hôpital Saint-Joseph",
                lastVisit: "2024-03-15",
                status: "En traitement",
                dossier: {
                    historique: "Antécédents médicaux : Aucun",
                    traitements: "Traitement en cours : Antibiotiques",
                    notes: "Patient en bonne santé générale"
                }
            },
            {
                id: "P002",
                name: "Jean Mukeba",
                age: 45,
                gender: "M",
                hospital: "Clinique Ngaliema",
                lastVisit: "2024-03-10",
                status: "Suivi",
                dossier: {
                    historique: "Antécédents : Hypertension",
                    traitements: "Médicaments pour la tension",
                    notes: "Suivi régulier nécessaire"
                }
            },
            {
                id: "P003",
                name: "Marie Mwamba",
                age: 32,
                gender: "F",
                hospital: "Centre Médical de Matete",
                lastVisit: "2024-03-12",
                status: "Consultation",
                dossier: {
                    historique: "Antécédents : Diabète type 2",
                    traitements: "Insuline",
                    notes: "Contrôle glycémique régulier"
                }
            },
            {
                id: "P004",
                name: "Pierre Tshibangu",
                age: 28,
                gender: "M",
                hospital: "Hôpital Saint-Joseph",
                lastVisit: "2024-03-14",
                status: "En observation",
                dossier: {
                    historique: "Antécédents : Asthme",
                    traitements: "Ventoline",
                    notes: "Crise d'asthme récente"
                }
            }
        ];

        // Données simulées des demandes d'accès
        const accessRequests = [];

        let currentUser = null;
        let currentPatientId = null;

        // Authentification
        function authenticate() {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const userType = document.getElementById('userType').value;
            const hospital = document.getElementById('hospital').value;

            // Simuler la vérification des identifiants
            const user = users.find(u => 
                u.username === username && 
                u.password === password && 
                u.type === userType &&
                u.hospital === document.getElementById('hospital').options[document.getElementById('hospital').selectedIndex].text
            );

            if (user) {
                currentUser = user;
                // Sauvegarder l'utilisateur dans le localStorage
                localStorage.setItem('currentUser', JSON.stringify(user));
                showSearchSection();
                updateUserInfo();
                showNotification('Succès', 'Connexion réussie', 'success');
            } else {
                showNotification('Erreur', 'Identifiants incorrects', 'error');
            }
        }

        // Afficher la section de recherche
        function showSearchSection() {
            document.getElementById('authSection').style.display = 'none';
            document.getElementById('searchSection').style.display = 'block';
            document.getElementById('resultsSection').style.display = 'block';
        }

        // Mettre à jour les informations de l'utilisateur
        function updateUserInfo() {
            document.getElementById('userName').textContent = currentUser.name;
            document.getElementById('userHospital').textContent = currentUser.hospital;
            document.getElementById('userAvatar').textContent = currentUser.name.split(' ').map(n => n[0]).join('');
        }

        // Déconnexion
        function logout() {
            currentUser = null;
            // Supprimer l'utilisateur du localStorage
            localStorage.removeItem('currentUser');
            document.getElementById('authSection').style.display = 'block';
            document.getElementById('searchSection').style.display = 'none';
            document.getElementById('resultsSection').style.display = 'none';
            document.getElementById('authForm').reset();
            document.getElementById('searchInput').value = '';
            document.getElementById('searchResults').innerHTML = '';
        }

        // Vérifier la session au chargement de la page
        document.addEventListener('DOMContentLoaded', function() {
            // Récupérer l'utilisateur du localStorage
            const savedUser = localStorage.getItem('currentUser');
            if (savedUser) {
                currentUser = JSON.parse(savedUser);
                showSearchSection();
                updateUserInfo();
            }
        });

        // Rechercher des patients
        function searchPatients() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            
            if (!searchTerm) {
                showNotification('Info', 'Veuillez entrer un nom de patient', 'error');
                return;
            }

            // Simuler un délai de recherche
            showNotification('Info', 'Recherche en cours...', 'success');
            
            setTimeout(() => {
                const filteredPatients = patients.filter(patient => 
                    patient.name.toLowerCase().includes(searchTerm)
                );

                if (filteredPatients.length === 0) {
                    showNotification('Info', 'Aucun patient trouvé', 'error');
                } else {
                    showNotification('Succès', `${filteredPatients.length} patient(s) trouvé(s)`, 'success');
                }

                displaySearchResults(filteredPatients);
            }, 1000);
        }

        // Afficher les résultats de recherche
        function displaySearchResults(patients) {
            const resultsContainer = document.getElementById('searchResults');
            resultsContainer.innerHTML = '';

            if (patients.length === 0) {
                resultsContainer.innerHTML = `
                    <div class="alert alert-info">
                        Aucun patient trouvé pour votre recherche.
                    </div>
                `;
                return;
            }

            patients.forEach(patient => {
                const card = createPatientCard(patient);
                resultsContainer.appendChild(card);
            });

            // Mettre à jour le compteur de résultats
            document.querySelector('.results-count').textContent = `${patients.length} résultat(s) trouvé(s)`;
        }

        // Créer une carte de patient
        function createPatientCard(patient) {
            const card = document.createElement('div');
            card.className = 'patient-card';
            
            card.innerHTML = `
                <div class="patient-header">
                    <div>
                        <div class="patient-name">${patient.name}</div>
                        <div class="patient-hospital">${patient.hospital}</div>
                    </div>
                    <div class="patient-status">${patient.status}</div>
                </div>
                <div class="patient-details">
                    <div class="detail-item">
                        <i class="fas fa-id-card"></i>
                        <span>ID: ${patient.id}</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-user"></i>
                        <span>${patient.age} ans - ${patient.gender}</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-calendar"></i>
                        <span>Dernière visite: ${formatDate(patient.lastVisit)}</span>
                    </div>
                </div>
                <div class="patient-actions">
                    <button class="btn-action btn-view" onclick="viewPatientDetails('${patient.id}')">
                        <i class="fas fa-eye"></i> Voir le dossier
                    </button>
                    <button class="btn-action btn-request" onclick="requestAccess('${patient.id}')">
                        <i class="fas fa-key"></i> Demander l'accès
                    </button>
                </div>
            `;
            
            return card;
        }

        // Voir les détails du patient
        function viewPatientDetails(patientId) {
            const patient = patients.find(p => p.id === patientId);
            if (!patient) return;

            // Vérifier si l'utilisateur a l'accès
            if (!hasAccess(patientId)) {
                showNotification('Accès refusé', 'Vous devez demander l\'accès pour voir le dossier complet', 'error');
                requestAccess(patientId);
                return;
            }

            // Afficher les détails du dossier
            const modal = new bootstrap.Modal(document.getElementById('accessRequestModal'));
            document.getElementById('accessRequestModalLabel').textContent = `Dossier de ${patient.name}`;
            
            const modalBody = document.querySelector('#accessRequestModal .modal-body');
            modalBody.innerHTML = `
                <div class="dossier-details">
                    <div class="dossier-section">
                        <h4>Informations générales</h4>
                        <div class="dossier-grid">
                            <div class="dossier-card">
                                <div class="dossier-card-title">
                                    <i class="fas fa-user"></i>
                                    Informations personnelles
                                </div>
                                <div class="dossier-card-content">
                                    <p><strong>Nom:</strong> ${patient.name}</p>
                                    <p><strong>Âge:</strong> ${patient.age} ans</p>
                                    <p><strong>Genre:</strong> ${patient.gender}</p>
                                    <p><strong>Hôpital:</strong> ${patient.hospital}</p>
                                </div>
                            </div>
                            <div class="dossier-card">
                                <div class="dossier-card-title">
                                    <i class="fas fa-calendar-check"></i>
                                    Dernière visite
                                </div>
                                <div class="dossier-card-content">
                                    <p><strong>Date:</strong> ${formatDate(patient.lastVisit)}</p>
                                    <p><strong>Statut:</strong> ${patient.status}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="dossier-section">
                        <h4>Historique médical</h4>
                        <div class="dossier-timeline">
                            <div class="timeline-item">
                                <div class="timeline-date">${formatDate(patient.lastVisit)}</div>
                                <div class="timeline-content">
                                    ${patient.dossier.historique}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="dossier-section">
                        <h4>Traitements en cours</h4>
                        <div class="dossier-card">
                            <div class="dossier-card-title">
                                <i class="fas fa-pills"></i>
                                Médicaments prescrits
                            </div>
                            <div class="dossier-card-content">
                                ${patient.dossier.traitements}
                            </div>
                        </div>
                    </div>
                    
                    <div class="dossier-section">
                        <h4>Notes médicales</h4>
                        <div class="dossier-card">
                            <div class="dossier-card-title">
                                <i class="fas fa-notes-medical"></i>
                                Observations
                            </div>
                            <div class="dossier-card-content">
                                ${patient.dossier.notes}
                            </div>
                        </div>
                    </div>
                </div>
            `;

            const modalFooter = document.querySelector('#accessRequestModal .modal-footer');
            modalFooter.innerHTML = `
                <button type="button" class="btn-modal btn-secondary" data-bs-dismiss="modal">Fermer</button>
            `;

            modal.show();
        }

        // Vérifier si l'utilisateur a l'accès au dossier
        function hasAccess(patientId) {
            const request = accessRequests.find(r => 
                r.patientId === patientId && 
                r.doctor === currentUser.name &&
                r.status === 'approved'
            );
            return !!request;
        }

        // Demander l'accès
        function requestAccess(patientId) {
            currentPatientId = patientId;
            const modal = new bootstrap.Modal(document.getElementById('accessRequestModal'));
            
            // Réinitialiser le formulaire
            document.getElementById('accessRequestForm').reset();
            document.getElementById('accessRequestModalLabel').textContent = 'Demande d\'Accès au Dossier';
            
            // Restaurer le contenu original du modal
            const modalBody = document.querySelector('#accessRequestModal .modal-body');
            modalBody.innerHTML = `
                <form id="accessRequestForm">
                    <div class="form-group">
                        <label for="requestReason">Raison de la demande</label>
                        <textarea class="form-control" id="requestReason" rows="3" required 
                            placeholder="Expliquez la raison de votre demande d'accès..."></textarea>
                    </div>
                    <div class="form-group">
                        <label>Type d'accès requis</label>
                        <div class="permission-list">
                            <div class="permission-item">
                                <input type="checkbox" id="viewHistory" checked>
                                <label for="viewHistory">Voir l'historique médical</label>
                            </div>
                            <div class="permission-item">
                                <input type="checkbox" id="viewTreatments" checked>
                                <label for="viewTreatments">Voir les traitements</label>
                            </div>
                            <div class="permission-item">
                                <input type="checkbox" id="addNotes">
                                <label for="addNotes">Ajouter des notes</label>
                            </div>
                            <div class="permission-item">
                                <input type="checkbox" id="addTreatments">
                                <label for="addTreatments">Ajouter des traitements</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="accessDuration">Durée d'accès</label>
                        <select class="form-control" id="accessDuration" required>
                            <option value="1">1 jour</option>
                            <option value="7">7 jours</option>
                            <option value="30">30 jours</option>
                            <option value="90">90 jours</option>
                            <option value="permanent">Permanent</option>
                        </select>
                    </div>
                </form>
            `;

            const modalFooter = document.querySelector('#accessRequestModal .modal-footer');
            modalFooter.innerHTML = `
                <button type="button" class="btn-modal btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn-modal btn-primary" onclick="submitAccessRequest()">Envoyer la demande</button>
            `;

            modal.show();
        }

        // Soumettre la demande d'accès
        function submitAccessRequest() {
            const reason = document.getElementById('requestReason').value;
            const duration = document.getElementById('accessDuration').value;
            
            if (!reason) {
                showNotification('Erreur', 'Veuillez remplir tous les champs obligatoires', 'error');
                return;
            }

            // Simuler l'envoi de la demande
            const request = {
                patientId: currentPatientId,
                doctor: currentUser.name,
                hospital: currentUser.hospital,
                reason: reason,
                duration: duration,
                permissions: {
                    viewHistory: document.getElementById('viewHistory').checked,
                    viewTreatments: document.getElementById('viewTreatments').checked,
                    addNotes: document.getElementById('addNotes').checked,
                    addTreatments: document.getElementById('addTreatments').checked
                },
                status: 'pending',
                date: new Date().toISOString()
            };

            accessRequests.push(request);

            // Fermer le modal
            bootstrap.Modal.getInstance(document.getElementById('accessRequestModal')).hide();

            // Afficher une notification de succès
            showNotification('Succès', 'Votre demande d\'accès a été envoyée', 'success');

            // Simuler une réponse automatique après 2 secondes
            setTimeout(() => {
                // Simuler l'approbation automatique pour la démonstration
                request.status = 'approved';
                showNotification('Accès accordé', 'Votre demande d\'accès a été approuvée', 'success');
            }, 2000);
        }

        // Afficher une notification
        function showNotification(title, message, type) {
            const notification = document.getElementById('notification');
            const icon = notification.querySelector('.notification-icon i');
            const notificationTitle = notification.querySelector('.notification-title');
            const notificationMessage = notification.querySelector('.notification-message');

            // Mettre à jour le contenu
            notificationTitle.textContent = title;
            notificationMessage.textContent = message;

            // Mettre à jour le style
            notification.className = 'notification';
            if (type === 'success') {
                notification.classList.add('notification-success');
                icon.className = 'fas fa-check';
            } else {
                notification.classList.add('notification-error');
                icon.className = 'fas fa-times';
            }

            // Afficher la notification
            notification.classList.add('show');

            // Cacher la notification après 3 secondes
            setTimeout(() => {
                notification.classList.remove('show');
            }, 3000);
        }

        // Formater la date
        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('fr-FR');
        }

        // Gérer la recherche avec la touche Entrée
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchPatients();
            }
        });
    </script>
</body>
</html> 