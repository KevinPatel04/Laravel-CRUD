@extends('layouts.app')

@section('content')
<h1 class="float-left">Employee Record</h1>
<div class="float-right">
	<form method="POST" action="/test/create">
		@csrf
		@method('GET')
		<button type="submit" class="btn btn-primary float-right" style="background-color: #2268FF; border-color:#2268FF;" title="Add New Employee"><i class="fas fa-user-plus"></i> Add New Employee</button>
	</form>
</div>
<div class="table-responsive">
	<table class="mb-5 table table-bordered"  id="dataTable" width="100%" cellspacing="0">
		<thead>
			<th>ID</th>
			<th>NAME</th>
			<th>GENDER</th>
			<th>PHONE</th>
			<th>EMAIL</th>
			<th colspan="3"></th>
			<!-- <th><a href="/contact" class="btn btn-success">Add New</a></th> -->
		</thead>
		<tfoot>
			<th>ID</th>
			<th>NAME</th>
			<th>GENDER</th>
			<th>PHONE</th>
			<th>EMAIL</th>
			<th colspan="3"></th>
			<!-- <th><a href="/contact" class="btn btn-success">Add New</a></th> -->
		</tfoot>
		@if(empty($test))
			<tr><td colspan="8" align="center">No Record Found</td></tr>
		@else
			@foreach($test as $value)
				<tr class="mt-3">
					<td class="">{{ $value->EMP_CODE }}</td>
					<td class="">{{ $value->FNAME." ".$value->LNAME }}</td>
					<td class="">
					@if($value->GENDER==1)
						{{ "MALE" }}
					@elseif($value->GENDER==2)
						{{ "FEMALE" }}
					@else
						{{ "OTHERS" }}
					@endif
					</td>
					<td class="">{{ $value->CONTACT_NUMBER }}</td>
					<td class="" colspan="2">{{ $value->EMAIL }}</td>
					<td class="d-flex">
						<form method="POST" id="delete_{{ $value->EID }}" action="/test/{{ $value->EID }}">
							@csrf
							@method('DELETE')
							<button type="button" title="Delete Record of {{ $value->FNAME.' '.$value->LNAME }}" onclick="confirmation({{ $value->EID }});" class='ml-4 btn btn-danger rounded-circle' style="width: 42px;height: 42px;"><i style='color:white;' class="fas fa-trash-alt"></i></button>
						</form>
						<form id="view_{{$value->EID}}" method="POST" action="/test/{{ $value->EID }}">
							@csrf
							@method('GET')
							<button name='View' type="submit" class='ml-4 btn btn-success rounded-circle' title="View Details of {{ $value->FNAME.' '.$value->LNAME }}" style="width: 42px;height: 42px;"><i style='color:white;' class="fas fa-eye"></i></button>
						</form>
					</td>
				</tr>
			@endforeach
		@endif
	</table>
	
</div>

@endsection


@section('script')
<script type="text/javascript">
	
	function confirmation(e){
		var c=confirm("Do you want to delete this Employee??");
		if(c==true){
			$('#delete_'+e).submit();
		}else{
			alert("Account is not Deleted");
		}
	}

</script>

@endsection