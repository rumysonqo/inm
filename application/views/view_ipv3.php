<script type="text/javascript">
    $(document).ready(function() {
      $("#micro_red").change(function() {
        $("#micro_red option:selected").each(function() {
          micro_red = $('#micro_red').val();
          $.post("<?php echo base_url();?>index.php/inm/eess", {
            micro_red : micro_red
          }, function(data) {
            $("#eess").html(data);
          });
        });
      })
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
      $("#micro_red").change(function() {
        $("#micro_red option:selected").each(function() {
          micro_red = $('#micro_red').val();
          $.post("<?php echo base_url();?>index.php/ipv3/llena_micro", {
            micro_red : micro_red
          }, function(data) {
            $("#micro").html(data);
            $("#micro").dataTable().fnDestroy();
            $("#micro").dataTable( {
                        // sDom: hace un espacio entre la tabla y los controles 
                      "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
                  } );
          });
        });
      })
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
      $("#eess").change(function() {
        $("#eess option:selected").each(function() {
          eess = $('#eess').val();
          $.post("<?php echo base_url();?>index.php/ipv3/llena_eess", {eess : eess}, function(data) {
            $("#eesstab").html(data);
            $("#eesstab").dataTable().fnDestroy();
            $("#eesstab").dataTable( {
                        // sDom: hace un espacio entre la tabla y los controles 
              "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
            } );
          });
        });
      })
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
          $.post("<?php echo base_url();?>index.php/ipv3/llena_red", function(data) {

            $("#red").html(data);
            $("#red").dataTable().fnDestroy();
            $("#red").dataTable( {
                        // sDom: hace un espacio entre la tabla y los controles 
              "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
            });
          });

          $.post("<?php echo base_url();?>index.php/ipv3/graf_num_micro",function(dat){
            dt=JSON.parse(dat);
            graf5(dt);
          });

          $.post("<?php echo base_url();?>index.php/ipv3/graf_cob_micro",function(dat){
            dt=JSON.parse(dat);
            graf6(dt);
          });

          $.post("<?php echo base_url();?>index.php/ipv3/graf_cob_red",function(dat){
            dt=JSON.parse(dat);
            graf7(dt);
          });



    });
</script>


<script>
  $(function(){
    $("#tabs").tabs();
  });
</script>


<script>
    function graf1(datos) {
            var chart;
            var chartData = [];
                  $.each(datos, function(i, item){
                    chartData.push({
                    "eess": datos[i].nombre,
                    "avance": datos[i].tot,
                    "meta": datos[i].meta
                  });
                  });
            //AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "eess";

                chart.color = "#000000";
                chart.fontSize = 14;
                chart.startDuration = 1;
                chart.plotAreaFillAlphas = 0.2;
                // the following two lines makes chart 3D
                chart.angle = 25;
                chart.depth3D = 80;
                chart.addTitle("Meta Fisica y Nro. de Niños Vacunados por Establecimientos de la Micro Red",20);

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0.2;
                categoryAxis.gridPosition = "start";
                categoryAxis.gridColor = "#FFFFFF";
                categoryAxis.axisColor = "#000000";
                categoryAxis.axisAlpha = 0.5;
                categoryAxis.dashLength = 5;
                categoryAxis.labelRotation= 45;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.stackType = "3d"; // This line makes chart 3D stacked (columns are placed one behind another)
                valueAxis.gridAlpha = 0.2;
                valueAxis.gridColor = "#FFFFFF";
                valueAxis.axisColor = "#000000";
                valueAxis.axisAlpha = 0.5;
                valueAxis.dashLength = 5;
                valueAxis.title = "Número de Niños";
                valueAxis.titleColor = "#000000";
                valueAxis.unit = "%";
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // first graph
                var graph1 = new AmCharts.AmGraph();
                graph1.title = "2004";
                graph1.valueField = "avance";
                graph1.type = "column";
                graph1.lineAlpha = 2;
                graph1.lineColor = "#D0D771";

                graph1.fillAlphas = 1;
                graph1.balloonText = "Niños Vacunados en [[category]]: <b>[[value]]</b>";
                graph1.labelText = "[[avance]]";


                chart.addGraph(graph1);

                // second graph
                var graph2 = new AmCharts.AmGraph();
                graph2.title = "2005";
                graph2.valueField = "meta";
                graph2.type = "column";
                graph2.lineAlpha = 0;
                graph2.lineColor = "#A7FA90";
                graph2.fillAlphas = 1;
                graph2.balloonText = "Meta Fisica [[category]]: <b>[[value]]</b>";
                graph2.labelText = "[[meta]]";

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chart.creditsPosition = "top-right";
                chart.addGraph(graph2);
                chart.write("chartdiv");
};
</script>




