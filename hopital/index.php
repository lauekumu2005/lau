<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";  // Utilisateur par défaut de WAMP
$password = "";      // Mot de passe par défaut de WAMP
$dbname = "dopaho1";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // Configuration des attributs PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Requête pour compter le nombre total de médecins
    $stmt = $conn->query("SELECT COUNT(*) as total FROM medecins");
    $result = $stmt->fetch();
    $totalMedecins = $result['total'];

    // Requête pour compter le nombre de médecins actifs
    $stmt = $conn->query("SELECT COUNT(*) as total_medecins FROM medecins WHERE statut = TRUE");
    $result = $stmt->fetch();
    $nombreMedecins = $result['total_medecins'];

    // Calcul du pourcentage de médecins actifs
    $pourcentageMedecins = ($totalMedecins > 0) ? round(($nombreMedecins / $totalMedecins) * 100) : 0;

    // Requête pour compter le nombre de patients hospitalisés
    $stmt = $conn->query("SELECT COUNT(*) as total_patients FROM sejours_hospitaliers WHERE date_sortie IS NULL OR date_sortie > CURRENT_DATE");
    $result = $stmt->fetch();
    $nombrePatients = $result['total_patients'];

    // Requête pour compter le nombre total de patients
    $stmt = $conn->query("SELECT COUNT(*) as total FROM patients");
    $result = $stmt->fetch();
    $totalPatients = $result['total'];

    // Calcul du pourcentage de patients hospitalisés
    $pourcentagePatients = ($totalPatients > 0) ? round(($nombrePatients / $totalPatients) * 100) : 0;

    // Requête pour compter le nombre de patients en état critique
    $stmt = $conn->query("SELECT COUNT(*) as total_urgences FROM sejours_hospitaliers 
                         WHERE (date_sortie IS NULL OR date_sortie > CURRENT_DATE) 
                         AND etat_critique = TRUE");
    $result = $stmt->fetch();
    $nombreUrgences = $result['total_urgences'];

    // Calcul du pourcentage d'urgences par rapport aux patients hospitalisés
    $pourcentageUrgences = ($nombrePatients > 0) ? round(($nombreUrgences / $nombrePatients) * 100) : 0;

    // Requête pour obtenir le nombre de lits de l'hôpital
    $stmt = $conn->query("SELECT nombre_lits FROM hopitaux WHERE id_hopitaux = 1");
    $result = $stmt->fetch();
    $nombreLits = $result['nombre_lits'];

    // Calcul du taux d'occupation
    $tauxOccupation = ($nombreLits > 0) ? round(($nombrePatients / $nombreLits) * 100) : 0;

    // Requête pour récupérer les 5 dernières notifications actives
    $stmt = $conn->query("SELECT id_notifications, titre, message, date_creation 
                         FROM notifications 
                         WHERE statut = 'active' 
                         ORDER BY date_creation DESC 
                         LIMIT 5");
    $notifications = $stmt->fetchAll();

    // Débogage des notifications
    echo "<!-- Nombre de notifications : " . count($notifications) . " -->";
    if (empty($notifications)) {
        echo "<!-- Aucune notification trouvée -->";
    } else {
        foreach ($notifications as $notif) {
            echo "<!-- Notification trouvée : " . print_r($notif, true) . " -->";
        }
    }

    // Fonction pour calculer le temps écoulé
    function getTimeAgo($datetime) {
        $time = strtotime($datetime);
        $now = time();
        $diff = $now - $time;
        
        if ($diff < 60) {
            return "À l'instant";
        } elseif ($diff < 3600) {
            $minutes = floor($diff / 60);
            return "Il y a " . $minutes . " minute" . ($minutes > 1 ? "s" : "");
        } elseif ($diff < 86400) {
            $hours = floor($diff / 3600);
            return "Il y a " . $hours . " heure" . ($hours > 1 ? "s" : "");
        } else {
            $days = floor($diff / 86400);
            return "Il y a " . $days . " jour" . ($days > 1 ? "s" : "");
        }
    }

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    die();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Administration Hospitalière</title>
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
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
        .sidebar-header {
            padding: 20px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
        }
        .sidebar-header h3 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }
        .sidebar a { 
            color: rgba(255,255,255,0.8); 
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
            background-color: rgba(255,255,255,0.1);
            color: white;
        }
        .main-content { 
            margin-left: 280px; 
            padding: 30px;
        }
        .welcome-section {
            background: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .stats-card { 
            background-color: white; 
            border-radius: 12px; 
            padding: 25px; 
            margin-bottom: 20px; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }
        .stats-card:hover {
            transform: translateY(-5px);
        }
        .stats-value { 
            font-size: 2.5rem; 
            font-weight: bold; 
            color: #003366; 
            margin-bottom: 10px;
        }
        .stats-label { 
            color: #666; 
            font-size: 1rem;
            display: flex;
            align-items: center;
        }
        .stats-label i {
            margin-right: 8px;
            color: #003366;
        }
        .info-section {
            background: white;
            border-radius: 12px;
            padding: 25px;
            margin-top: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .info-item {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        .info-item:last-child {
            border-bottom: none;
        }
        .info-time {
            color: #666;
            font-size: 0.9rem;
        }
        .info-item strong {
            color: #003366;
            font-size: 1.1rem;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .info-item p {
            color: #333;
            margin-top: 5px;
            font-size: 1rem;
            line-height: 1.4;
        }
        .info-section h3 {
            color: #003366;
            margin-bottom: 20px;
            font-size: 1.3rem;
        }
        .info-section h3 i {
            margin-right: 10px;
            color: #003366;
        }
        .progress {
            height: 8px;
            margin-top: 5px;
        }
        .chart-container {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Hôpital Central</h3>
        </div>
        <a href="index.php"><i class="fas fa-home"></i> Tableau de Bord</a>
        <a href="medecin.php"><i class="fas fa-user-md"></i> Médecins</a>
        <a href="hoppat.php"><i class="fas fa-procedures"></i> Patients</a>
        <a href="rdv.php"><i class="fas fa-calendar-check"></i> Rendez-vous</a>
        <a href="notif.php"><i class="fas fa-bell"></i> Notifications</a>
        <a href="parametre.php"><i class="fas fa-cog"></i> Paramètres</a>
    </div>
    <div class="main-content">
        <div class="welcome-section">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2>Tableau de Bord Administratif</h2>
                    <p class="text-muted">Vue d'ensemble de l'hôpital</p>
                </div>
                <div class="text-end">
                    <p class="mb-0">Date: <span id="current-date"></span></p>
                    <p class="mb-0">Heure: <span id="current-time"></span></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value"><?php echo $nombrePatients; ?></div>
                    <div class="stats-label">
                        <i class="fas fa-procedures"></i>
                        Patients hospitalisés
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-success" style="width: <?php echo $pourcentagePatients; ?>%"></div>
                    </div>
                    <small class="text-muted"><?php echo $pourcentagePatients; ?>% du total des patients</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value"><?php echo $nombreMedecins; ?></div>
                    <div class="stats-label">
                        <i class="fas fa-user-md"></i>
                        Médecins actifs
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-info" style="width: <?php echo $pourcentageMedecins; ?>%"></div>
                    </div>
                    <small class="text-muted"><?php echo $pourcentageMedecins; ?>% du total des médecins</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value"><?php echo $nombreUrgences; ?></div>
                    <div class="stats-label">
                        <i class="fas fa-ambulance"></i>
                        Urgences en cours
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" style="width: <?php echo $pourcentageUrgences; ?>%"></div>
                    </div>
                    <small class="text-muted"><?php echo $pourcentageUrgences; ?>% des patients hospitalisés</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value"><?php echo $tauxOccupation; ?>%</div>
                    <div class="stats-label">
                        <i class="fas fa-bed"></i>
                        Taux d'occupation
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-primary" style="width: <?php echo $tauxOccupation; ?>%"></div>
                    </div>
                    <small class="text-muted"><?php echo $nombrePatients; ?> patients sur <?php echo $nombreLits; ?> lits</small>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-8">
                <div class="info-section">
                    <h3><i class="fas fa-exclamation-circle"></i> Alertes et Notifications</h3>
                    <?php 
                    // Débogage supplémentaire
                    echo "<!-- Début de l'affichage des notifications -->";
                    if (empty($notifications)): 
                        echo "<!-- Aucune notification à afficher -->";
                    ?>
                        <div class="info-item">
                            <p class="text-muted mb-0">Aucune notification active</p>
                        </div>
                    <?php else: 
                        echo "<!-- Affichage de " . count($notifications) . " notifications -->";
                        foreach ($notifications as $notification): 
                            echo "<!-- Affichage notification : " . $notification['titre'] . " -->";
                    ?>
                            <div class="info-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <strong><?php echo htmlspecialchars($notification['titre']); ?></strong>
                                    <span class="info-time" data-date="<?php echo $notification['date_creation']; ?>">
                                        <?php echo getTimeAgo($notification['date_creation']); ?>
                                    </span>
                                </div>
                                <p class="mb-0"><?php echo htmlspecialchars($notification['message']); ?></p>
                            </div>
                    <?php 
                        endforeach;
                    endif; 
                    echo "<!-- Fin de l'affichage des notifications -->";
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-section">
                    <h3><i class="fas fa-chart-line"></i> Statistiques Rapides</h3>
                    <div class="info-item">
                        <div class="d-flex justify-content-between">
                            <strong>Consultations du jour</strong>
                            <span>45</span>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="d-flex justify-content-between">
                            <strong>Analyses en attente</strong>
                            <span>28</span>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="d-flex justify-content-between">
                            <strong>Rendez-vous demain</strong>
                            <span>67</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mise à jour de la date et l'heure
        function updateDateTime() {
            const now = new Date();
            document.getElementById('current-date').textContent = now.toLocaleDateString('fr-FR');
            document.getElementById('current-time').textContent = now.toLocaleTimeString('fr-FR');
        }
        updateDateTime();
        setInterval(updateDateTime, 1000);
    </script>
    <script>
    function getTimeAgoJS(dateString) {
        const now = new Date();
        const date = new Date(dateString.replace(' ', 'T'));
        const diff = Math.floor((now - date) / 1000);
        if (diff < 60) return "à l'instant";
        if (diff < 3600) return `il y a ${Math.floor(diff / 60)} min`;
        if (diff < 86400) return `il y a ${Math.floor(diff / 3600)} h`;
        return date.toLocaleDateString();
    }

    function updateTimes() {
        document.querySelectorAll('.info-time').forEach(function(el) {
            const date = el.getAttribute('data-date');
            el.textContent = getTimeAgoJS(date);
        });
    }

    updateTimes();
    setInterval(updateTimes, 60000); // Met à jour toutes les minutes
    </script>
</body>
</html> 