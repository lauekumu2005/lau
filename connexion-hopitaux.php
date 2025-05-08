<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dopaho - Système de Partage de Dossiers Médicaux</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #003366;
            --secondary-color: #002244;
            --accent-color: #0066cc;
            --success-color: #2e7d32;
            --warning-color: #ef6c00;
            --danger-color: #dc3545;
            --light-bg: #f4f6f9;
            --white: #ffffff;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: var(--primary-color);
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            color: var(--white);
            font-size: 1.5rem;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .auth-section {
            background-color: var(--white);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: 0 auto;
        }

        .auth-title {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            color: var(--primary-color);
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 0.75rem 1rem;
        }

        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(0,102,204,0.25);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
        }

        .search-section {
            display: none;
            margin-top: 2rem;
        }

        .search-box {
            background-color: var(--white);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .search-title {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            font-weight: 600;
        }

        .patient-card {
            background-color: var(--white);
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 1rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .patient-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }

        .patient-header {
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #eee;
        }

        .patient-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .patient-id {
            color: #666;
            font-size: 0.9rem;
        }

        .patient-details {
            margin: 1rem 0;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
            color: #666;
        }

        .detail-item i {
            color: var(--accent-color);
            width: 20px;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #eee;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-view {
            background-color: var(--accent-color);
            color: var(--white);
        }

        .btn-view:hover {
            background-color: #0052a3;
            color: var(--white);
            transform: translateY(-1px);
        }

        .btn-request {
            background-color: var(--warning-color);
            color: var(--white);
        }

        .btn-request:hover {
            background-color: #d45a00;
            color: var(--white);
            transform: translateY(-1px);
        }

        .modal-content {
            border-radius: 12px;
            border: none;
        }

        .modal-header {
            background-color: var(--primary-color);
            color: var(--white);
            border-radius: 12px 12px 0 0;
            padding: 1rem 1.5rem;
        }

        .modal-title {
            font-weight: 600;
        }

        .dossier-access {
            text-align: left;
        }
        
        .patient-info {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
        }
        
        .dossier-content {
            max-height: 300px;
            overflow-y: auto;
            padding: 1rem;
            background: #fff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
        }
        
        .dossier-content h6 {
            color: #003366;
            margin-bottom: 0.5rem;
        }

        /* Styles pour les modales SweetAlert2 */
        .swal2-popup {
            border-radius: 12px !important;
        }

        .swal2-title {
            color: #003366 !important;
            font-weight: 600 !important;
        }

        .swal2-html-container {
            margin: 1rem 0 !important;
        }

        .swal2-confirm {
            padding: 0.75rem 2rem !important;
            font-weight: 500 !important;
        }

        .swal2-cancel {
            padding: 0.75rem 2rem !important;
            font-weight: 500 !important;
        }

        #quickAccessForm .form-control {
            border-radius: 8px;
            padding: 0.75rem;
        }

        #quickAccessForm .form-control:focus {
            border-color: #0066cc;
            box-shadow: 0 0 0 0.2rem rgba(0,102,204,0.25);
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="index.php" class="navbar-brand">
            <i class="fas fa-hospital"></i>
            Dopaho - Système de Partage de Dossiers Médicaux
        </a>
    </nav>

    <div class="container">
        <!-- Section d'authentification -->
        <div class="auth-section" id="authSection">
            <h2 class="auth-title">Connexion</h2>
            <form id="authForm">
                <div class="form-group">
                    <label for="userType">Type d'utilisateur</label>
                    <select class="form-control" id="userType" required>
                        <option value="">Sélectionnez votre rôle</option>
                        <option value="medecin">Médecin</option>
                        <option value="infirmier">Infirmier</option>
                        <option value="admin">Administrateur</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="hopital">Hôpital</label>
                    <select class="form-control" id="hopital" required>
                        <option value="">Sélectionnez votre hôpital</option>
                        <option value="hopital1">Hôpital Central</option>
                        <option value="hopital2">Clinique Saint-Joseph</option>
                        <option value="hopital3">Centre Médical du Nord</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
        </div>

        <!-- Section de recherche -->
        <div class="search-section" id="searchSection" style="display: none;">
            <div class="search-box">
                <h3 class="search-title">Rechercher un patient</h3>
                <div class="form-group">
                    <input type="text" class="form-control" id="searchInput" placeholder="Entrez le nom ou l'ID du patient">
                </div>
                <div id="searchResults"></div>
            </div>
        </div>
    </div>

    <!-- Modal de demande d'accès -->
    <div class="modal fade" id="accessRequestModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Demande d'accès au dossier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="accessRequestForm">
                        <div class="form-group">
                            <label for="requestReason">Raison de la demande</label>
                            <textarea class="form-control" id="requestReason" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="accessDuration">Durée d'accès (jours)</label>
                            <select class="form-control" id="accessDuration" required>
                                <option value="1">1 jour</option>
                                <option value="3">3 jours</option>
                                <option value="7">7 jours</option>
                                <option value="30">30 jours</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" onclick="submitAccessRequest()">Soumettre la demande</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    // Données de test
    const patients = [
        {
            id: "P001",
            name: "Jean Dupont",
            age: 45,
            sexe: "M",
            poids: "75 kg",
            groupeSanguin: "A+",
            hopital: "Hôpital Central",
            medecinSuivi: "Dr. Martin",
            dossier: {
                historique: "Hypertension artérielle, Diabète type 2",
                traitements: "Métoprolol 50mg, Metformine 1000mg",
                notes: "Suivi régulier, dernier contrôle le 15/03/2024"
            }
        },
        {
            id: "P002",
            name: "Marie Martin",
            age: 32,
            sexe: "F",
            poids: "58 kg",
            groupeSanguin: "O-",
            hopital: "Clinique Saint-Joseph",
            medecinSuivi: "Dr. Dubois",
            dossier: {
                historique: "Asthme, Allergies saisonnières",
                traitements: "Ventoline, Antihistaminiques",
                notes: "Contrôle trimestriel, dernière consultation le 01/03/2024"
            }
        }
    ];

    let currentPatientId = null;

    // Gestion de la connexion
    document.getElementById('authForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const userType = document.getElementById('userType').value;
        const hopital = document.getElementById('hopital').value;
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        // Simuler la connexion
        if (userType && hopital && username && password) {
            document.getElementById('authSection').style.display = 'none';
            document.getElementById('searchSection').style.display = 'block';
        }
    });

    // Gestion de la recherche
    document.getElementById('searchInput').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const results = patients.filter(patient => 
            patient.name.toLowerCase().includes(searchTerm) || 
            patient.id.toLowerCase().includes(searchTerm)
        );
        displaySearchResults(results);
    });

    // Affichage des résultats de recherche
    function displaySearchResults(results) {
        const resultsDiv = document.getElementById('searchResults');
        resultsDiv.innerHTML = '';

        results.forEach(patient => {
            const patientCard = document.createElement('div');
            patientCard.className = 'patient-card';
            patientCard.innerHTML = `
                <div class="patient-info">
                    <div class="patient-header">
                        <div class="patient-name">${patient.name}</div>
                        <div class="patient-id">ID: ${patient.id}</div>
                    </div>
                    <div class="patient-details">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-item">
                                    <i class="fas fa-user"></i>
                                    <span>${patient.age} ans - ${patient.sexe}</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-weight"></i>
                                    <span>${patient.poids}</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-tint"></i>
                                    <span>Groupe ${patient.groupeSanguin}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="detail-item">
                                    <i class="fas fa-hospital"></i>
                                    <span>${patient.hopital}</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-user-md"></i>
                                    <span>${patient.medecinSuivi}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="action-buttons">
                        <button class="btn btn-view" onclick="viewDossier('${patient.id}')">
                            <i class="fas fa-file-medical"></i> Voir le dossier complet
                        </button>
                        <button class="btn btn-request" onclick="requestAccess('${patient.id}')">
                            <i class="fas fa-key"></i> Demander accès
                        </button>
                    </div>
                </div>
            `;
            resultsDiv.appendChild(patientCard);
        });
    }    // Fonction pour voir le dossier
    function viewDossier(patientId) {
        currentPatientId = patientId;
        const patient = patients.find(p => p.id === patientId);
        
        // Afficher d'abord la demande d'accès
        Swal.fire({
            title: 'Demande d\'accès au dossier',
            html: `
                <div class="text-center">
                    <i class="fas fa-lock fa-3x text-primary mb-3"></i>
                    <p>Pour accéder au dossier médical de ${patient.name}, vous devez demander l'accès.</p>
                    <form id="quickAccessForm" class="text-start mt-4">
                        <div class="mb-3">
                            <label class="form-label">Raison de l'accès</label>
                            <textarea class="form-control" id="quickRequestReason" rows="3" required 
                                placeholder="Veuillez indiquer la raison de votre accès au dossier"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Durée d'accès</label>
                            <select class="form-control" id="quickAccessDuration" required>
                                <option value="1">1 jour</option>
                                <option value="3">3 jours</option>
                                <option value="7">7 jours</option>
                                <option value="30">30 jours</option>
                            </select>
                        </div>
                    </form>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Demander l\'accès',
            cancelButtonText: 'Annuler',
            confirmButtonColor: '#003366',
            width: '500px',
            customClass: {
                confirmButton: 'btn btn-primary px-4',
                cancelButton: 'btn btn-secondary px-4'
            },
            buttonsStyling: true,
            preConfirm: () => {
                const reason = document.getElementById('quickRequestReason').value;
                const duration = document.getElementById('quickAccessDuration').value;
                
                if (!reason) {
                    Swal.showValidationMessage('Veuillez indiquer la raison de l\'accès');
                    return false;
                }
                
                return { reason, duration };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Afficher le modal de consentement du patient
                Swal.fire({
                    title: 'Demande de Consentement',
                    html: `
                        <div class="text-center">
                            <i class="fas fa-user-shield fa-3x text-primary mb-3"></i>
                            <p>Avant d'accorder l'accès au dossier médical, nous devons obtenir le consentement du patient ou d'une personne de confiance.</p>
                            <p class="text-muted">Le patient sera notifié de cette demande.</p>
                        </div>
                    `,
                    showCancelButton: true,
                    confirmButtonText: 'Demander le consentement',
                    cancelButtonText: 'Annuler',
                    confirmButtonColor: '#003366',
                    width: '500px',
                    customClass: {
                        confirmButton: 'btn btn-primary px-4',
                        cancelButton: 'btn btn-secondary px-4'
                    }
                }).then((consentResult) => {
                    if (consentResult.isConfirmed) {
                        // Simuler l'envoi de la notification au patient
                        Swal.fire({
                            title: 'Notification envoyée',
                            html: `
                                <div class="text-center">
                                    <i class="fas fa-bell fa-3x text-warning mb-3"></i>
                                    <p>Une notification a été envoyée au patient pour obtenir son consentement.</p>
                                    <p class="text-muted">Vous serez notifié une fois le consentement accordé.</p>
                                </div>
                            `,
                            confirmButtonText: 'OK',
                            width: '500px',
                            customClass: {
                                confirmButton: 'btn btn-primary px-4'
                            }
                        });

                        // Simuler l'accord du patient après un délai
                        setTimeout(() => {
                            showPatientConsent(patientId, result.value.reason, result.value.duration);
                        }, 3000);
                    }
                });
            }
        });
    }
        // Fonction pour simuler l'accord du patient
        function showPatientConsent(patientId, reason, duration) {
        Swal.fire({
            title: 'Consentement Accordé',
            html: `
                <div class="text-center">
                    <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                    <p>Le patient a accordé son consentement pour l'accès à son dossier médical.</p>
                    <div class="mt-3">
                        <p><strong>Raison de l'accès:</strong> ${reason}</p>
                        <p><strong>Durée d'accès:</strong> ${duration} jours</p>
                    </div>
                </div>
            `,
            confirmButtonText: 'Accéder au dossier',
            confirmButtonColor: '#28a745',
            width: '500px',
            customClass: {
                confirmButton: 'btn btn-success px-4'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Afficher le dossier
                showDossierAccess(patientId);
            }
        });
    }

    // Fonction pour simuler l'accès au dossier
    function showDossierAccess(patientId) {
        const patient = patients.find(p => p.id === patientId);
        
        Swal.fire({
            title: 'Accès au Dossier Médical',
            html: `
                <div class="dossier-access">
                    <div class="patient-info mb-4">
                        <h5>${patient.name}</h5>
                        <p class="text-muted">ID: ${patient.id}</p>
                    </div>
                    <div class="dossier-content">
                        <div class="mb-3">
                            <h6>Historique Médical</h6>
                            <p>${patient.dossier.historique}</p>
                        </div>
                        <div class="mb-3">
                            <h6>Traitements en cours</h6>
                            <p>${patient.dossier.traitements}</p>
                        </div>
                        <div class="mb-3">
                            <h6>Notes</h6>
                            <p>${patient.dossier.notes}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-primary w-100" onclick="showAddToSystemForm('${patientId}')">
                            <i class="fas fa-plus-circle me-2"></i>Ajouter au système interne
                        </button>
                    </div>
                </div>
            `,
            width: '600px',
            showCloseButton: true,
            showConfirmButton: false
        });
    }

    // Fonction pour afficher le formulaire d'ajout au système interne
    function showAddToSystemForm(patientId) {
        Swal.fire({
            title: 'Ajouter au Système Interne',
            html: `
                <form id="addToSystemForm" class="text-start">
                    <div class="mb-3">
                        <label class="form-label">Service</label>
                        <select class="form-control" id="service">
                            <option value="">Sélectionner un service</option>
                            <option value="urgence">Urgences</option>
                            <option value="pediatrie">Pédiatrie</option>
                            <option value="chirurgie">Chirurgie</option>
                            <option value="cardiologie">Cardiologie</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Médecin responsable</label>
                        <input type="text" class="form-control" id="medecin" placeholder="Nom du médecin">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Notes additionnelles</label>
                        <textarea class="form-control" id="notes" rows="3" placeholder="Ajouter des notes..."></textarea>
                    </div>
                </form>
            `,
            showCancelButton: true,
            confirmButtonText: 'Enregistrer',
            cancelButtonText: 'Annuler',
            confirmButtonColor: '#003366',
            width: '500px',
            customClass: {
                confirmButton: 'btn btn-primary px-4',
                cancelButton: 'btn btn-secondary px-4'
            },
            preConfirm: () => {
                const service = document.getElementById('service').value;
                const medecin = document.getElementById('medecin').value;
                const notes = document.getElementById('notes').value;
                
                if (!service || !medecin) {
                    Swal.showValidationMessage('Veuillez remplir tous les champs obligatoires');
                    return false;
                }
                
                return { service, medecin, notes };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Simuler l'enregistrement dans le système
                Swal.fire({
                    title: 'Enregistrement réussi',
                    html: `
                        <div class="text-center">
                            <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                            <p>Le dossier a été ajouté avec succès au système interne.</p>
                            <div class="mt-3">
                                <p><strong>Service:</strong> ${result.value.service}</p>
                                <p><strong>Médecin:</strong> ${result.value.medecin}</p>
                            </div>
                        </div>
                    `,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#28a745',
                    width: '500px',
                    customClass: {
                        confirmButton: 'btn btn-success px-4'
                    }
                });
            }
        });
    }
</script>
</body>
</html>