@extends('admin.layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">create new radio channel</h5>
        </div>
        <div class="card-body">
            @foreach($channels as $channel)
                <div class="row border-bottom mt-2">
                    <div class="col-md-6">
                        <h5 class="card-title">{{ $channel->name }}</h5>
                    </div>
                    <div class="col-md-6 mx-auto">
                        <audio controls>
                            <source src="{{ url($channel->link) }}" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
