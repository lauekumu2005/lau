<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Réceptionniste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f9; }
        .navbar { background-color: #003366; color: white; padding: 15px; }
        .navbar-brand { font-weight: bold; }
        .stats-card { background-color: white; border-radius: 8px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .stats-value { font-size: 2rem; font-weight: bold; color: #003366; }
        .stats-label { color: #666; font-size: 0.9rem; }
        .appointment-card { background-color: white; border-radius: 8px; padding: 15px; margin-bottom: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .appointment-name { font-weight: 500; margin-bottom: 5px; }
        .appointment-meta { color: #666; font-size: 0.9rem; }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <span class="navbar-brand">Tableau de Bord - Réceptionniste</span>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">8</div>
                    <div class="stats-label">Rendez-vous aujourd'hui</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">25</div>
                    <div class="stats-label">Patients ce mois</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">2</div>
                    <div class="stats-label">Urgences en attente</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-value">4</div>
                    <div class="stats-label">Analyses en attente</div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <h3>Rendez-vous du Jour</h3>
                <div class="appointment-list">
                    <div class="appointment-card">
                        <div class="appointment-name">Jean Dupont</div>
                        <div class="appointment-meta">10:00 - Cardiologie</div>
                    </div>
                    <div class="appointment-card">
                        <div class="appointment-name">Marie Martin</div>
                        <div class="appointment-meta">11:30 - Pédiatrie</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 