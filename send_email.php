<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formulardaten erhalten
    $name = htmlspecialchars($_POST['name']);
    $class = htmlspecialchars($_POST['class']);
    $email = htmlspecialchars($_POST['email']);
    $schoolYear = htmlspecialchars($_POST['schoolYear']);
    
    // Inhalt der E-Mail
    $subject = "Einverständniserklärung - Leo-Statz-Berufskolleg";
    $message = "
    Einverständniserklärung des Schülers/der Schülerin:
    
    Name: $name
    Klasse: $class
    E-Mail: $email
    Schuljahr: $schoolYear
    
    Ich habe die Hausordnung und die EDV-Nutzungsverordnung des Leo-Statz-Berufskollegs gelesen und verstanden.
    ";
    
    // Header für die E-Mail (z.B. Absender, Reply-To)
    $headers = "From: no-reply@leo-statz-berufskolleg.de\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    // E-Mail an den angegebenen Empfänger senden
    $recipient = "ebanhesaten@leo-statz-berufskolleg.de";
    if (mail($recipient, $subject, $message, $headers)) {
        echo "Die Einverständniserklärung wurde erfolgreich gesendet.";
    } else {
        echo "Fehler beim Senden der E-Mail. Bitte versuchen Sie es später erneut.";
    }
}
?>
