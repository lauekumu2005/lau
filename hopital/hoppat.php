<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Patients - Administration Hospitalière</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <a href="rdv.php">
                <i class="fas fa-calendar-alt"></i>
                Rendez-vous
            </a>
            <a href="medecin.php">
                <i class="fas fa-user-md"></i>
                Médecins
            </a>
            <a href="hoppat.php" class="active">
                <i class="fas fa-procedures"></i>
                Patients
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
            <img src="../assets/images/admin-avatar.png" alt="Admin">
            <div class="user-info">
                <h6>Admin</h6>
                <small>Administrateur</small>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="welcome-section fade-in">
            <h2>Gestion des Patients</h2>
            <p>Gérez les dossiers médicaux de vos patients</p>
            <div class="quick-actions">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newPatientModal">
                    <i class="fas fa-plus"></i>
                    Nouveau patient
                </button>
                <button class="btn btn-primary">
                    <i class="fas fa-sync"></i>
                    Actualiser
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card fade-in">
                    <div class="stats-value">1,250</div>
                    <div class="stats-label">
                        <i class="fas fa-procedures"></i>
                        Patients totaux
                    </div>
                    <div class="progress-info">
                        <small>+12% ce mois</small>
                        <div class="progress">
                            <div class="progress-bar bg-primary" style="width: 85%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card fade-in">
                    <div class="stats-value">45</div>
                    <div class="stats-label">
                        <i class="fas fa-calendar-check"></i>
                        RDV aujourd'hui
                    </div>
                    <div class="progress-info">
                        <small>+3% ce mois</small>
                        <div class="progress">
                            <div class="progress-bar bg-warning" style="width: 65%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card fade-in">
                    <div class="stats-value">98%</div>
                    <div class="stats-label">
                        <i class="fas fa-chart-line"></i>
                        Satisfaction
                    </div>
                    <div class="progress-info">
                        <small>+2% ce mois</small>
                        <div class="progress">
                            <div class="progress-bar bg-info" style="width: 98%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card fade-in">
                    <div class="stats-value">150</div>
                    <div class="stats-label">
                        <i class="fas fa-user-md"></i>
                        Médecins actifs
                    </div>
                    <div class="progress-info">
                        <small>+5% ce mois</small>
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: 75%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card fade-in">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0">Liste des patients</h4>
                        <div class="d-flex gap-2">
                            <input type="text" class="form-control" placeholder="Rechercher un patient...">
                            <select class="form-control">
                                <option value="">Tous les services</option>
                                <option value="cardiology">Cardiologie</option>
                                <option value="neurology">Neurologie</option>
                                <option value="pediatrics">Pédiatrie</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Patient</th>
                                    <th>Service</th>
                                    <th>Médecin</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="../assets/images/patient-1.jpg" alt="Jean Dupont" class="rounded-circle me-2" width="40" height="40">
                                            <div>
                                                <h6 class="mb-0">Jean Dupont</h6>
                                                <small class="text-muted">45 ans</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Cardiologie</td>
                                    <td>Dr. Martin</td>
                                    <td><span class="badge badge-success">En consultation</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="../assets/images/patient-2.jpg" alt="Marie Laurent" class="rounded-circle me-2" width="40" height="40">
                                            <div>
                                                <h6 class="mb-0">Marie Laurent</h6>
                                                <small class="text-muted">32 ans</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Neurologie</td>
                                    <td>Dr. Dubois</td>
                                    <td><span class="badge badge-warning">En attente</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="../assets/images/patient-3.jpg" alt="Pierre Durand" class="rounded-circle me-2" width="40" height="40">
                                            <div>
                                                <h6 class="mb-0">Pierre Durand</h6>
                                                <small class="text-muted">28 ans</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Pédiatrie</td>
                                    <td>Dr. Bernard</td>
                                    <td><span class="badge badge-info">Hospitalisé</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Nouveau Patient -->
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
                        <div class="mb-3">
                            <label class="form-label">Médecin traitant</label>
                            <select class="form-control" required>
                                <option value="">Sélectionner un médecin</option>
                                <option value="1">Dr. Martin</option>
                                <option value="2">Dr. Dubois</option>
                                <option value="3">Dr. Bernard</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Photo</label>
                            <input type="file" class="form-control" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('newPatientForm').addEventListener('submit', function(e) {
            e.preventDefault();
            var modal = bootstrap.Modal.getInstance(document.getElementById('newPatientModal'));
            modal.hide();
        });
    </script>
</body>
</html>
