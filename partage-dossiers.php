<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partage de Dossiers - Système Central</title>
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

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .dashboard-title {
            color: var(--primary-color);
            font-size: 1.8rem;
            font-weight: 600;
            margin: 0;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--white);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .stat-title {
            color: #666;
            font-size: 1rem;
            font-weight: 500;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 600;
            color: var(--primary-color);
            margin: 0;
        }

        .hospitals-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .hospital-card {
            background: var(--white);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .hospital-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .hospital-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .hospital-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .hospital-status {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .status-active {
            background-color: #e8f5e9;
            color: var(--success-color);
        }

        .status-pending {
            background-color: #fff3e0;
            color: var(--warning-color);
        }

        .hospital-details {
            margin-bottom: 1rem;
        }

        .detail-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
            color: #666;
        }

        .detail-item i {
            width: 20px;
            margin-right: 10px;
            color: var(--primary-color);
        }

        .hospital-actions {
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

        .btn-share {
            background-color: var(--primary-color);
            color: var(--white);
        }

        .btn-share:hover {
            background-color: var(--secondary-color);
            color: var(--white);
        }

        .btn-revoke {
            background-color: var(--danger-color);
            color: var(--white);
        }

        .btn-revoke:hover {
            background-color: #c82333;
            color: var(--white);
        }

        .search-box {
            margin-bottom: 2rem;
        }

        .search-input {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 51, 102, 0.1);
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

        .permission-list {
            margin-top: 1rem;
        }

        .permission-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
            padding: 0.75rem;
            background: #f8f9fa;
            border-radius: 5px;
        }

        .permission-item input[type="checkbox"] {
            margin-right: 0.5rem;
        }

        .btn-modal {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: var(--white);
        }

        .btn-secondary {
            background-color: #6c757d;
            color: var(--white);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
        }

        .btn-secondary:hover {
            background-color: #5a6268;
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
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="index.html" class="navbar-brand">
            <i class="fas fa-hospital"></i>
            Système Central de Partage de Dossiers
        </a>
    </nav>

    <div class="container">
        <div class="dashboard-header">
            <h1 class="dashboard-title">Tableau de Bord</h1>
            <button class="btn-action btn-share" onclick="showAddHospitalModal()">
                <i class="fas fa-plus"></i> Ajouter un Hôpital
            </button>
        </div>

        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-title">Hôpitaux Actifs</span>
                    <div class="stat-icon" style="background: #e8f5e9; color: var(--success-color);">
                        <i class="fas fa-hospital"></i>
                    </div>
                </div>
                <p class="stat-value">12</p>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-title">Dossiers Partagés</span>
                    <div class="stat-icon" style="background: #e3f2fd; color: var(--accent-color);">
                        <i class="fas fa-folder-open"></i>
                    </div>
                </div>
                <p class="stat-value">156</p>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-title">Demandes en Attente</span>
                    <div class="stat-icon" style="background: #fff3e0; color: var(--warning-color);">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <p class="stat-value">3</p>
            </div>
        </div>

        <div class="search-box">
            <input type="text" class="search-input" placeholder="Rechercher un hôpital..." id="searchHospital">
        </div>

        <div class="hospitals-grid" id="hospitalsList">
            <!-- Les cartes d'hôpitaux seront générées dynamiquement ici -->
        </div>
    </div>

    <!-- Modal de Partage -->
    <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shareModalLabel">Partager un Dossier</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="shareForm">
                        <div class="form-group">
                            <label for="patientSelect">Patient</label>
                            <select class="form-control" id="patientSelect" required>
                                <option value="">Sélectionner un patient</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="shareReason">Raison du partage</label>
                            <textarea class="form-control" id="shareReason" rows="3" required 
                                placeholder="Expliquez la raison du partage de ce dossier..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Autorisations</label>
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
                            <label for="shareDuration">Durée de partage</label>
                            <select class="form-control" id="shareDuration" required>
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
                    <button type="button" class="btn-modal btn-primary" onclick="shareDossier()">Partager</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal d'Ajout d'Hôpital -->
    <div class="modal fade" id="addHospitalModal" tabindex="-1" aria-labelledby="addHospitalModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addHospitalModalLabel">Ajouter un Hôpital</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addHospitalForm">
                        <div class="form-group">
                            <label for="hospitalName">Nom de l'hôpital</label>
                            <input type="text" class="form-control" id="hospitalName" required>
                        </div>
                        <div class="form-group">
                            <label for="hospitalCity">Ville</label>
                            <input type="text" class="form-control" id="hospitalCity" required>
                        </div>
                        <div class="form-group">
                            <label for="hospitalAddress">Adresse</label>
                            <textarea class="form-control" id="hospitalAddress" rows="2" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="hospitalContact">Contact</label>
                            <input type="tel" class="form-control" id="hospitalContact" required>
                        </div>
                        <div class="form-group">
                            <label for="hospitalEmail">Email</label>
                            <input type="email" class="form-control" id="hospitalEmail" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-modal btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn-modal btn-primary" onclick="addHospital()">Ajouter</button>
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
        // Données simulées des hôpitaux
        const hospitals = [
            {
                id: 1,
                name: "Hôpital Saint-Joseph",
                city: "Kinshasa",
                status: "active",
                sharedDossiers: 5,
                lastAccess: "2024-03-15"
            },
            {
                id: 2,
                name: "Clinique Ngaliema",
                city: "Kinshasa",
                status: "active",
                sharedDossiers: 3,
                lastAccess: "2024-03-14"
            },
            {
                id: 3,
                name: "Centre Médical de Matete",
                city: "Kinshasa",
                status: "pending",
                sharedDossiers: 0,
                lastAccess: null
            }
        ];

        // Données simulées des patients
        const patients = [
            { id: 1, name: "Lauclass Ekumu" },
            { id: 2, name: "Jean Dupont" },
            { id: 3, name: "Marie Lambert" }
        ];

        // Initialisation
        document.addEventListener('DOMContentLoaded', function() {
            displayHospitals();
            populatePatientSelect();
            initializeSearch();
        });

        // Afficher la liste des hôpitaux
        function displayHospitals() {
            const hospitalsList = document.getElementById('hospitalsList');
            hospitalsList.innerHTML = '';

            hospitals.forEach(hospital => {
                const card = createHospitalCard(hospital);
                hospitalsList.appendChild(card);
            });
        }

        // Créer une carte d'hôpital
        function createHospitalCard(hospital) {
            const card = document.createElement('div');
            card.className = 'hospital-card';
            
            const statusClass = hospital.status === 'active' ? 'status-active' : 'status-pending';
            const statusText = hospital.status === 'active' ? 'Actif' : 'En attente';
            
            card.innerHTML = `
                <div class="hospital-header">
                    <div class="hospital-name">${hospital.name}</div>
                    <div class="hospital-status ${statusClass}">${statusText}</div>
                </div>
                <div class="hospital-details">
                    <div class="detail-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>${hospital.city}</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-folder-open"></i>
                        <span>${hospital.sharedDossiers} dossiers partagés</span>
                    </div>
                    ${hospital.lastAccess ? `
                        <div class="detail-item">
                            <i class="fas fa-clock"></i>
                            <span>Dernier accès: ${formatDate(hospital.lastAccess)}</span>
                        </div>
                    ` : ''}
                </div>
                <div class="hospital-actions">
                    <button class="btn-action btn-share" onclick="showShareModal(${hospital.id})">
                        <i class="fas fa-share-alt"></i> Partager un dossier
                    </button>
                    ${hospital.sharedDossiers > 0 ? `
                        <button class="btn-action btn-revoke" onclick="revokeAccess(${hospital.id})">
                            <i class="fas fa-times"></i> Révoquer l'accès
                        </button>
                    ` : ''}
                </div>
            `;
            
            return card;
        }

        // Remplir le select des patients
        function populatePatientSelect() {
            const select = document.getElementById('patientSelect');
            patients.forEach(patient => {
                const option = document.createElement('option');
                option.value = patient.id;
                option.textContent = patient.name;
                select.appendChild(option);
            });
        }

        // Initialiser la recherche
        function initializeSearch() {
            const searchInput = document.getElementById('searchHospital');
            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                const cards = document.querySelectorAll('.hospital-card');
                
                cards.forEach(card => {
                    const hospitalName = card.querySelector('.hospital-name').textContent.toLowerCase();
                    if (hospitalName.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        }

        // Afficher le modal de partage
        function showShareModal(hospitalId) {
            const modal = new bootstrap.Modal(document.getElementById('shareModal'));
            document.getElementById('shareForm').reset();
            modal.show();
        }

        // Afficher le modal d'ajout d'hôpital
        function showAddHospitalModal() {
            const modal = new bootstrap.Modal(document.getElementById('addHospitalModal'));
            document.getElementById('addHospitalForm').reset();
            modal.show();
        }

        // Partager un dossier
        function shareDossier() {
            const patientId = document.getElementById('patientSelect').value;
            const reason = document.getElementById('shareReason').value;
            const duration = document.getElementById('shareDuration').value;
            
            if (!patientId || !reason) {
                showNotification('Erreur', 'Veuillez remplir tous les champs obligatoires', 'error');
                return;
            }

            // Simuler l'envoi des données
            console.log('Partage du dossier:', {
                patientId,
                reason,
                duration,
                permissions: {
                    viewHistory: document.getElementById('viewHistory').checked,
                    viewTreatments: document.getElementById('viewTreatments').checked,
                    addNotes: document.getElementById('addNotes').checked,
                    addTreatments: document.getElementById('addTreatments').checked
                }
            });

            // Fermer le modal
            bootstrap.Modal.getInstance(document.getElementById('shareModal')).hide();

            // Afficher une notification de succès
            showNotification('Succès', 'Le dossier a été partagé avec succès', 'success');
        }

        // Ajouter un hôpital
        function addHospital() {
            const name = document.getElementById('hospitalName').value;
            const city = document.getElementById('hospitalCity').value;
            const address = document.getElementById('hospitalAddress').value;
            const contact = document.getElementById('hospitalContact').value;
            const email = document.getElementById('hospitalEmail').value;

            if (!name || !city || !address || !contact || !email) {
                showNotification('Erreur', 'Veuillez remplir tous les champs', 'error');
                return;
            }

            // Simuler l'ajout
            console.log('Ajout d\'hôpital:', { name, city, address, contact, email });

            // Fermer le modal
            bootstrap.Modal.getInstance(document.getElementById('addHospitalModal')).hide();

            // Afficher une notification de succès
            showNotification('Succès', 'L\'hôpital a été ajouté avec succès', 'success');
        }

        // Révoquer l'accès
        function revokeAccess(hospitalId) {
            if (confirm('Êtes-vous sûr de vouloir révoquer l\'accès pour cet hôpital ?')) {
                // Simuler la révocation
                console.log('Révocation de l\'accès pour l\'hôpital:', hospitalId);
                showNotification('Succès', 'L\'accès a été révoqué avec succès', 'success');
            }
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
    </script>
</body>
</html> 