<script>
    function graf2(datos) {
            var chart;
            var chartData = [];
                  $.each(datos, function(i, item){
                    chartData.push({
                    "eess": datos[i].nombre,
                    "avance": accounting.toFixed(datos[i].cob,2)
                  });
                  });
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "eess";

                chart.color = "#000000";
                chart.fontSize = 14;
                chart.startDuration = 1;
                chart.plotAreaFillAlphas = 0.2;
                // the following two lines makes chart 3D
                chart.angle = 30;
                chart.depth3D = 30;
                chart.addTitle("Porcentaje de Cobertura por Establecimientos de la Micro Red",20);

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0.2;
                categoryAxis.gridPosition = "start";
                categoryAxis.gridColor = "#FFFFFF";
                categoryAxis.axisColor = "#000000";
                categoryAxis.axisAlpha = 0.5;
                categoryAxis.dashLength = 5;
                categoryAxis.labelRotation= 45;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.stackType = "3d"; // This line makes chart 3D stacked (columns are placed one behind another)
                valueAxis.gridAlpha = 0.2;
                valueAxis.gridColor = "#FFFFFF";
                valueAxis.axisColor = "#000000";
                valueAxis.axisAlpha = 0.5;
                valueAxis.dashLength = 5;
                valueAxis.title = "% de Cobertura";
                valueAxis.titleColor = "#000000";
                valueAxis.unit = "%";
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // first graph
                var graph1 = new AmCharts.AmGraph();
                graph1.title = "2004";
                graph1.valueField = "avance";
                graph1.type = "column";
                graph1.lineAlpha = 2;
                graph1.lineColor = "#73C1FC";

                graph1.fillAlphas = 1;
                graph1.balloonText = "Cobertura en [[category]]: <b>[[value]] %</b>";
                graph1.labelText = "[[avance]] %";


                chart.addGraph(graph1);


                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chart.creditsPosition = "top-right";
                chart.write("chartdiv1");

};
</script>




<script>
    function graf3(datos) {
            var chart;
            var chartData = [
                {
                    "mes": "Enero",
                    "avance": datos[0].enero
                },
                {
                    "mes": "Febrero",
                    "avance": datos[0].febrero
                },
                {
                    "mes": "Marzo",
                    "avance": datos[0].marzo
                },
                {
                    "mes": "Abril",
                    "avance": datos[0].abril
                },
                {
                    "mes": "Mayo",
                    "avance": datos[0].mayo
                },
                {
                    "mes": "Junio",
                    "avance": datos[0].junio
                },
                {
                    "mes": "Julio",
                    "avance": datos[0].julio
                },
                {
                    "mes": "Agosto",
                    "avance": datos[0].agosto
                },
                {
                    "mes": "setiembre",
                    "avance": datos[0].setiembre
                },
                {
                    "mes": "Octubre",
                    "avance": datos[0].octubre
                },
                {
                    "mes": "Noviembre",
                    "avance": datos[0].noviembre
                },
                {
                    "mes": "Diciembre",
                    "avance": datos[0].diciembre
                }

            ];
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "mes";

                chart.color = "#000000";
                chart.fontSize = 14;
                chart.startDuration = 1;
                chart.plotAreaFillAlphas = 0.2;
                // the following two lines makes chart 3D
                chart.angle = 30;
                chart.depth3D = 30;
                chart.addTitle("Numero de Niños Vacunados por Mes en el Establecimiento de Salud",20);

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0.2;
                categoryAxis.gridPosition = "start";
                categoryAxis.gridColor = "#FFFFFF";
                categoryAxis.axisColor = "#000000";
                categoryAxis.axisAlpha = 0.5;
                categoryAxis.dashLength = 5;
                categoryAxis.labelRotation= 45;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.stackType = "3d"; // This line makes chart 3D stacked (columns are placed one behind another)
                valueAxis.gridAlpha = 0.2;
                valueAxis.gridColor = "#FFFFFF";
                valueAxis.axisColor = "#000000";
                valueAxis.axisAlpha = 0.5;
                valueAxis.dashLength = 5;
                valueAxis.title = "Nro. de Niños Vacunados";
                valueAxis.titleColor = "#000000";
                valueAxis.unit = "%";
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // first graph
                var graph1 = new AmCharts.AmGraph();
                graph1.title = "2004";
                graph1.valueField = "avance";
                graph1.type = "column";
                graph1.lineAlpha = 2;
                graph1.lineColor = "#73C1FC";

                graph1.fillAlphas = 1;
                graph1.balloonText = "Niños Vacunados en [[category]]: <b>[[value]]</b>";
                graph1.labelText = "[[avance]]";


                chart.addGraph(graph1);


                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chart.creditsPosition = "top-right";
                chart.write("chartdiv2");

};
</script>





