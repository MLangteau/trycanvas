@extends('html')

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-heading">{{$event->title}}</h3>
                </div>

                <div class="panel-body">
                    <p><strong>Description:</strong></p>
                    {{$event->description}}
                </div>

                <div id="map"></div>

                @if (count($event) == 0)
                    <h3>No event!</h3>
                @else

                <table class="table table-bordered table-hover table-striped">
                    <tbody>
                    <tr>
                        <td><strong>Start date:</strong></td>
                        <td>{{$event->start_date}}</td>
                    </tr>
                    <tr>
                        <td><strong>End date:</strong></td>
                        <td>{{$event->end_date}}</td>
                    </tr>
                    <tr>
                        <td><strong>Address:</strong></td>
                        <td>{{$event->address}}</td>
                    </tr>
                    <tr>
                        <td><strong>Created by:</strong></td>
                        <td><a href="#">{{$event->creator->name}}</a></td>
                    </tr>
                    </tbody>
                </table>

                @endif

            </div>
        </div>
    </div>
@endsection
{{-- For Google Script Only for certain pages --}}
@section('footer-script')

    <script>

        // This example displays a marker at the center of Australia.
        // When the user clicks the marker, an info window opens.

        function initMap() {
            var uluru = {lat: {{$event->lat}}, lng: {{$event->long}}};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: uluru
            });

            var contentString = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
                '<div id="bodyContent">'+
                '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
                'sandstone rock formation in the southern part of the '+
                'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
                'south west of the nearest large town, Alice Springs; 450&#160;km '+
                '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
                'features of the Uluru - Kata Tjuta National Park. Uluru is '+
                'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
                'Aboriginal people of the area. It has many springs, waterholes, '+
                'rock caves and ancient paintings. Uluru is listed as a World '+
                'Heritage Site.</p>'+
                '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
                'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
                '(last visited June 22, 2009).</p>'+
                '</div>'+
                '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            var marker = new google.maps.Marker({
                position: uluru,
                map: map,
                title: 'Uluru (Ayers Rock)'
            });
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API_KEY')}}&callback=initMap">
    </script>

@endsection

@section('header-styles')
    <style>
        #map {
            height: 400px;
            width:  100%;
        }
    </style>
@endsection