<?php
Route::get('/', function()
{
	if( Session::get('user_id') != NULL ) 
		return Redirect::to('home');
	else 
		return Redirect::to('in');
});

Route::get('in', function()
{
	Session::flush();

	$menus = [

          	 ];
	return View::make('login')
	->with('menus',$menus);
});

Route::post('login', function()
{
		$in = Input::all();
        
        $g = DB::table('tbl_user')
		        ->where('username','=',$in{'username'})
		        ->where('password','=',md5($in['password']))
		        ->first();
        
		if($g != NULL) {
		    Session::put('user_id',$g->id);
		    
		    return 'Login';
		} else {
    		$msg ='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Incorrect Username or Password!</div>';
    		return $msg;
    	}
});

Route::get('out', function()
{
	Session::flush();
	return Redirect::to('in');
});

Route::group(array('before' => 'authger'), function()
{
	Route::get('home', function()
	{
		$menus = [
	                    [
	                        'url' => 'home',
	                        'label' => 'Home',
	                        'icon' => 'icon-home',
	                        'active' => 'active'
	                    ],
	                    [
	                     'url' => 'send',
	                     'label' => 'Outgoing',
	                     'icon'=> 'icon-chevron-right',
	                     'active' => ''
	                    ],
	                    [
	                        'url' => 'out',
	                        'label' => 'Logout',
	                        'icon' => 'icon-signout',
	                        'active' => ''
	                    ]
	                ];
        		return View::make('home')->with('menus',$menus);
	});
	Route::controller('home', 'HomeController');
	Route::get('send',function()
	{
		
	});
	Route::controller('send', 'SendController');
});
/*
*RECEIVE
*/
Route::group(array('before' => 'authreceive'), function()
{
	Route::get('receivemcpro/{from}/{ts}/{msg}/{fromip}', 'ReceiveController@getMcpro');
});
/*
*GATEWAY
*/
Route::post('gateway','GatewayController@postOut');

/*
*FILTERS
*/
Route::filter('authger', function()
{
    if ( Session::get('user_id', 'default') === 'default' )
    {
        return Redirect::to('in');
    }
});

Route::filter('authreceive', function()
{
    if ( $_SERVER['REMOTE_ADDR'] != '127.0.0.1' )
    {
        App::abort(401, 'You are not authorized.');
    }
});