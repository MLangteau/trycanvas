@extends('html')

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <h1>Upcoming Events</h1>
            @if (count($upcomingEvents) == 0)
                <h3>No UPCOMING events!</h3>
            @else
                @foreach($upcomingEvents as $upcomingEvent)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-heading">
                                <a href="{{route('event-view', $upcomingEvent->id)}}">{{$upcomingEvent->id}} {{$upcomingEvent->title}}</a>
                            </h3>
                            <small class="padding-left-10">{{$upcomingEvent->address}}</small>
                        </div>
                        <div class="panel-body">
                            <div class="meta-data margin-bottom-20">
                                <strong>Start date:</strong>{{$upcomingEvent->start_date}}
                                <br>
                                <strong>End date:</strong>{{$upcomingEvent->end_date}}
                                <br>
                                <strong>Created by:</strong><a href="">{{$upcomingEvent->creator->name}}</a>
                                <br>
                            </div>
                            <div class="description">
                                <p>{{$upcomingEvent->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>


    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <h1>Past Events</h1>
            @if (count($pastEvents) == 0)
                <h3>No PAST events!</h3>
            @else
                @foreach($pastEvents as $pastEvent)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-heading">
                                <a href="{{route('event-view', $pastEvent->id)}}">{{$pastEvent->id}} {{$pastEvent->title}}</a>
                            </h3>
                            <small class="padding-left-10">{{$pastEvent->address}}</small>
                        </div>
                        <div class="panel-body">
                            <div class="meta-data margin-bottom-20">
                                <strong>Start date:</strong>{{$pastEvent->start_date}}
                                <br>
                                <strong>End date:</strong>{{$pastEvent->end_date}}
                                <br>
                                <strong>Created by:</strong><a href="">{{$pastEvent->creator->name}}</a>
                                <br>
                            </div>
                            <div class="description">
                                <p>{{$pastEvent->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection

