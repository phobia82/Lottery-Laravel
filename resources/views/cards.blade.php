@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Pending Cards</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm data-table">
                            <thead class="thead">
								<tr>
									<th>ID</th>
									<th>Event</th>
									<th>Card</th>
									<th>Start Date</th>
									<th>Status</th>
								</tr>
                                </thead>
                                <tbody>
                                    @foreach($pending as $card)
                                        <tr>
                                            <td>{{$card['id']}}</td>
                                            <td>{{$card['event']['name']}}</td>
                                            <td>{{$card['name']}}</td>
                                            <td>{{$card['event']['start']}}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-header">Finished Events</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm data-table">
                            <thead class="thead">
								<tr>
									<th>ID</th>
									<th>Event</th>
									<th>Card</th>
									<th>Finished</th>
									<th>Status</th>
								</tr>
                                </thead>
                                <tbody>
                                    @foreach($finished as $card)
                                        <tr>
                                            <td>{{$card['id']}}</td>
                                            <td>{{$card['event']['name']}}</td>
                                            <td>{{$card['name']}}</td>
                                            <td>{{$card['event']['start']}}</td>
                                            <td>{{$card['status'] ? 'Winner' : 'Loser'}}</td>
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
