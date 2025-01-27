<?php
// Überprüfen, ob das Formular abgesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Die Formulardaten erhalten
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $klasse = isset($_POST['klasse']) ? $_POST['klasse'] : '';
    $schuljahr = isset($_POST['schuljahr']) ? $_POST['schuljahr'] : '';
    
    // Hausordnung und EDV-Nutzungsverordnung prüfen
    $hausordnung = isset($_POST['hausordnung']) ? 'Ja' : 'Nein';
    $edv_nutzungsverordnung = isset($_POST['edv_nutzungsverordnung']) ? 'Ja' : 'Nein';
    
    // E-Mail-Einstellungen
    $to = "eban@gmx.net";  // Empfänger der E-Mail
    $subject = "Anmeldung von der Klasse: $klasse";  // Betreff mit der Klasse
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";  // Absender-E-Mail-Adresse

    // Nachricht im HTML-Format
    $message = "<html><body>";
    $message .= "<h2>Anmeldeformular</h2>";
    $message .= "<p><strong>Name:</strong> $name</p>";
    $message .= "<p><strong>E-Mail:</strong> $email</p>";
    $message .= "<p><strong>Klasse:</strong> $klasse</p>";
    $message .= "<p><strong>Schuljahr:</strong> $schuljahr</p>";
    $message .= "<p><strong>Hausordnung gelesen:</strong> $hausordnung</p>";
    $message .= "<p><strong>EDV-Nutzungsverordnung gelesen:</strong> $edv_nutzungsverordnung</p>";
    $message .= "</body></html>";

    // E-Mail senden
    if (mail($to, $subject, $message, $headers)) {
        echo "Die E-Mail wurde erfolgreich gesendet!";
    } else {
        echo "Es gab ein Problem beim Senden der E-Mail.";
    }
} else {
    // Falls das Formular nicht mit POST übermittelt wurde
    echo "Fehler: Formular wurde nicht korrekt übermittelt.";
}
?>
