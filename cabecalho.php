<?php
	$ini = parse_ini_file('config.ini');
	$base_url = $ini['base_url'];
	$projeto = $ini['projeto'];
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $projeto ?></title>

    <!-- Bootstrap -->
    <link href=<?php echo $base_url."vendors/bootstrap/dist/css/bootstrap.min.css" ?> rel="stylesheet">
    <!-- Font Awesome -->
    <link href=<?php echo $base_url."vendors/font-awesome/css/font-awesome.min.css" ?> rel="stylesheet">
    <!-- NProgress -->
    <link href=<?php echo $base_url."vendors/nprogress/nprogress.css" ?> rel="stylesheet">
    <!-- iCheck -->
    <link href=<?php echo $base_url."vendors/iCheck/skins/flat/green.css" ?> rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href=<?php echo $base_url."vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" ?> rel="stylesheet">
    <!-- JQVMap -->
    <link href=<?php echo $base_url."vendors/jqvmap/dist/jqvmap.min.css" ?> rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href=<?php echo $base_url."build/css/custom.min.css" ?> rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href=<?php echo $base_url."index.php"?> class="site_title"><i class="fa fa-cogs"></i> <span><?php echo $projeto ?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src=<?php echo $base_url."images/img.jpg" ?> alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bem vindo,</span>
                <h2>Ricardo Moreti</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">

                  <li><a><i class="fa fa-edit"></i> Cadastros <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href=<?php echo $base_url."pessoas/busca_pessoas.php?Status=1" ?>>Pessoas</a></li>
                        <li><a href=<?php echo $base_url."usuarios/busca_usuarios.php?Status=1" ?>>Usuários</a></li>
                        <li><a href=<?php echo $base_url."vendedores/busca_vendedores.php?Status=1" ?>>Vendedores</a></li>
                        <li><a href=<?php echo $base_url."concorrentes/busca_concorrentes.php?Status=1" ?>>Concorrentes</a></li>
                    </ul>
                  </li>     

                  <li><a><i class="fa fa-home"></i> Obras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href=<?php echo $base_url."obrasfase/busca_obras_fase.php?Status=1" ?>>Fases</a></li>
                        <li><a href=<?php echo $base_url."obrastipo/busca_obras_tipo.php?Status=1" ?>>Tipos</a></li>
                        <li><a href=<?php echo $base_url."obraspadrao/busca_obras_padrao.php?Status=1" ?>>Padrões</a></li>
                        <li><a href=<?php echo $base_url."obrasstatusacomp/busca_obras_status_acomp.php?Status=1" ?>>Status de Acompanhamento</a></li>
                    </ul>
                  </li>     

                  <li><a><i class="fa fa-files-o"></i> Relatórios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#">Pessoas</a></li>
                        <li><a href="#">Produtos</a></li>
                    </ul>
                  </li> 

                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src=<?php echo $base_url."images/img.jpg" ?> alt="">Ricardo Moreti
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                    <li><a href="javascript:;"> Configurações</a></li>
                    <li><a href="javascript:;"> Ajuda</a></li>
                    <li><a href=<?php echo $base_url."login.php"?>><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>

        <!-- page content -->
        <div class="right_col" role="main">
      

    <!-- jQuery -->
    <script src=<?php echo $base_url."vendors/jquery/dist/jquery.min.js"?>></script>
    <!-- Bootstrap -->
    <script src=<?php echo $base_url."vendors/bootstrap/dist/js/bootstrap.min.js"?>></script>
    <!-- FastClick -->
    <script src=<?php echo $base_url."vendors/fastclick/lib/fastclick.js"?>></script>
    <!-- NProgress -->
    <script src=<?php echo $base_url."vendors/nprogress/nprogress.js"?>></script>
    <!-- Chart.js -->
    <script src=<?php echo $base_url."vendors/Chart.js/dist/Chart.min.js"?>></script>
    <!-- gauge.js -->
    <script src=<?php echo $base_url."vendors/gauge.js/dist/gauge.min.js"?>></script>
    <!-- bootstrap-progressbar -->
    <script src=<?php echo $base_url."vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"?>></script>
    <!-- iCheck -->
    <script src=<?php echo $base_url."vendors/iCheck/icheck.min.js"?>></script>
    <!-- Skycons -->
    <script src=<?php echo $base_url."vendors/skycons/skycons.js"?>></script>
    <!-- Flot -->
    <script src=<?php echo $base_url."vendors/Flot/jquery.flot.js"?>></script>
    <script src=<?php echo $base_url."vendors/Flot/jquery.flot.pie.js"?>></script>
    <script src=<?php echo $base_url."vendors/Flot/jquery.flot.time.js"?>></script>
    <script src=<?php echo $base_url."vendors/Flot/jquery.flot.stack.js"?>></script>
    <script src=<?php echo $base_url."vendors/Flot/jquery.flot.resize.js"?>></script>
    <!-- Flot plugins -->
    <script src=<?php echo $base_url."vendors/flot.orderbars/js/jquery.flot.orderBars.js"?>></script>
    <script src=<?php echo $base_url."vendors/flot-spline/js/jquery.flot.spline.min.js"?>></script>
    <script src=<?php echo $base_url."vendors/flot.curvedlines/curvedLines.js"?>></script>
    <!-- DateJS -->
    <script src=<?php echo $base_url."vendors/DateJS/build/date.js"?>></script>
    <!-- JQVMap -->
    <script src=<?php echo $base_url."vendors/jqvmap/dist/jquery.vmap.js"?>></script>
    <script src=<?php echo $base_url."vendors/jqvmap/dist/maps/jquery.vmap.world.js"?>></script>
    <script src=<?php echo $base_url."vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"?>></script>
    <!-- bootstrap-daterangepicker -->
    <script src=<?php echo $base_url."js/moment/moment.min.js"?>></script>
    <script src=<?php echo $base_url."js/datepicker/daterangepicker.js"?>></script>

    <!-- Custom Theme Scripts -->
    <script src=<?php echo $base_url."build/js/custom.min.js"?>></script>

    <!-- VIA CEP -->
    <script src=<?php echo $base_url."js/busca-cep.js"?>></script>

    <!-- Flot -->
    <script>
      $(document).ready(function() {
        var data1 = [
          [gd(2012, 1, 1), 17],
          [gd(2012, 1, 2), 74],
          [gd(2012, 1, 3), 6],
          [gd(2012, 1, 4), 39],
          [gd(2012, 1, 5), 20],
          [gd(2012, 1, 6), 85],
          [gd(2012, 1, 7), 7]
        ];

        var data2 = [
          [gd(2012, 1, 1), 82],
          [gd(2012, 1, 2), 23],
          [gd(2012, 1, 3), 66],
          [gd(2012, 1, 4), 9],
          [gd(2012, 1, 5), 119],
          [gd(2012, 1, 6), 6],
          [gd(2012, 1, 7), 9]
        ];
        $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
          data1, data2
        ], {
          series: {
            lines: {
              show: false,
              fill: true
            },
            splines: {
              show: true,
              tension: 0.4,
              lineWidth: 1,
              fill: 0.4
            },
            points: {
              radius: 0,
              show: true
            },
            shadowSize: 2
          },
          grid: {
            verticalLines: true,
            hoverable: true,
            clickable: true,
            tickColor: "#d5d5d5",
            borderWidth: 1,
            color: '#fff'
          },
          colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
          xaxis: {
            tickColor: "rgba(51, 51, 51, 0.06)",
            mode: "time",
            tickSize: [1, "day"],
            //tickLength: 10,
            axisLabel: "Date",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10
          },
          yaxis: {
            ticks: 8,
            tickColor: "rgba(51, 51, 51, 0.06)",
          },
          tooltip: false
        });

        function gd(year, month, day) {
          return new Date(year, month - 1, day).getTime();
        }
      });
    </script>
    <!-- /Flot -->

    <!-- JQVMap -->
    <script>
      $(document).ready(function(){
        $('#world-map-gdp').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#666666',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#E6F2F0', '#149B7E'],
            normalizeFunction: 'polynomial'
        });
      });
    </script>
    <!-- /JQVMap -->

    <!-- Skycons -->
    <script>
      $(document).ready(function() {
        var icons = new Skycons({
            "color": "#73879C"
          }),
          list = [
            "clear-day", "clear-night", "partly-cloudy-day",
            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
            "fog"
          ],
          i;

        for (i = list.length; i--;)
          icons.set(list[i], list[i]);

        icons.play();
      });
    </script>
    <!-- /Skycons -->

    <!-- Doughnut Chart -->
    <script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        new Chart(document.getElementById("canvas1"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Symbian",
              "Blackberry",
              "Other",
              "Android",
              "IOS"
            ],
            datasets: [{
              data: [15, 20, 30, 10, 30],
              backgroundColor: [
                "#BDC3C7",
                "#9B59B6",
                "#E74C3C",
                "#26B99A",
                "#3498DB"
              ],
              hoverBackgroundColor: [
                "#CFD4D8",
                "#B370CF",
                "#E95E4F",
                "#36CAAB",
                "#49A9EA"
              ]
            }]
          },
          options: options
        });
      });
    </script>
    <!-- /Doughnut Chart -->
    
    <!-- bootstrap-daterangepicker -->
    <script>
      $(document).ready(function() {

        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        };

        var optionSet1 = {
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
          minDate: '01/01/2012',
          maxDate: '12/31/2015',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          opens: 'left',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'MM/DD/YYYY',
          separator: ' to ',
          locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
          }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function() {
          console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function() {
          console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });
        $('#options1').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
          $('#reportrange').data('daterangepicker').remove();
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->

    <!-- gauge.js -->
    <script>
      var opts = {
          lines: 12,
          angle: 0,
          lineWidth: 0.4,
          pointer: {
              length: 0.75,
              strokeWidth: 0.042,
              color: '#1D212A'
          },
          limitMax: 'false',
          colorStart: '#1ABC9C',
          colorStop: '#1ABC9C',
          strokeColor: '#F0F3F3',
          generateGradient: true
      };
      var target = document.getElementById('foo'),
          gauge = new Gauge(target).setOptions(opts);

      gauge.maxValue = 6000;
      gauge.animationSpeed = 32;
      gauge.set(3200);
      gauge.setTextField(document.getElementById("gauge-text"));
    </script>
    <!-- /gauge.js -->