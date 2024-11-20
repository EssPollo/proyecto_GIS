@extends('adminlte::page')
@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/new_general.css') }}">
@stop

@section('content_header')
    <h1 class="m-0 text-dark">Bienvenido Farmaceutico Fernando! </h1>
@stop


@section('plugins.Chartjs', true)
@section('content')
        {!! Toastr::message() !!}

        <div class="row">
            <div class="col-sm-3">
                
                <div class="filtr-item col-sm-3" data-category="1" data-sort="white sample">
                    <a class="galeria-a" data-toggle="lightbox"
                        data-title="Evidencia Fotográfica">
                        <img src="{{ asset('images/galeria/imagen_9.jpeg') }}" class="images-custom" alt="Evidencia Fotográfica" />
                    </a>
                </div>
            
        </div>
            <div class="col-sm-3">
                <x-adminlte-callout class="card-custom">
                    <h6>Proxima entrega de Medicamentos</h6>
                        <p>23/11/2024</p>
                </x-adminlte-callout>
            </div>
        </div>
            <x-adminlte-card theme-mode="outline" class="hscroll">
                <table width="100%" cellspacing="0" cellpadding="6">
                    <tbody>
                        <tr>
                            <td>
                                <a class="btn btn-app" href= "{{ route('farmaceutico.create')}}" > 
                                    <i class="fas fa-wallet fa-4x text-white"></i>
                                    <h6>PACIENTES A ADMINISTRAR MEDICAMENTOS</h6>
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
