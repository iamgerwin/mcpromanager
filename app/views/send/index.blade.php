<div id="msgEdit"></div>
<table id="sendTable">
<thead>
	
		<td>Keyword</td>
		<td>Name</td>
		<td>Active</td>
		<td>Server's IP</td>
		<td> </td>	
</thead>
<tbody>
	<?php $i = 0; ?>
	@foreach($data as $d)
	<tr>
		<td><input id="ke{{$i}}" type="text" class="input" value="{{$d->keyword}}" /> <button id="editran{{$i}}" class="btn btn-inverse"><i class="icon-random"></i></button></td>
		<td><input id="na{{$i}}" type="text" class="input" value="{{$d->name}}"  /></td>
		<td><input id="ac{{$i}}" class="" type="checkbox"
			@if($d->active) checked @endif /></td>
		<td><input id="ip{{$i}}" type="text" class="input" value="{{$d->ip}}"  /></td>
		<td> <button id="eb{{$i}}" class="btn btn-warning"><i class="icon-pencil"> </i></button> </td>
		<input type="hidden" id="id{{$i}}" readonly value="{{$d->id}}"/>
	</tr>

	<script type="text/javascript">
	$(document).ready(function () {
		$('button#editran{{$i}}').click(function(){
			$('input#ke{{$i}}').val(makeid());
		});

		$('button#eb{{$i}}').click(function() {
			var Edit = {};
			  Edit.ID = $('input#id{{$i}}').val();
			  Edit.Keyword = $('input#ke{{$i}}').val();
			  Edit.Name = $('input#na{{$i}}').val();
			  Edit.Active = $('input#ac{{$i}}').is(":checked") ? 1 : 0;
			  Edit.IP = $('input#ip{{$i}}').val();
			$.ajax({
					url: '{{URL::to("/send/edit")}}',
					type: 'post',
					data: Edit,
					 beforeSend: function ( data ) {
					  	 $('table#sendTable').block({ 
					    	message: '<img src="{{URL::to('/packages/img')}}/preloader-w8-cycle-black.gif" />', 
					                css: { border: '3px solid #000' } 
					             });
					  },
					success: function (data) {
						$('div#msgEdit').html(data);
						$('table#sendTable').unblock();
					}
				});
		});
	});
	</script>

	<?php $i++; ?>
	@endforeach
</tbody>
</table>


<script type="text/javascript">
$(document).ready(function(){
	$('table#sendTable').dataTable();

} );
</script>