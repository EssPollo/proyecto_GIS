@extends('adminlte::page')
@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/new_general.css') }}">
@stop

@section('content_header')
    <h1 class="m-0 text-dark">Bienvenido Doctor: Prueba</h1>
@stop


@section('plugins.Chartjs', true)
@section('content')
        {!! Toastr::message() !!}

        <div class="row">
            <div class="col-sm-3">
                <x-adminlte-callout class="card-custom">
                    <h6>Presupuesto total</h6>
                        <p>$1,000,000.00</p>
                        <h6>Presupuesto pendiente a pagar</h6>
                        <p>$0.00</p>
                        <h6>Presupuesto liquidado</h6>
                        <p>$7,649,402.94</p>
                </x-adminlte-callout>
            </div>
            <div class="col-sm-3">
                <x-adminlte-callout class="card-custom">
                        <div class="chart tab-pane active" id="revenue-chart" style="position: flex; height: 300px;">
                            <canvas id="myChartP" height="250px" width="250px" style="height: 250px; width: 250px;"
                                width="845" class="chartjs-render-monitor"></canvas>
                        </div>
                </x-adminlte-callout>
            </div>
            <div class="col-sm-3">
                <x-adminlte-callout class="card-custom">
                        <h6>Órdenes</h6>
                        <p>$2,094,817.94</p>
                        <h6>Transf. salientes</h6>
                        <p>$73,265.72</p>
                        <h6>Relaciones de gasto</h6>
                        <p>$1,440,650.00</p>
                </x-adminlte-callout>
            </div>
            <div class="col-sm-3">
                <x-adminlte-callout class="card-custom">
                        <h6>Pagado</h6>
                        <p>$7,649,402.94</p>
                        <h6>Transf. entrantes</h6>
                        <p>$5,736.48</p>
                        <h6>Cobrado</h6>
                        <p>$0.00</p>
                </x-adminlte-callout>
            </div>
        </div>
            <x-adminlte-card theme-mode="outline" class="hscroll">
                <table width="100%" cellspacing="0" cellpadding="6">
                    <tbody>
                        <tr>
                            <td>
                                <a class="btn btn-app">
                                    <i class="fas fa-wallet fa-4x text-white"></i>
                                    <h6>PACIENTES</h6>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-app" >
                                    <i class="fas fa-save text-white"></i>
                                    <h6>BITÁCORAS</h6>
                                </a>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </x-adminlte-card>
@endsection


@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js">
    </script>
    <script>
        // CHART JS BAR
        const ctxP = document.getElementById('myChartP');

        new Chart(ctxP, {
            type: 'pie',
            data: {
                labels: ['PRESUPUESTO GASTADO', 'PRESUPUESTO TOTAL'],
                datasets: [{
                    data: [15.4, 84.8],
                    borderWidth: 2,
                    backgroundColor: ['#a9d488', '#5dade2'],
                    offset: 20,
                    hoverOffset: 15
                }]
            },
            options: {

                plugins: {
                    legend: {
                        display: false,
                    },
                    title: {
                        display: true,
                        padding: 10,
                        text: 'PORCENTAJE PRESUPUESTO',
                        color: '#FFFEFE',
                        font: {
                            size: 12,
                        }
                    },
                    datalabels: {
                        anchor: 'center',
                        align: 'end',
                        color: '#434D53',
                        font: {
                            size: 13,
                            family: 'sans-serif',
                            weight: 'bold'
                        },
                        formatter: (value, ctx) => {
                            let sum = 0;
                            let dataArr = ctx.chart.data.datasets[0].data;
                            dataArr.map(data => {
                                sum += data;
                            });
                            let percentage = (value * 100 / sum).toFixed(0) + "%";
                            return percentage;
                        },
                    },
                }
            },
            plugins: [ChartDataLabels]
        });
    </script>

@stop
