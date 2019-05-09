@extends('layouts.app')

@section('content')
<div class="container">
	<div class="alert" style="display:none"></div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Available Cards for {{$event['NameEvent']}}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm data-table">
                            <thead class="thead">
								<tr>
									<th>ID</th>
									<th>Card</th>
									<th class="text-center">Selected</th>
								</tr>
                                </thead>
                                <tbody>
                                    @foreach($event['Tarjetas'] as $card)
                                        <tr>
                                            <td>{{$card['Id']}}</td>
                                            <td>{{$card['NameTarjeg']}}</td>
                                            <td class="text-center">
                                                <div class="form-check">
												  <input class="form-check-input" type="checkbox" data-id="{{$card['Id']}}" data-name="{{$card['NameTarjeg']}}" data-event_id="{{$card['EventoId']}}">
												</div>
                                            </td>
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
@endsection
@push('footer_scripts')
<script>
 jQuery(document).ready(function(){
	jQuery('.form-check-input').click(function(e){
	   jQuery.ajax({
		  url: "{{ url('/cards/select') }}",
		  method: 'PUT',
		  data: {
			 _token: $("meta[name='csrf-token']").attr("content"),
			 selected: jQuery(this).prop('checked') ? 1 : 0,
			 name: jQuery(this).data('name'),
			 event_id: jQuery(this).data('event_id'),
			 id: jQuery(this).data('id'),
		  },
		  success: function(result){
			 jQuery('.alert').prop('class',result.error ? 'alert alert-danger' : 'alert alert-success');
			 jQuery('.alert').html(result.message);
			 jQuery('.alert').show();
		  }});
	   });
	});
</script>
@endpush