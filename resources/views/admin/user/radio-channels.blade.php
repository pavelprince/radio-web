@extends('admin.layout.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Channel List</h5>
            <a href="{{ url('/radio-channel/create') }}" class="d-flex flex-row-reverse bd-highlight">
                <button type="button" class="btn btn-primary btn-sm">Create New</button>
            </a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Radio Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Url</th>
                </tr>
                </thead>
                <tbody>
                @foreach($channels as $channel)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $channel->name }}</td>
                        <td>{{ $channel->details }}</td>
                        <td>{{ $channel->link }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
