<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Rendez-vous - DOPAHO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>

<body>
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
            <a href="medecin.php">
                <i class="fas fa-user-md"></i>
                Médecins
            </a>
            <a href="rdv.php" class="active">
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

    <div class="main-content">
        <div class="welcome-section">
            <h2>Gestion des Rendez-vous</h2>
            <p>Gérez les rendez-vous et le calendrier des consultations</p>
            <div class="quick-actions">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAppointmentModal">
                    <i class="fas fa-plus"></i>
                    Nouveau Rendez-vous
                </button>
                <button class="btn btn-outline-primary" onclick="refreshCalendar()">
                    <i class="fas fa-sync-alt"></i>
                    Actualiser
                </button>
                <button class="btn btn-outline-primary" onclick="exportCalendar()">
                    <i class="fas fa-download"></i>
                    Exporter
                </button>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <select class="form-select" id="doctorFilter">
                            <option value="">Tous les médecins</option>
                            <option value="1">Dr. Jean Dupont</option>
                            <option value="2">Dr. Marie Martin</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" id="typeFilter">
                            <option value="">Tous les types</option>
                            <option value="consultation">Consultation</option>
                            <option value="urgence">Urgence</option>
                            <option value="suivi">Suivi</option>
                        </select>
                    </div>
                </div>
                <div id="calendar"></div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rendez-vous du jour</h5>
                <div class="appointment-list" id="todayAppointments">
                    <!-- Les rendez-vous seront chargés dynamiquement ici -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addAppointmentModal" tabindex="-1">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                locale: 'fr',
                slotMinTime: '08:00:00',
                slotMaxTime: '20:00:00',
                events: [
                    {
                        title: 'Consultation - Jean Dupont',
                        start: '2024-02-20T10:00:00',
                        end: '2024-02-20T11:00:00',
                        backgroundColor: '#28a745'
                    },
                    {
                        title: 'Urgence - Marie Martin',
                        start: '2024-02-20T14:00:00',
                        end: '2024-02-20T15:00:00',
                        backgroundColor: '#dc3545'
                    }
                ],
                eventClick: function(info) {
                    alert('Rendez-vous: ' + info.event.title);
                }
            });
            calendar.render();
        });

        function refreshCalendar() {
            calendar.refetchEvents();
        }

        function exportCalendar() {
            alert('Exportation du calendrier...');
        }

        function saveAppointment() {
            alert('Rendez-vous enregistré avec succès!');
            $('#addAppointmentModal').modal('hide');
        }

        function loadTodayAppointments() {
            const appointments = [
                {
                    time: '10:00',
                    patient: 'Jean Dupont',
                    doctor: 'Dr. Marie Martin',
                    type: 'Consultation',
                    status: 'confirmé'
                },
                {
                    time: '14:30',
                    patient: 'Marie Martin',
                    doctor: 'Dr. Jean Dupont',
                    type: 'Suivi',
                    status: 'en attente'
                }
            ];

            const container = document.getElementById('todayAppointments');
            container.innerHTML = appointments.map(apt => `
                <div class="appointment-item">
                    <div class="appointment-time">${apt.time}</div>
                    <div class="appointment-info">
                        <h6>${apt.patient}</h6>
                        <p>${apt.doctor} - ${apt.type}</p>
                    </div>
                    <span class="badge ${apt.status === 'confirmé' ? 'badge-success' : 'badge-warning'}">
                        ${apt.status}
                    </span>
                </div>
            `).join('');
        }

        loadTodayAppointments();
    </script>
</body>

</html>
