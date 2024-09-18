<?php
class Cep{

    private $host;
    private $cep;
    private $tipoRetorno;
    
    public function __construct($host ='https://viacep.com.br/ws/', $tipoRet = "json")
    {
        $this->host = $host;  
        $this->tipoRetorno = $tipoRet; 
    }

    public function setCep($cep){
        $this->cep = $cep;
    }

    public function buscarCep(){
        $url = $this->host . $this->cep . '/' . $this->tipoRetorno;
        $dns = curl_init();
        curl_setopt($dns, CURLOPT_URL, $url);
        curl_setopt($dns, CURLOPT_RETURNTRANSFER, TRUE);
        $dados = curl_exec($dns);
        curl_close($dns);
        return $dados;
    }
}
?>
