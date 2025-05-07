<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dopaho - Dossiers Médicaux</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #003366;
            --secondary-color: #17a2b8;
            --accent-color: #004d99;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }

        #wrapper {
            display: flex;
            min-height: 100vh;
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

        .sidebar a.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
        }

        #page-content-wrapper {
            margin-left: 280px;
            padding: 30px;
            width: calc(100% - 280px);
        }

        .navbar {
            background-color: #ffffff;
            padding: 15px 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-brand {
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-box {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .search-input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .filters {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .filter-group {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }

        .filter-label {
            font-weight: 500;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .filter-select {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: white;
        }

        .medical-records {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .record-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .patient-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .patient-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--secondary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
        }

        .patient-name {
            font-size: 1.2rem;
            font-weight: 500;
            color: var(--primary-color);
        }

        .patient-meta {
            color: #666;
            font-size: 0.9rem;
        }

        .record-actions {
            display: flex;
            gap: 10px;
        }

        .btn-action {
            padding: 8px 15px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-add {
            background-color: var(--success-color);
            color: white;
        }

        .btn-print {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-action:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .record-tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }

        .tab {
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .tab.active {
            background-color: var(--primary-color);
            color: white;
        }

        .tab:hover:not(.active) {
            background-color: #f0f0f0;
        }

        .record-content {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .record-section {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            width: 100%;
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 500;
            color: var(--primary-color);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-content {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .info-item {
            flex: 1;
            min-width: 200px;
            display: flex;
            justify-content: space-between;
            padding: 12px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .info-label {
            color: #666;
            font-size: 0.9rem;
        }

        .info-value {
            font-weight: 500;
            color: var(--primary-color);
        }

        .prescription-list {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .prescription-item, .analysis-item {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }

        .prescription-header, .analysis-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .prescription-date, .analysis-date {
            color: #666;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .prescription-content, .analysis-content {
            color: var(--primary-color);
            line-height: 1.6;
            padding: 5px 0;
        }

        .prescription-header .prescription-date {
            font-weight: 500;
        }

        .analysis-header .analysis-date {
            font-weight: 500;
        }

        .analysis-status {
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-pending {
            background-color: rgba(255, 193, 7, 0.1);
            color: var(--warning-color);
        }

        .status-completed {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--success-color);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .tab.active {
            background-color: var(--primary-color);
            color: white;
        }

        .history-details {
            padding: 20px;
        }
        .detail-section {
            margin-bottom: 20px;
        }
        .detail-section h6 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-weight: 600;
        }
        .detail-item {
            display: flex;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }
        .detail-label {
            font-weight: 500;
            width: 150px;
            color: #666;
        }
        .detail-value {
            flex: 1;
            color: var(--primary-color);
        }
        .btn-view {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-view:hover {
            background-color: var(--accent-color);
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .btn-view i {
            font-size: 0.9rem;
        }
        .status-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h3>Hôpital Central</h3>
            </div>
            <a href="index.php"><i class="fas fa-home"></i> Tableau de Bord</a>
            <a href="patients.php"><i class="fas fa-user-injured"></i> Mes Patients</a>
            <a href="recherche-patients.php"><i class="fas fa-search"></i> Recherche Patients</a>
        </div>

        <!-- Page content -->
        <div id="page-content-wrapper">
            <nav class="navbar">
                <div class="navbar-brand">
                    <button class="btn btn-link text-decoration-none" onclick="window.location.href='patients.php'">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <i class="fas fa-file-medical"></i>
                    <span>Dossiers Médicaux</span>
                </div>
            </nav>

            <div class="medical-records">
                <div class="record-header">
                    <div class="patient-info">
                        <div class="patient-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <div class="patient-name">Jean Dupont</div>
                            <div class="patient-meta">
                                <span>45 ans - Cardiologie</span>
                            </div>
                        </div>
                    </div>
                    <div class="record-actions">
                        <button class="btn-action btn-add" onclick="showAddEntryModal()">
                            <i class="fas fa-plus"></i> Nouvelle entrée
                        </button>
                    </div>
                </div>

                <!-- Modal Nouvelle Entrée -->
                <div class="modal fade" id="addEntryModal" tabindex="-1" aria-labelledby="addEntryModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addEntryModalLabel">Nouvelle Entrée</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="addEntryForm">
                                    <div class="form-group">
                                        <label for="entryType">Type d'entrée</label>
                                        <select class="form-control" id="entryType" required>
                                            <option value="">Sélectionnez un type</option>
                                            <option value="prescription">Prescription</option>
                                            <option value="analysis">Analyse</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="entryDate">Date</label>
                                        <input type="date" class="form-control" id="entryDate" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="entryDescription">Description</label>
                                        <textarea class="form-control" id="entryDescription" rows="4" required></textarea>
                                    </div>
                                    <div id="prescriptionFields" style="display: none;">
                                        <div class="form-group">
                                            <label for="medication">Médicament</label>
                                            <input type="text" class="form-control" id="medication">
                                        </div>
                                        <div class="form-group">
                                            <label for="dosage">Posologie</label>
                                            <input type="text" class="form-control" id="dosage">
                                        </div>
                                    </div>
                                    <div id="analysisFields" style="display: none;">
                                        <div class="form-group">
                                            <label for="analysisType">Type d'analyse</label>
                                            <input type="text" class="form-control" id="analysisType">
                                        </div>
                                        <div class="form-group">
                                            <label for="analysisStatus">Statut</label>
                                            <select class="form-control" id="analysisStatus">
                                                <option value="pending">En attente</option>
                                                <option value="completed">Terminé</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn-modal btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <button type="button" class="btn-modal btn-primary" onclick="saveEntry()">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Détails Antécédent -->
                <div class="modal fade" id="historyDetailsModal" tabindex="-1" aria-labelledby="historyDetailsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="historyDetailsModalLabel">Détails de l'antécédent</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="history-details">
                                    <div class="detail-section">
                                        <h6>Informations générales</h6>
                                        <div class="detail-item">
                                            <span class="detail-label">Date :</span>
                                            <span id="historyDate" class="detail-value"></span>
                                        </div>
                                        <div class="detail-item">
                                            <span class="detail-label">Type :</span>
                                            <span id="historyType" class="detail-value"></span>
                                        </div>
                                        <div class="detail-item">
                                            <span class="detail-label">Description :</span>
                                            <span id="historyDescription" class="detail-value"></span>
                                        </div>
                                    </div>
                                    <div id="prescriptionDetails" class="detail-section" style="display: none;">
                                        <h6>Détails de la prescription</h6>
                                        <div class="detail-item">
                                            <span class="detail-label">Médicament :</span>
                                            <span id="historyMedication" class="detail-value"></span>
                                        </div>
                                        <div class="detail-item">
                                            <span class="detail-label">Posologie :</span>
                                            <span id="historyDosage" class="detail-value"></span>
                                        </div>
                                    </div>
                                    <div id="analysisDetails" class="detail-section" style="display: none;">
                                        <h6>Détails de l'analyse</h6>
                                        <div class="detail-item">
                                            <span class="detail-label">Type d'analyse :</span>
                                            <span id="historyAnalysisType" class="detail-value"></span>
                                        </div>
                                        <div class="detail-item">
                                            <span class="detail-label">Statut :</span>
                                            <span id="historyStatus" class="detail-value"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn-modal btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="record-tabs">
                    <div class="tab active" onclick="showTab('general')">Informations générales</div>
                    <div class="tab" onclick="showTab('prescriptions')">Prescriptions</div>
                    <div class="tab" onclick="showTab('analyses')">Analyses</div>
                </div>

                <div class="record-content">
                    <!-- Onglet Informations générales -->
                    <div id="general-tab" class="tab-content active">
                        <div class="record-section">
                            <div class="section-title">
                                <i class="fas fa-info-circle"></i>
                                Informations personnelles
                            </div>
                            <div class="section-content">
                                <div class="info-item">
                                    <span class="info-label">Date de naissance</span>
                                    <span class="info-value">15/06/1979</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Groupe sanguin</span>
                                    <span class="info-value">A+</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Allergies</span>
                                    <span class="info-value">Pénicilline</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Antécédents familiaux</span>
                                    <span class="info-value">Diabète, Hypertension</span>
                                </div>
                            </div>
                        </div>

                        <div class="record-section">
                            <div class="section-title">
                                <i class="fas fa-heartbeat"></i>
                                État de santé
                            </div>
                            <div class="section-content">
                                <div class="info-item">
                                    <span class="info-label">Poids</span>
                                    <span class="info-value">75 kg</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Taille</span>
                                    <span class="info-value">175 cm</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Tension artérielle</span>
                                    <span class="info-value">130/80 mmHg</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Dernier examen</span>
                                    <span class="info-value">15/03/2024</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Onglet Prescriptions -->
                    <div id="prescriptions-tab" class="tab-content">
                        <div class="record-section">
                            <div class="section-title">
                                <i class="fas fa-prescription"></i>
                                Prescriptions récentes
                            </div>
                            <div class="prescription-list">
                                <div class="prescription-item">
                                    <div class="prescription-header">
                                        <span class="prescription-date">10/04/2024</span>
                                    </div>
                                    <div class="prescription-content">
                                        - Atorvastatine 20mg (1x/jour)<br>
                                        - Aspirine 100mg (1x/jour)<br>
                                        - Métoprolol 50mg (2x/jour)
                                    </div>
                                </div>
                                <div class="prescription-item">
                                    <div class="prescription-header">
                                        <span class="prescription-date">15/03/2024</span>
                                    </div>
                                    <div class="prescription-content">
                                        - Atorvastatine 20mg (1x/jour)<br>
                                        - Aspirine 100mg (1x/jour)
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Onglet Analyses -->
                    <div id="analyses-tab" class="tab-content">
                        <div class="record-section">
                            <div class="section-title">
                                <i class="fas fa-vial"></i>
                                Analyses récentes
                            </div>
                            <div class="analysis-list">
                                <div class="analysis-item">
                                    <div class="analysis-header">
                                        <span class="analysis-date">05/04/2024</span>
                                        <span class="analysis-status status-completed">Terminé</span>
                                    </div>
                                    <div class="analysis-content">
                                        - Bilan lipidique<br>
                                        - Glycémie à jeun<br>
                                        - Numération formule sanguine
                                    </div>
                                </div>
                                <div class="analysis-item">
                                    <div class="analysis-header">
                                        <span class="analysis-date">22/04/2024</span>
                                        <span class="analysis-status status-pending">En attente</span>
                                    </div>
                                    <div class="analysis-content">
                                        - Échographie cardiaque<br>
                                        - Test d'effort
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let addEntryModal;
        let historyDetailsModal;

        document.addEventListener('DOMContentLoaded', function() {
            // Initialisation des modals
            addEntryModal = new bootstrap.Modal(document.getElementById('addEntryModal'));
            historyDetailsModal = new bootstrap.Modal(document.getElementById('historyDetailsModal'));

            // Récupérer l'ID du patient depuis l'URL
            const urlParams = new URLSearchParams(window.location.search);
            const patientId = urlParams.get('id');

            // Récupérer les données du patient depuis le localStorage
            const patients = JSON.parse(localStorage.getItem('patients') || '[]');
            const patient = patients.find(p => p.id === parseInt(patientId));

            if (patient) {
                // Mettre à jour les informations du patient
                document.querySelector('.patient-name').textContent = `${patient.prenom} ${patient.nom}`;
                document.querySelector('.patient-meta').innerHTML = `
                    <span>${patient.age} ans - ${patient.specialite || 'Général'}</span>
                `;

                // Mettre à jour les informations personnelles
                const infoItems = document.querySelectorAll('.info-item');
                infoItems[0].querySelector('.info-value').textContent = patient.dateNaissance || 'Non spécifié';
                infoItems[1].querySelector('.info-value').textContent = patient.groupeSanguin || 'Non spécifié';
                infoItems[2].querySelector('.info-value').textContent = patient.allergies || 'Aucune';
                infoItems[3].querySelector('.info-value').textContent = patient.antecedentsFamiliaux || 'Non spécifié';

                // Mettre à jour l'état de santé
                const healthItems = document.querySelectorAll('.record-section:nth-child(2) .info-item');
                healthItems[0].querySelector('.info-value').textContent = `${patient.poids} kg`;
                healthItems[1].querySelector('.info-value').textContent = `${patient.taille} cm`;
                healthItems[2].querySelector('.info-value').textContent = patient.tensionArterielle || 'Non mesurée';
                healthItems[3].querySelector('.info-value').textContent = patient.dernierExamen || 'Non spécifié';

                // Charger les antécédents spécifiques
                loadPatientHistory(patientId);
            } else {
                document.querySelector('.medical-records').innerHTML = `
                    <div class="alert alert-danger">
                        Patient non trouvé
                    </div>
                `;
            }

            // Gestionnaire d'événement pour le type d'entrée
            document.getElementById('entryType').addEventListener('change', function() {
                const prescriptionFields = document.getElementById('prescriptionFields');
                const analysisFields = document.getElementById('analysisFields');
                
                if (this.value === 'prescription') {
                    prescriptionFields.style.display = 'block';
                    analysisFields.style.display = 'none';
                } else if (this.value === 'analysis') {
                    prescriptionFields.style.display = 'none';
                    analysisFields.style.display = 'block';
                } else {
                    prescriptionFields.style.display = 'none';
                    analysisFields.style.display = 'none';
                }
            });
        });

        function loadPatientHistory(patientId) {
            // Charger les antécédents spécifiques depuis le localStorage
            const histories = JSON.parse(localStorage.getItem('histories') || '[]');
            const patientHistories = histories.filter(h => h.patientId === parseInt(patientId));

            if (patientHistories.length > 0) {
                // Mettre à jour les prescriptions
                const prescriptionList = document.querySelector('.prescription-list');
                prescriptionList.innerHTML = '';
                patientHistories.filter(h => h.type === 'prescription').forEach(history => {
                    const prescriptionItem = document.createElement('div');
                    prescriptionItem.className = 'prescription-item';
                    prescriptionItem.innerHTML = `
                        <div class="prescription-header">
                            <span class="prescription-date">${formatDate(history.date)}</span>
                            <button class="btn-view" onclick="showHistoryDetails(${JSON.stringify(history).replace(/"/g, '&quot;')})">
                                <i class="fas fa-eye"></i>
                                <span>Voir plus</span>
                            </button>
                        </div>
                        <div class="prescription-content">
                            ${history.medication} - ${history.dosage}<br>
                            ${history.description}
                        </div>
                    `;
                    prescriptionList.appendChild(prescriptionItem);
                });

                // Mettre à jour les analyses
                const analysisList = document.querySelector('.analysis-list');
                analysisList.innerHTML = '';
                patientHistories.filter(h => h.type === 'analysis').forEach(history => {
                    const analysisItem = document.createElement('div');
                    analysisItem.className = 'analysis-item';
                    analysisItem.innerHTML = `
                        <div class="analysis-header">
                            <span class="analysis-date">${formatDate(history.date)}</span>
                            <div class="status-container">
                                <span class="analysis-status status-${history.status}">${history.status === 'completed' ? 'Terminé' : 'En attente'}</span>
                                <button class="btn-view" onclick="showHistoryDetails(${JSON.stringify(history).replace(/"/g, '&quot;')})">
                                    <i class="fas fa-eye"></i>
                                    <span>Voir plus</span>
                                </button>
                            </div>
                        </div>
                        <div class="analysis-content">
                            ${history.analysisType}<br>
                            ${history.description}
                        </div>
                    `;
                    analysisList.appendChild(analysisItem);
                });
            }
        }

        function showAddEntryModal() {
            document.getElementById('addEntryForm').reset();
            document.getElementById('prescriptionFields').style.display = 'none';
            document.getElementById('analysisFields').style.display = 'none';
            addEntryModal.show();
        }

        function saveEntry() {
            const type = document.getElementById('entryType').value;
            const date = document.getElementById('entryDate').value;
            const description = document.getElementById('entryDescription').value;

            if (!type || !date || !description) {
                alert('Veuillez remplir tous les champs obligatoires');
                return;
            }

            // Récupérer l'ID du patient depuis l'URL
            const urlParams = new URLSearchParams(window.location.search);
            const patientId = urlParams.get('id');

            // Créer la nouvelle entrée
            const newEntry = {
                patientId: parseInt(patientId),
                type: type,
                date: date,
                description: description
            };

            if (type === 'prescription') {
                newEntry.medication = document.getElementById('medication').value;
                newEntry.dosage = document.getElementById('dosage').value;
            } else if (type === 'analysis') {
                newEntry.analysisType = document.getElementById('analysisType').value;
                newEntry.status = document.getElementById('analysisStatus').value;
            }

            // Sauvegarder dans le localStorage
            const histories = JSON.parse(localStorage.getItem('histories') || '[]');
            histories.push(newEntry);
            localStorage.setItem('histories', JSON.stringify(histories));

            // Recharger les antécédents
            loadPatientHistory(patientId);

            // Fermer le modal
            addEntryModal.hide();
        }

        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('fr-FR');
        }

        function showTab(tabId) {
            // Cacher tous les contenus d'onglets
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Désactiver tous les onglets
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Afficher le contenu de l'onglet sélectionné
            document.getElementById(tabId + '-tab').classList.add('active');
            
            // Activer l'onglet sélectionné
            event.target.classList.add('active');
        }

        function showHistoryDetails(history) {
            // Afficher les informations générales
            document.getElementById('historyDate').textContent = formatDate(history.date);
            document.getElementById('historyType').textContent = history.type === 'prescription' ? 'Prescription' : 'Analyse';
            document.getElementById('historyDescription').textContent = history.description;

            // Afficher les détails spécifiques selon le type
            if (history.type === 'prescription') {
                document.getElementById('prescriptionDetails').style.display = 'block';
                document.getElementById('analysisDetails').style.display = 'none';
                document.getElementById('historyMedication').textContent = history.medication;
                document.getElementById('historyDosage').textContent = history.dosage;
            } else {
                document.getElementById('prescriptionDetails').style.display = 'none';
                document.getElementById('analysisDetails').style.display = 'block';
                document.getElementById('historyAnalysisType').textContent = history.analysisType;
                document.getElementById('historyStatus').textContent = history.status === 'completed' ? 'Terminé' : 'En attente';
            }

            // Afficher le modal
            historyDetailsModal.show();
        }
    </script>
</body>
</html> 