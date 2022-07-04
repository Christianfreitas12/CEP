<?php
 include_once ('api.php');
 $endereco = getAddress();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="style.css" />
        <title>CEP</title>
    </head>
    <body>  
        <p> <h3> Digite o seu CEP para encontrar o endereço </h3> </p>
       <form action="." method="post">
           <input type="text" placeholder="Digite o cep..." name="cep" value="<?php echo $endereco->cep ?>" >
           <input type="submit">
           <input type="text" placeholder="Rua" name="rua" value="<?php echo $endereco->logradouro ?>">
           <input type="text" placeholder="Bairro" name="bairro" value="<?php echo $endereco->bairro ?>">
           <input type="text" placeholder="Cidade" name="cidade" value="<?php echo $endereco->localidade ?>">
           <input type="text" placeholder="Estado" name="estado" value="<?php echo $endereco->uf ?>"> 
       </form>
    </body>
</html>


