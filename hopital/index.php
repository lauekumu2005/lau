<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - DOPAHO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="assets/images/hospital-logo.png" alt="Logo Hôpital">
            <h3>Hôpital Central</h3>
        </div>
        <nav>
            <a href="index.php" class="active">
                <i class="fas fa-home"></i>
                Tableau de bord
            </a>
            <a href="hoppat.php">
                <i class="fas fa-users"></i>
                Patients
            </a>
            <a href="medecin.php">
                <i class="fas fa-user-md"></i>
                Médecins
            </a>
            <a href="rdv.php">
                <i class="fas fa-calendar-check"></i>
                Rendez-vous
            </a>
            <a href="notif.php">
                <i class="fas fa-bell"></i>
                Notifications
            </a>
            <a href="paiement.php">
                <i class="fas fa-money-bill-wave"></i>
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
            <img src="assets/images/admin-avatar.png" alt="Admin">
            <div class="user-info">
                <h6>Admin</h6>
                <small>Administrateur</small>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h2>Bienvenue sur DOPAHO</h2>
            <p>Gérez votre établissement médical en toute simplicité</p>
            <div class="quick-actions">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newAppointmentModal">
                    <i class="fas fa-calendar-plus"></i>
                    Nouveau Rendez-vous
                </button>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newPatientModal">
                    <i class="fas fa-user-plus"></i>
                    Nouveau Patient
                </button>
                <button class="btn btn-outline-primary" onclick="exportReport()">
                    <i class="fas fa-download"></i>
                    Exporter Rapport
                </button>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="stats-value">15</div>
                        <div class="stats-label">
                            <i class="fas fa-user-md text-primary"></i>
                            Médecins actifs
                        </div>
                        <div class="progress-info">
                            <small>+2 ce mois</small>
                            <div class="progress">
                                <div class="progress-bar bg-primary" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="stats-value">250</div>
                        <div class="stats-label">
                            <i class="fas fa-users text-success"></i>
                            Patients
                        </div>
                        <div class="progress-info">
                            <small>+15 ce mois</small>
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width: 85%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="stats-value">12</div>
                        <div class="stats-label">
                            <i class="fas fa-calendar-check text-warning"></i>
                            RDV aujourd'hui
                        </div>
                        <div class="progress-info">
                            <small>+5 cette semaine</small>
                            <div class="progress">
                                <div class="progress-bar bg-warning" style="width: 60%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="stats-value">95%</div>
                        <div class="stats-label">
                            <i class="fas fa-star text-info"></i>
                            Satisfaction
                        </div>
                        <div class="progress-info">
                            <small>+2% ce mois</small>
                            <div class="progress">
                                <div class="progress-bar bg-info" style="width: 95%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity and Appointments -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="card-title mb-0">Activités récentes</h5>
                            <select class="form-select" id="activityFilter">
                                <option value="all">Toutes les activités</option>
                                <option value="appointment">Rendez-vous</option>
                                <option value="patient">Patients</option>
                                <option value="system">Système</option>
                            </select>
                        </div>
                        <div class="activity-list" id="recentActivities">
                            <!-- Les activités seront chargées dynamiquement ici -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rendez-vous à venir</h5>
                        <div class="appointment-list" id="upcomingAppointments">
                            <!-- Les rendez-vous seront chargés dynamiquement ici -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Appointment Modal -->
    <div class="modal fade" id="newAppointmentModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouveau Rendez-vous</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="appointmentForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Patient</label>
                                <select class="form-select" name="patient_id" required>
                                    <option value="">Sélectionner un patient</option>
                                    <option value="1">Jean Dupont</option>
                                    <option value="2">Marie Martin</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Médecin</label>
                                <select class="form-select" name="doctor_id" required>
                                    <option value="">Sélectionner un médecin</option>
                                    <option value="1">Dr. Jean Dupont</option>
                                    <option value="2">Dr. Marie Martin</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" name="date" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Heure</label>
                                <input type="time" class="form-control" name="time" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Type de consultation</label>
                                <select class="form-select" name="type" required>
                                    <option value="consultation">Consultation</option>
                                    <option value="urgence">Urgence</option>
                                    <option value="suivi">Suivi</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Durée (minutes)</label>
                                <input type="number" class="form-control" name="duration" value="30" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" name="notes" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" onclick="saveAppointment()">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- New Patient Modal -->
    <div class="modal fade" id="newPatientModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouveau Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="patientForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nom</label>
                                <input type="text" class="form-control" name="lastname" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Prénom</label>
                                <input type="text" class="form-control" name="firstname" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Date de naissance</label>
                                <input type="date" class="form-control" name="birthdate" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Genre</label>
                                <select class="form-select" name="gender" required>
                                    <option value="">Sélectionner</option>
                                    <option value="M">Masculin</option>
                                    <option value="F">Féminin</option>
                                    <option value="A">Autre</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Téléphone</label>
                                <input type="tel" class="form-control" name="phone" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Adresse</label>
                            <textarea class="form-control" name="address" rows="2" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Photo</label>
                            <input type="file" class="form-control" name="photo" accept="image/*">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" onclick="savePatient()">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fonction pour exporter le rapport
        function exportReport() {
            alert('Exportation du rapport...');
        }

        // Fonction pour sauvegarder un nouveau rendez-vous
        function saveAppointment() {
            alert('Rendez-vous enregistré avec succès!');
            $('#newAppointmentModal').modal('hide');
        }

        // Fonction pour sauvegarder un nouveau patient
        function savePatient() {
            alert('Patient enregistré avec succès!');
            $('#newPatientModal').modal('hide');
        }

        // Fonction pour charger les activités récentes
        function loadRecentActivities() {
            const activities = [
                {
                    icon: 'user-plus',
                    title: 'Nouveau patient',
                    message: 'Marie Martin a été ajoutée à la base de données',
                    time: 'Il y a 5 minutes'
                },
                {
                    icon: 'calendar-plus',
                    title: 'Nouveau rendez-vous',
                    message: 'Consultation avec Dr. Dupont programmée pour demain',
                    time: 'Il y a 15 minutes'
                },
                {
                    icon: 'file-medical',
                    title: 'Nouveau dossier',
                    message: 'Dossier médical créé pour Jean Dupont',
                    time: 'Il y a 30 minutes'
                }
            ];

            const container = document.getElementById('recentActivities');
            container.innerHTML = activities.map(activity => `
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-${activity.icon}"></i>
                    </div>
                    <div class="activity-content">
                        <h6>${activity.title}</h6>
                        <p>${activity.message}</p>
                        <small class="activity-time">${activity.time}</small>
                    </div>
                </div>
            `).join('');
        }

        // Fonction pour charger les rendez-vous à venir
        function loadUpcomingAppointments() {
            const appointments = [
                {
                    time: '10:00',
                    patient: 'Jean Dupont',
                    doctor: 'Dr. Marie Martin',
                    type: 'Consultation'
                },
                {
                    time: '14:30',
                    patient: 'Marie Martin',
                    doctor: 'Dr. Jean Dupont',
                    type: 'Suivi'
                }
            ];

            const container = document.getElementById('upcomingAppointments');
            container.innerHTML = appointments.map(apt => `
                <div class="appointment-item">
                    <div class="appointment-time">${apt.time}</div>
                    <div class="appointment-info">
                        <h6>${apt.patient}</h6>
                        <p>${apt.doctor} - ${apt.type}</p>
                    </div>
                </div>
            `).join('');
        }

        // Charger les données au chargement de la page
        loadRecentActivities();
        loadUpcomingAppointments();
    </script>
</body>
</html>