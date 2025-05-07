<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Médecin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .welcome-section {
            background: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .welcome-section h2 {
            color: #003366;
            margin-bottom: 10px;
        }

        .welcome-section p {
            color: #666;
            margin-bottom: 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .stat-info h3 {
            font-size: 1.8rem;
            margin: 0;
            color: #003366;
        }

        .stat-info p {
            margin: 0;
            color: #666;
            font-size: 0.9rem;
        }

        .chart-container {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .chart-header h3 {
            color: #003366;
            margin: 0;
        }

        .recent-patients {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .patient-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .patient-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .patient-item:last-child {
            border-bottom: none;
        }

        .patient-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .patient-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #003366;
            font-weight: 600;
        }

        .patient-details h4 {
            margin: 0;
            font-size: 1rem;
            color: #003366;
        }

        .patient-details p {
            margin: 0;
            font-size: 0.9rem;
            color: #666;
        }

        .patient-status {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-hospitalise {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-ambulatoire {
            background-color: #d4edda;
            color: #155724;
        }

        .status-urgence {
            background-color: #f8d7da;
            color: #721c24;
        }

        .upcoming-appointments {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .appointment-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .appointment-item:last-child {
            border-bottom: none;
        }

        .appointment-time {
            font-weight: 600;
            color: #003366;
        }

        .appointment-info h4 {
            margin: 0;
            font-size: 1rem;
            color: #003366;
        }

        .appointment-info p {
            margin: 0;
            font-size: 0.9rem;
            color: #666;
        }

        .appointment-type {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
            background-color: #e9ecef;
            color: #495057;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn-action {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            font-size: 0.9rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
        }

        .btn-edit {
            background-color: #e3f2fd;
            color: #1976d2;
        }

        .btn-edit:hover {
            background-color: #bbdefb;
        }

        .btn-view {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .btn-view:hover {
            background-color: #c8e6c9;
        }

        .modal {
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

        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 12px;
            width: 90%;
            max-width: 500px;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-header h3 {
            margin: 0;
            color: #003366;
        }

        .close-modal {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #666;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .btn-save {
            background-color: #003366;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 1rem;
        }

        .btn-save:hover {
            background-color: #002244;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Hôpital Central</h3>
        </div>
        <a href="index.php" class="active"><i class="fas fa-home"></i> Tableau de Bord</a>
        <a href="patients.php"><i class="fas fa-user-injured"></i> Mes Patients</a>
        <a href="recherche-patients.php"><i class="fas fa-search"></i> Recherche Patients</a>
           </div>
    <div class="main-content">
        <div class="dashboard-header">
            <h1>Tableau de Bord</h1>
            <div class="date">15 Mars 2024</div>
        </div>

        <div class="welcome-section">
            <h2>Bonjour, Dr. Martin</h2>
            <p>Voici un aperçu de votre journée</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon" style="background-color: #e3f2fd; color: #1976d2;">
                    <i class="fas fa-user-injured"></i>
                </div>
                <div class="stat-info">
                    <h3>24</h3>
                    <p>Patients aujourd'hui</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background-color: #e8f5e9; color: #2e7d32;">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="stat-info">
                    <h3>8</h3>
                    <p>Rendez-vous restants</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background-color: #fff3e0; color: #f57c00;">
                    <i class="fas fa-procedures"></i>
                </div>
                <div class="stat-info">
                    <h3>5</h3>
                    <p>Patients hospitalisés</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background-color: #fce4ec; color: #c2185b;">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div class="stat-info">
                    <h3>2</h3>
                    <p>Cas urgents</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="chart-container">
                    <div class="chart-header">
                        <h3>Activité des patients</h3>
                    </div>
                    <canvas id="patientActivityChart"></canvas>
                </div>

                <div class="recent-patients">
                    <div class="chart-header">
                        <h3>Patients récents</h3>
                    </div>
                    <ul class="patient-list">
                        <li class="patient-item">
                            <div class="patient-info">
                                <div class="patient-avatar">LE</div>
                                <div class="patient-details">
                                    <h4>Lauclass Ekumu</h4>
                                    <p>Cardiologie</p>
                                </div>
                            </div>
                            <div class="action-buttons">
                                <span class="patient-status status-ambulatoire">Ambulatoire</span>
                                <button class="btn-action btn-view" onclick="window.location.href='patient-details.php?id=1'">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </li>
                        <li class="patient-item">
                            <div class="patient-info">
                                <div class="patient-avatar">JD</div>
                                <div class="patient-details">
                                    <h4>Jean Dupont</h4>
                                    <p>Neurologie</p>
                                </div>
                            </div>
                            <div class="action-buttons">
                                <span class="patient-status status-hospitalise">Hospitalisé</span>
                                <button class="btn-action btn-view" onclick="window.location.href='patient-details.php?id=2'">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </li>
                        <li class="patient-item">
                            <div class="patient-info">
                                <div class="patient-avatar">MM</div>
                                <div class="patient-details">
                                    <h4>Marie Martin</h4>
                                    <p>Pédiatrie</p>
                                </div>
                            </div>
                            <div class="action-buttons">
                                <span class="patient-status status-ambulatoire">Ambulatoire</span>
                                <button class="btn-action btn-view" onclick="window.location.href='patient-details.php?id=3'">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="upcoming-appointments">
                    <div class="chart-header">
                        <h3>Rendez-vous à venir</h3>
                    </div>
                    <div class="appointment-item">
                        <div class="appointment-time">09:00</div>
                        <div class="appointment-info">
                            <h4>Lauclass Ekumu</h4>
                            <p>Consultation de routine</p>
                        </div>
                        <div class="action-buttons">
                            <span class="appointment-type">Consultation</span>
                            <button class="btn-action btn-edit" onclick="openEditModal('Lauclass Ekumu', '09:00', 'Consultation de routine', 'Consultation')">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                    </div>
                    <div class="appointment-item">
                        <div class="appointment-time">10:30</div>
                        <div class="appointment-info">
                            <h4>Jean Dupont</h4>
                            <p>Suivi post-opératoire</p>
                        </div>
                        <div class="action-buttons">
                            <span class="appointment-type">Suivi</span>
                            <button class="btn-action btn-edit" onclick="openEditModal('Jean Dupont', '10:30', 'Suivi post-opératoire', 'Suivi')">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                    </div>
                    <div class="appointment-item">
                        <div class="appointment-time">14:00</div>
                        <div class="appointment-info">
                            <h4>Marie Martin</h4>
                            <p>Vaccination</p>
                        </div>
                        <div class="action-buttons">
                            <span class="appointment-type">Vaccination</span>
                            <button class="btn-action btn-edit" onclick="openEditModal('Marie Martin', '14:00', 'Vaccination', 'Vaccination')">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour modifier les rendez-vous -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Modifier le rendez-vous</h3>
                <button class="close-modal" onclick="closeEditModal()">&times;</button>
            </div>
            <form id="editAppointmentForm" onsubmit="saveAppointment(event)">
                <div class="form-group">
                    <label>Patient</label>
                    <input type="text" id="patientName" readonly>
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" id="appointmentDate" required>
                </div>
                <div class="form-group">
                    <label>Heure</label>
                    <input type="time" id="appointmentTime" required>
                </div>
                <div class="form-group">
                    <label>Type de rendez-vous</label>
                    <select id="appointmentType" required>
                        <option value="Consultation">Consultation</option>
                        <option value="Suivi">Suivi</option>
                        <option value="Vaccination">Vaccination</option>
                        <option value="Urgence">Urgence</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" id="appointmentDescription" required>
                </div>
                <button type="submit" class="btn-save">Enregistrer les modifications</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Configuration du graphique d'activité des patients
        const ctx = document.getElementById('patientActivityChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
                datasets: [{
                    label: 'Consultations',
                    data: [12, 19, 15, 17, 14, 8, 5],
                    borderColor: '#1976d2',
                    backgroundColor: 'rgba(25, 118, 210, 0.1)',
                    tension: 0.4,
                    fill: true
                }, {
                    label: 'Hospitalisations',
                    data: [5, 7, 4, 6, 5, 3, 2],
                    borderColor: '#c2185b',
                    backgroundColor: 'rgba(194, 24, 91, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Fonctions pour la gestion des rendez-vous
        function openEditModal(patientName, time, description, type) {
            const modal = document.getElementById('editModal');
            const today = new Date().toISOString().split('T')[0];
            
            document.getElementById('patientName').value = patientName;
            document.getElementById('appointmentDate').value = today;
            document.getElementById('appointmentTime').value = time;
            document.getElementById('appointmentType').value = type;
            document.getElementById('appointmentDescription').value = description;
            
            modal.style.display = 'flex';
        }

        function closeEditModal() {
            const modal = document.getElementById('editModal');
            modal.style.display = 'none';
        }

        function saveAppointment(event) {
            event.preventDefault();
            
            const patientName = document.getElementById('patientName').value;
            const date = document.getElementById('appointmentDate').value;
            const time = document.getElementById('appointmentTime').value;
            const type = document.getElementById('appointmentType').value;
            const description = document.getElementById('appointmentDescription').value;

            // Ici, vous pouvez ajouter le code pour sauvegarder les modifications dans votre base de données
            alert(`Rendez-vous modifié pour ${patientName} le ${date} à ${time}`);
            
            closeEditModal();
        }

        // Fermer la modal en cliquant en dehors
        window.onclick = function(event) {
            const modal = document.getElementById('editModal');
            if (event.target === modal) {
                closeEditModal();
            }
        }
    </script>
</body>

</html>