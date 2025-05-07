<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche Patients - Médecin</title>
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

        .search-section {
            background: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .search-form {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .search-input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .search-filters {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .filter-select {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.9rem;
        }

        .patient-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .patient-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .patient-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .patient-info:last-child {
            border-bottom: none;
        }

        .patient-details {
            flex-grow: 1;
        }

        .patient-name {
            font-size: 1.3rem;
            font-weight: 600;
            color: #003366;
            margin-bottom: 8px;
        }

        .patient-meta {
            color: #666;
            font-size: 0.95rem;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 10px;
        }

        .patient-meta span {
            display: flex;
            align-items: center;
            gap: 5px;
            background: #f8f9fa;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .patient-meta i {
            color: #003366;
            width: 16px;
        }

        .patient-info-section {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .patient-info-section h4 {
            color: #003366;
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .patient-actions {
            margin-left: 20px;
        }

        .btn-view, .btn-request, .btn-pending, .btn-denied {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-view {
            background-color: #003366;
            color: white;
        }

        .btn-view:hover {
            background-color: #002244;
            transform: translateY(-2px);
        }

        .btn-request {
            background-color: #17a2b8;
            color: white;
        }

        .btn-request:hover {
            background-color: #138496;
            transform: translateY(-2px);
        }

        .btn-pending {
            background-color: #ffc107;
            color: #856404;
            cursor: not-allowed;
        }

        .btn-denied {
            background-color: #dc3545;
            color: white;
            cursor: not-allowed;
        }

        .search-box {
            margin-bottom: 25px;
        }

        .search-input {
            width: 100%;
            padding: 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: #003366;
            box-shadow: 0 0 0 3px rgba(0, 51, 102, 0.1);
            outline: none;
        }

        .filters {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .filter-group {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .filter-label {
            font-weight: 500;
            color: #003366;
            margin-bottom: 8px;
        }

        .filter-select {
            padding: 10px 15px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 1rem;
            min-width: 200px;
            transition: all 0.3s ease;
        }

        .filter-select:focus {
            border-color: #003366;
            box-shadow: 0 0 0 3px rgba(0, 51, 102, 0.1);
            outline: none;
        }

        .initial-state {
            text-align: center;
            padding: 50px 20px;
        }

        .initial-state i {
            color: #003366;
            opacity: 0.5;
        }

        .initial-state h3 {
            color: #003366;
            margin: 20px 0 10px;
        }

        .initial-state p {
            color: #666;
            font-size: 1.1rem;
        }

        .no-results {
            text-align: center;
            padding: 30px;
            background-color: #f8f9fa;
            border-radius: 10px;
            margin-top: 20px;
        }

        .alert {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
        }

        .alert i {
            font-size: 1.3rem;
        }

        .doctor-info {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 8px;
            margin-top: 10px;
        }

        .doctor-name {
            font-weight: 600;
            color: #003366;
        }

        .authorization-status {
            margin-top: 10px;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.9rem;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-approved {
            background-color: #d4edda;
            color: #155724;
        }

        .status-denied {
            background-color: #f8d7da;
            color: #721c24;
        }

        .patient-details-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .patient-details-content {
            background: white;
            border-radius: 15px;
            padding: 30px;
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
        }

        .close-modal {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #666;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .close-modal:hover {
            color: #003366;
        }

        .patient-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f0f0f0;
        }

        .patient-main-info {
            flex-grow: 1;
        }

        .patient-title {
            font-size: 1.8rem;
            color: #003366;
            margin-bottom: 10px;
        }

        .patient-subtitle {
            color: #666;
            font-size: 1.1rem;
        }

        .patient-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .stat-value {
            font-size: 1.5rem;
            color: #003366;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }

        .access-request {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .access-request-title {
            color: #003366;
            font-size: 1.2rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .access-request-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .form-group label {
            color: #666;
            font-size: 0.9rem;
        }

        .form-group textarea {
            padding: 10px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            resize: vertical;
            min-height: 100px;
        }

        .form-group textarea:focus {
            border-color: #003366;
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 51, 102, 0.1);
        }

        .btn-submit-request {
            background-color: #17a2b8;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-submit-request:hover {
            background-color: #138496;
            transform: translateY(-2px);
        }

        .access-result {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .access-result.approved {
            background-color: #d4edda;
            color: #155724;
        }

        .access-result.denied {
            background-color: #f8d7da;
            color: #721c24;
        }

        .access-result i {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .access-result p {
            font-size: 1.2rem;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .access-result .btn-access {
            margin-top: 15px;
        }

        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 25px;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            z-index: 1100;
            animation: slideIn 0.3s ease, fadeOut 0.3s ease 4.7s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .notification-success {
            background-color: #28a745;
        }

        .notification-error {
            background-color: #dc3545;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }

        .simulation-controls {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .simulation-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .simulation-btn.approve {
            background-color: #28a745;
            color: white;
        }

        .simulation-btn.reject {
            background-color: #dc3545;
            color: white;
        }

        .simulation-btn:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .response-message {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            font-size: 1.2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .response-message i {
            font-size: 2.5rem;
        }

        .response-message.approved {
            background-color: #d4edda;
            color: #155724;
        }

        .response-message.denied {
            background-color: #f8d7da;
            color: #721c24;
        }

        .response-message p {
            margin: 0;
            font-weight: 500;
        }

        .response-message .details {
            font-size: 1rem;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Hôpital Central</h3>
        </div>
        <a href="index.php"><i class="fas fa-home"></i> Tableau de Bord</a>
        <a href="patients.php"><i class="fas fa-user-injured"></i> Mes Patients</a>
        <a href="recherche-patients.php" class="active"><i class="fas fa-search"></i> Recherche Patients</a>
        <a href="dossiers.php"><i class="fas fa-folder"></i> Dossiers</a>
    </div>

    <div class="main-content">
        <div class="search-section">
            <h2><i class="fas fa-search"></i> Recherche de Patients</h2>
            
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Rechercher un patient par nom, prénom ou numéro de dossier..." id="searchInput">
            </div>

            <div class="filters">
                <div class="filter-group">
                    <div>
                        <div class="filter-label">Service</div>
                        <select class="filter-select" id="serviceFilter">
                            <option value="">Tous les services</option>
                            <option value="cardiologie">Cardiologie</option>
                            <option value="pediatrie">Pédiatrie</option>
                            <option value="dermatologie">Dermatologie</option>
                            <option value="neurologie">Neurologie</option>
                        </select>
                    </div>
                    <div>
                        <div class="filter-label">Statut</div>
                        <select class="filter-select" id="statusFilter">
                            <option value="">Tous les statuts</option>
                            <option value="hospitalise">Hospitalisé</option>
                            <option value="ambulatoire">Ambulatoire</option>
                            <option value="urgence">Urgence</option>
                        </select>
                    </div>
                </div>
            </div>

            <div id="searchResults" class="search-results" style="display: none;">
                <!-- Les résultats de recherche seront affichés ici -->
            </div>

            <div id="noResults" class="no-results" style="display: none;">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> Aucun résultat trouvé pour votre recherche.
                </div>
            </div>

            <div id="initialState" class="initial-state">
                <div class="text-center py-5">
                    <i class="fas fa-search fa-3x mb-3 text-muted"></i>
                    <h3>Recherche de Patients</h3>
                    <p class="text-muted">Utilisez la barre de recherche ci-dessus pour trouver un patient</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Données simulées des patients
        const patients = [
            {
                id: 1,
                nom: "Ekumu",
                prenom: "Lauclass",
                age: 28,
                sexe: "M",
                poids: "75 kg",
                taille: "178 cm",
                groupeSanguin: "O+",
                service: "Cardiologie",
                statut: "Ambulatoire",
                medecin: "Dr. Martin",
                derniereVisite: "15/03/2024",
                autorisation: "en_attente"
            },
            {
                id: 2,
                nom: "Dupont",
                prenom: "Jean",
                age: 45,
                sexe: "M",
                poids: "82 kg",
                taille: "182 cm",
                groupeSanguin: "A+",
                service: "Neurologie",
                statut: "Hospitalisé",
                medecin: "Dr. Dubois",
                derniereVisite: "10/03/2024",
                autorisation: "refuse"
            },
            {
                id: 3,
                nom: "Martin",
                prenom: "Marie",
                age: 32,
                sexe: "F",
                poids: "58 kg",
                taille: "165 cm",
                groupeSanguin: "B+",
                service: "Pédiatrie",
                statut: "Ambulatoire",
                medecin: "Dr. Petit",
                derniereVisite: "20/03/2024",
                autorisation: "autorise"
            }
        ];

        // Fonction de recherche
        function searchPatients() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const serviceFilter = document.getElementById('serviceFilter').value;
            const statusFilter = document.getElementById('statusFilter').value;
            
            const results = patients.filter(patient => {
                const fullName = `${patient.prenom} ${patient.nom}`.toLowerCase();
                const matchesSearch = fullName.includes(searchTerm);
                const matchesService = !serviceFilter || patient.service.toLowerCase() === serviceFilter;
                const matchesStatus = !statusFilter || patient.statut.toLowerCase() === statusFilter;
                
                return matchesSearch && matchesService && matchesStatus;
            });

            displayResults(results);
        }

        // Fonction d'affichage des résultats
        function displayResults(results) {
            const resultsContainer = document.getElementById('searchResults');
            const noResults = document.getElementById('noResults');
            const initialState = document.getElementById('initialState');
            
            if (results.length === 0) {
                resultsContainer.style.display = 'none';
                noResults.style.display = 'block';
                initialState.style.display = 'none';
                return;
            }

            resultsContainer.style.display = 'block';
            noResults.style.display = 'none';
            initialState.style.display = 'none';

            resultsContainer.innerHTML = results.map(patient => `
                <div class="patient-card">
                    <div class="patient-info">
                        <div class="patient-details">
                            <div class="patient-name">${patient.prenom} ${patient.nom}</div>
                            <div class="patient-meta">
                                <span><i class="fas fa-birthday-cake"></i> ${patient.age} ans</span>
                                <span><i class="fas fa-venus-mars"></i> ${patient.sexe}</span>
                                <span><i class="fas fa-weight"></i> ${patient.poids}</span>
                                <span><i class="fas fa-ruler-vertical"></i> ${patient.taille}</span>
                                <span><i class="fas fa-tint"></i> ${patient.groupeSanguin}</span>
                            </div>
                            <div class="patient-info-section">
                                <div class="patient-meta">
                                    <span><i class="fas fa-hospital"></i> ${patient.service}</span>
                                    <span><i class="fas fa-user-md"></i> ${patient.medecin}</span>
                                    <span><i class="fas fa-calendar"></i> Dernière visite: ${patient.derniereVisite}</span>
                                </div>
                            </div>
                        </div>
                        <div class="patient-actions">
                            ${getAuthorizationButton(patient)}
                        </div>
                    </div>
                </div>
            `).join('');
        }

        // Fonction pour afficher les détails du patient
        function showPatientDetails(patientId) {
            const patient = patients.find(p => p.id === patientId);
            if (!patient) return;

            const modal = document.createElement('div');
            modal.className = 'patient-details-modal';
            modal.innerHTML = `
                <div class="patient-details-content">
                    <button class="close-modal" onclick="closePatientDetails()">&times;</button>
                    <div class="patient-header">
                        <div class="patient-main-info">
                            <h2 class="patient-title">${patient.prenom} ${patient.nom}</h2>
                            <div class="patient-subtitle">
                                <span><i class="fas fa-hospital"></i> ${patient.service}</span> |
                                <span><i class="fas fa-user-md"></i> ${patient.medecin}</span>
                            </div>
                        </div>
                    </div>

                    <div class="patient-stats">
                        <div class="stat-card">
                            <div class="stat-value">${patient.age} ans</div>
                            <div class="stat-label">Âge</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value">${patient.service}</div>
                            <div class="stat-label">Service</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value">${patient.statut}</div>
                            <div class="stat-label">Statut</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value">${patient.derniereVisite}</div>
                            <div class="stat-label">Dernière visite</div>
                        </div>
                    </div>

                    <div class="access-request">
                        <div class="access-request-title">
                            <i class="fas fa-key"></i> Demande d'accès au dossier complet
                        </div>
                        ${getAccessRequestContent(patient)}
                    </div>
                </div>
            `;

            document.body.appendChild(modal);
            modal.style.display = 'flex';
        }

        // Fonction pour afficher une notification
        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            notification.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'times-circle'}"></i>
                ${message}
            `;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 5000);
        }

        // Fonction pour gérer la demande d'accès
        function handleAccessRequest(event, patientId) {
            event.preventDefault();
            const patient = patients.find(p => p.id === patientId);
            if (!patient) return;

            // Simuler une réponse (70% de chance d'être accepté)
            const isApproved = Math.random() < 0.7;
            patient.autorisation = isApproved ? 'autorise' : 'refuse';

            // Mettre à jour l'interface
            const accessRequestSection = document.querySelector('.access-request');
            if (accessRequestSection) {
                accessRequestSection.innerHTML = `
                    <div class="access-result ${isApproved ? 'approved' : 'denied'}">
                        <i class="fas fa-${isApproved ? 'check-circle' : 'times-circle'}"></i>
                        <p>${isApproved ? 'Accès au dossier autorisé' : 'Accès au dossier refusé'}</p>
                        ${isApproved ? `
                            <span class="details">Vous pouvez maintenant consulter le dossier complet du patient</span>
                            <a href="patient-details.php?id=${patient.id}" class="btn-access">
                                <i class="fas fa-eye"></i> Voir le dossier complet
                            </a>
                        ` : `
                            <span class="details">Le médecin traitant a refusé l'accès au dossier</span>
                            <button class="btn-access" disabled>
                                <i class="fas fa-lock"></i> Accès non autorisé
                            </button>
                        `}
                    </div>
                `;
            }

            // Afficher une notification
            showNotification(
                isApproved ? 'Accès au dossier autorisé !' : 'Accès au dossier refusé',
                isApproved ? 'success' : 'error'
            );
        }

        // Modifier la fonction getAccessRequestContent
        function getAccessRequestContent(patient) {
            if (patient.autorisation === 'autorise') {
                return `
                    <div class="access-result approved">
                        <i class="fas fa-check-circle"></i>
                        <p>Accès au dossier autorisé</p>
                        <span class="details">Vous pouvez maintenant consulter le dossier complet du patient</span>
                        <a href="patient-details.php?id=${patient.id}" class="btn-access">
                            <i class="fas fa-eye"></i> Voir le dossier complet
                        </a>
                    </div>
                `;
            } else if (patient.autorisation === 'refuse') {
                return `
                    <div class="access-result denied">
                        <i class="fas fa-times-circle"></i>
                        <p>Accès au dossier refusé</p>
                        <span class="details">Le médecin traitant a refusé l'accès au dossier</span>
                        <button class="btn-access" disabled>
                            <i class="fas fa-lock"></i> Accès non autorisé
                        </button>
                    </div>
                `;
            } else {
                return `
                    <div class="access-request-title">
                        <i class="fas fa-key"></i> Demande d'accès au dossier complet
                    </div>
                    <form class="access-request-form" onsubmit="handleAccessRequest(event, ${patient.id})">
                        <div class="form-group">
                            <label>Raison de la demande d'accès</label>
                            <textarea placeholder="Veuillez expliquer pourquoi vous avez besoin d'accéder à ce dossier..." required></textarea>
                        </div>
                        <button type="submit" class="btn-submit-request">
                            <i class="fas fa-paper-plane"></i> Envoyer la demande
                        </button>
                    </form>
                `;
            }
        }

        // Fonction pour fermer les détails du patient
        function closePatientDetails() {
            const modal = document.querySelector('.patient-details-modal');
            if (modal) {
                modal.remove();
            }
        }

        // Modifier la fonction getAuthorizationButton pour utiliser showPatientDetails
        function getAuthorizationButton(patient) {
            return `<button class="btn-view" onclick="showPatientDetails(${patient.id})">
                <i class="fas fa-eye"></i> Voir les détails
            </button>`;
        }

        // Fermer la modal en cliquant en dehors
        document.addEventListener('click', function(event) {
            const modal = document.querySelector('.patient-details-modal');
            if (modal && event.target === modal) {
                closePatientDetails();
            }
        });

        // Écouteurs d'événements
        document.getElementById('searchInput').addEventListener('input', searchPatients);
        document.getElementById('serviceFilter').addEventListener('change', searchPatients);
        document.getElementById('statusFilter').addEventListener('change', searchPatients);
    </script>
</body>
</html> 