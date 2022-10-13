@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    
    <p>Welcome to this beautiful admin panel.</p>
    {{-- :addams user password: 123456789 --}}
    <div class="row col-6">
        <canvas id="myChart" width="400" height="400"></canvas>
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['rikki six', 'peta jensen', 'ava addams'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(235, 55, 148, 0.7)',
                            'rgba(63, 77, 236, 0.7)',
                            'rgba(241, 18, 18, 0.7)'
                           
                        ],
                        borderColor: [
                            'rgba(235, 55, 148, 0.7)',
                            'rgba(63, 77, 236, 0.7)',
                            'rgba(241, 18, 18, 0.7)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
    </script>
    <script> console.log('Hi!'); </script>
@stop

