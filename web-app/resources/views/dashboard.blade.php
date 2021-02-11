@extends('adminlte::page')

@section('title', 'EasyGarden')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>Water Level:</h3>
                    <h3 id="plantWater">{{100*$plant}}%</h3>
                    @if($plant > 0.25 )
                    <div class="progress">
                        <div id="progress-bar" class="progress-bar bg-success" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="1" style="width: calc(100*{{$plant}}%)">
                        </div>
                    </div>
                    @endif
                    @if($plant <= 0.25 )
                        <div class="progress">
                            <div id="progress-bar" class="progress-bar bg-warning" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="1" style="width: calc(100*{{$plant}}%)">
                            </div>
                        </div>
                    @endif
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
@stop




@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/public/css/scrollbar.css">

@stop

@section('js')
    <script>
        async function fetchPlant() {
            const response = await fetch('api/plant/get?token=abcdefghijklmnopqrstuvwxyz&plant=cucumber');
            // waits until the request completes...
            response.json().then(data => {
                console.log(data.water);
                if(data.water == 0){
                    document.getElementById('plantWater').innerText = '0%';
                    let progress = document.getElementById('progress-bar')
                    progress.classList.add('bg-warning');
                    progress.classList.remove('bg-succes');
                    progress.style.width = '0%';
                } else if (data.water == 1) {
                    document.getElementById('plantWater').innerText = '100%';
                    let progress = document.getElementById('progress-bar')
                    progress.classList.add('bg-succes');
                    progress.classList.remove('bg-warning');
                    progress.style.width = '100%';
                }
            });
        }

        const interval = setInterval(function() {

            fetchPlant();
        }, 5000);
    </script>
@stop
