<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médecins - DOPAHO</title>
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
            <a href="index.php">
                <i class="fas fa-home"></i>
                Tableau de bord
            </a>
            <a href="hoppat.php">
                <i class="fas fa-users"></i>
                Patients
            </a>
            <a href="medecin.php" class="active">
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
            <h2>Gestion des Médecins</h2>
            <p>Gérez l'équipe médicale de votre établissement</p>
            <div class="quick-actions">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDoctorModal">
                    <i class="fas fa-plus"></i>
                    Nouveau Médecin
                </button>
                <button class="btn btn-outline-primary" onclick="exportDoctors()">
                    <i class="fas fa-download"></i>
                    Exporter
                </button>
                <button class="btn btn-outline-primary" onclick="refreshList()">
                    <i class="fas fa-sync-alt"></i>
                    Actualiser
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
                        <div class="stats-value">8</div>
                        <div class="stats-label">
                            <i class="fas fa-stethoscope text-success"></i>
                            Spécialités
                        </div>
                        <div class="progress-info">
                            <small>+1 cette année</small>
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width: 80%"></div>
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
                            <i class="fas fa-star text-warning"></i>
                            Taux de satisfaction
                        </div>
                        <div class="progress-info">
                            <small>+3% ce mois</small>
                            <div class="progress">
                                <div class="progress-bar bg-warning" style="width: 95%"></div>
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
                            <i class="fas fa-calendar-check text-info"></i>
                            RDV aujourd'hui
                        </div>
                        <div class="progress-info">
                            <small>+5 cette semaine</small>
                            <div class="progress">
                                <div class="progress-bar bg-info" style="width: 60%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Doctors List -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title mb-0">Liste des Médecins</h5>
                    <div class="d-flex gap-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Rechercher un médecin...">
                            <button class="btn btn-outline-secondary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <select class="form-select" id="specialtyFilter">
                            <option value="">Toutes les spécialités</option>
                            <option value="general">Médecine générale</option>
                            <option value="pediatric">Pédiatrie</option>
                            <option value="cardiology">Cardiologie</option>
                        </select>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Nom</th>
                                <th>Spécialité</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="doctorsList">
                            <!-- Les médecins seront chargés dynamiquement ici -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Doctor Modal -->
    <div class="modal fade" id="addDoctorModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouveau Médecin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="doctorForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nom complet</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Spécialité</label>
                                <select class="form-select" name="specialty" required>
                                    <option value="">Sélectionner une spécialité</option>
                                    <option value="general">Médecine générale</option>
                                    <option value="pediatric">Pédiatrie</option>
                                    <option value="cardiology">Cardiologie</option>
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
                            <label class="form-label">Photo</label>
                            <input type="file" class="form-control" name="photo" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Horaires de consultation</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="time" class="form-control" name="start_time" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="time" class="form-control" name="end_time" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" onclick="saveDoctor()">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fonction pour exporter la liste des médecins
        function exportDoctors() {
            alert('Exportation de la liste des médecins...');
        }

        // Fonction pour rafraîchir la liste
        function refreshList() {
            loadDoctors();
            alert('Liste actualisée');
        }

        // Fonction pour sauvegarder un nouveau médecin
        function saveDoctor() {
            alert('Médecin enregistré avec succès!');
            $('#addDoctorModal').modal('hide');
        }

        // Fonction pour charger la liste des médecins
        function loadDoctors() {
            const doctors = [
                {
                    photo: 'assets/images/doctor1.jpg',
                    name: 'Dr. Jean Dupont',
                    specialty: 'Médecine générale',
                    email: 'jean.dupont@dopaho.com',
                    phone: '01 23 45 67 89',
                    status: 'actif'
                },
                {
                    photo: 'assets/images/doctor2.jpg',
                    name: 'Dr. Marie Martin',
                    specialty: 'Pédiatrie',
                    email: 'marie.martin@dopaho.com',
                    phone: '01 23 45 67 90',
                    status: 'actif'
                }
            ];

            const container = document.getElementById('doctorsList');
            container.innerHTML = doctors.map(doctor => `
                <tr>
                    <td>
                        <img src="${doctor.photo}" alt="${doctor.name}" class="rounded-circle" width="40" height="40">
                    </td>
                    <td>${doctor.name}</td>
                    <td>${doctor.specialty}</td>
                    <td>${doctor.email}</td>
                    <td>${doctor.phone}</td>
                    <td>
                        <span class="badge ${doctor.status === 'actif' ? 'badge-success' : 'badge-warning'}">
                            ${doctor.status}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary" onclick="editDoctor(this)">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger" onclick="deleteDoctor(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `).join('');
        }

        // Fonction pour éditer un médecin
        function editDoctor(button) {
            const row = button.closest('tr');
            // Logique d'édition
            alert('Édition du médecin...');
        }

        // Fonction pour supprimer un médecin
        function deleteDoctor(button) {
            if (confirm('Êtes-vous sûr de vouloir supprimer ce médecin ?')) {
                const row = button.closest('tr');
                row.remove();
                alert('Médecin supprimé avec succès');
            }
        }

        // Charger les médecins au chargement de la page
        loadDoctors();
    </script>
</body>
</html>