<script>
    function graf4(datos) {
            var chart;
            var chartData = [
                {
                    "mes": "Enero",
                    "avance": datos[0].enero
                },
                {
                    "mes": "Febrero",
                    "avance": datos[0].febrero
                },
                {
                    "mes": "Marzo",
                    "avance": datos[0].marzo
                },
                {
                    "mes": "Abril",
                    "avance": datos[0].abril
                },
                {
                    "mes": "Mayo",
                    "avance": datos[0].mayo
                },
                {
                    "mes": "Junio",
                    "avance": datos[0].junio
                },
                {
                    "mes": "Julio",
                    "avance": datos[0].julio
                },
                {
                    "mes": "Agosto",
                    "avance": datos[0].agosto
                },
                {
                    "mes": "Setiembre",
                    "avance": datos[0].setiembre
                },
                {
                    "mes": "Octubre",
                    "avance": datos[0].octubre
                },
                {
                    "mes": "Noviembre",
                    "avance": datos[0].noviembre
                },
                {
                    "mes": "Diciembre",
                    "avance": datos[0].diciembre
                }


            ];
                 /*$.each(datos, function(i, item){
                    chartData.push({
                    "eess": datos[i].nombre,
                    "avance": datos[i].cob
                  });
                  });*/
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "mes";

                chart.color = "#000000";
                chart.fontSize = 14;
                chart.startDuration = 1;
                chart.plotAreaFillAlphas = 0.2;
                // the following two lines makes chart 3D
                chart.angle = 30;
                chart.depth3D = 30;
                chart.addTitle("Número de Niños Vacunados por Mes en la Micro Red",20);

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0.2;
                categoryAxis.gridPosition = "start";
                categoryAxis.gridColor = "#FFFFFF";
                categoryAxis.axisColor = "#000000";
                categoryAxis.axisAlpha = 0.5;
                categoryAxis.dashLength = 5;
                categoryAxis.labelRotation= 45;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.stackType = "3d"; // This line makes chart 3D stacked (columns are placed one behind another)
                valueAxis.gridAlpha = 0.2;
                valueAxis.gridColor = "#FFFFFF";
                valueAxis.axisColor = "#000000";
                valueAxis.axisAlpha = 0.5;
                valueAxis.dashLength = 5;
                valueAxis.title = "Nro. de Niños Vacunados";
                valueAxis.titleColor = "#000000";
                valueAxis.unit = "%";
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // first graph
                var graph1 = new AmCharts.AmGraph();
                graph1.title = "2004";
                graph1.valueField = "avance";
                graph1.type = "column";
                graph1.lineAlpha = 2;
                graph1.lineColor = "#73C1FC";

                graph1.fillAlphas = 1;
                graph1.balloonText = "Niños Vacunados en [[category]]: <b>[[value]]</b>";
                graph1.labelText = "[[avance]]";


                chart.addGraph(graph1);


                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chart.creditsPosition = "top-right";
                chart.write("chartdiv3",{"titles":[{"text":"hola","size":20}]});

};
</script>




