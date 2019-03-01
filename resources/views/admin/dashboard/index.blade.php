@extends('admin.layouts.app',[$template])
@push('css')

@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{$template->title}}
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Home</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->            
            <!-- /.row -->
            <!-- Main row -->
            @if(AppHelper::access(['Admin']))
            <div class="row">
                <div class="col-md-12" style="padding-top:180px">                    
                    <h2><center>Selamat Datang di Sistem Informasi Eksekutif Pendataan Kelahiran dan Pertumbuhan Bayi di Desa Rianggede </center></h2>                                    
                </div>                
            </div>
            @else
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h1 class="box-title pull-left">Grafik Pertumbuhan Kelahiran</h1>
                            <form action="">
                                <div class="col-md-2 pull-right">
                                    <div class="form-group ">
                                        <select name="tahun" class="form-control tahun" id="">
                                            @for($i=2017;$i < 2030; $i++)
                                                <option value="{{$i}}" {{AppHelper::selected($i,$tahun)}} >{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="box-body">
                            <div class="chart">
                                <canvas id="areaChart" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h1 class="box-title pull-left">Grafik Pertumbuhan Kelahiran Berdasarkan Jenis Kelamin</h1>
                            
                        </div>
                        <div class="box-body">
                            <div class="chart">
                                <canvas id="areaChartKelamin" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h1 class="box-title pull-left">Data Pertumbuhan Kelahiran Tahun {{$tahun}}</h1>
                            
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun</th>
                                        <th>Laki laki</th>
                                        <th>Perempuan</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_table as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value['bulan']}}</td>
                                        <td>{{$value['jumlah_laki']}}</td>
                                        <td>{{$value['jumlah_perempuan']}}</td>
                                        <td>{{$value['jumlah']}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>                
            </div>
            @endif
            <!-- /.row (main row) -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('js')
    <script src="{{asset('admin-lte')}}/bower_components/chart.js/Chart.js"></script>
    <script>
        $(function () {

            $('.tahun').change(function(){
                $('form').submit();
            })

            $('#datatables').DataTable()
            $('#full-datatables').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
            })

            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
            // This will get the first returned node in the jQuery collection.
            var areaChart       = new Chart(areaChartCanvas)
            var data = @php echo $data @endphp 

            var data_laki = @php echo $data_laki @endphp 

            var data_perempuan = @php echo $data_perempuan @endphp  

            var bulan = @php echo $bulan @endphp   

            var areaChartData = {
            labels  : bulan,
            datasets: [
                {
                    label               : 'Jumlah Bayi',
                    fillColor           : 'rgba(210, 214, 222, 1)',
                    strokeColor         : 'rgba(210, 214, 222, 1)',
                    pointColor          : 'rgba(210, 214, 222, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                : data
                }
                
            ]
            }

            var areaChartOptions = {
            //Boolean - If we should show the scale at all
            showScale               : true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines      : false,
            //String - Colour of the grid lines
            scaleGridLineColor      : 'rgba(0,0,0,.05)',
            //Number - Width of the grid lines
            scaleGridLineWidth      : 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines  : true,
            //Boolean - Whether the line is curved between points
            bezierCurve             : true,
            //Number - Tension of the bezier curve between points
            bezierCurveTension      : 0.3,
            //Boolean - Whether to show a dot for each point
            pointDot                : false,
            //Number - Radius of each point dot in pixels
            pointDotRadius          : 4,
            //Number - Pixel width of point dot stroke
            pointDotStrokeWidth     : 1,
            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius : 20,
            //Boolean - Whether to show a stroke for datasets
            datasetStroke           : true,
            //Number - Pixel width of dataset stroke
            datasetStrokeWidth      : 2,
            //Boolean - Whether to fill the dataset with a color
            datasetFill             : false,
            //String - A legend template
            legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
            //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio     : true,
            //Boolean - whether to make the chart responsive to window resizing
            responsive              : true,
            multiTooltipTemplate    : "<%= datasetLabel %>: <%= value %>",
            legend                  : {
                                        display: true,
                                        labels: {
                                            fontColor: 'rgb(255, 99, 132)'
                                        }
                                    }
            
            }

            //Create the line chart
            areaChart.Line(areaChartData, areaChartOptions)


            var areaChartKelaminCanvas = $('#areaChartKelamin').get(0).getContext('2d')
            // This will get the first returned node in the jQuery collection.
            var areaChartKelamin       = new Chart(areaChartKelaminCanvas)
            var data = @php echo $data @endphp 

            var data_laki = @php echo $data_laki @endphp 

            var data_perempuan = @php echo $data_perempuan @endphp  

            var bulan = @php echo $bulan @endphp   

            var areaChartKelaminData = {
            labels  : bulan,
            datasets: [
               {
                    label               : 'Laki Laki',
                    fillColor           : 'blue',
                    strokeColor         : 'blue',
                    pointColor          : 'blue',
                    pointStrokeColor    : 'blue',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                : data_laki
                },{
                    label               : 'Perempuan',
                    fillColor           : 'red',
                    strokeColor         : 'red',
                    pointColor          : 'red',
                    pointStrokeColor    : 'red',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                : data_perempuan
                },
                
            ]
            }

            var areaChartKelaminOptions = {
            //Boolean - If we should show the scale at all
            showScale               : true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines      : false,
            //String - Colour of the grid lines
            scaleGridLineColor      : 'rgba(0,0,0,.05)',
            //Number - Width of the grid lines
            scaleGridLineWidth      : 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines  : true,
            //Boolean - Whether the line is curved between points
            bezierCurve             : true,
            //Number - Tension of the bezier curve between points
            bezierCurveTension      : 0.3,
            //Boolean - Whether to show a dot for each point
            pointDot                : false,
            //Number - Radius of each point dot in pixels
            pointDotRadius          : 4,
            //Number - Pixel width of point dot stroke
            pointDotStrokeWidth     : 1,
            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius : 20,
            //Boolean - Whether to show a stroke for datasets
            datasetStroke           : true,
            //Number - Pixel width of dataset stroke
            datasetStrokeWidth      : 2,
            //Boolean - Whether to fill the dataset with a color
            datasetFill             : false,
            //String - A legend template
            legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
            //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio     : true,
            //Boolean - whether to make the chart responsive to window resizing
            responsive              : true,
            multiTooltipTemplate    : "<%= datasetLabel %>: <%= value %>",
            legend                  : {
                                        display: true,
                                        labels: {
                                            fontColor: 'rgb(255, 99, 132)'
                                        }
                                    }
            
            }

            //Create the line chart
            areaChartKelamin.Line(areaChartKelaminData, areaChartKelaminOptions)
        })
    </script>
@endpush