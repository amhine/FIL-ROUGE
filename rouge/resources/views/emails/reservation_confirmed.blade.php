<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Confirmation de Réservation</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; }
        .header { background-color: #C02626; color: white; padding: 10px; text-align: center; }
        .content { background-color: white; padding: 20px; border-radius: 5px; }
        .footer { text-align: center; margin-top: 20px; font-size: 12px; color: #777; }
        .details { margin-top: 20px; }
        .details p { margin: 5px 0; }
        .success { color: #28a745; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Confirmation de Réservation</h1>
        </div>
        <div class="content">
            <p>Cher(e) client(e),</p>
            <p class="success">Votre réservation a été effectuée avec succès !</p>
            <p>Nous vous remercions pour votre confiance. Voici les détails de votre réservation :</p>

            <div class="details">
                <p><strong>Hébergement :</strong> {{ $reservation_hotel->hotel->nom_hotel }}</p>
                <p><strong>Date de début :</strong> {{ \Carbon\Carbon::parse($reservation_hotel->date_debut)->format('d/m/Y') }}</p>
                <p><strong>Date de fin :</strong> {{ \Carbon\Carbon::parse($reservation_hotel->date_fin)->format('d/m/Y') }}</p>
                <p><strong>Nombre de nuits :</strong> {{ $reservation_hotel->nombre_nuits }}</p>
                <p><strong>Prix total :</strong> {{ $reservation_hotel->prix_total }} DH</p>
            </div>

            <p>Vous recevrez bientôt une confirmation de l'hôte. Pour toute question, n'hésitez pas à nous contacter.</p>
            <p>Cordialement,<br>L'équipe de réservation</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} VotreEntreprise. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>