<script>
    function graf5(datos){
            var chart;
            var chartData = [];
                  $.each(datos, function(i, item){
                    chartData.push({
                    "eess": datos[i].nombre,
                    "avance": datos[i].tot,
                    "meta": datos[i].meta
                  });
                  });
            //AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "eess";

                chart.color = "#000000";
                chart.fontSize = 14;
                chart.startDuration = 1;
                chart.plotAreaFillAlphas = 0.2;
                // the following two lines makes chart 3D
                chart.angle = 20;
                chart.depth3D = 120;
                chart.addTitle("Meta Fisica y Nro. de Niños Vacunados por Micro Red",20);

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0.2;
                categoryAxis.gridPosition = "start";
                categoryAxis.gridColor = "#FFFFFF";
                categoryAxis.axisColor = "#000000";
                categoryAxis.axisAlpha = 0.5;
                categoryAxis.dashLength = 5;
                categoryAxis.labelRotation= 45;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.stackType = "3d"; // This line makes chart 3D stacked (columns are placed one behind another)
                valueAxis.gridAlpha = 0.2;
                valueAxis.gridColor = "#FFFFFF";
                valueAxis.axisColor = "#000000";
                valueAxis.axisAlpha = 0.5;
                valueAxis.dashLength = 5;
                valueAxis.title = "Número de Niños";
                valueAxis.titleColor = "#000000";
                valueAxis.unit = "%";
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // first graph
                var graph1 = new AmCharts.AmGraph();
                graph1.title = "avance";
                graph1.valueField = "avance";
                graph1.type = "column";
                graph1.lineAlpha = 2;
                graph1.lineColor = "#D0D771";

                graph1.fillAlphas = 1;
                graph1.balloonText = "Niños Vacunados en [[category]]: <b>[[value]]</b>";
                graph1.labelText = "[[avance]]";


                chart.addGraph(graph1);

                // second graph
                var graph2 = new AmCharts.AmGraph();
                graph2.title = "meta";
                graph2.valueField = "meta";
                graph2.type = "column";
                graph2.lineAlpha = 0;
                graph2.lineColor = "#A7FA90";
                graph2.fillAlphas = 1;
                graph2.balloonText = "Meta Fisica [[category]]: <b>[[value]]</b>";
                graph2.labelText = "[[meta]]";

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chart.creditsPosition = "top-right";
                chart.addGraph(graph2);
                chart.write("chartdiv4");
              };
</script>




<script>
    function graf6(datos) {
            var chart;
            var chartData = [];
                  $.each(datos, function(i, item){
                    chartData.push({
                    "eess": datos[i].nombre,
                    "avance": accounting.toFixed(datos[i].cob,2)
                  });
                  });
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "eess";

                chart.color = "#000000";
                chart.fontSize = 14;
                chart.startDuration = 1;
                chart.plotAreaFillAlphas = 0.2;
                // the following two lines makes chart 3D
                chart.angle = 30;
                chart.depth3D = 30;
                chart.addTitle("Porcentaje de Cobertura por Micro Red",20);

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0.2;
                categoryAxis.gridPosition = "start";
                categoryAxis.gridColor = "#FFFFFF";
                categoryAxis.axisColor = "#000000";
                categoryAxis.axisAlpha = 0.5;
                categoryAxis.dashLength = 5;
                categoryAxis.labelRotation= 45;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.stackType = "3d"; // This line makes chart 3D stacked (columns are placed one behind another)
                valueAxis.gridAlpha = 0.2;
                valueAxis.gridColor = "#FFFFFF";
                valueAxis.axisColor = "#000000";
                valueAxis.axisAlpha = 0.5;
                valueAxis.dashLength = 5;
                valueAxis.title = "% de Cobertura";
                valueAxis.titleColor = "#000000";
                valueAxis.unit = "%";
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // first graph
                var graph1 = new AmCharts.AmGraph();
                graph1.title = "2004";
                graph1.valueField = "avance";
                graph1.type = "column";
                graph1.lineAlpha = 2;
                graph1.lineColor = "#73C1FC";

                graph1.fillAlphas = 1;
                graph1.balloonText = "Cobertura en [[category]]: <b>[[value]] %</b>";
                graph1.labelText = "[[avance]] %";


                chart.addGraph(graph1);


                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chart.creditsPosition = "top-right";
                chart.write("chartdiv5");

};
</script>



<script>
function graf7(datos) {
  var chart = AmCharts.makeChart("chartdiv6", {
  "theme": "light",
  "type": "gauge",
  "axes": [{
    "topTextFontSize": 20,
    "topTextYOffset": 70,
    "axisColor": "#31d6ea",
    "axisThickness": 1,
    "endValue": 100,
    "gridInside": true,
    "inside": true,
    "radius": "50%",
    "valueInterval": 10,
    "tickColor": "#67b7dc",
    "startAngle": -90,
    "endAngle": 90,
    "unit": "%",
    "bandOutlineAlpha": 0,
    "bands": [{
      "color": "#0080ff",
      "endValue": 100,
      "innerRadius": "105%",
      "radius": "170%",
      "gradientRatio": [0.5, 0, -0.5],
      "startValue": 0
    }, {
      "color": "#3cd3a3",
      "endValue": 0,
      "innerRadius": "105%",
      "radius": "170%",
      "gradientRatio": [0.5, 0, -0.5],
      "startValue": 0
    }]
  }],
  "titles":[{
    "text":"% de Cobertura Red Cusco Norte",
    "size":20
  }],
  "arrows": [{
    "alpha": 1,
    "innerRadius": "35%",
    "nailRadius": 0,
    "radius": "170%"
  }]
});

setInterval(randomValue, 1000);

// set random value
function randomValue() {
  //var value = Math.round(Math.random() * 100);
  chart.arrows[0].setValue(accounting.toFixed(datos[0].cob,2));
  chart.axes[0].setTopText(accounting.toFixed(datos[0].cob,2) + " %");
  // adjust darker band to new value
  chart.axes[0].bands[1].setEndValue(accounting.toFixed(datos[0].cob,2));
  }
};
</script>



