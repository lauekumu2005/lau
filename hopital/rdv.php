<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Rendez-vous - Administration Hospitalière</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
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

        .calendar-container {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .fc {
            background: white;
            border-radius: 15px;
            padding: 20px;
        }

        .fc-toolbar-title {
            font-size: 1.5rem !important;
            font-weight: 600 !important;
            color: var(--primary-color) !important;
        }

        .fc-button-primary {
            background-color: var(--accent-color) !important;
            border-color: var(--accent-color) !important;
        }

        .fc-button-primary:hover {
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
        }

        .fc-event {
            border-radius: 8px !important;
            padding: 5px !important;
            font-size: 0.9rem !important;
        }

        .appointment-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .appointment-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .appointment-time {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .appointment-info {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .appointment-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
            border: 2px solid var(--accent-color);
        }

        .appointment-details {
            flex-grow: 1;
        }

        .appointment-name {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .appointment-meta {
            color: var(--light-text);
            font-size: 0.9rem;
        }

        .appointment-status {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-confirmed {
            background: var(--success-color);
            color: white;
        }

        .status-pending {
            background: var(--warning-color);
            color: white;
        }

        .status-cancelled {
            background: var(--danger-color);
            color: white;
        }

        .add-appointment-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--accent-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .add-appointment-btn:hover {
            transform: scale(1.1);
            background: var(--primary-color);
        }

        .user-profile {
            display: flex;
            align-items: center;
            padding: 15px;
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: auto;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-info {
            color: white;
        }

        .user-info h6 {
            margin: 0;
            font-size: 0.9rem;
        }

        .user-info small {
            color: rgba(255,255,255,0.6);
        }

        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .stats-value {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .stats-label {
            color: var(--light-text);
            font-size: 0.9rem;
        }

        .appointment-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .action-btn {
            padding: 8px 15px;
            border-radius: 8px;
            border: none;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }

        .btn-confirm {
            background: var(--success-color);
        }

        .btn-cancel {
            background: var(--danger-color);
        }

        .btn-reschedule {
            background: var(--warning-color);
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="https://via.placeholder.com/80" alt="Logo Hôpital">
            <h3>Hôpital Central</h3>
        </div>
        <a href="index.php"><i class="fas fa-home"></i> Tableau de Bord</a>
        <a href="medecin.php"><i class="fas fa-user-md"></i> Médecins</a>
        <a href="hoppat.php"><i class="fas fa-procedures"></i> Patients</a>
        <a href="rdv.php" class="active"><i class="fas fa-calendar-check"></i> Rendez-vous</a>
        <a href="notif.php"><i class="fas fa-bell"></i> Notifications <span class="notification-badge">3</span></a>
        <a href="paiement.php"><i class="fas fa-money-bill-wave"></i> Paiements</a>
        <a href="abonnement.php">
            <i class="fas fa-crown"></i>
            Abonnement
        </a>
        <a href="parametre.php"><i class="fas fa-cog"></i> Paramètres</a>

        <div class="user-profile">
            <img src="https://via.placeholder.com/40" alt="Admin">
            <div class="user-info">
                <h6>Dr. Admin</h6>
                <small>Administrateur</small>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="welcome-section">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2>Gestion des Rendez-vous</h2>
                    <p class="text-muted">Planifiez et gérez les rendez-vous</p>
                </div>
                <div class="text-end">
                    <p class="mb-0">RDV Aujourd'hui: <strong>15</strong></p>
                    <p class="mb-0">RDV En Attente: <strong>8</strong></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">15</div>
                    <div class="stats-label">RDV Aujourd'hui</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">8</div>
                    <div class="stats-label">En Attente</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">45</div>
                    <div class="stats-label">Cette Semaine</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">180</div>
                    <div class="stats-label">Ce Mois</div>
                </div>
            </div>
        </div>

        <div class="calendar-container">
            <div id="calendar"></div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="appointment-card">
                    <div class="appointment-time">
                        <i class="fas fa-clock"></i> 09:00 - 09:30
                    </div>
                    <div class="appointment-info">
                        <img src="https://via.placeholder.com/50" alt="Patient" class="appointment-avatar">
                        <div class="appointment-details">
                            <div class="appointment-name">Jean Dupont</div>
                            <div class="appointment-meta">
                                <i class="fas fa-user-md"></i> Dr. Martin
                                <i class="fas fa-stethoscope ms-3"></i> Consultation Générale
                            </div>
                        </div>
                        <span class="appointment-status status-confirmed">Confirmé</span>
                    </div>
                    <div class="appointment-actions">
                        <button class="action-btn btn-reschedule"><i class="fas fa-clock"></i> Reporter</button>
                        <button class="action-btn btn-cancel"><i class="fas fa-times"></i> Annuler</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="appointment-card">
                    <div class="appointment-time">
                        <i class="fas fa-clock"></i> 10:00 - 10:30
                    </div>
                    <div class="appointment-info">
                        <img src="https://via.placeholder.com/50" alt="Patient" class="appointment-avatar">
                        <div class="appointment-details">
                            <div class="appointment-name">Marie Martin</div>
                            <div class="appointment-meta">
                                <i class="fas fa-user-md"></i> Dr. Sophie
                                <i class="fas fa-stethoscope ms-3"></i> Suivi Grossesse
                            </div>
                        </div>
                        <span class="appointment-status status-pending">En Attente</span>
                    </div>
                    <div class="appointment-actions">
                        <button class="action-btn btn-confirm"><i class="fas fa-check"></i> Confirmer</button>
                        <button class="action-btn btn-cancel"><i class="fas fa-times"></i> Annuler</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="add-appointment-btn">
            <i class="fas fa-plus"></i>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script>
        // Initialisation du calendrier
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                locale: 'fr',
                events: [
                    {
                        title: 'RDV - Jean Dupont',
                        start: '2024-03-20T09:00:00',
                        end: '2024-03-20T09:30:00',
                        backgroundColor: '#2ecc71'
                    },
                    {
                        title: 'RDV - Marie Martin',
                        start: '2024-03-20T10:00:00',
                        end: '2024-03-20T10:30:00',
                        backgroundColor: '#f1c40f'
                    }
                ]
            });
            calendar.render();
        });

        // Animation des cartes au survol
        document.querySelectorAll('.appointment-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });

        // Animation du bouton d'ajout
        const addButton = document.querySelector('.add-appointment-btn');
        addButton.addEventListener('mouseenter', () => {
            addButton.style.transform = 'scale(1.1)';
        });
        addButton.addEventListener('mouseleave', () => {
            addButton.style.transform = 'scale(1)';
        });
    </script>
</body>

</html>
