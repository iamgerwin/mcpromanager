@extends('master')

@section('title')
Send
@stop

@section('description')

@stop

@section('header')



@stop

@section('footer')


<script type="text/javascript">
$(document).ready(function() { 
function loadSendTable() {
	$.ajax({
		type: 'Post',
		url:"{{URL::to('send')}}",
			beforeSend: function(){
				$('div#outgoing').block({ 
		    		message: '<img src="{{URL::to('/packages/img')}}/preloader-w8-line-black.gif" />', 
			                	css: { border: '3px solid #000' } 
			            	});	
			}
		}).done(function(result) {
			$('div#outgoing').html(result);
		});
}

loadSendTable();

	$('button#submitAdd').click(function() {
		var Obj = {}
			Obj.Keyword = $('input#newKeyword').val();
			Obj.Name = $('input#newName').val();
			Obj.IP = $('input#newIP').val();

		$.ajax({
			type:'Post',
			url:"{{URL::to('/send/add')}}",
			data: Obj,
			beforeSend: function(){
				$('div#outgoing').block({ 
		    		message: '<img src="{{URL::to('/packages/img')}}/preloader-w8-line-black.gif" />', 
			                	css: { border: '3px solid #000' } 
			            	});	
				}
			}).done(function(result) {
				$('div#modalMessage').html(result);
				loadSendTable();
			});
	});

	$('button#genran').click(function () {
		$('input#newKeyword').val(makeid());
	});
} );


</script>

@stop

@section('content')
 
<link rel="stylesheet" href="{{URL::to('/packages/datatables')}}/media/css/jquery.dataTables.css">

 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script> -->
 <script src="http://cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>


<div class="span12 center">

<a href="#addSend" role="button" class="btn btn-success" data-toggle="modal"><i class="icon-plus"></i> Add New Send</a>

<hr />

<div id="outgoing">
</div>

</div>

<div id="addSend" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Add New Sender</h3>
    <div id="modalMessage"></div>
  </div>
  <div class="modal-body">
   	<div class="span6">
   		<label for="newKeyword">Keyword</label>
   		<input id="newKeyword" type="text" placeholder="Keyword..."  />
   		<button class= "btn btn-inverse" id="genran"><i class=" icon-random"></i></button>

   		<label for="newName">Name</label>
   		<input id="newName" type="text" placeholder="Name..." />

   		<label for="newIP">Server's IP</label>
   		<input id="newIP" type="text" placeholder="Default: 127.0.0.1" />
   	</div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button id="submitAdd" class="btn btn-primary"><i class="icon-plus"> </i>Add new</button>
  </div>
</div>


@stop