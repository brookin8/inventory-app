@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    	<div class="col-xs-1">
    	</div>
        <div class="col-xs-10">
        <form method="post" action="/items/{{$item->id}}" class="col-12 pt-5 pb-5 mb-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<div class="row">
                		<div class="col">
                			Edit Item
                		</div>
                		<div class="col text-right">
							<a href="../../items"><button class="btn btn-default" type="button">Discard</button></a>
							<button class="btn btn-primary newitem" type="submit">Save</button>
						</div>
                	</div>
                </div>
            <div class="panel-body items">
	
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			
			<div class="form-group row">
			  	<label for="name" class="col-4 col-form-label text-right createText">Name</label>
			  	<div class="col-7">
			  		<input type="text" id="name" value="{{$item->name}}" name="name" class="form-control">
			  	</div>
			</div>
			<div class="form-group row">
			  	<label for="category" class="col-4 col-form-label text-right createText">Category</label>
			  	<div class="col-7">
			  		<select name="category" id="category" class="form-control createOption">
			  			@foreach ($categories as $category)
			  				@if($item->category_id === $category->id)
			  					<option value="{{ $category->id }}" selected>{{ $category->name }}</option>
			  				@else
			  					<option value="{{ $category->id }}">{{ $category->name }}</option>
			  				@endif
			  			@endforeach
			  		</select>
			  	</div>
			</div>
			<div class="form-group row">
			  	<label for="supplier" class="col-4 col-form-label text-right createText">Supplier</label>
			  	<div class="col-7">
			  		<select name="supplier" id="supplier" class="form-control createOption">
			  			@if(!is_null($itemsupplier->deleted_at))
			  					<option value="" disabled selected>Select Supplier</option>
			  			@endif
			  			@foreach ($suppliers as $supplier)
			  				@if($item->supplier_id === $supplier->id)
			  					<option value="{{ $supplier->id }}" selected>{{ $supplier->name }}</option>
			  				@else
			  					<option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
			  				@endif
			  			@endforeach
			  		</select>	
			  	</div>
			</div>
			<div class="form-group row">
			  	<label for="supplier_item" class="col-4 col-form-label text-right createText">Supplier Item ID</label>
			  	<div class="col-7">
			  		<input type="text" id="supplier_item" value="{{$item->supplier_item_identifier}}" name="supplier_item" class="form-control">
			  	</div>	
			</div>
			<div class="form-group row">
			  	<label for="uom" class="col-4 col-form-label text-right createText">Unit of Measure</label>
			  	<div class="col-7">
			  		<select name="uom" id="uom" class="form-control createOption">
			  			@foreach ($uoms as $uom)
			  				@if($item->uom_id === $uom->id)
			  					<option value="{{ $uom->id }}" selected>{{ $uom->unit }}</option>
			  				@else
			  					<option value="{{ $uom->id }}">{{ $uom->unit }}</option>
			  				@endif
			  			@endforeach
			  		</select>	
			  	</div>
			</div>
			<div class="form-group row">
			  	<label for="cost" class="col-4 col-form-label text-right createText">PARs</label>
			  	<div class="col-7">
			  		@if(!is_null($pars))
			  		<input type="number" value="{{$pars->PARs}}" step="any" id="pars" name="pars" class="form-control">
			  		@else
			  		<input type="number" step="any" id="pars" name="pars" class="form-control">
			  		@endif
			  	</div>	
			</div>
			<div class="form-group row">
			  	<label for="cost" class="col-4 col-form-label text-right createText">Cost</label>
			  	<div class="col-7">
			  		<input type="number" value="{{$item->cost}}" step="any" id="cost" name="cost" class="form-control">
			  	</div>	
			</div>
		
		</div>
		</div>
	</form>
	</div>
</div>

@endsection