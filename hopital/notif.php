<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications - DOPAHO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
            <a href="rdv.php">
                <i class="fas fa-calendar-check"></i>
                Rendez-vous
            </a>
            <a href="notif.php" class="active">
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
            <h2>Notifications</h2>
            <p>Gérez vos notifications et alertes</p>
            <div class="quick-actions">
                <button class="btn btn-primary" onclick="markAllAsRead()">
                    <i class="fas fa-check-double"></i>
                    Tout marquer comme lu
                </button>
                <button class="btn btn-outline-primary" onclick="refreshNotifications()">
                    <i class="fas fa-sync-alt"></i>
                    Actualiser
                </button>
                <button class="btn btn-outline-danger" onclick="clearAllNotifications()">
                    <i class="fas fa-trash"></i>
                    Tout effacer
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="stats-value">12</div>
                        <div class="stats-label">
                            <i class="fas fa-bell text-primary"></i>
                            Non lues
                        </div>
                        <div class="progress-info">
                            <small>+2 aujourd'hui</small>
                            <div class="progress">
                                <div class="progress-bar bg-primary" style="width: 60%"></div>
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
                            <i class="fas fa-calendar-check text-success"></i>
                            Rendez-vous aujourd'hui
                        </div>
                        <div class="progress-info">
                            <small>+3 cette semaine</small>
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="stats-value">3</div>
                        <div class="stats-label">
                            <i class="fas fa-exclamation-triangle text-warning"></i>
                            Alertes
                        </div>
                        <div class="progress-info">
                            <small>-1 aujourd'hui</small>
                            <div class="progress">
                                <div class="progress-bar bg-warning" style="width: 30%"></div>
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
                            <i class="fas fa-chart-line text-info"></i>
                            Taux de satisfaction
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

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title mb-0">Toutes les notifications</h5>
                    <div class="d-flex gap-2">
                        <select class="form-select" id="notificationFilter">
                            <option value="all">Tous les types</option>
                            <option value="appointment">Rendez-vous</option>
                            <option value="alert">Alertes</option>
                            <option value="system">Système</option>
                        </select>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Rechercher...">
                            <button class="btn btn-outline-secondary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="notification-list" id="notificationsList">
                    <!-- Les notifications seront chargées dynamiquement ici -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fonction pour marquer toutes les notifications comme lues
        function markAllAsRead() {
            const notifications = document.querySelectorAll('.notification-item.unread');
            notifications.forEach(notification => {
                notification.classList.remove('unread');
            });
            alert('Toutes les notifications ont été marquées comme lues');
        }

        // Fonction pour rafraîchir les notifications
        function refreshNotifications() {
            loadNotifications();
            alert('Notifications actualisées');
        }

        // Fonction pour effacer toutes les notifications
        function clearAllNotifications() {
            if (confirm('Êtes-vous sûr de vouloir effacer toutes les notifications ?')) {
                document.getElementById('notificationsList').innerHTML = '';
                alert('Toutes les notifications ont été effacées');
            }
        }

        // Fonction pour charger les notifications
        function loadNotifications() {
            const notifications = [
                {
                    type: 'appointment',
                    icon: 'calendar-check',
                    title: 'Nouveau rendez-vous',
                    message: 'Consultation avec Dr. Martin programmée pour demain à 10h',
                    time: 'Il y a 5 minutes',
                    unread: true
                },
                {
                    type: 'alert',
                    icon: 'exclamation-triangle',
                    title: 'Stock faible',
                    message: 'Le stock de médicaments X est faible',
                    time: 'Il y a 1 heure',
                    unread: true
                },
                {
                    type: 'system',
                    icon: 'cog',
                    title: 'Mise à jour système',
                    message: 'Une nouvelle mise à jour est disponible',
                    time: 'Il y a 2 heures',
                    unread: false
                }
            ];

            const container = document.getElementById('notificationsList');
            container.innerHTML = notifications.map(notif => `
                <div class="notification-item ${notif.unread ? 'unread' : ''}">
                    <div class="notification-icon">
                        <i class="fas fa-${notif.icon}"></i>
                    </div>
                    <div class="notification-content">
                        <h6>${notif.title}</h6>
                        <p>${notif.message}</p>
                        <small class="notification-time">${notif.time}</small>
                    </div>
                    <div class="notification-actions">
                        ${notif.unread ? `
                            <button class="btn btn-sm btn-outline-primary" onclick="markAsRead(this)">
                                <i class="fas fa-check"></i>
                            </button>
                        ` : ''}
                        <button class="btn btn-sm btn-outline-danger" onclick="deleteNotification(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            `).join('');
        }

        // Fonction pour marquer une notification comme lue
        function markAsRead(button) {
            const notification = button.closest('.notification-item');
            notification.classList.remove('unread');
            button.remove();
        }

        // Fonction pour supprimer une notification
        function deleteNotification(button) {
            const notification = button.closest('.notification-item');
            notification.remove();
        }

        // Charger les notifications au chargement de la page
        loadNotifications();
    </script>
</body>

</html>
