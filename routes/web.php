<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

$this->get('/usuarios', 'UsersController@getUsers');
$this->get('/clientes', 'ClientesController@getClientes');
//$this->post('/cadastra-cliente', 'ClientesController@cadastraCliente');

$this->get('/clientes-api', 'APIController@getClientesAPI');
$this->get('/clientes-api/{id}', 'APIController@getClienteAPI');
$this->get('/deleta-cliente/{id}', 'APIController@removeClienteAPI');

$this->get('/cadastra-cliente', 'APIController@cadastraCliente');

$this->get('/edita-cliente', 'APIController@alterarCliente');