<?php
// Autenticação e Página
Route::get('/', 'SiteController@index');
Route::get('/entrar-contato', 'SiteController@contato');
Route::post('/entrar-contato', 'SiteController@contatoStore');

Route::get('/projeto-e-instalacao', 'SiteController@noticia1');
Route::get('/higienizacao', 'SiteController@noticia2');


Route::get('/orcamento/login', 'SiteController@login');
Route::post('/orcamento/login/cadastrar', 'SiteController@cadastrarStore');
Route::post('/orcamento/login/autenticar', 'SiteController@autenticarStore');
Route::group(['middleware' => 'cliente'], function () {
    Route::get('/orcamento', 'SiteController@orcamento');
    Route::get('/orcamento/cotar/{produto}', 'SiteController@cotar');
    Route::get('/orcamento/remover/{produto}', 'SiteController@remover');
    Route::get('/orcamento/listagem', 'SiteController@orcamentoListagem');
    Route::get('/orcamento/save', 'SiteController@orcamentoSalvar');
});

Route::get('/logon', 'AutenticacaoController@index');
Route::post('/logon', 'AutenticacaoController@logon');
Route::get('/logout', 'AutenticacaoController@logout');
Route::get('/home', 'HomeController@index');

Route::get('/home/{tema}', function ($tema='normal'){
   \Session::put('sistema_tema', $tema);
   return redirect('/home')->with('message', 'Tema alterado com sucesso!');
});

Route::group(['middleware' => 'usuario'], function () {
    
    Route::resource('contrato', 'ContratoController');
    Route::resource('contato', 'ContatoController');
    Route::resource('produto', 'ProdutoController');
    Route::resource('departamento', 'DepartamentoController');
    Route::resource('servico', 'ServicoController');
    Route::resource('conta', 'ContaController');
    Route::resource('usuario', 'UsuarioController');
    Route::resource('movimentacao', 'MovimentacaoController');
    Route::resource('usuario','UsuarioController');
    Route::resource('chamado','ChamadoController');
    Route::resource('fornecedores','FornecedoresController');
    
});
    
    
Route::get('/icomoon', function () {
    return view('fonts');
});

Route::get('/{app}', function ($app) {
    return view("$app/list");
});

Route::get('/{app}/{router}', function ($app, $router="list") {
    return view("$app/$router");
});
