<!DOCTYPE html>
<html lang="en">

<head>
    <title>Material Able bootstrap admin template by Codedthemes</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="Codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- morris chart -->
    <link rel="stylesheet" type="text/css" href="assets/css/morris.js/css/morris.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
</head>

<body>
    <!-- Pre-loader start
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     -->
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div ></div>
        <div >
            

            <div >
                <div>
                   
                    <div >
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Monitorizador de Estufa</h5>
                                            <p class="m-b-0">SE - 2021/2022</p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">

                               <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            
                                           
                                            <!-- Material statustic card end -->
                                            <!-- order-visitor start -->


                                            <!-- order-visitor end -->

                                            <!--  sale analytics start -->
                                            <div class="col-xl-6 col-md-12">
                                                <div class="card table-card">
                                                    <div class="card-header">
                                                        <h5>Leitura de dados ao momento</h5>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                                <li><i class="fa fa-trash close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover m-b-0 without-header">
                                                                <tbody>

<?php

$ligacao=pg_pconnect("host=localhost port=5432 dbname=projetoSE user=postgres password=martinho");

$pg='SELECT temperatura, "hAr", "hSolo", co2, "createdAt" FROM dados ORDER BY id DESC limit 5';
$resultado=pg_query($ligacao,$pg);
while($linha=pg_fetch_row($resultado))
{
$hora = explode(" ", $linha[4])[1];
$hora = explode(":",$hora);
$final = ($hora[0] . ":" . $hora[1]);
        echo '<tr>';                                                                 
        echo '<td>';                                                                    
        echo '<div class="d-inline-block align-middle">';                                                                                                                                
        echo '</div>';                                                                   
        echo '</td>';                                                       
        echo ' <td class="text-right">';                                                             
        echo '<h6 class="f-w-700">Temp: '.$linha[0].' ºC  &nbsp;  &nbsp;  |  &nbsp;  &nbsp;  &nbsp; Hmd. Ar: '.$linha[1].' %  &nbsp;   &nbsp;  |  &nbsp;  &nbsp;  &nbsp;  Hmd. Solo: '.round(map($linha[2],0,1024,0,100),2).' %   &nbsp;   &nbsp; |  &nbsp;  &nbsp;  &nbsp;  CO2: '.$linha[3].'  &nbsp;   &nbsp; -  &nbsp;  '.$final.' <i class="fas fa-level-down-alt text-c-red m-l-10"></i></h6>';                                                                 
        echo '</td>';                                                             
        echo '  </tr>';                                                      

         
}
pg_close($ligacao);
?>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-12">
                                                <div class="row">
                                                    <!-- sale card start -->

                                                    <div class="col-md-6">
                                                        <div class="card text-center order-visitor-card">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0">Humidade solo</h6>
                                                               
                                                                    <?php

function map($value, $fromLow, $fromHigh, $toLow, $toHigh) {
    $fromRange = $fromHigh - $fromLow;
    $toRange = $toHigh - $toLow;
    $scaleFactor = $toRange / $fromRange;

    // Re-zero the value within the from range
    $tmpValue = $value - $fromLow;
    // Rescale the value to the to range
    $tmpValue *= $scaleFactor;
    // Re-zero back to the to range
    return $tmpValue + $toLow;
}

$ligacao=pg_pconnect("host=localhost port=5432 dbname=projetoSE user=postgres password=martinho");

$pg='SELECT cast(avg("hSolo") as decimal(10, 2)) FROM dados' ;

$resultado=pg_query($ligacao,$pg);
$linha=pg_fetch_row($resultado);
        echo ' <h4 class="m-t-15 m-b-15"> '.round(map($linha[0],0,1024,0,100),2).'% </h4>';         

pg_close($ligacao);
?>
                                                                
                                                                <p class="m-b-0">Média diária</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     
                                                    <div class="col-md-6">
                                                        <div class="card text-center order-visitor-card">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0">Humidade ar</h6>
                                                                         <?php

$ligacao=pg_pconnect("host=localhost port=5432 dbname=projetoSE user=postgres password=martinho");

$pg='SELECT cast(avg("hAr") as decimal(10, 2)) FROM dados' ;

$resultado=pg_query($ligacao,$pg);
$linha=pg_fetch_row($resultado);
        echo ' <h4 class="m-t-15 m-b-15"> '.$linha[0].'% </h4>';         

pg_close($ligacao);
?>                                                              
                                                                <p class="m-b-0">Média diária</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-6">
                                                        <div class="card text-center order-visitor-card">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0">Temperatura</h6>
                                                                         <?php

$ligacao=pg_pconnect("host=localhost port=5432 dbname=projetoSE user=postgres password=martinho");

$pg='SELECT cast(avg("temperatura") as decimal(10, 2)) FROM dados' ;

$resultado=pg_query($ligacao,$pg);
$linha=pg_fetch_row($resultado);
        echo ' <h4 class="m-t-15 m-b-15"> '.$linha[0].' ºC</h4>';         

pg_close($ligacao);
?>                                                                  
                                                                <p class="m-b-0">Média diária</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="card text-center order-visitor-card">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0">Última rega</h6>                                            
<?php

$ligacao=pg_pconnect("host=localhost port=5432 dbname=projetoSE user=postgres password=martinho");

$pg='SELECT "createdAt" FROM regas ORDER BY id DESC limit 1';

$resultado=pg_query($ligacao,$pg);
$linha=pg_fetch_row($resultado);
$hora = explode(" ", $linha[0]);
$data = $hora[0];
$hora = explode(":",$hora[1]);

$Hfinal = ($hora[0] . ":" . $hora[1]);
        echo ' <h5 class="m-t-15 m-b-15"> '.$data.' '.$Hfinal.' </h5>';         

pg_close($ligacao);
?>                                                                          
                                                            </div>
                                                            <div class="card-block">
                                                                <h6 class="m-b-0">Última ventilação:</h6>                                            
<?php

$ligacao=pg_pconnect("host=localhost port=5432 dbname=projetoSE user=postgres password=martinho");

$pg='SELECT "janela" FROM janelas ORDER BY id DESC limit 1';

$resultado=pg_query($ligacao,$pg);
$linha=pg_fetch_row($resultado);
$hora = explode(" ", $linha[0]);
$data = $hora[0];
$hora = explode(":",$hora[1]);

$Hfinal = ($hora[0] . ":" . $hora[1]);
        echo ' <h5 class="m-t-15 m-b-15"> '.$data.' '.$Hfinal.' </h5>';         

pg_close($ligacao);
?>                                                                          
                                                            </div>
                                                        </div>
                                                    </div>
 <form method="get" action="remove.php">
    <button type="submit">Reset ao monitorizador</button>
</form>
                                                   
                                                    <!-- sale card end -->
                                                </div>
                                            </div>
                                            <!--  sale analytics end -->
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                              
                            </div>
                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- Morris Chart js -->
    <script src="assets/js/raphael/raphael.min.js"></script>
    <script src="assets/js/morris.js/morris.js"></script>
    <!-- Custom js -->
    <script src="assets/pages/chart/morris/morris-custom-chart.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical/vertical-layout.min.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>
