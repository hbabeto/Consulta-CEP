<?php
include("classe/Cep.php");

$pagina =file_get_contents("front-end/cep.html");
if(isset($_POST['botao'])){
    $cep =new Cep();
    $cep->setCep($_POST["cep"]);
    $dados=$cep->buscarCEP();
    $dados=json_decode($dados,true);
    if(!isset($dados["erro"])){

    $endereco="Cep:".$dados["cep"];

    $endereco=$endereco . "<br>"."Logradouro:" .  $dados["logradouro"];

    $endereco=$endereco . "<br>". "Complemento:".$dados["complemento"];

    $endereco=$endereco . "<br>". "Bairo:".$dados["bairro"];

    $endereco=$endereco . "<br>". "Cidade:".$dados["localidade"];

    $endereco=$endereco . "<br>". "Estado:".$dados["uf"];
    

}else{
    $endereco="NAO ENCONTRADO!!";
}

    $pagina=str_replace("#resutado",$endereco,$pagina);
}
else{
    $pagina=str_replace("#resutado,","",$pagina);
}
echo $pagina;

?>