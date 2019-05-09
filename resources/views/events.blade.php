@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Available Events</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm data-table">
                            <thead class="thead">
								<tr>
									<th>ID</th>
									<th>Event</th>
									<th>Start Date</th>
									<th class="no-search no-sort"></th>
								</tr>
                                </thead>
                                <tbody>
                                    @foreach($events as $event)
                                        <tr>
                                            <td>{{$event['Id']}}</td>
                                            <td>{{$event['NameEvent']}}</td>
                                            <td>{{$event['StartDate']}}</td>
                                            <td>
                                                <a class="btn btn-sm btn-success" href="{{ URL::to('eventos/' . $event['Id']) }}">
                                                    Open Cards
                                                </a>
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
