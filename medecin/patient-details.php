<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dossier Patient - Médecin</title>
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

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
        }

        .info-item {
            padding: 10px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .info-item label {
            color: #666;
            font-size: 0.8rem;
            margin-bottom: 3px;
            display: block;
        }

        .info-item span {
            font-weight: 600;
            color: #003366;
            font-size: 0.9rem;
        }

        .history-item {
            padding: 15px;
            border-bottom: 1px solid #eee;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .history-item:last-child {
            border-bottom: none;
        }

        .history-date {
            color: #666;
            font-size: 0.9rem;
        }

        .history-title {
            font-weight: 600;
            color: #003366;
            margin: 5px 0;
        }

        .history-description {
            color: #444;
        }

        .history-content {
            flex-grow: 1;
            margin-right: 15px;
        }

        .treatment-actions {
            display: flex;
            gap: 5px;
        }

        .treatment-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .treatment-table th,
        .treatment-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .treatment-table th {
            background-color: #003366;
            color: white;
        }

        .treatment-table tr:hover {
            background-color: #f8f9fa;
        }

        .btn-add {
            background-color: #003366;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .btn-add:hover {
            background-color: #002244;
        }

        .btn-back {
            background-color: #003366;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .btn-back:hover {
            background-color: #002244;
            color: white;
            transform: translateY(-2px);
        }

        .btn-print {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.8rem;
            transition: background-color 0.3s ease;
        }

        .btn-print:hover {
            background-color: #218838;
        }

        .btn-print-all {
            background-color: #17a2b8;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }

        .btn-print-all:hover {
            background-color: #138496;
        }

        .action-buttons {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            justify-content: space-between;
        }

        .btn-group-left {
            display: flex;
            align-items: center;
        }

        /* Styles pour les modals */
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

        .modal-body {
            padding: 20px;
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

        @media print {
            .sidebar, .btn-add, .btn-print, .btn-print-all {
                display: none !important;
            }
            .main-content {
                margin-left: 0;
                padding: 0;
            }
            .info-section {
                box-shadow: none;
                border: 1px solid #ddd;
            }
            body {
                background-color: white;
            }
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
        <a href="recherche-patients.php"><i class="fas fa-search"></i> Recherche Patients</a>
        <a href="dossiers.php"><i class="fas fa-folder"></i> Dossiers</a>
    </div>

    <div class="main-content">
        <a href="patients.php" class="btn-back">
            <i class="fas fa-arrow-left"></i> Retour à la liste
        </a>

        <div id="patientContent">
            <!-- Le contenu sera chargé dynamiquement -->
        </div>
    </div>

    <!-- Modal Ajout Antécédent -->
    <div class="modal fade" id="addHistoryModal" tabindex="-1" aria-labelledby="addHistoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addHistoryModalLabel">Ajouter un Antécédent Clinique</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addHistoryForm">
                        <div class="form-group">
                            <label for="historyDate">Date</label>
                            <input type="date" class="form-control" id="historyDate" required>
                        </div>
                        <div class="form-group">
                            <label for="historyTitle">Titre</label>
                            <input type="text" class="form-control" id="historyTitle" placeholder="Ex: Consultation Générale" required>
                        </div>
                        <div class="form-group">
                            <label for="historyDescription">Description</label>
                            <textarea class="form-control" id="historyDescription" rows="4" placeholder="Décrivez les détails de la consultation ou de l'événement..." required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-modal btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn-modal btn-primary" onclick="saveHistory()">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ajout Traitement -->
    <div class="modal fade" id="addTreatmentModal" tabindex="-1" aria-labelledby="addTreatmentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTreatmentModalLabel">Ajouter un Traitement</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addTreatmentForm">
                        <div class="form-group">
                            <label for="medication">Médicament</label>
                            <input type="text" class="form-control" id="medication" placeholder="Ex: Metformine 500mg" required>
                        </div>
                        <div class="form-group">
                            <label for="dosage">Posologie</label>
                            <input type="text" class="form-control" id="dosage" placeholder="Ex: 1 comprimé matin et soir" required>
                        </div>
                        <div class="form-group">
                            <label for="startDate">Date de début</label>
                            <input type="date" class="form-control" id="startDate" required>
                        </div>
                        <div class="form-group">
                            <label for="endDate">Date de fin</label>
                            <input type="date" class="form-control" id="endDate">
                            <small class="text-muted">Laissez vide si le traitement est en cours</small>
                        </div>
                        <div class="form-group">
                            <label for="reason">Raison du traitement</label>
                            <input type="text" class="form-control" id="reason" placeholder="Ex: Diabète type 2" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-modal btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn-modal btn-primary" onclick="saveTreatment()">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Récupérer l'ID du patient depuis l'URL
            const urlParams = new URLSearchParams(window.location.search);
            const patientId = parseInt(urlParams.get('id'));

            // Récupérer les données du patient depuis le localStorage
            const patients = JSON.parse(localStorage.getItem('patients') || '[]');
            const patient = patients.find(p => p.id === patientId);

            if (patient) {
                displayPatientDetails(patient);
            } else {
                document.getElementById('patientContent').innerHTML = `
                    <div class="alert alert-danger">
                        Patient non trouvé
                    </div>
                `;
            }

            // Initialisation des modals
            historyModal = new bootstrap.Modal(document.getElementById('addHistoryModal'));
            treatmentModal = new bootstrap.Modal(document.getElementById('addTreatmentModal'));
        });

        function displayPatientDetails(patient) {
            document.getElementById('patientContent').innerHTML = `
                <div class="info-section">
                    <h3>Informations Générales</h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <label>Nom</label>
                            <span>${patient.prenom} ${patient.nom}</span>
                        </div>
                        <div class="info-item">
                            <label>Âge</label>
                            <span>${patient.age} ans</span>
                        </div>
                        <div class="info-item">
                            <label>Poids</label>
                            <span>${patient.poids} kg</span>
                        </div>
                        <div class="info-item">
                            <label>Taille</label>
                            <span>${patient.taille} cm</span>
                        </div>
                        <div class="info-item">
                            <label>Groupe Sanguin</label>
                            <span>${patient.groupeSanguin}</span>
                        </div>
                        <div class="info-item">
                            <label>Allergies</label>
                            <span>${patient.allergies || 'Aucune'}</span>
                        </div>
                    </div>
                </div>

                <div class="info-section">
                    <h3>Antécédents Cliniques</h3>
                    <div class="action-buttons">
                        <div class="btn-group-left">
                            <button class="btn-add" onclick="showAddHistoryModal()">
                                <i class="fas fa-plus"></i> Ajouter un antécédent
                            </button>
                        </div>
                        <button class="btn-print-all" onclick="window.location.href='dossiers.php'">
                            <i class="fas fa-eye"></i> Voir plus
                        </button>
                    </div>
                    <div class="history-list">
                        <div class="history-item">
                            <div class="history-content">
                                <div class="history-date">15/03/2024</div>
                                <div class="history-title">Consultation Générale</div>
                                <div class="history-description">
                                    Patient présentant des symptômes de fatigue et douleurs articulaires.
                                    Tension artérielle légèrement élevée.
                                </div>
                            </div>
                            <div class="treatment-actions">
                                <button class="btn-view" onclick="window.location.href='dossiers.php?id=1'">
                                    <i class="fas fa-eye"></i> Voir plus
                                </button>
                            </div>
                        </div>
                        <div class="history-item">
                            <div class="history-content">
                                <div class="history-date">01/02/2024</div>
                                <div class="history-title">Suivi Diabète</div>
                                <div class="history-description">
                                    Glycémie stabilisée. Ajustement du traitement.
                                </div>
                            </div>
                            <div class="treatment-actions">
                                <button class="btn-view" onclick="window.location.href='dossiers.php?id=2'">
                                    <i class="fas fa-eye"></i> Voir plus
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-section">
                    <h3>Traitements en Cours</h3>
                    <button class="btn-add" onclick="showAddTreatmentModal()">
                        <i class="fas fa-plus"></i> Ajouter un traitement
                    </button>
                    <table class="treatment-table">
                        <thead>
                            <tr>
                                <th>Médicament</th>
                                <th>Posologie</th>
                                <th>Début</th>
                                <th>Fin</th>
                                <th>Raison</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Metformine 500mg</td>
                                <td>1 comprimé matin et soir</td>
                                <td>01/02/2024</td>
                                <td>En cours</td>
                                <td>Diabète type 2</td>
                                <td class="treatment-actions">
                                    <button class="btn-print" onclick="printTreatment(this)">
                                        <i class="fas fa-print"></i> Imprimer
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Ibuprofène 400mg</td>
                                <td>1 comprimé 3 fois par jour</td>
                                <td>15/03/2024</td>
                                <td>22/03/2024</td>
                                <td>Douleurs articulaires</td>
                                <td class="treatment-actions">
                                    <button class="btn-print" onclick="printTreatment(this)">
                                        <i class="fas fa-print"></i> Imprimer
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `;
        }

        // Variables pour les modals
        let historyModal;
        let treatmentModal;

        // Fonction pour afficher le modal d'ajout d'antécédent
        function showAddHistoryModal() {
            document.getElementById('addHistoryForm').reset();
            historyModal.show();
        }

        // Fonction pour afficher le modal d'ajout de traitement
        function showAddTreatmentModal() {
            document.getElementById('addTreatmentForm').reset();
            treatmentModal.show();
        }

        // Fonction pour sauvegarder un antécédent
        function saveHistory() {
            const date = document.getElementById('historyDate').value;
            const title = document.getElementById('historyTitle').value;
            const description = document.getElementById('historyDescription').value;

            if (!date || !title || !description) {
                alert('Veuillez remplir tous les champs obligatoires');
                return;
            }

            // Créer le nouvel élément d'antécédent
            const historyList = document.querySelector('.history-list');
            const newHistory = document.createElement('div');
            newHistory.className = 'history-item';
            newHistory.innerHTML = `
                <div class="history-content">
                    <div class="history-date">${formatDate(date)}</div>
                    <div class="history-title">${title}</div>
                    <div class="history-description">${description}</div>
                </div>
                <button class="btn-print" onclick="printHistory(this)">
                    <i class="fas fa-print"></i> Imprimer
                </button>
            `;

            // Ajouter au début de la liste
            historyList.insertBefore(newHistory, historyList.firstChild);

            // Fermer le modal
            historyModal.hide();
        }

        // Fonction pour sauvegarder un traitement
        function saveTreatment() {
            const medication = document.getElementById('medication').value;
            const dosage = document.getElementById('dosage').value;
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const reason = document.getElementById('reason').value;

            if (!medication || !dosage || !startDate || !reason) {
                alert('Veuillez remplir tous les champs obligatoires');
                return;
            }

            // Créer la nouvelle ligne de traitement
            const treatmentTable = document.querySelector('.treatment-table tbody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${medication}</td>
                <td>${dosage}</td>
                <td>${formatDate(startDate)}</td>
                <td>${endDate ? formatDate(endDate) : 'En cours'}</td>
                <td>${reason}</td>
                <td class="treatment-actions">
                    <button class="btn-print" onclick="printTreatment(this)">
                        <i class="fas fa-print"></i> Imprimer
                    </button>
                </td>
            `;

            // Ajouter au début du tableau
            treatmentTable.insertBefore(newRow, treatmentTable.firstChild);

            // Fermer le modal
            treatmentModal.hide();
        }

        // Fonction pour imprimer un antécédent
        function printHistory(button) {
            const historyItem = button.closest('.history-item');
            const content = historyItem.querySelector('.history-content').innerHTML;
            const printWindow = window.open('', '_blank');
            
            printWindow.document.write(`
                <html>
                <head>
                    <title>Antécédent Médical</title>
                    <style>
                        body {
                            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                            padding: 20px;
                        }
                        .history-date { color: #666; font-size: 0.9rem; }
                        .history-title { font-weight: 600; color: #003366; margin: 5px 0; }
                        .history-description { color: #444; }
                    </style>
                </head>
                <body>
                    <h2>Antécédent Médical</h2>
                    ${content}
                </body>
                </html>
            `);
            
            printWindow.document.close();
            printWindow.print();
        }

        // Fonction pour imprimer un traitement
        function printTreatment(button) {
            const row = button.closest('tr');
            const cells = row.cells;
            const printWindow = window.open('', '_blank');
            
            printWindow.document.write(`
                <html>
                <head>
                    <title>Ordonnance</title>
                    <style>
                        body {
                            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                            padding: 20px;
                        }
                        .treatment-info {
                            margin: 10px 0;
                        }
                        .label {
                            font-weight: 600;
                            color: #003366;
                        }
                    </style>
                </head>
                <body>
                    <h2>Ordonnance</h2>
                    <div class="treatment-info">
                        <div><span class="label">Médicament:</span> ${cells[0].textContent}</div>
                        <div><span class="label">Posologie:</span> ${cells[1].textContent}</div>
                        <div><span class="label">Date de début:</span> ${cells[2].textContent}</div>
                        <div><span class="label">Date de fin:</span> ${cells[3].textContent}</div>
                        <div><span class="label">Raison:</span> ${cells[4].textContent}</div>
                    </div>
                </body>
                </html>
            `);
            
            printWindow.document.close();
            printWindow.print();
        }

        // Fonction utilitaire pour formater les dates
        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('fr-FR');
        }

        // Fonction pour imprimer tous les antécédents
        function printAllHistory() {
            const historyItems = document.querySelectorAll('.history-item');
            const printWindow = window.open('', '_blank');
            
            let content = '';
            historyItems.forEach(item => {
                const historyContent = item.querySelector('.history-content').innerHTML;
                content += `<div class="history-item-print">${historyContent}</div>`;
            });
            
            printWindow.document.write(`
                <html>
                <head>
                    <title>Antécédents Médicaux</title>
                    <style>
                        body {
                            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                            padding: 20px;
                        }
                        .history-item-print {
                            margin-bottom: 20px;
                            padding-bottom: 20px;
                            border-bottom: 1px solid #eee;
                        }
                        .history-item-print:last-child {
                            border-bottom: none;
                        }
                        .history-date { 
                            color: #666; 
                            font-size: 0.9rem; 
                        }
                        .history-title { 
                            font-weight: 600; 
                            color: #003366; 
                            margin: 5px 0; 
                        }
                        .history-description { 
                            color: #444; 
                        }
                        @media print {
                            .history-item-print {
                                page-break-inside: avoid;
                            }
                        }
                    </style>
                </head>
                <body>
                    <h2>Antécédents Médicaux</h2>
                    <div class="patient-info">
                        <p><strong>Patient:</strong> ${document.querySelector('.info-item span').textContent}</p>
                    </div>
                    ${content}
                </body>
                </html>
            `);
            
            printWindow.document.close();
            printWindow.print();
        }
    </script>
</body>
</html> 