<script>
    $(document).ready(function() {
      $("#micro_red").change(function() {
        $("#micro_red option:selected").each(function() {
          microred = $('#micro_red').val();

          $.post("<?php echo base_url();?>index.php/ipv3/graf_num_eess",{micro_red:microred}, function(dat){
            dt=JSON.parse(dat);
            graf1(dt)
          });

          $.post("<?php echo base_url();?>index.php/ipv3/graf_cob_eess",{micro_red:microred}, function(dat1){
            dt1=JSON.parse(dat1);
            graf2(dt1);
          });

          $.post("<?php echo base_url();?>index.php/ipv3/graf_num_micro_mes",{micro_red:microred}, function(dat2){
            dt2=JSON.parse(dat2);
            graf4(dt2);
          });


      });
});
});

</script>



<script>
    $(document).ready(function() {
      $("#eess").change(function() {
        $("#eess option:selected").each(function() {
          eess = $('#eess').val();
          $.post("<?php echo base_url();?>index.php/ipv3/graf_num_eess_mes",{eess:eess}, function(dat){
            dt=JSON.parse(dat);
            graf3(dt)
          });

      });
});
});

</script>




<center><h3>Seguimiento de Vacuna Anti Polio Tercera Dosis de Enero a Diciembre 2016</h3></center>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Por Red</a></li>
    <li><a href="#tabs-2">Por Micro Red</a></li>
    <li><a href="#tabs-3">Por Establecimiento</a></li>
  </ul>
  
  <div id="tabs-1">
      <div id="chartdiv6" style="width: 100%; height: 500px;"></div>
      <div id="container">
          <center>
          <table id="red" border="0" cellpadding="0" cellspacing="0" class="pretty">
          </table>
          </center>
      </div>
      <div id="chartdiv4" style="width: 100%; height: 600px;"></div>
      <div id="chartdiv5" style="width: 100%; height: 600px;"></div>
  </div>
  
  
  <!-- POR MICRO RED -->
  <div id="tabs-2">


    <form class="form-inline" role="form">
    <div class="form-group">
      <label class ="col-lg-4 control-label" for="micro_red">Micro Red: </label>
      <div class="col-lg-8">
      <select style="width:250px;" class="form-control input-md" name="micro_red" id="micro_red" placeholder="Seleccione una Micro Red">
        <option value="">Selecciona una Micro Red</option>
        <?php 
        foreach($micro_red as $fila)
        {
        ?>
          <option value="<?=$fila -> id ?>"><?=$fila -> nombre ?></option>
        <?php
        }
        ?>    
      </select>
      </div>
      </div>
    </form>
    <!--
    <div id="chartdiv7" style="width: 100%; height: 500px;"></div>
  -->
    <div id="container">
      <center>
      <table id="micro" border="0" cellpadding="0" cellspacing="0" class="pretty">
      </table>
      </center>
    </div>

    <div id="chartdiv" style="width: 100%; height: 600px;"></div>
    <div id="chartdiv1" style="width: 100%; height: 600px;"></div>
    <div id="chartdiv3" style="width: 100%; height: 600px;"></div>


  </div>


<!-- POR EESS -->
  <div id="tabs-3">
  
    <form class="form-inline" role="form">
      <div class="form-group">


        <label for="eess" class="col-lg-3 control-label">Establecimiento: </label>
        <div class="col-sm-9">
        <select style="width:300px;" class="form-control input-md" name="eess" id="eess">
            <option value="">Selecciona un Establecimiento</option>
          </select>
          </div>
        </div>
    </form>

    <div id="container1">
      <center>
      <table id="eesstab" border="0" cellpadding="0" cellspacing="0" class="pretty">
      </table>
      </center>
      <div id="chartdiv2" style="width: 100%; height: 600px;"></div>
    </div>



  </div>
</div>









