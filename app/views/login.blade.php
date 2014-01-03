@extends('master')

@section('title')
Login
@stop

@section('description')

@stop

@section('header')

@stop

@section('footer')
<script type="text/javascript">

$(document).ready(function() { 

	$("button#submitLogin").click(function() {
		var Cred ={};
			Cred.username = $("input#username").val();
			Cred.password = $("input#password").val();
		$.ajax({
		  type:"Post",
		  url: "{{URL::to('/')}}/login",
		  data: Cred,
		  beforeSend: function ( xhr ) {
		    $('div#loginForm').block({ 
		    	message: '<img src="{{URL::to('/packages/img')}}/preloader-w8-line-black.gif" />', 
                css: { border: '3px solid #000' } 
            });
		  }
		}).done(function ( data ) {
			$("div#loginMessage").html(data);
			$('div#loginForm').unblock();

			if (data === 'Login') {
		    	window.location = "home";
		    }
		     else {
		        alert('Login Query Failed');
		    }
		});	
	});

} );

</script>
@stop

@section('content')
<div class="container" id="loginForm">
	<div class="row">
		<div class="span4 offset4 well" >
			<legend><i class="icon-cogs"></i> MCPro Manager</legend>
			
			<div id="loginMessage"></div>

            
			<input type="text" id="username" class="span4" name="username" placeholder="Username">
			<input type="password" id="password" class="span4" name="password" placeholder="Password">
			<hr />
			<button id="submitLogin" class="btn btn-info btn-block"> <i class="icon-user"></i>Sign in</button>
			
		</div>
	</div>
</div>
@stop


