<?php

$nome_conf = utf8_decode($_POST["nome_conf"]);
$start = utf8_decode($_POST["start"]);//data nascimento 
$natural = utf8_decode($_POST["natural"]); //naturalidade
$email = 'producao.saopaulo@happyartparade.com.br';
//$email = 'lpaa83@gmail.com';
$rg = utf8_decode($_POST["rg"]); 
$cpf = utf8_decode($_POST["cpf"]); 
$email_conf = utf8_decode($_POST["email_conf"]); 
$tel_conf = utf8_decode($_POST["tel_conf"]);
$endereco = utf8_decode($_POST["endereco"]);
$bairro = utf8_decode($_POST["bairro"]);
$complemento = utf8_decode($_POST["complemento"]); 
$cidade = utf8_decode($_POST["cidade"]);
$uf = utf8_decode($_POST["uf"]);//estado
$cep = utf8_decode($_POST["cep"]); 
$titulo_conf = utf8_decode($_POST["titulo_conf"]);
$assunto = 'Ficha de Inscrição | Happy Art Parade - SÃO PAULO';

//formato o campo da mensagem
$mensagem ='
<div style="width: 500px; margin: 10px auto;">
  <table width="500px" cellspacing="0" cellpadding="0" border="0">
    <thead>
        <tr>
            <th colspan="2"><img src="http://leoaraujo.com/yodesign/happy_parade/images/logo_client_2.png" alt="header"></th>
        </tr>   
        <tr>
            <th colspan="2" style="font-size: 22px; color: #007cc3; font-family: arial; padding-bottom: 20px; text-align: center;">Ficha de Inscrição - Happy Art Parade </th>
        </tr>
    </thead>
    <tbody style="font-family: arial; color: #1b2341; font-size: 15px;">
      <tr bgcolor="#19cbff">
          <td colspan="2" style="padding: 10px 5px; font-size: 20px; font-weight: bolder; text-align: center; color: #fff568;">Dados Pessoais:</td>
      </tr>
      <tr bgcolor="#fffbc6">
        <td style="padding: 10px 5px; font-weight: bolder; width: 150px">Nome Completo:</td>
        <td style="padding: 10px 5px; font-weight: normal; width: 350px; text-align: left;">'.$nome_conf.'</td>
      </tr>
      <tr bgcolor="#b3ecfd">
        <td style="padding: 10px 5px; font-weight: bolder; width: 150px">E-mail:</td>
        <td style="padding: 10px 5px; font-weight: normal; width: 350px; text-align: left;">'.$email_conf.'</td>
      </tr>
      <tr bgcolor="#fffbc6">
        <td style="padding: 10px 5px; font-weight: bolder; width: 150px">Telefone:</td>
        <td style="padding: 10px 5px; font-weight: normal; width: 350px; text-align: left;">'.$tel_conf.'</td>
      </tr>
      <tr bgcolor="#b3ecfd">
        <td style="padding: 10px 5px; font-weight: bolder; width: 150px">Titulo do Projeto:</td>
        <td style="padding: 10px 5px; font-weight: normal; width: 350px; text-align: left;">'.$titulo_conf.'</td>
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

$mensagemconfirmacao2 ='
        <html>
    <title>Ficha de Inscrição - Happy Art Parade/title>
    <body>
    <div style="width: 500px; margin: 10px auto;">
    <table width="500px" cellspacing="0" cellpadding="0" border="0">
        <thead>
            <tr>
                <th colspan="2"><img src="http://leoaraujo.com/yodesign/happy_parade/images/logo_client_2.png" alt="header"></th>
            </tr>   
            <tr>
          <th colspan="2" style="font-size: 43px; color: #1b2341; font-family: arial; padding-bottom: 20px; text-align: center">
          <span style="font-size: 33px;">Parabéns!</span> <br>
          <span style="color:#f37123">'.$nome_conf.'</span><br>
          <span style="font-size: 17px;">Seu projeto foi enviado com suceso!</span><br>
          </th>
        </tr>
        </thead>
       <tbody style="font-family: arial; color: #1b2341; font-size: 15px;">
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
    </body>                        
    </html>
    '; 

$arquivo = isset($_FILES["arquivo"]) ? $_FILES["arquivo"] : FALSE;
if(file_exists($arquivo["tmp_name"]) and !empty($arquivo)){

$fp = fopen($_FILES["arquivo"]["tmp_name"],"rb");
$anexo = fread($fp,filesize($_FILES["arquivo"]["tmp_name"]));
$anexo = base64_encode($anexo);
fclose($fp);

$anexo = chunk_split($anexo);
$boundary = "XYZ-" . date("dmYis") . "-ZYX";
$mens = "--$boundary\n";
$mens .= "Content-Transfer-Encoding: 8bits\n";
$mens .= "Content-Type: text/html; charset=\"ISO-8859-1\"\n\n"; //plain
$mens .= "$mensagem\n";
$mens .= "--$boundary\n";
$mens .= "Content-Type: ".$arquivo["type"]."\n";
$mens .= "Content-Disposition: attachment; filename=\"".$arquivo["name"]."\"\n";
$mens .= "Content-Transfer-Encoding: base64\n\n";
$mens .= "$anexo\n";
$mens .= "--$boundary--\r\n";
$headers = "MIME-Version: 1.0\n";
$headers .= "From: \"$nome\" <$email>\r\n";
$headers .= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";
$headers .= "$boundary\n";
//envio o email com o anexo
mail($email,$assunto,$mens,$headers);
header('Location: sucesso.html'); 
}
//se não tiver anexo
else{
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: \"$nome\" <$email>\r\n";
//envia o email sem anexo
mail($email,$assunto,$mensagem, $headers);
header('Location: sucesso.html'); 
}
?>