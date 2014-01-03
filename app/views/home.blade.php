@extends('master')

@section('title')
Home
@stop

@section('description')

@stop

@section('header')



@stop

@section('footer')


<script type="text/javascript">
$(document).ready(function() { 
	
function loadKeywords() {
	$.ajax({
		  type:"post",
		  url: "{{URL::to('/')}}/home/keywords",
		  beforeSend: function ( data ) {
		  	 $('div#keywordsTab').block({ 
		    	message: '<img src="{{URL::to('/packages/img')}}/preloader-w8-cycle-black.gif" />', 
                css: { border: '3px solid #000' } 
             });
		  }
		}).done(function ( data ) {
			$("div#keywordsContent").html(data);
			$('div#keywordsTab').unblock();
		});	
	}
loadKeywords();

function loadUnknowns() {
	$.ajax({
		  type:"Post",
		  url: "{{URL::to('/')}}/home/unknowns",
		  beforeSend: function ( data ) {
		  	 $('div#unknownsTab').block({ 
		    	message: '<img src="{{URL::to('/packages/img')}}/preloader-w8-cycle-black.gif" />', 
                css: { border: '3px solid #000' } 
             });
		  }
		}).done(function ( data ) {
			$("div#unknownsContent").html(data);
			$('div#unknownsTab').unblock();
		});	
	}
loadUnknowns();
} );
</script>

<script type="text/javascript">
$(document).ready(function() { 
	
function loadKeywords() {
	$.ajax({
		  type:"post",
		  url: "{{URL::to('/')}}/home/keywords",
		  beforeSend: function ( data ) {
		  	 $('div#keywordsTab').block({ 
		    	message: '<img src="{{URL::to('/packages/img')}}/preloader-w8-cycle-black.gif" />', 
                css: { border: '3px solid #000' } 
             });
		  }
		}).done(function ( data ) {
			$("div#keywordsContent").html(data);
			$('div#keywordsTab').unblock();

		});	
	}
loadKeywords();

function loadUnknowns() {
	$.ajax({
		  type:"Post",
		  url: "{{URL::to('/')}}/home/unknowns",
		  beforeSend: function ( data ) {
		  	 $('div#unknownsTab').block({ 
		    	message: '<img src="{{URL::to('/packages/img')}}/preloader-w8-cycle-black.gif" />', 
                css: { border: '3px solid #000' } 
             });
		  }
		}).done(function ( data ) {
			$("div#unknownsContent").html(data);
			$('div#unknownsTab').unblock();
		});	
	}
loadUnknowns();

	$( "button#submitAddKeyword" ).click(function(){
		loadKeywords();
	var Obj = {};
		Obj.keyword=$('input#aKeyword').val().toUpperCase();
		Obj.name=$('input#aName').val().toUpperCase();
		Obj.url=$('input#aURL').val();
		Obj.active=$('input#aActive').is(":checked") ? 1 : 0;
		
		$.ajax({
			type:"Post",
			url: "{{URL::to('/')}}/home/keywordsadd",
			data: Obj,
			beforeSend: function ( data ) {
				$('div#addKeywordModal').block({ 
				message: '<img src="{{URL::to('/packages/img')}}/preloader-w8-cycle-black.gif" />', 
				css: { border: '3px solid #000' } 
				 });
			}
			}).done(function ( data ) {
			$("div#messageAddKeyword").html(data);
			$('div#addKeywordModal').unblock();
			loadKeywords();
		});
	});
			
}  );
</script>

@stop

@section('content')
 
<link rel="stylesheet" href="{{URL::to('/packages/datatables')}}/media/css/jquery.dataTables.css">

 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script> -->
 <script src="http://cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>


<div class="span12 center">

	<div class="tabbable">
	  <ul class="nav nav-pills">
	    
	    <li class="active"><a href="#pane1" data-toggle="tab"><i class="icon-list-alt"></i>Keywords</a></li>

	    <li><a href="#pane2" data-toggle="tab"><i class="icon-bug"></i>Unknowns</a></li>
	  
	  </ul>
	  <div class="tab-content">
	    <div id="pane1" class="tab-pane active">

	    	<a href="#addKeywordModal" role="button" class="btn btn-success pull-right" data-toggle="modal"><i class="icon-thumbs-up"></i>Add New Keyword</a>

	    	<!-- Add Keyword Modal -->
		<div id="addKeywordModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="myModalLabel">Add New Keyword</h3>
		  </div>
		  <div class="modal-body">
		  	<div id="messageAddKeyword"></div>
		     <div class="span6">
		     	<label for="aKeyword">Keyword</label><input id="aKeyword" type="text" placeholder="Keyword"/>
		     	<label for="aName">Name</label><input id="aName" type="text" placeholder="Name"/>
		     
		     	<label for="aURL">URL</label><input id="aURL" type="text" class="input-xlarge" placeholder="URL"/>
		     	<label for="aActive" class="checkbox">
			      <input id="aActive"type="checkbox"  /> Active
			</label>
		     </div>
		  </div>
		  <div class="modal-footer">
		    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		    <button id="submitAddKeyword" class="btn btn-primary">Save changes</button>
		  </div>
		</div>

	     <h3>Keywords</h3>

	      <hr />
	      	
	      	<div id="keywordsTab" class="tabger">
	      		<div id="keywordsContent"></div>
	      	</div>
	    </div>
	    <div id="pane2" class="tab-pane">
	    <h3>Unknowns</h3>
	      <hr />
	      	
	      	<div id ="unknownsTab" class="tabger">
	      		<div id="unknownsContent"></div>
	      	</div>
	    </div>

	  </div>
	</div>
</div>

@stop