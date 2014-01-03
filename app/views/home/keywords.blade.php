


<div id="messageKeywords"></div>
<table id="keywordsTable" class="table table-hover table-bordered table-condensed">
	<thead>
		<tr>
			<th>Keyword</th>
			<th>Name</th>
			<th>URL</th>
			<th>Active</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $i=0; ?>
		@foreach($datas as $d)

		<tr>
			<td><input type="hidden" id="id{{$i}}" readonly value="{{$d->id}}"/><input id='keyword{{$i}}' type='text' value='{{$d->keyword}}' class="input-mini" />
				
			</td>
			<td><input id='name{{$i}}' type='text' value='{{$d->name}}' class="input-medium" /></td>
			<td><input id='url{{$i}}' type='text' value='{{$d->url}}' class="input-xlarge" /></td>
			<td>
			<input id='active{{$i}}' type="checkbox" @if($d->active == 1)  checked @endif />
			</td>
			<td>
				<button id='editKeyword{{$i}}' class='btn btn-warning'><i class='icon-pencil'></i></button>
			</td>
		</tr>

		<script type="text/javascript">
		$(document).ready(function()  {
			
			$( "#editKeyword{{$i}}" ).click(function() {
				var Obj = {};
					Obj.id= $('input#id{{$i}}').val();
					Obj.keyword=$('input#keyword{{$i}}').val().toUpperCase();
					Obj.name=$('input#name{{$i}}').val().toUpperCase();
					Obj.url=$('input#url{{$i}}').val();
					Obj.active=$('input#active{{$i}}').is(":checked") ? 1 : 0;
					
				$.ajax({
					  type:"Post",
					  url: "{{URL::to('/')}}/home/keywordsedit",
					  data: Obj,
					  beforeSend: function ( data ) {
					  	 $('div#messageKeywords').block({ 
					    	message: '<img src="{{URL::to('/packages/img')}}/preloader-w8-cycle-black.gif" />', 
					                css: { border: '3px solid #000' } 
					             });
					  }
					}).done(function ( data ) {
						$("div#messageKeywords").html(data);
						$('div#keywordsTab').unblock();
				});
			});
			
		}  );
		</script>

		<?php $i++; ?>
		@endforeach
	</tbody>
</table>



<script type="text/javascript">
	$(document).ready(function()  {
	    $('table#keywordsTable').dataTable( {
	
	    });
	}  );
</script>