<!-- <link rel="stylesheet" href="{{URL::to('/packages/datatables')}}/media/css/jquery.dataTables.css">

 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
 -->
 <div id="messageUnknowns"></div>
<table id="unknownTable" class="table table-hover table-bordered table-condensed">
	<thead>
		<tr>
			<th>From</th>
			<th>Message</th>
			<th>Datetime</th>
			<th>IP</th>
			<th>Remark</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $i=0; ?>
		@foreach($datas as $d)

		<tr>
			<td>{{$d->from}}</td>
			<td>{{$d->message}}</td>
			<td>{{$d->datetime}}</td>
			<td>{{$d->from_ip}}</td>
			<td>{{$d->remarks}}</td>
			<td>
				
			</td>
		</tr>

		<script type="text/javascript">
		$(document).ready(function()  {

		}  );
		</script>

		<?php $i++; ?>
		@endforeach
	</tbody>
</table>



<script type="text/javascript">
	$(document).ready(function()  {
	    $('table#unknownTable').dataTable( {
			
	    });
	}  );
</script>