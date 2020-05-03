<?php
    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';
    

    $correo = $_POST["correo"];
    $nick = $_POST["nick"];
    $nomprod = $_POST["nomprod"];
    $precio=$_POST["precio"];
    

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'chadgmd123@gmail.com';                     // SMTP username


        //https://support.google.com/mail/answer/185833?hl=es-419 POR ACA INGRESAN PARA CREAR LA CLAVE DE LA APP
        $mail->Password   = 'ufpdnixkcbpiuvyr';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to
        
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
    
        //Recipients
        $mail->setFrom('chadgmd123@gmail.com', 'GMD Games');        
        
        $mail->addAddress($correo, $correo);     // Add a recipient
   
        
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'GMD Compra Exitosa';
        $mail->Body    =  'Gracias ' .($nick). ' Por la compra del producto ' .($nomprod). ' con un total pagado de ' .($precio). ' Pesos esperamos que el producto sea de su agrado y siga comprando con nosotros.';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();

        

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
    
?>