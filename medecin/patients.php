<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Patients - Médecin</title>
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

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .btn-new-patient {
            background-color: #003366;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-new-patient:hover {
            background-color: #002244;
            transform: translateY(-2px);
        }

        .patients-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .patient-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .patient-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .patient-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .patient-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #003366;
            font-weight: 600;
            font-size: 1.2rem;
        }

        .patient-info h3 {
            margin: 0;
            font-size: 1.2rem;
            color: #003366;
        }

        .patient-info p {
            margin: 5px 0 0;
            color: #666;
            font-size: 0.9rem;
        }

        .patient-details {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
            color: #666;
            font-size: 0.9rem;
        }

        .detail-item i {
            color: #003366;
            width: 20px;
        }

        .patient-actions {
            display: flex;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .btn-action {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            font-size: 0.9rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            transition: all 0.3s ease;
            background-color: #e3f2fd;
            color: #1976d2;
        }

        .btn-action:hover {
            background-color: #bbdefb;
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
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
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

        .form-section {
            margin-bottom: 30px;
        }

        .form-section h4 {
            color: #003366;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #666;
            font-weight: 500;
        }

        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
        }

        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .btn-save {
            background-color: #003366;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 20px;
        }

        .btn-save:hover {
            background-color: #002244;
        }

        .search-box {
            margin-bottom: 30px;
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
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Hôpital Central</h3>
        </div>
        <a href="index.php"><i class="fas fa-home"></i> Tableau de Bord</a>
        <a href="patients.php" class="active"><i class="fas fa-user-injured"></i> Mes Patients</a>
        <a href="recherche-patients.php"><i class="fas fa-search"></i> Recherche Patients</a>
        
    </div>

    <div class="main-content">
        <div class="page-header">
            <h1>Mes Patients</h1>
            <button class="btn-new-patient" onclick="openNewPatientModal()">
                <i class="fas fa-plus"></i> Nouveau Patient
            </button>
        </div>

        <div class="search-box">
            <input type="text" class="search-input" placeholder="Rechercher un patient..." id="searchInput">
        </div>

        <div class="patients-grid">
            <div class="patient-card">
                <div class="patient-header">
                    <div class="patient-avatar">LE</div>
                    <div class="patient-info">
                        <h3>Lauclass Ekumu</h3>
                        <p>28 ans</p>
                    </div>
                </div>
                <div class="patient-details">
                    <div class="detail-item">
                        <i class="fas fa-venus-mars"></i>
                        <span>Masculin</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-weight"></i>
                        <span>75 kg</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-ruler-vertical"></i>
                        <span>178 cm</span>
                    </div>
                </div>
                <div class="patient-actions">
                    <button class="btn-action" onclick="window.location.href='patient-details.php?id=1'">
                        <i class="fas fa-eye"></i> Voir le dossier
                    </button>
                </div>
            </div>

            <div class="patient-card">
                <div class="patient-header">
                    <div class="patient-avatar">JD</div>
                    <div class="patient-info">
                        <h3>Jean Dupont</h3>
                        <p>45 ans</p>
                    </div>
                </div>
                <div class="patient-details">
                    <div class="detail-item">
                        <i class="fas fa-venus-mars"></i>
                        <span>Masculin</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-weight"></i>
                        <span>82 kg</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-ruler-vertical"></i>
                        <span>175 cm</span>
                    </div>
                </div>
                <div class="patient-actions">
                    <button class="btn-action" onclick="window.location.href='patient-details.php?id=2'">
                        <i class="fas fa-eye"></i> Voir le dossier
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour nouveau patient -->
    <div id="newPatientModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Nouveau Dossier Patient</h3>
                <button class="close-modal" onclick="closeNewPatientModal()">&times;</button>
            </div>
            <form id="newPatientForm" onsubmit="saveNewPatient(event)">
                <div class="form-section">
                    <h4>Informations Personnelles</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" id="patientNom" required>
                        </div>
                        <div class="form-group">
                            <label>Prénom</label>
                            <input type="text" id="patientPrenom" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Date de naissance</label>
                            <input type="date" id="patientDateNaissance" required>
                        </div>
                        <div class="form-group">
                            <label>Sexe</label>
                            <select id="patientSexe" required>
                                <option value="">Sélectionner</option>
                                <option value="M">Masculin</option>
                                <option value="F">Féminin</option>
                                <option value="A">Autre</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Téléphone</label>
                            <input type="tel" id="patientTelephone" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" id="patientEmail">
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h4>Informations Médicales</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Poids (kg)</label>
                            <input type="number" id="patientPoids" required>
                        </div>
                        <div class="form-group">
                            <label>Taille (cm)</label>
                            <input type="number" id="patientTaille" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Groupe Sanguin</label>
                            <select id="patientGroupeSanguin" required>
                                <option value="">Sélectionner</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h4>Antécédents Médicaux</h4>
                    <div class="form-group">
                        <label>Allergies</label>
                        <textarea placeholder="Liste des allergies connues..."></textarea>
                    </div>
                    <div class="form-group">
                        <label>Maladies Chroniques</label>
                        <textarea placeholder="Liste des maladies chroniques..."></textarea>
                    </div>
                    <div class="form-group">
                        <label>Médicaments en cours</label>
                        <textarea placeholder="Liste des médicaments pris régulièrement..."></textarea>
                    </div>
                </div>

                <div class="form-section">
                    <h4>Notes Additionnelles</h4>
                    <div class="form-group">
                        <label>Observations</label>
                        <textarea placeholder="Notes importantes sur le patient..."></textarea>
                    </div>
                </div>

                <button type="submit" class="btn-save">Créer le dossier</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Données initiales des patients
        let patients = [
            {
                id: 1,
                nom: "Ekumu",
                prenom: "Lauclass",
                age: 28,
                sexe: "M",
                poids: 75,
                taille: 178,
                telephone: "0123456789",
                email: "lauclass@example.com",
                groupeSanguin: "O+",
                allergies: "Aucune",
                maladiesChroniques: "Aucune",
                medicaments: "Aucun",
                observations: "Patient en bonne santé"
            },
            {
                id: 2,
                nom: "Dupont",
                prenom: "Jean",
                age: 45,
                sexe: "M",
                poids: 82,
                taille: 175,
                telephone: "0987654321",
                email: "jean@example.com",
                groupeSanguin: "A+",
                allergies: "Pénicilline",
                maladiesChroniques: "Hypertension",
                medicaments: "Antihypertenseur",
                observations: "Suivi régulier nécessaire"
            }
        ];

        // Charger les patients au démarrage
        document.addEventListener('DOMContentLoaded', function() {
            // Récupérer les patients du localStorage s'ils existent
            const savedPatients = localStorage.getItem('patients');
            if (savedPatients) {
                patients = JSON.parse(savedPatients);
            } else {
                // Sinon, sauvegarder les patients initiaux
                localStorage.setItem('patients', JSON.stringify(patients));
            }
            displayPatients();
        });

        function displayPatients() {
            const patientsGrid = document.querySelector('.patients-grid');
            patientsGrid.innerHTML = ''; // Vider la grille

            patients.forEach(patient => {
                const patientCard = createPatientCard(patient);
                patientsGrid.appendChild(patientCard);
            });
        }

        function createPatientCard(patient) {
            const card = document.createElement('div');
            card.className = 'patient-card';
            const initiale = (patient.prenom[0] + patient.nom[0]).toUpperCase();
            
            card.innerHTML = `
                <div class="patient-header">
                    <div class="patient-avatar">${initiale}</div>
                    <div class="patient-info">
                        <h3>${patient.prenom} ${patient.nom}</h3>
                        <p>${patient.age} ans</p>
                    </div>
                </div>
                <div class="patient-details">
                    <div class="detail-item">
                        <i class="fas fa-venus-mars"></i>
                        <span>${patient.sexe === 'M' ? 'Masculin' : patient.sexe === 'F' ? 'Féminin' : 'Autre'}</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-weight"></i>
                        <span>${patient.poids} kg</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-ruler-vertical"></i>
                        <span>${patient.taille} cm</span>
                    </div>
                </div>
                <div class="patient-actions">
                    <button class="btn-action" onclick="viewPatientDetails(${patient.id})">
                        <i class="fas fa-eye"></i> Voir le dossier
                    </button>
                </div>
            `;
            return card;
        }

        function viewPatientDetails(patientId) {
            const patient = patients.find(p => p.id === patientId);
            if (patient) {
                // Stocker l'ID du patient dans le localStorage
                localStorage.setItem('currentPatientId', patientId);
                // Rediriger vers la page de détails
                window.location.href = `patient-details.php?id=${patientId}`;
            }
        }

        function saveNewPatient(event) {
            event.preventDefault();
            
            // Récupérer les valeurs du formulaire
            const newPatient = {
                id: patients.length + 1,
                nom: document.getElementById('patientNom').value,
                prenom: document.getElementById('patientPrenom').value,
                dateNaissance: document.getElementById('patientDateNaissance').value,
                age: new Date().getFullYear() - new Date(document.getElementById('patientDateNaissance').value).getFullYear(),
                sexe: document.getElementById('patientSexe').value,
                poids: document.getElementById('patientPoids').value,
                taille: document.getElementById('patientTaille').value,
                telephone: document.getElementById('patientTelephone').value,
                email: document.getElementById('patientEmail').value,
                groupeSanguin: document.getElementById('patientGroupeSanguin').value,
                allergies: document.querySelector('textarea[placeholder="Liste des allergies connues..."]').value,
                maladiesChroniques: document.querySelector('textarea[placeholder="Liste des maladies chroniques..."]').value,
                medicaments: document.querySelector('textarea[placeholder="Liste des médicaments pris régulièrement..."]').value,
                observations: document.querySelector('textarea[placeholder="Notes importantes sur le patient..."]').value
            };

            // Ajouter le nouveau patient à la liste
            patients.push(newPatient);
            
            // Sauvegarder dans le localStorage
            localStorage.setItem('patients', JSON.stringify(patients));

            // Mettre à jour l'affichage
            displayPatients();

            // Fermer la modal et réinitialiser le formulaire
            closeNewPatientModal();

            // Afficher une notification de succès
            showNotification('Dossier patient créé avec succès !');
        }

        function showNotification(message) {
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background-color: #4CAF50;
                color: white;
                padding: 15px 25px;
                border-radius: 8px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.2);
                z-index: 1000;
                opacity: 0;
                transform: translateX(100px);
                transition: all 0.5s ease;
            `;
            notification.textContent = message;
            document.body.appendChild(notification);

            setTimeout(() => {
                notification.style.opacity = '1';
                notification.style.transform = 'translateX(0)';
            }, 100);

            setTimeout(() => {
                notification.style.opacity = '0';
                notification.style.transform = 'translateX(100px)';
                setTimeout(() => notification.remove(), 500);
            }, 3000);
        }

        function openNewPatientModal() {
            const modal = document.getElementById('newPatientModal');
            modal.style.display = 'flex';
        }

        function closeNewPatientModal() {
            const modal = document.getElementById('newPatientModal');
            modal.style.display = 'none';
            // Réinitialiser le formulaire
            document.getElementById('newPatientForm').reset();
        }

        // Fonction de recherche
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const patientCards = document.querySelectorAll('.patient-card');
            
            patientCards.forEach(card => {
                const patientName = card.querySelector('h3').textContent.toLowerCase();
                if (patientName.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
