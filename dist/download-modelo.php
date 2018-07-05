<?php

    //$nome = $_POST['escolhaTemaNome'];
    $nome_pre = utf8_decode($_POST["nome_pre"]);
    $email_pre = utf8_decode($_POST['email_pre']);
    $cidade_pre = utf8_decode($_POST['cidade_pre']);  
    $tel_pre = utf8_decode($_POST['tel_pre']);
    $datNasc_pre = utf8_decode($_POST['datNasc_pre']);
    $titulo_pre = utf8_decode($_POST['titulo_pre']);
    $ip = utf8_decode($_SERVER['REMOTE_ADDR']);
    $navegador = utf8_decode($_SERVER['HTTP_USER_AGENT']);



    $headers = "MIME-Version: 1.0\r\n";
    //$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    //$headers = "MIME-Version: 1.1\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    //$headers .= "Content-Type: text/html;\r\n charset=\"UTF-8\"\r\n";
    //$headers = "Content-Type: text/html; charset=UTF-8";
    $headers .= "From: $nome_pre <$email_pre>\n"; // remetente
    $headers .= "Return-Path: $nome_pre <$email_pre>\n"; // return-path
    $destinatario = 'producao.saopaulo@happyartparade.com.br';
    //$destinatario = 'lpaa83@gmail.com';
    $subject = utf8_decode('Pré Cadastro | Happy Art Parade');

    $mensagem = '    
    <div style="width: 500px; margin: 10px auto;">
    <table width="500px" cellspacing="0" cellpadding="0" border="0">
        <thead>
            <tr>
                <th colspan="2"><img src="http://leoaraujo.com/yodesign/happy_parade/images/logo_client_2.png" alt="header"></th>
            </tr>   
            <tr>
                <th colspan="2" style="font-size: 22px; color: #007cc3; font-family: arial; padding-bottom: 20px; text-align: center;">Happy Art Parade - S&Atilde;O PAULO</th>
            </tr>
        </thead>
        <tbody style="font-family: arial; color: #1b2341; font-size: 15px;">
            <tr bgcolor="#19cbff">
                <td colspan="2" style="padding: 10px 5px; font-size: 20px; font-weight: bolder; text-align: center; color: #fff568;">Pr&eacute; Cadastro</td>
            </tr>
            <tr bgcolor="#fffbc6">
                <td style="padding: 10px 5px; font-weight: bolder; width: 150px">Nome Completo:</td>
                <td style="padding: 10px 5px; font-weight: normal; width: 350px; text-align: left;">'.$nome_pre.'</td>
            </tr>
            <tr bgcolor="#b3ecfd">
                <td style="padding: 10px 5px; font-weight: bolder; width: 150px">E-mail:</td>
                <td style="padding: 10px 5px; font-weight: normal; width: 350px; text-align: left;">'.$email_pre.'</td>
            </tr>
            <tr bgcolor="#fffbc6">
                <td style="padding: 10px 5px; font-weight: bolder; width: 150px">Data de Nascimento:</td>
                <td style="padding: 10px 5px; font-weight: normal; width: 350px; text-align: left;">'.$datNasc_pre.'</td>
            </tr>
            <tr bgcolor="#b3ecfd">
                <td style="padding: 10px 5px; font-weight: bolder; width: 150px">Cidade:</td>
                <td style="padding: 10px 5px; font-weight: normal; width: 350px; text-align: left;">'.$cidade_pre.'</td>                
            </tr>
            <tr bgcolor="#fffbc6">
                <td style="padding: 10px 5px; font-weight: bolder; width: 150px">Telefone:</td>
                <td style="padding: 10px 5px; font-weight: normal; width: 350px; text-align: left;">'.$tel_pre.'</td>
            </tr>            
            <tr bgcolor="#ed1b2e">
                <td colspan="2" style="padding: 1px; font-size: 10px; font-weight: bolder; text-align: left">&nbsp;</td>    
            </tr>
        </tbody>
        <tfoot style="font-family: arial; color: #c0c1c1; font-size: 11px; font-weight: lighter;">
            <tr>
                <td colspan="2" align="center" style="padding: 20px;"><img src="http://leoaraujo.com/yodesign/happy_parade/images/footer_all.jpg" width="500px" height="auto" alt="footer"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; padding-bottom: 30px;">
                    Desenvolvido por: <a href="http://yodesign.com.br/" target="_blank" style="color:#c0c1c1; ">YO Design</a>
                </td>
            </tr>
        </tfoot>    
    </table>
    </div> 
    ';
    $mensagemconfirmacao = '
        
     <div style="width: 500px; margin: 10px auto;">
    <table width="500px" cellspacing="0" cellpadding="0" border="0">
        <thead>
            <tr>
                <th colspan="2"><img src="http://leoaraujo.com/yodesign/happy_parade/images/logo_client_2.png" alt="header"></th>
            </tr>   
            <tr>
              <th colspan="2" style="font-size: 32px;text-align: center;">'.$nome_pre.'</th>
            </tr>
            <tr>
                <th colspan="2" style="font-size: 22px; color: #007cc3; font-family: arial; padding-bottom: 20px; text-align: center;">Bem vindo ao Happy Art Parade</th>
            </tr>
        </thead>
       
        <tfoot style="font-family: arial; color: #c0c1c1; font-size: 11px; font-weight: lighter;">
            <tr>
                <td colspan="2" align="center" style="padding: 20px;"><img src="http://leoaraujo.com/yodesign/happy_parade/images/footer_all.jpg" width="500px" height="auto" alt="footer"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; padding-bottom: 30px;">
                    Desenvolvido por: <a href="http://yodesign.com.br/" target="_blank" style="color:#c0c1c1; ">YO Design</a>
                </td>
            </tr>
        </tfoot>    
    </table>
    </div>
    ';

    if(mail($destinatario,$subject,$mensagem,$headers)){
    ?>
    <script language="JavaScript">
        $('#formulario').remove();
    </script>
    <?
        echo '<div class="alert alert-success fade in text-sm-center"><h4>Mensagem enviada com sucesso!</h4></div>';
    } else {
        echo '<div class="alert alert-danger fade in text-sm-center"><h4>Erro ao enviar a mensagem</h4></div>';
    }
    if(mail($email_pre,$subject,$mensagemconfirmacao,$headers)){
        echo '<div class="alert alert-success fade in text-sm-center"><h4>Funcionou</h4></div>';
    } else {
        echo '<div class="alert alert-success fade in text-sm-center"><h4>Nao pegou</h4></div>';
    }
?>