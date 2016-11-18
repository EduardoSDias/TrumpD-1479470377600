<?php
 
// função para preencher email e envia-lo
function enviar($nome, $email, $item, $categoriaId, $categoriaNome){

    $enviaFormularioParaNome = $nome;
    $enviaFormularioParaEmail = $email;    


    // Configurações da mensagem
    $caixaPostalServidorNome = 'WebSite | Formulário';
    $caixaPostalServidorEmail = 'naorespondaachadoseperdidos@hotmail.com';
    $caixaPostalServidorSenha = 'achadoseperdidos1';

    // Montar mensagem para envio de email

    $assunto  = 'Novo item cadastrado no site';
    
    $mensagemConcatenada = 'Email enviado via site Achados & Perdidos'.'<br/>'; 
    $mensagemConcatenada .= '-------------------------------<br/><br/>'; 
    $mensagemConcatenada .= 'Olá '.$nome.',<br/><br/>'; 
    $mensagemConcatenada .= 'Foi cadastrado um item de nome <b>'.$item.'</b> e da categoria <b>'.$categoriaNome.'</b> em nosso site e achamos que pode ser de seu interesse.<br/><br/>';
    $mensagemConcatenada .= '<a href="'.site_url('/item/pesquisa_item?pesquisa='.$item.'&categoriaId='.$categoriaId).'">Acesse o item cadastrado no Achados & Perdidos</a>';
    $mensagemConcatenada .= '<br/><br/>A equipe Achados & Perdidos torce para que seja seu item perdido, obirgado!';

    
    //carregar classe PHPMAILER
    require_once("phpmailer/class.phpmailer.php");
    require_once("phpmailer/class.smtp.php");

    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->SMTPAuth  = true;
    $mail->Charset   = 'utf8_decode()';
    $mail->Host  = 'smtp.live.com.';
    $mail->Port  = '587';
    $mail->Username  = $caixaPostalServidorEmail;
    $mail->Password  = $caixaPostalServidorSenha;
    $mail->From  = $caixaPostalServidorEmail;
    $mail->FromName  = utf8_decode($caixaPostalServidorNome);
    $mail->IsHTML(true);
    $mail->Subject  = utf8_decode($assunto);
    $mail->Body  = utf8_decode($mensagemConcatenada);

    $mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));

    $mail->Send();
    
    /* CÓDIGO PARA DEBUG
          
    if(!$mail->Send()){
    $mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
            echo"<script>alert('Erro ao enviar email, por gentileza, tente novamente.') </script>";

    }else{
        $mensagemRetorno = 'Formulário enviado com sucesso!';
            echo"<script>alert('Recebemos sua mensagem, em breve retornaremos contato') </script>";
    }  
    */
}