<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use GuzzleHttp\Client;

class APIController extends Controller
{
    protected $client;

    public function __construct(){
        $this->client = new Client();
    }

    public function getClientesAPI(){
        $result = $this->client->get('http://localhost:4000/clientes');
        $resultado = json_decode($result->getBody()->getContents());
        foreach($result as $result){
            echo "<p>". $result->nome ." - <b> ". $result->cnpj ."</b></p><br>";
        }
    }

    public function getClienteAPI($id)
    {
        $result = $this->client->get('http://localhost:4000/clientes/'.$id);
        $resultado = json_decode($result->getBody()->getContents());
        
        echo "<p>". $resultado->nome ." - <b> ". $resultado->cnpj ."</b></p><br>";        
    }

    public function removeClienteAPI($id)
    {
        $result = $this->client->delete('http://localhost:4000/clientes/'.$id);
        //$resultado = json_decode($result->getBody()->getContents());
        
        echo $result->getBody();       
    }

    public function alterarCliente(){
        $result = $this->client->put('http://localhost:4000/clientes', [
            'form_params' => [
                'nome' => 'teste',
                'cnpj' => 1111111,
                'id'   => 174
            ]
        ]);
        echo $result->getBody(); 
        //$resultado = json_decode($result->getBody()->getContents());
        //dd($resultado);
    }

    public function cadastraCliente(){
        $result = $this->client->post('http://localhost:4000/clientes', [
            'form_params' => [
                'nome' => 'Petrus',
                'cnpj' => 21484001
            ]
        ]);
        echo $result->getBody(); 
        //$resultado = json_decode($result->getBody()->getContents());
        //dd($resultado);
    }
}
