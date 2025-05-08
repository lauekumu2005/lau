<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Administration Hospitalière</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #003366;
            --secondary-color: #002244;
            --accent-color: #0066cc;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --light-bg: #f4f6f9;
            --dark-text: #333;
            --light-text: #666;
        }

        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: var(--light-bg);
            color: var(--dark-text);
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar { 
            background: linear-gradient(180deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white; 
            padding: 20px; 
            height: 100vh; 
            position: fixed; 
            width: 280px;
            box-shadow: 2px 0 15px rgba(0,0,0,0.1);
            z-index: 1000;
        }

        .sidebar-header {
            padding: 20px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
            text-align: center;
        }

        .sidebar-header img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
            border: 3px solid rgba(255,255,255,0.2);
        }

        .sidebar-header h3 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
            color: white;
        }

        .sidebar a { 
            color: rgba(255,255,255,0.8); 
            text-decoration: none; 
            display: flex;
            align-items: center;
            padding: 12px 15px;
            margin-bottom: 8px;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .sidebar a i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }

        .sidebar a:hover { 
            background-color: rgba(255,255,255,0.1);
            color: white;
            transform: translateX(5px);
        }

        .sidebar a.active {
            background-color: var(--accent-color);
            color: white;
        }

        .user-profile {
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            background: rgba(255,255,255,0.1);
            padding: 15px;
            border-radius: 10px;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-info h6 {
            margin: 0;
            color: white;
            font-size: 0.9rem;
        }

        .user-info small {
            color: rgba(255,255,255,0.7);
            font-size: 0.8rem;
        }

        /* Main Content Styles */
        .main-content { 
            margin-left: 280px; 
            padding: 30px;
        }

        .welcome-section {
            background: white;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .quick-actions {
            margin-top: 20px;
            display: flex;
            gap: 15px;
        }

        .quick-action-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            background: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }

        .quick-action-btn:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        .stats-card { 
            background: white;
            border-radius: 15px;
            padding: 25px;
            height: 100%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-5px);
        }

        .stats-value {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .stats-label {
            color: var(--light-text);
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .progress-info {
            margin-top: 15px;
        }

        .progress {
            height: 8px;
            margin-top: 8px;
            border-radius: 4px;
        }

        .chart-container {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .recent-activity {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .activity-item {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: start;
            gap: 15px;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--light-bg);
            color: var(--primary-color);
        }

        .activity-content h6 {
            margin: 0;
            color: var(--dark-text);
            font-size: 1rem;
        }

        .activity-content p {
            margin: 5px 0 0;
            color: var(--light-text);
            font-size: 0.9rem;
        }

        .activity-time {
            font-size: 0.8rem;
            color: var(--light-text);
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 15px;
            border: none;
        }

        .modal-header {
            background: var(--primary-color);
            color: white;
            border-radius: 15px 15px 0 0;
        }

        .modal-body {
            padding: 25px;
        }

        .notification-badge {
            background: var(--danger-color);
            color: white;
            padding: 2px 6px;
            border-radius: 10px;
            font-size: 0.8rem;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="assets/img/hospital-logo.png" alt="Logo Hôpital">
            <h3>Hôpital Central</h3>
        </div>
        <nav>
            <a href="index.php" class="active">
                <i class="fas fa-home"></i>
                Tableau de bord
            </a>
            <a href="medecin.php">
                <i class="fas fa-user-md"></i>
                Médecins
            </a>
            <a href="hoppat.php">
                <i class="fas fa-users"></i>
                Patients
            </a>
            <a href="rdv.php">
                <i class="fas fa-calendar-check"></i>
                Rendez-vous
            </a>
            <a href="notif.php">
                <i class="fas fa-bell"></i>
                Notifications
                <span class="notification-badge">3</span>
            </a>
            <a href="paiement.php">
                <i class="fas fa-credit-card"></i>
                Paiements
            </a>
            <a href="abonnement.php">
            <i class="fas fa-crown"></i>
            Abonnement
        </a>
            <a href="parametre.php">
                <i class="fas fa-cog"></i>
                Paramètres
            </a>
        </nav>

        <div class="user-profile">
            <img src="assets/img/admin-avatar.png" alt="Admin">
            <div class="user-info">
                <h6>Dr. Admin</h6>
                <small>Administrateur</small>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2>Tableau de Bord</h2>
                    <p class="text-muted mb-0">Bienvenue, Dr. Admin</p>
                </div>
                <div class="text-end">
                    <p class="mb-0">Date: <span id="current-date"></span></p>
                    <p class="mb-0">Heure: <span id="current-time"></span></p>
                </div>
            </div>
            <div class="quick-actions">
                <button class="quick-action-btn" onclick="showNewPatientModal()">
                    <i class="fas fa-plus"></i>
                    Nouveau Patient
                </button>
                <button class="quick-action-btn" onclick="showNewAppointmentModal()">
                    <i class="fas fa-calendar-plus"></i>
                    Nouveau RDV
                </button>
                <button class="quick-action-btn">
                    <i class="fas fa-file-medical"></i>
                    Nouveau Dossier
                </button>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">150</div>
                    <div class="stats-label">
                        <i class="fas fa-procedures"></i>
                        Patients hospitalisés
                    </div>
                    <div class="progress-info">
                        <div class="d-flex justify-content-between">
                            <small>Occupation</small>
                            <small>75%</small>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" style="width: 75%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">45</div>
                    <div class="stats-label">
                        <i class="fas fa-user-md"></i>
                        Médecins actifs
                    </div>
                    <div class="progress-info">
                        <div class="d-flex justify-content-between">
                            <small>Disponibilité</small>
                            <small>85%</small>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: 85%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">28</div>
                    <div class="stats-label">
                        <i class="fas fa-ambulance"></i>
                        Urgences en cours
                    </div>
                    <div class="progress-info">
                        <div class="d-flex justify-content-between">
                            <small>Capacité</small>
                            <small>60%</small>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" style="width: 60%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">92%</div>
                    <div class="stats-label">
                        <i class="fas fa-bed"></i>
                        Taux d'occupation
                    </div>
                    <div class="progress-info">
                        <div class="d-flex justify-content-between">
                            <small>Capacité totale</small>
                            <small>92%</small>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-danger" style="width: 92%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="chart-container">
                    <h4>Consultations par spécialité</h4>
                    <canvas id="specialtyChart"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="chart-container">
                    <h4>Taux d'occupation par service</h4>
                    <canvas id="occupancyChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="recent-activity">
            <h4 class="mb-4">Activités récentes</h4>
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div class="activity-content">
                    <h6>Nouveau patient admis</h6>
                    <p>Jean Dupont - Service de cardiologie</p>
                    <small class="activity-time">Il y a 10 minutes</small>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="activity-content">
                    <h6>Rendez-vous confirmé</h6>
                    <p>Dr. Martin avec Marie Lambert</p>
                    <small class="activity-time">Il y a 30 minutes</small>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-file-medical"></i>
                </div>
                <div class="activity-content">
                    <h6>Dossier médical mis à jour</h6>
                    <p>Pierre Durand - Résultats d'analyses ajoutés</p>
                    <small class="activity-time">Il y a 1 heure</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <div class="modal fade" id="newPatientModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouveau Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="newPatientForm">
                        <div class="mb-3">
                            <label class="form-label">Nom complet</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Service</label>
                            <select class="form-control" required>
                                <option value="">Sélectionner un service</option>
                                <option value="cardiology">Cardiologie</option>
                                <option value="neurology">Neurologie</option>
                                <option value="pediatrics">Pédiatrie</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="newAppointmentModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouveau Rendez-vous</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="newAppointmentForm">
                        <div class="mb-3">
                            <label class="form-label">Patient</label>
                            <select class="form-control" required>
                                <option value="">Sélectionner un patient</option>
                                <option value="1">Jean Dupont</option>
                                <option value="2">Marie Lambert</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Médecin</label>
                            <select class="form-control" required>
                                <option value="">Sélectionner un médecin</option>
                                <option value="1">Dr. Martin</option>
                                <option value="2">Dr. Bernard</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date et heure</label>
                            <input type="datetime-local" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Type de consultation</label>
                            <select class="form-control" required>
                                <option value="">Sélectionner le type</option>
                                <option value="consultation">Consultation</option>
                                <option value="followup">Suivi</option>
                                <option value="emergency">Urgence</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Planifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Mettre à jour la date et l'heure
        function updateDateTime() {
            const now = new Date();
            document.getElementById('current-date').textContent = now.toLocaleDateString('fr-FR');
            document.getElementById('current-time').textContent = now.toLocaleTimeString('fr-FR');
        }
        setInterval(updateDateTime, 1000);
        updateDateTime();

        // Initialiser les modals
        const patientModal = new bootstrap.Modal(document.getElementById('newPatientModal'));
        const appointmentModal = new bootstrap.Modal(document.getElementById('newAppointmentModal'));

        function showNewPatientModal() {
            patientModal.show();
        }

        function showNewAppointmentModal() {
            appointmentModal.show();
        }

        // Graphique des consultations par spécialité
        const specialtyCtx = document.getElementById('specialtyChart').getContext('2d');
        new Chart(specialtyCtx, {
            type: 'doughnut',
            data: {
                labels: ['Cardiologie', 'Pédiatrie', 'Neurologie', 'Orthopédie', 'Autres'],
                datasets: [{
                    data: [30, 25, 20, 15, 10],
                    backgroundColor: [
                        '#003366',
                        '#004d99',
                        '#0066cc',
                        '#0080ff',
                        '#3399ff'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Graphique du taux d'occupation
        const occupancyCtx = document.getElementById('occupancyChart').getContext('2d');
        new Chart(occupancyCtx, {
            type: 'bar',
            data: {
                labels: ['Urgences', 'Maternité', 'Chirurgie', 'Pédiatrie', 'Soins intensifs'],
                datasets: [{
                    label: 'Taux d\'occupation (%)',
                    data: [85, 70, 90, 65, 95],
                    backgroundColor: '#003366'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });

        // Gestion des formulaires
        document.getElementById('newPatientForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Ajouter ici la logique pour sauvegarder le nouveau patient
            patientModal.hide();
        });

        document.getElementById('newAppointmentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Ajouter ici la logique pour sauvegarder le nouveau rendez-vous
            appointmentModal.hide();
        });
    </script>
</body>
</html>