<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partage de Dossiers - Médecin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
        }

        .sidebar {
            background: linear-gradient(180deg, #003366 0%, #002244 100%);
            color: white;
            padding: 20px;
            height: 100vh;
            position: fixed;
            width: 280px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            padding: 20px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }

        .sidebar-header h3 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .sidebar a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 12px 15px;
            margin-bottom: 5px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .sidebar a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .main-content {
            margin-left: 280px;
            padding: 30px;
        }

        .info-section {
            background: white;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .info-section h3 {
            color: #003366;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #003366;
            font-size: 1.2rem;
        }

        .hospital-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .hospital-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .hospital-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .hospital-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: #003366;
        }

        .hospital-status {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .status-active {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .status-pending {
            background-color: #fff3e0;
            color: #ef6c00;
        }

        .hospital-details {
            margin-bottom: 15px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            color: #666;
        }

        .detail-item i {
            width: 20px;
            margin-right: 10px;
            color: #003366;
        }

        .btn-action {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-share {
            background-color: #003366;
            color: white;
        }

        .btn-share:hover {
            background-color: #002244;
        }

        .btn-revoke {
            background-color: #dc3545;
            color: white;
        }

        .btn-revoke:hover {
            background-color: #c82333;
        }

        .search-box {
            margin-bottom: 20px;
        }

        .search-input {
            width: 100%;
            padding: 12px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: #003366;
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 51, 102, 0.1);
        }

        .modal-content {
            border-radius: 12px;
            border: none;
        }

        .modal-header {
            background-color: #003366;
            color: white;
            border-radius: 12px 12px 0 0;
            padding: 15px 20px;
        }

        .modal-title {
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #444;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: #003366;
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 51, 102, 0.1);
        }

        .permission-list {
            margin-top: 15px;
        }

        .permission-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 5px;
        }

        .permission-item input[type="checkbox"] {
            margin-right: 10px;
        }

        .btn-modal {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #003366;
            color: white;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-primary:hover {
            background-color: #002244;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Hôpital Central</h3>
        </div>
        <a href="index.html"><i class="fas fa-home"></i> Tableau de Bord</a>
        <a href="patients.html"><i class="fas fa-user-injured"></i> Mes Patients</a>
        <a href="recherche-patients.html"><i class="fas fa-search"></i> Recherche Patients</a>
        <a href="dossiers.html"><i class="fas fa-folder"></i> Dossiers</a>
        <a href="partage-dossiers.html" class="active"><i class="fas fa-share-alt"></i> Partage de Dossiers</a>
    </div>

    <div class="main-content">
        <div class="info-section">
            <h3>Hôpitaux Partenaires</h3>
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Rechercher un hôpital..." id="searchHospital">
            </div>
            <div id="hospitalsList">
                <!-- Les cartes d'hôpitaux seront générées dynamiquement ici -->
            </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Données simulées des hôpitaux partenaires
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

        // Partager un dossier
        function shareDossier() {
            const patientId = document.getElementById('patientSelect').value;
            const reason = document.getElementById('shareReason').value;
            const duration = document.getElementById('shareDuration').value;
            
            if (!patientId || !reason) {
                alert('Veuillez remplir tous les champs obligatoires');
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
            alert('Le dossier a été partagé avec succès');
        }

        // Révoquer l'accès
        function revokeAccess(hospitalId) {
            if (confirm('Êtes-vous sûr de vouloir révoquer l\'accès pour cet hôpital ?')) {
                // Simuler la révocation
                console.log('Révocation de l\'accès pour l\'hôpital:', hospitalId);
                alert('L\'accès a été révoqué avec succès');
            }
        }

        // Formater la date
        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('fr-FR');
        }
    </script>
</body>
</html> 