<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Űrlap mezők értékeinek lekérése
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $comments = htmlspecialchars($_POST['comments']);

    // Címzett e-mail (ide kerül a válasz)
    $to = "baloghrobert1995@gmail.com";
    // E-mail tárgya
    $subject = "Új üzenet az űrlapról";
    
    // E-mail üzenet
    $body = "Új üzenet érkezett az űrlapról:\n\n";
    $body .= "Név: $name\n";
    $body .= "Telefonszám: $phone\n";
    $body .= "E-mail cím: $email\n\n";
    $body .= "Üzenet:\n$message\n\n";
    $body .= "Megjegyzés:\n$comments\n";

    // Fejléc beállítása
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // E-mail küldése
    if (mail($to, $subject, $body, $headers)) {
        echo "<p>Az üzenet sikeresen elküldve!</p>";
    } else {
        echo "<p>Hiba történt az üzenet küldése közben!</p>";
    }
} else {
    echo "<p>Hiba! Kérlek próbáld meg újra.</p>";
}
?>
