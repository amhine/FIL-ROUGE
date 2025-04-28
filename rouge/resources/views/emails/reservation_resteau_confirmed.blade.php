<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Confirmation de Réservation</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #C02626; color: white; padding: 10px; text-align: center; }
        .content { padding: 20px; background: #f9f9f9; }
        .footer { text-align: center; padding: 10px; font-size: 12px; color: #777; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Confirmation de Réservation</h1>
        </div>
        <div class="content">
            <p>Cher(e) {{ $reservation->tourist->name }},</p>
            <p>Votre réservation pour le restaurant <strong>{{ $reservation->restaurant->nom_resteau }}</strong> a été confirmée avec succès.</p>
            <p><strong>Détails de la réservation :</strong></p>
            <ul>
                <li><strong>Restaurant :</strong> {{ $reservation->restaurant->nom_resteau }}</li>
                <li><strong>Date et heure de début :</strong> {{ \Carbon\Carbon::parse($reservation->date_debut)->format('d/m/Y H:i') }}</li>
                <li><strong>Date et heure de fin :</strong> {{ \Carbon\Carbon::parse($reservation->date_fin)->format('d/m/Y H:i') }}</li>
                <li><strong>Prix :</strong> {{ $reservation->restaurant->prix }} DH</li>
            </ul>
            <p>Merci de votre confiance !</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} StayMorocco. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>