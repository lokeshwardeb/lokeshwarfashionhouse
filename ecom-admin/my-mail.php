<?php 
include "sent-mail.php";

sent_mail("Lokeshwar Fashion House", "lokeshwarfashionhouse@gmail.com", "David", "The mail is a checking mail from birat", "Hello this is the check from birat");

// sent_mail()->$mail;
if($mail->send()){
    echo "mail has been sent successfully";
}

?>