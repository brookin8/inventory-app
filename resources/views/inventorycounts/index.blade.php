@extends('layouts.app')

@section('content')
	

<div id="loader"></div>

<div style="display:none;" id="loaderDiv">
	<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<div class="row">
                		<div class="col text-left">
                			Inventory Counts
                		</div>
                		<div class="col">
                			<a href="/inventorycounts/create"><button class="btn newcount btn-primary ml-5">New Count</button></a>
                		</div>
                	</div>
				</div>
				<div class="panel-body">
		

			<div class="row mb-5 ml-5 mr-5">
				<div class="col">
					<ul class="nav nav-tabs">
				  		<li class="nav-item">
				    		<a class="nav-link active" href="#">Submitted</a>
				  		</li>
						<li class="nav-item">
						    <a class="nav-link" href="/inventorycounts/saved">Saved</a>
						</li>
					</ul>
				</div>
			</div>

		
				<div class="row ml-5 mr-3">
					<div class="table-responsive text-center mr-4 ml-3">
						<table class="table tableborder table-striped table-hover mr-4" width="98%" id="table">
						
							<thead>
								<tr>
									<th class="text-left">Count Record ID</th>
									<th class="text-left">Total $ Amount</th>
									<th class="text-left">Date Submitted</th>
									<th class="text-left">Submitted By</th>
								</tr>
							</thead>
							<tbody>
							@foreach($counts as $count)
							<tr class="">
								<td class="text-left"><a href="inventorycounts/{{$count->id}}" class="bodylink"><div>{{$count->id}}</div></a></td>
								<td class="text-left"><a href="inventorycounts/{{$count->id}}" class="bodylink"><div>${{$count->total_value_onhand}}</div></a></td>
								<td class="text-left"><a href="inventorycounts/{{$count->id}}" class="bodylink"><div>{{Carbon\Carbon::parse($count->updated_at)->format('m/d/Y')}}</div></a></td>
								<td class="text-left"><a href="inventorycounts/{{$count->id}}" class="bodylink"><div>{{$count->username}}</div></a></td>
							</tr>
							@endforeach
							</tbody>
						</table>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>


	<script>
    
	//   $(document).ready(function() {
	//     $('#table').DataTable();
	// } );


	var table = $('#table').DataTable({
		 dom: 'Blfrtip', 
		 buttons: [
        	{extend:'copy', className:'tableButton'},
        	{extend:'excel', className:'tableButton'},
        	{extend:'pdf', className:'tableButton'},
        	{extend:'csv', className:'lastTableButton'}
    	],
    	filterSelectClass: 'customFilter',
    	filterText: 'Search'
	});

	table.buttons().container()
    .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );

 //   	var myVar;

	// function myFunction() {
	//     myVar = setTimeout(showPage, 2000);
	// }

	// function showPage() {
	//   document.getElementById("loader").style.display = "none";
	//   document.getElementById("loaderDiv").style.display = "block";
	// }


    </script>
@endsection

