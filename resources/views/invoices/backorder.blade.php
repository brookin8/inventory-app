@extends('layouts.app')

@section('content')
	
	<h1 class="text-center">Invoices</h1>

	<div class="container">
	<div class="row mt-3 mb-4">
		<a href="/invoices/create"><button class="btn btn-default ml-4">New Invoice</button></a>
	</div>
	</div>

	<ul class="nav nav-tabs">
	  <li class="nav-item">
	    <a class="nav-link" href="/invoices">Closed</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link active" href="#">Backorder</a>
	  </li>
	</ul>
	<div class="container ">
		{{ csrf_field() }}
		<div class="table-responsive text-center">
			<table class="table table-borderless table-striped table-hover" id="table">
				<thead>
					<tr>
						<th class="text-center">Invoice Number</th>
						<th class="text-center">Order Number</th>
						<th class="text-center">Supplier</th>
						<th class="text-center">Total $ Amount</th>
						<th class="text-center">Last Updated</th>
						<th class="text-center">Updated By</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
				@foreach($invoices as $invoice)
				<tr class="">
					<td><a href="../invoices/{{$invoice->id}}" class="bodylink"><div>{{$invoice->id}}</div></a></td>
					<td><a href="../invoices/{{$invoice->id}}" class="bodylink"><div>{{$invoice->order_id}}</div></a></td>
					<td><a href="../invoices/{{$invoice->id}}" class="bodylink"><div>{{$invoice->supplier}}</div></a></td>
					<td><a href="../invoices/{{$invoice->id}}" class="bodylink"><div>${{$invoice->total_invoice_amount}}</div></a></td>
					<td><a href="../invoices/{{$invoice->id}}" class="bodylink"><div>{{Carbon\Carbon::parse($invoice->updated_at)->format('m/d/Y')}}</div></a></td>
					<td><a href="../invoices/{{$invoice->id}}" class="bodylink"><div>{{$invoice->username}}</div></a></td>
					<td>
						
					<div class="row justify-content-center"><a href=""><button class="edit-modal btn btn-sm btn-info mr-2"
							data-info="">
							<span class="glyphicon glyphicon-edit"></span>
						</button></a>
						<form method="post" action="">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            <button class="delete-modal btn btn-sm btn-danger"
							data-info="">
							<span class="glyphicon glyphicon-trash"></span>
						</button></form>
						</div>
				
					</td>
				</tr>
				@endforeach
				</tbody>
			</table>
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

   

    </script>
@endsection

