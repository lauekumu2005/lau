<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Administration Hospitalière</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary-color: #003366;
            --secondary-color: #002244;
            --accent-color: #003366;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --light-bg: #f4f6f9;
            --dark-text: #003366;
            --light-text: #666666;
        }

        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: var(--light-bg);
            color: var(--dark-text);
        }

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

        .sidebar-header h3 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
            color: white;
        }

        .sidebar-header img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
            border: 3px solid rgba(255,255,255,0.2);
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

        .stats-card { 
            background-color: white; 
            border-radius: 15px; 
            padding: 25px; 
            margin-bottom: 20px; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
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
        }

        .stats-label i {
            margin-right: 8px;
            color: var(--accent-color);
        }

        .chart-container {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            height: 300px;
        }

        .chart-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .chart-title i {
            color: var(--accent-color);
            margin-right: 8px;
        }

        .chart-wrapper {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .chart-wrapper .chart-container {
            flex: 1;
            margin-bottom: 0;
        }

        .activity-feed {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-top: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .activity-item {
            display: flex;
            align-items: start;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1.2rem;
        }

        .activity-content {
            flex-grow: 1;
        }

        .activity-time {
            color: var(--light-text);
            font-size: 0.8rem;
        }

        .quick-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .quick-action-btn {
            padding: 10px 20px;
            border-radius: 8px;
            background-color: var(--accent-color);
            color: white;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .quick-action-btn:hover {
            background-color: var(--primary-color);
            transform: translateY(-2px);
        }

        .role-selector {
            position: absolute;
            top: 20px;
            right: 20px;
            background: white;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .role-selector select {
            border: 1px solid var(--primary-color);
            padding: 5px 10px;
            border-radius: 4px;
            color: var(--primary-color);
            font-weight: 500;
        }

        .admin-only {
            display: none;
        }

        .receptionist-only {
            display: none;
        }

        .role-admin .admin-only {
            display: block;
        }

        .role-receptionist .receptionist-only {
            display: block;
        }

        /* Styles pour les modales */
        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
        }

        .modal-header {
            background: var(--primary-color);
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 20px;
        }

        .modal-header .btn-close {
            color: white;
            filter: brightness(0) invert(1);
        }

        .modal-body {
            padding: 25px;
        }

        .form-label {
            color: var(--dark-text);
            font-weight: 500;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 10px 15px;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(0,51,102,0.25);
        }

        .modal-footer {
            border-top: 1px solid #eee;
            padding: 20px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
        }

        .form-floating {
            margin-bottom: 15px;
        }

        .form-floating label {
            padding: 15px;
        }

        .form-floating input {
            height: 50px;
        }

        .form-floating textarea {
            height: 100px;
        }
    </style>
</head>
<body>
    <div class="role-selector">
        <select id="userRole" onchange="changeRole(this.value)">
            <option value="admin">Administrateur</option>
            <option value="receptionist">Réceptionniste</option>
        </select>
    </div>

    <div class="sidebar">
        <div class="sidebar-header">
            <img src="https://via.placeholder.com/80" alt="Logo Hôpital">
            <h3>Hôpital Central</h3>
        </div>
        <a href="index.php" class="active"><i class="fas fa-home"></i> Tableau de Bord</a>
        <a href="medecin.php" class="admin-only"><i class="fas fa-user-md"></i> Médecins</a>
        <a href="hoppat.php"><i class="fas fa-procedures"></i> Patients</a>
        <a href="rdv.php"><i class="fas fa-calendar-check"></i> Rendez-vous</a>
        <a href="notif.php"><i class="fas fa-bell"></i> Notifications <span class="notification-badge">3</span></a>
        <a href="paiement.php" class="admin-only"><i class="fas fa-money-bill-wave"></i> Paiements</a>
        <a href="parametre.php" class="admin-only"><i class="fas fa-cog"></i> Paramètres</a>

        <div class="user-profile">
            <img src="https://via.placeholder.com/40" alt="Admin">
            <div class="user-info">
                <h6 id="userName">Dr. Admin</h6>
                <small id="userRole">Administrateur</small>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="welcome-section">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2>Tableau de Bord <span id="roleTitle">Administratif</span></h2>
                    <p class="text-muted">Bienvenue, <span id="welcomeName">Dr. Admin</span></p>
                </div>
                <div class="text-end">
                    <p class="mb-0">Date: <span id="current-date"></span></p>
                    <p class="mb-0">Heure: <span id="current-time"></span></p>
                </div>
            </div>
            <div class="quick-actions">
                <button class="quick-action-btn"><i class="fas fa-plus"></i> Nouveau Patient</button>
                <button class="quick-action-btn"><i class="fas fa-calendar-plus"></i> Nouveau RDV</button>
                <button class="quick-action-btn admin-only"><i class="fas fa-file-medical"></i> Nouveau Dossier</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">150</div>
                    <div class="stats-label">
                        <i class="fas fa-procedures"></i>
                        Patients hospitalisés
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-success" style="width: 75%"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 admin-only">
                <div class="stats-card">
                    <div class="stats-value">45</div>
                    <div class="stats-label">
                        <i class="fas fa-user-md"></i>
                        Médecins actifs
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-info" style="width: 90%"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">12</div>
                    <div class="stats-label">
                        <i class="fas fa-ambulance"></i>
                        Urgences en cours
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" style="width: 60%"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 admin-only">
                <div class="stats-card">
                    <div class="stats-value">85%</div>
                    <div class="stats-label">
                        <i class="fas fa-bed"></i>
                        Taux d'occupation
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-primary" style="width: 85%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 admin-only">
                <div class="chart-wrapper">
                    <div class="chart-container">
                        <div class="chart-title">
                            <span><i class="fas fa-chart-pie"></i> Consultations par spécialité</span>
                            <small class="text-muted">Dernière mise à jour: Aujourd'hui</small>
                        </div>
                        <canvas id="specialtyChart"></canvas>
                    </div>
                    <div class="chart-container">
                        <div class="chart-title">
                            <span><i class="fas fa-chart-bar"></i> Taux d'occupation par service</span>
                            <small class="text-muted">Dernière mise à jour: Aujourd'hui</small>
                        </div>
                        <canvas id="occupancyChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="activity-feed">
            <h3><i class="fas fa-history"></i> Activité récente</h3>
            <div class="activity-item">
                <div class="activity-icon" style="background: rgba(46, 204, 113, 0.1); color: var(--success-color);">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div class="activity-content">
                    <div>Nouveau patient admis</div>
                    <div class="activity-time">Il y a 5 minutes</div>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon" style="background: rgba(241, 196, 15, 0.1); color: var(--warning-color);">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="activity-content">
                    <div>Rendez-vous confirmé</div>
                    <div class="activity-time">Il y a 15 minutes</div>
                </div>
            </div>
            <div class="activity-item admin-only">
                <div class="activity-icon" style="background: rgba(52, 152, 219, 0.1); color: var(--accent-color);">
                    <i class="fas fa-file-medical"></i>
                </div>
                <div class="activity-content">
                    <div>Nouveau dossier médical créé</div>
                    <div class="activity-time">Il y a 30 minutes</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Nouveau Patient -->
    <div class="modal fade" id="newPatientModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-user-plus"></i> Nouveau Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="newPatientForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="patientNom" placeholder="Nom">
                                    <label for="patientNom">Nom</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="patientPrenom" placeholder="Prénom">
                                    <label for="patientPrenom">Prénom</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="patientDateNaissance">
                                    <label for="patientDateNaissance">Date de naissance</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="patientGenre">
                                        <option value="">Sélectionner</option>
                                        <option value="M">Masculin</option>
                                        <option value="F">Féminin</option>
                                        <option value="A">Autre</option>
                                    </select>
                                    <label for="patientGenre">Genre</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="patientTelephone" placeholder="Téléphone">
                                    <label for="patientTelephone">Téléphone</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="patientEmail" placeholder="Email">
                                    <label for="patientEmail">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="patientAdresse" placeholder="Adresse"></textarea>
                            <label for="patientAdresse">Adresse</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="patientNotes" placeholder="Notes médicales"></textarea>
                            <label for="patientNotes">Notes médicales</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" onclick="saveNewPatient()">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Nouveau Rendez-vous -->
    <div class="modal fade" id="newAppointmentModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-calendar-plus"></i> Nouveau Rendez-vous</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="newAppointmentForm">
                        <div class="form-floating mb-3">
                            <select class="form-control" id="appointmentPatient" required>
                                <option value="">Sélectionner un patient</option>
                                <option value="1">Jean Dupont</option>
                                <option value="2">Marie Martin</option>
                                <option value="3">Pierre Durand</option>
                            </select>
                            <label for="appointmentPatient">Patient</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-control" id="appointmentDoctor" required>
                                <option value="">Sélectionner un médecin</option>
                                <option value="1">Dr. Smith - Cardiologie</option>
                                <option value="2">Dr. Johnson - Pédiatrie</option>
                                <option value="3">Dr. Williams - Dermatologie</option>
                            </select>
                            <label for="appointmentDoctor">Médecin</label>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="appointmentDate" required>
                                    <label for="appointmentDate">Date</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="time" class="form-control" id="appointmentTime" required>
                                    <label for="appointmentTime">Heure</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-control" id="appointmentType" required>
                                <option value="">Sélectionner le type</option>
                                <option value="consultation">Consultation</option>
                                <option value="suivi">Suivi</option>
                                <option value="urgence">Urgence</option>
                            </select>
                            <label for="appointmentType">Type de rendez-vous</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="appointmentNotes" placeholder="Notes"></textarea>
                            <label for="appointmentNotes">Notes</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" onclick="saveNewAppointment()">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fonction pour changer le rôle
        function changeRole(role) {
            document.body.className = 'role-' + role;
            const userName = role === 'admin' ? 'Dr. Admin' : 'M. Réceptionniste';
            const roleTitle = role === 'admin' ? 'Administratif' : 'Réception';
            
            document.getElementById('userName').textContent = userName;
            document.getElementById('welcomeName').textContent = userName;
            document.getElementById('roleTitle').textContent = roleTitle;
            document.getElementById('userRole').textContent = role === 'admin' ? 'Administrateur' : 'Réceptionniste';
        }

        // Mise à jour de la date et l'heure
        function updateDateTime() {
            const now = new Date();
            document.getElementById('current-date').textContent = now.toLocaleDateString('fr-FR', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            document.getElementById('current-time').textContent = now.toLocaleTimeString('fr-FR');
        }
        updateDateTime();
        setInterval(updateDateTime, 1000);

        // Animation des statistiques
        function animateValue(element, start, end, duration) {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                element.textContent = Math.floor(progress * (end - start) + start);
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        // Animation des valeurs au chargement
        document.addEventListener('DOMContentLoaded', () => {
            const statsValues = document.querySelectorAll('.stats-value');
            statsValues.forEach(value => {
                const endValue = parseInt(value.textContent);
                animateValue(value, 0, endValue, 2000);
            });

            // Graphique des spécialités
            const specialtyCtx = document.getElementById('specialtyChart').getContext('2d');
            new Chart(specialtyCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Cardiologie', 'Pédiatrie', 'Chirurgie', 'Dermatologie', 'Ophtalmologie'],
                    datasets: [{
                        data: [30, 25, 20, 15, 10],
                        backgroundColor: [
                            '#003366',
                            '#28a745',
                            '#ffc107',
                            '#dc3545',
                            '#17a2b8'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                boxWidth: 12,
                                padding: 10,
                                font: {
                                    size: 11
                                }
                            }
                        }
                    }
                }
            });

            // Graphique d'occupation
            const occupancyCtx = document.getElementById('occupancyChart').getContext('2d');
            new Chart(occupancyCtx, {
                type: 'bar',
                data: {
                    labels: ['Urgences', 'Chirurgie', 'Maternité', 'Pédiatrie', 'Gériatrie'],
                    datasets: [{
                        label: 'Taux d\'occupation (%)',
                        data: [95, 85, 75, 80, 70],
                        backgroundColor: '#003366'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            ticks: {
                                font: {
                                    size: 11
                                }
                            }
                        },
                        x: {
                            ticks: {
                                font: {
                                    size: 11
                                }
                            }
                        }
                    }
                }
            });

            // Définir le rôle initial
            changeRole('admin');

            // Fonctions pour les modales
            function openNewPatientModal() {
                const modal = new bootstrap.Modal(document.getElementById('newPatientModal'));
                modal.show();
            }

            function openNewAppointmentModal() {
                const modal = new bootstrap.Modal(document.getElementById('newAppointmentModal'));
                modal.show();
            }

            function saveNewPatient() {
                // Simulation de sauvegarde
                const patientData = {
                    nom: document.getElementById('patientNom').value,
                    prenom: document.getElementById('patientPrenom').value,
                    dateNaissance: document.getElementById('patientDateNaissance').value,
                    genre: document.getElementById('patientGenre').value,
                    telephone: document.getElementById('patientTelephone').value,
                    email: document.getElementById('patientEmail').value,
                    adresse: document.getElementById('patientAdresse').value,
                    notes: document.getElementById('patientNotes').value
                };

                console.log('Nouveau patient:', patientData);
                
                // Afficher une notification de succès
                alert('Patient enregistré avec succès !');
                
                // Fermer la modale
                const modal = bootstrap.Modal.getInstance(document.getElementById('newPatientModal'));
                modal.hide();
            }

            function saveNewAppointment() {
                // Simulation de sauvegarde
                const appointmentData = {
                    patient: document.getElementById('appointmentPatient').value,
                    doctor: document.getElementById('appointmentDoctor').value,
                    date: document.getElementById('appointmentDate').value,
                    time: document.getElementById('appointmentTime').value,
                    type: document.getElementById('appointmentType').value,
                    notes: document.getElementById('appointmentNotes').value
                };

                console.log('Nouveau rendez-vous:', appointmentData);
                
                // Afficher une notification de succès
                alert('Rendez-vous enregistré avec succès !');
                
                // Fermer la modale
                const modal = bootstrap.Modal.getInstance(document.getElementById('newAppointmentModal'));
                modal.hide();
            }

            // Mettre à jour les boutons d'action rapide
            document.querySelector('.quick-action-btn:nth-child(1)').addEventListener('click', openNewPatientModal);
            document.querySelector('.quick-action-btn:nth-child(2)').addEventListener('click', openNewAppointmentModal);
        });
    </script>
</body>
</html> 