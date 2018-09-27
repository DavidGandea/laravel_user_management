@extends('layouts.app')

@section('content')
<p></p>
<div class="jumbotron text-center">
    <h1> Welcome to my Laravel Application</h1>
    <br>
    <p> Number of users : {{App\User::count()}}</p>
    <p> Number of users over 18:</p>

    <script type="text/javascript">
        var analytics = <?php echo $gender; ?>

        google.charts.load('current', {'packages':['corechart']});

        google.charts.setOnLoadCallback(drawChart);
     
        function drawChart()
        {
         var data = google.visualization.arrayToDataTable(analytics);
         var options = {
          title : 'Percentage of Male and Female Employee'
         };
         var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
         chart.draw(data, options);
        }
    </script>
    <div class="panel panel-default">
        <div class="panel-body" align="center">
            <div id="pie_chart" style="width:45%; height:400px;">
            </div>
        </div>
   </div>
   
  </div>

@endsection
