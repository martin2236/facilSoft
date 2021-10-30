<?php
if(isset($_POST['enviar']) && $_POST['email'] !==''){

  if(!empty($_POST['name']) || !empty($_POST['subject']) || !empty($_POST['message']) || filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
   $name = strip_tags(htmlspecialchars($_POST['name']));
   $tel = strip_tags(htmlspecialchars($_POST['tel']));
  $email = strip_tags(htmlspecialchars($_POST['email']));
  $m_subject = strip_tags(htmlspecialchars($_POST['subject']));
  $message = strip_tags(htmlspecialchars($_POST['message']));

  $to = "asesoramiento@facilsoft.com.ar"; 
  $subject = "$m_subject:  $name";
  $body = "recibiste un nuevo email desde la pagina de Fácil Soft.\n\n"."detalles:\n\nNombre: $name\n\nTelefono: $tel\n\n\nEmail: $email\n\nAsunto: $m_subject\n\nMensaje: $message";
  
  echo'<script type="text/javascript">
        alert("mensaje enviado, gracias por contactarnos en breve nos estaremos comunicando");
        window.location.href="index.php";
        </script>';
        

  if(mail($to, $subject, $body)){ 
    $to = $email;
    $subject= "gracias por comunircarte con fácil soft";
    $body = "Hola ".$name.".\n\n". "Ud. Se ha comunicado con el sector de asesoramiento. Nos pondremos rn contacto con Ud. A la brevedad. Muchas gracias";
    mail($to,$subject,$body);
  }else{
    http_response_code(500);
  exit();
  }
 }
}
error_reporting(0);

?>
