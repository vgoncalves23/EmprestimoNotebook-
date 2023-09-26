<?php 

$email = $_GET['email2'];
$nome = $_GET['nome2'];
$dataini = date("d/m/Y", strtotime($_GET['start_at']));
$datafim = date("d/m/Y", strtotime($_GET['finish_at']));
$modelo = $_GET['modelo'];

?>


<!DOCTYPE html>
<html>
    
    <body>
      
        <?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        

require './vendor/autoload.php';

        $mail = new PHPMailer(true);
        $agora = date('d/m/Y H:i');

        try {
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host = '';
            $mail->SMTPAuth = true;
            $mail->Username = '';
            $mail->Password = '';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('', 'TI');
            $mail->addAddress($email, '');
            $mail->addAddress('', '');
       
			
            $mail->isHTML(true);                                 
            $mail->Subject = 'Emprestimo Notebook';
            $mail->Body = "Olá $nome, sua solicitação de empréstimo de um notebook $modelo foi realizado na data $dataini.<br> Data prevista de devolução: <b> $datafim </b> <br><br>** <b>IMPORTANTE:</b> esta é uma mensagem automática e não deve ser respondida. ";
           
            
            $mail->send();

            $mensagem = "e-mail enviado para $nome com sucesso!";


            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('$mensagem');
window.location.href='https://acoforja.com/notebook/index.php?view=home';
</SCRIPT>");

        } catch (Exception $e) {
            echo "Erro: E-mail não enviado com sucesso . Error PHPMailer: {$mail->ErrorInfo}";
            //echo "Erro: E-mail não enviado com sucesso.<br>";
        }
        ?>
    </body>
</html>
