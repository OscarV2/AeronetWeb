
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Inicio">
                <a class="nav-link" href="#">
                    <i class="fa fa-fw fa-area-chart"></i>
                    <span class="nav-link-text">Inicio</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Nuevo Proyecto">
                <a class="nav-link" href="<?php echo site_url('Analista/validar');?>">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Validar Muestras</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Nuevo Proyecto">
                <a class="nav-link" href="<?php echo site_url('Analista/estaciones');?>">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Nuevo Informe</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('Welcome/cerrarSesion');?>">
                    <i class="fa fa-fw fa-sign-out"></i>Cerrar Sesion</a>
            </li>
        </ul>
    </div>
</nav>
<div class="content-wrapper">
    <div class="container-fluid">

        <div id="container">

        </div>

        <div id="container2">

        </div>

        <div id="media-movil">

        </div>

        <div id="rosa-vientos">

        </div>

        <div style="display:none">
            <!-- Source: http://or.water.usgs.gov/cgi-bin/grapher/graph_windrose.pl -->
            <table id="freq" border="0" cellspacing="0" cellpadding="0">
                <tr nowrap bgcolor="#CCCCFF">
                    <th colspan="9" class="hdr">Table of Frequencies (percent)</th>
                </tr>
                <tr nowrap bgcolor="#CCCCFF">
                    <th class="freq">Direction</th>
                    <th class="freq">&lt; 0.5 m/s</th>
                    <th class="freq">0.5-2 m/s</th>
                    <th class="freq">2-4 m/s</th>
                    <th class="freq">4-6 m/s</th>
                    <th class="freq">6-8 m/s</th>
                    <th class="freq">8-10 m/s</th>
                    <th class="freq">&gt; 10 m/s</th>
                    <th class="freq">Total</th>
                </tr>
                <tr nowrap>
                    <td class="dir">N</td>
                    <td class="data">1.81</td>
                    <td class="data">1.78</td>
                    <td class="data">0.16</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">3.75</td>
                </tr>
                <tr nowrap bgcolor="#DDDDDD">
                    <td class="dir">NNE</td>
                    <td class="data">0.62</td>
                    <td class="data">1.09</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">1.71</td>
                </tr>
                <tr nowrap>
                    <td class="dir">NE</td>
                    <td class="data">0.82</td>
                    <td class="data">0.82</td>
                    <td class="data">0.07</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">1.71</td>
                </tr>
                <tr nowrap bgcolor="#DDDDDD">
                    <td class="dir">ENE</td>
                    <td class="data">0.59</td>
                    <td class="data">1.22</td>
                    <td class="data">0.07</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">1.88</td>
                </tr>
                <tr nowrap>
                    <td class="dir">E</td>
                    <td class="data">0.62</td>
                    <td class="data">2.20</td>
                    <td class="data">0.49</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">3.32</td>
                </tr>
                <tr nowrap bgcolor="#DDDDDD">
                    <td class="dir">ESE</td>
                    <td class="data">1.22</td>
                    <td class="data">2.01</td>
                    <td class="data">1.55</td>
                    <td class="data">0.30</td>
                    <td class="data">0.13</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">5.20</td>
                </tr>
                <tr nowrap>
                    <td class="dir">SE</td>
                    <td class="data">1.61</td>
                    <td class="data">3.06</td>
                    <td class="data">2.37</td>
                    <td class="data">2.14</td>
                    <td class="data">1.74</td>
                    <td class="data">0.39</td>
                    <td class="data">0.13</td>
                    <td class="data">11.45</td>
                </tr>
                <tr nowrap bgcolor="#DDDDDD">
                    <td class="dir">SSE</td>
                    <td class="data">2.04</td>
                    <td class="data">3.42</td>
                    <td class="data">1.97</td>
                    <td class="data">0.86</td>
                    <td class="data">0.53</td>
                    <td class="data">0.49</td>
                    <td class="data">0.00</td>
                    <td class="data">9.31</td>
                </tr>
                <tr nowrap>
                    <td class="dir">S</td>
                    <td class="data">2.66</td>
                    <td class="data">4.74</td>
                    <td class="data">0.43</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">7.83</td>
                </tr>
                <tr nowrap bgcolor="#DDDDDD">
                    <td class="dir">SSW</td>
                    <td class="data">2.96</td>
                    <td class="data">4.14</td>
                    <td class="data">0.26</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">7.37</td>
                </tr>
                <tr nowrap>
                    <td class="dir">SW</td>
                    <td class="data">2.53</td>
                    <td class="data">4.01</td>
                    <td class="data">1.22</td>
                    <td class="data">0.49</td>
                    <td class="data">0.13</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">8.39</td>
                </tr>
                <tr nowrap bgcolor="#DDDDDD">
                    <td class="dir">WSW</td>
                    <td class="data">1.97</td>
                    <td class="data">2.66</td>
                    <td class="data">1.97</td>
                    <td class="data">0.79</td>
                    <td class="data">0.30</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">7.70</td>
                </tr>
                <tr nowrap>
                    <td class="dir">W</td>
                    <td class="data">1.64</td>
                    <td class="data">1.71</td>
                    <td class="data">0.92</td>
                    <td class="data">1.45</td>
                    <td class="data">0.26</td>
                    <td class="data">0.10</td>
                    <td class="data">0.00</td>
                    <td class="data">6.09</td>
                </tr>
                <tr nowrap bgcolor="#DDDDDD">
                    <td class="dir">WNW</td>
                    <td class="data">1.32</td>
                    <td class="data">2.40</td>
                    <td class="data">0.99</td>
                    <td class="data">1.61</td>
                    <td class="data">0.33</td>
                    <td class="data">0.00</td>
                    <td class="data">0.00</td>
                    <td class="data">6.64</td>
                </tr>
                <tr nowrap>
                    <td class="dir">NW</td>
                    <td class="data">1.58</td>
                    <td class="data">4.28</td>
                    <td class="data">1.28</td>
                    <td class="data">0.76</td>
                    <td class="data">0.66</td>
                    <td class="data">0.69</td>
                    <td class="data">0.03</td>
                    <td class="data">9.28</td>
                </tr>
                <tr nowrap bgcolor="#DDDDDD">
                    <td class="dir">NNW</td>
                    <td class="data">1.51</td>
                    <td class="data">5.00</td>
                    <td class="data">1.32</td>
                    <td class="data">0.13</td>
                    <td class="data">0.23</td>
                    <td class="data">0.13</td>
                    <td class="data">0.07</td>
                    <td class="data">8.39</td>
                </tr>
                <tr nowrap>
                    <td class="totals">Total</td>
                    <td class="totals">25.53</td>
                    <td class="totals">44.54</td>
                    <td class="totals">15.07</td>
                    <td class="totals">8.52</td>
                    <td class="totals">4.31</td>
                    <td class="totals">1.81</td>
                    <td class="totals">0.23</td>
                    <td class="totals">&nbsp;</td>
                </tr>
            </table>
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © Qualis 2017</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Seguro quieres salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Haz click en "Cerrar" si estas seguro de terminar con la sesion actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="#">Cerrar</a>
                </div>
            </div>
        </div>
    </div>
   </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>

    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

    <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.js')?>"></script>

    <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.js')?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin.min.js')?>"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo base_url('assets/js/sb-admin-datatables.min.js')?>"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script>
        Highcharts.chart('container', {

            title: {
                text: 'Precipitaciones ultimos meses'
            },
            xAxis: {
                categories: ['1', '4', '8',
                    '12', '16', '20', '24', '27']
            },
            yAxis: {
                title: {
                    text: 'Precipitacion(mm)'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    }
                }
            },

            series: [{
                name: 'Enero',
                data: [43, 52, 57, 69, 97, 117, 137, 154]
            }, {
                name: 'Febrero',
                data: [24, 24, 29, 29, 32, 30, 38, 40]
            }, {
                name: 'Marzo',
                data: [12, 5, 8, 11, 8, 11, 18, 18]
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });

        Highcharts.chart('container2', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Filtros'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'PM10',
                    y: 61,
                    sliced: true,
                    selected: true
                }, {
                    name: 'PST',
                    y: 23
                }, {
                    name: 'PM2.5',
                    y: 10
                }]
            }]
        });

        Highcharts.chart('rosa-vientos', {
            data: {
                table: 'freq',
                startRow: 1,
                endRow: 17,
                endColumn: 7
            },

            chart: {
                polar: true,
                type: 'column'
            },

            title: {
                text: 'Rosa de vientos de la estacion meteorologica...'
            },

            subtitle: {
                text: 'Fuente: '
            },

            pane: {
                size: '85%'
            },

            legend: {
                align: 'right',
                verticalAlign: 'top',
                y: 100,
                layout: 'vertical'
            },

            xAxis: {
                tickmarkPlacement: 'on'
            },

            yAxis: {
                min: 0,
                endOnTick: false,
                showLastLabel: true,
                title: {
                    text: 'Frecuencia (%)'
                },
                labels: {
                    formatter: function () {
                        return this.value + '%';
                    }
                },
                reversedStacks: false
            },

            tooltip: {
                valueSuffix: '%'
            },

            plotOptions: {
                series: {
                    stacking: 'normal',
                    shadow: false,
                    groupPadding: 0,
                    pointPlacement: 'on'
                }
            }
        });

        Highcharts.chart('media-movil', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Media Movil muestras tomadas desde 2017'
            },
            xAxis: {
                categories: ['Abr', 'May', 'Jun',
                    'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic', 'Ene', 'Feb', 'Mar',]
            },
            yAxis: {
                title: {
                    text: 'Temperature'
                },
                labels: {
                    formatter: function () {
                        return this.value + '°';
                    }
                }
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                name: 'Tokyo',
                marker: {
                    symbol: 'square'
                },
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, {
                    y: 26.5,
                    marker: {
                        symbol: 'url(https://www.highcharts.com/samples/graphics/sun.png)'
                    }
                }, 23.3, 18.3, 13.9, 9.6]

            }, {
                name: 'London',
                marker: {
                    symbol: 'diamond'
                },
                data: [{
                    y: 3.9,
                    marker: {
                        symbol: 'url(https://www.highcharts.com/samples/graphics/snow.png)'
                    }
                }, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
            }]
        });
    </script>

    </body>

</html>
