<?php
session_start();
require 'includes/steam_api.php';
require 'includes/openid.php';

try {
    # Change 'example.org' to your domain name.
    $domain = 'localhost:8080/';
    $openid = new LightOpenID($domain);
    
    if (!$openid->mode) {
        if (isset($_GET['login'])) {
            $openid->identity = 'http://steamcommunity.com/openid/?l=english';
      	    echo "<script>window.location.href='".$openid->authUrl()."';</script>";
        } 

    }

    if (!$openid->mode) {
        if (isset($_GET['cerrarsesion'])) {
            session_destroy();
      	    echo "<script>window.location.href='index.php';</script>";
        } 

    }


    if(!$openid->mode) {
    } elseif($openid->mode == 'cancel') {
        echo 'User has cancelled authentication!';
    } elseif($openid->validate()) {
	    $id = $openid->identity;
	    $ptn = '/^http:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/';
           	   

            $_SESSION["steamID"] = substr($id,37);
	
	    echo "<script>window.location.href='index.php';</script>";

	   	                
    } else {throw new Exception("Error processing login."); }

} catch(ErrorException $e) {
    echo $e->getMessage();
}

?>

<!DOCTYPE html>
<!-- saved from url=(0040)https://www.rite-tags.com/html/ritekhed/ -->
<html lang="zxx" ng-app="app"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >

    <!-- meta tags -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>COH 1 LATIONOAMÉRICA</title>

    <!-- CSS -->
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="fontawesome-all.css">
    <link rel="stylesheet" href="slick-slider.css">
    <link rel="stylesheet" href="fancybox.css">
    <link rel="stylesheet" href="smartmenus.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="color.css">
    <link rel="stylesheet" href="responsive.css">

<script type="text/javascript" charset="UTF-8" src="common.js"></script>
<script type="text/javascript" charset="UTF-8" src="util.js"></script>
<script type="text/javascript" charset="UTF-8" src="angular.min.js"></script>
<script type="text/javascript" charset="UTF-8" src="angular-route.min.js"></script>
<script type="text/javascript" charset="UTF-8" src="app.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


<script type="text/javascript">
    $(document).ready(function(){
        $("#name1").tooltip({
            placement:"right"
        });              
        $("#email1").tooltip({
            placement:"right"
        });              
        $(".tool").tooltip({
            selector: "img[rel=tooltip]",
            placement:"right"
        });              
        $("#address1").tooltip({
            placement:"right"
        }); 
        $("#remem").tooltip({
            placement:"right"
        });                                      
    });
</script>    

<style>



    .tooltip{
        position:absolute;
        z-index:1020;
        display:block;
        visibility:visible;
        
        font-size:13px;
        opacity:0;
        filter:alpha(opacity=0)
        
    }
    .tooltip.in{
        opacity:.8;
        filter:alpha(opacity=80)
    }
    
    
    .tooltip-inner{
        width:1000px;
        color:#FFF;
        text-align:center;
        background: #5CB85C; 
        -webkit-border-radius:5px;
        -moz-border-radius:5px;
        border-radius:5px;
        border: 1px solid #314A5B;
    }
    
    
    .tooltip-arrow{
        position:absolute;
        width:0;
        height:0
    }
    /*A class for form controls*/
    .inputstl { 
        
    
        } 


        .box{
        position: relative;
        display: inline-block; /* Make the width of box same as image */
    }
    .box .text{
        position: relative;
        z-index: 1021;
        margin: 0 auto;
        left: 0;
        right: 0;        
        text-align: center;
        top: -10; /* Adjust this value to move the positioned div up and down */
        background: rgb(5, 183, 228);
        font-family: Arial,sans-serif;
        color: rgb(17, 163, 231);
        width: 100%; /* Set the width of the positioned div */
    }
           
    </style>

</head>

<body class="home" ng-controller="controlador as equipos">
<div id="ritekhed-header" class="ritekhed-header-one">
            
            <!-- Top Strip -->
            <div class="ritekhed-top-strip ritekhed-bgcolor-two">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="ritekhed-top-strip-social">
                                <li><a target="blank_" href="https://www.facebook.com/groups/companyofheroes1y2/"><input type='image' src='https://cdn4.iconfinder.com/data/icons/social-media-icons-the-circle-set/48/facebook_circle-512.png' width='40' height='40'></a></li>
                                <li><a target="blank_" href="https://discord.gg/vfEggD"><input type='image' src='https://cdn.icon-icons.com/icons2/1476/PNG/512/discord_101785.png' width='40' height='40'></a></li>
                            	<li><a target="blank_" href="https://chat.whatsapp.com/ISEdL2EhapnBMtY47Yalfj"><input type='image' src='https://cdn3.iconfinder.com/data/icons/popular-services-brands/512/whatsapp-512.png' width='40' height='40'></a></li>
                            </ul>
                            <ul class="ritekhed-user-section">
                                                          <li> <?php 
									if(!isset($_SESSION["steamID"])) { 
										echo "<form action='index.php?login' method='post'>";
       										echo "<input type='image' src='https://tradeback.io/img/site/steam-auth.png' width='170' height='40'>";
        									echo "</form>"; 
									}
								       else {
										$profilePicURL = 'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=' . $apiKey . '&steamids=' . $_SESSION["steamID"]; 
                   								$json_object = file_get_contents($profilePicURL);
                   								$json_decoded = json_decode($json_object, true);
										echo "<div style='display: table;'>";
                   								echo "<span><img src=\"" . $json_decoded['response']['players'][0]['avatarfull'] . "\" width='64' height='64'></span>";
										echo "<span style='font-size:20px; color:white;'>".$json_decoded['response']['players'][0]['personaname']."</span>";
										echo "</div>";
        								echo "<li><a href='index.php?cerrarsesion' class='fab fa-dribbble' >Cerrar Sesion</a></li>";
									}
								?>
							   </li>
 			  
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Top Strip -->

      
        </div>

    <div class="ritekhed-wrapper">
        
       
        <!-- Banner -->
        <div class="ritekhed-banner slick-initialized slick-slider">
            <div class="slick-list draggable">
                <div class="slick-track" style="opacity: 1; width: 4047px;">
                    <div class="ritekhed-banner-layer slick-slide" data-slick-index="0" aria-hidden="true" tabindex="-1" style="width: 1349px; position: relative; left: 0px; top: 0px; z-index: 998; opacity: 0; transition: opacity 1000ms ease 0s;">
                        <span class="ritekhed-banner-transparent"></span>
                        <img src="./banner4.jpg" alt="">
                        <div class="ritekhed-banner-caption">
                            <div class="container">
                                <h1>We Are Developing The <strong class="ritekhed-color">Game</strong> Be Our Partner</h1>
                                <div class="clearfix"></div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac malesuada ante Curabitur lacinia diam tempus tempor consectetur. Sed vitae dignissim purueget aliquam libero.</p>
                            </div>
                        </div>
                    </div>
                    <div class="ritekhed-banner-layer slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 1349px; position: relative; left: -1349px; top: 0px; z-index: 999; opacity: 1;">
                        <span class="ritekhed-banner-transparent"></span>
                        <img src="./banner4.jpg" alt="">
                        <div class="ritekhed-banner-caption ritekhed-center-align">
                            <div class="container">
                                <a href="" ng-click="equipos.ShowProximosEncuentros()"><h1><strong class="ritekhed-color">Company Of Heroes 1</strong> Latinoamérica</h1></a>


                                <div class="row ritekhed-iframe" ng-show="equipos.ShowEncuentrosBloqueado">
                                    
                                    <iframe src="http://free.timeanddate.com/countdown/i7eucaba/n227/cf111/cm0/cu4/ct0/cs1/ca0/co1/cr0/ss0/cac000/cpc000/pc66c/tc66c/fs140/szw320/szh135/tatCierre%20de%20registro%20de%20equipos/tac000/tpc000/iso2020-08-16T23:59:59" allowTransparency="true" frameborder="0" width="1000" height="135" aling="center"></iframe>
                                        
                                </div>
                               

                                <div class="row">
                                    <h2><strong class="ritekhed-color">Torneo 2 vs 2</strong></h2>
                                    <div class="col-md-6" ng-show="equipos.ShowEncuentros && !equipos.ShowEncuentrosBloqueado">
                                        <div class="ritekhed-classic-heading">
                                            <h2>Próximo encuentro</h2>
                                        </div>
                                        <div class="ritekhed-nextmatch">
                                            <ul class="ritekhed-team-matches">
                                                <li class="tool">
                                                    <a href=""><img src="{{equipos.ProximosEncuentros[0].emblema}}" alt="" class="inputstl" id="password1" title="
                                                        
                                                        <div class='box'>
                                                            <img src='banderas/ar.png' alt='Flying Kites' width='110' height='20'>
                                                            <div class='text'>
                                                                <h5>skeletor21447</h5>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class='box'>
                                                            <img src='banderas/mx.png' alt='Flying Kites' width='110' height='20'>
                                                            <div class='text'>
                                                                <h5>skeletor1447</h5>
                                                            </div>
                                                        </div>
                                                    
                                                        
                                                        " data-html="true" rel="tooltip" >
                                                        
                                                    <span>{{equipos.ProximosEncuentros[0].nombreEquipo}}</span></a>
                                                </li>
                                                <li><small>{{equipos.ProximosEncuentros[0].diaSemana}}</small>
                                                    <time class="ritekhed-color" datetime="2008-02-14 20:00">{{equipos.ProximosEncuentros[0].diaConMes}}</time> <small>{{equipos.ProximosEncuentros[0].hora}}</small></li>
                                                <li>
                                                    <a href=""><img src="{{equipos.ProximosEncuentros[1].emblema}}" alt=""> <span>{{equipos.ProximosEncuentros[1].nombreEquipo}}</span></a>
                                                </li>
                                            </ul>
                                            <div id="ritekhed-match-countdown" class="ritekhed-match-countdown is-countdown"><span class="countdown-row countdown-show4"><span class="countdown-section"><span class="countdown-amount">517</span><span class="countdown-period">Days</span></span><span class="countdown-section"><span class="countdown-amount">19</span><span class="countdown-period">Hrs</span></span><span class="countdown-section"><span class="countdown-amount">52</span><span class="countdown-period">Min</span></span><span class="countdown-section"><span class="countdown-amount">31</span><span class="countdown-period">Sec</span></span></span></div>
                                            <a href="" class="ritekhed-ticket-button ritekhed-bgcolor">Ver transmición</a>
                                        </div>
                                    </div>

                                    <div class="col-md-6" ng-show="equipos.ShowEncuentros && !equipos.ShowEncuentrosBloqueado">
                                        <div class="ritekhed-classic-heading">
                                            <h2>Próximo encuentro</h2>
                                        </div>
                                        <div class="ritekhed-nextmatch">
                                            <ul class="ritekhed-team-matches">
                                                <li>
                                                    <a href=""><img src="./next-match-1.png" alt=""> <span>COHTEAM3</span></a>
                                                </li>
                                                <li><small>Sábado</small>
                                                    <time class="ritekhed-color" datetime="2008-02-14 20:00">1 Agosto</time> <small>15:00pm</small></li>
                                                <li>
                                                    <a href=""><img src="./next-match-2.png" alt=""> <span>COHTEAM3</span></a>
                                                </li>
                                            </ul>
                                            <div id="ritekhed-match-countdown" class="ritekhed-match-countdown is-countdown"><span class="countdown-row countdown-show4"><span class="countdown-section"><span class="countdown-amount">517</span><span class="countdown-period">Days</span></span><span class="countdown-section"><span class="countdown-amount">19</span><span class="countdown-period">Hrs</span></span><span class="countdown-section"><span class="countdown-amount">52</span><span class="countdown-period">Min</span></span><span class="countdown-section"><span class="countdown-amount">31</span><span class="countdown-period">Sec</span></span></span></div>
                                            <a href="" class="ritekhed-ticket-button ritekhed-bgcolor">Ver transmición</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
            
                </div>
            </div>
             
        </div>
        <!-- Banner -->

        <!-- Content -->
        <div class="ritekhed-main-content" >

            <!-- Main Section -->
            <div class="ritekhed-main-section ritekhed-fixture-table-slider-full" ng-show="false">
                <div class="container-fluid">
                    <div class="row">
                        
                            <!-- Fixture Table List -->
                            <div class="ritekhed-fixture-table-slider slick-initialized slick-slider"><span class="slick-arrow-left slick-arrow" style=""><i class="fa fa-chevron-left"></i></span>
                                
                                <div class="slick-list draggable">
                                    <div class="slick-track" style="opacity: 1; width: 4134px; transform: translate3d(-2544px, 0px, 0px); transition: transform 1000ms ease 0s;">
                                        
                                        <div class="ritekhed-fixture-table-slider-layer slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 159px;">
                                            <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">August 28, 2016</time>
                                            <ul class="ritekhed-bgcolor">
                                                <li class="ritekhed-fixture-vs"><small>CIT</small> Vs <span>03</span></li>
                                                <li>KIN <span>03</span></li>
                                            </ul>
                                        </div>
                                        <div class="ritekhed-fixture-table-slider-layer slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 159px;">
                                            <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">August 28, 2016</time>
                                            <ul class="ritekhed-bgcolor">
                                                <li class="ritekhed-fixture-vs"><small>CIT</small> Vs <span>03</span></li>
                                                <li>KIN <span>03</span></li>
                                            </ul>
                                        </div>
                                        <div class="ritekhed-fixture-table-slider-layer slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 159px;">
                                            <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">August 28, 2016</time>
                                            <ul class="ritekhed-bgcolor">
                                                <li class="ritekhed-fixture-vs"><small>CIT</small> Vs <span>03</span></li>
                                                <li>KIN <span>03</span></li>
                                            </ul>
                                        </div>
                                        <div class="ritekhed-fixture-table-slider-layer slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 159px;">
                                            <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">August 28, 2016</time>
                                            <ul class="ritekhed-bgcolor">
                                                <li class="ritekhed-fixture-vs"><small>CIT</small> Vs <span>03</span></li>
                                                <li>KIN <span>03</span></li>
                                            </ul>
                                        </div>
                                        <div class="ritekhed-fixture-table-slider-layer slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 159px;">
                                            <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">August 28, 2016</time>
                                            <ul class="ritekhed-bgcolor">
                                                <li class="ritekhed-fixture-vs"><small>CIT</small> Vs <span>03</span></li>
                                                <li>KIN <span>03</span></li>
                                            </ul>
                                        </div>
                                        <div class="ritekhed-fixture-table-slider-layer slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 159px;">
                                            <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">August 28, 2016</time>
                                            <ul class="ritekhed-bgcolor">
                                                <li class="ritekhed-fixture-vs"><small>CIT</small> Vs <span>03</span></li>
                                                <li>KIN <span>03</span></li>
                                            </ul>
                                        </div>
                                        <div class="ritekhed-fixture-table-slider-layer slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 159px;">
                                            <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">August 28, 2016</time>
                                            <ul class="ritekhed-bgcolor">
                                                <li class="ritekhed-fixture-vs"><small>CIT</small> Vs <span>03</span></li>
                                                <li>KIN <span>03</span></li>
                                            </ul>
                                        </div>
                                        <div class="ritekhed-fixture-table-slider-layer slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 159px;">
                                            <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">August 28, 2016</time>
                                            <ul class="ritekhed-bgcolor">
                                                <li class="ritekhed-fixture-vs"><small>CIT</small> Vs <span>03</span></li>
                                                <li>KIN <span>03</span></li>
                                            </ul>
                                        </div>
                                        <div class="ritekhed-fixture-table-slider-layer slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 159px;">
                                            <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">August 28, 2016</time>
                                            <ul class="ritekhed-bgcolor">
                                                <li class="ritekhed-fixture-vs"><small>CIT</small> Vs <span>03</span></li>
                                                <li>KIN <span>03</span></li>
                                            </ul>
                                        </div>
                                        <div class="ritekhed-fixture-table-slider-layer slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 159px;">
                                            <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">August 28, 2016</time>
                                            <ul class="ritekhed-bgcolor">
                                                <li class="ritekhed-fixture-vs"><small>CIT</small> Vs <span>03</span></li>
                                                <li>KIN <span>03</span></li>
                                            </ul>
                                        </div>
                                        <div class="ritekhed-fixture-table-slider-layer slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 159px;">
                                            <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">August 28, 2016</time>
                                            <ul class="ritekhed-bgcolor">
                                                <li class="ritekhed-fixture-vs"><small>CIT</small> Vs <span>03</span></li>
                                                <li>KIN <span>03</span></li>
                                            </ul>
                                        </div>
                           <div class="ritekhed-fixture-table-slider-layer slick-slide" data-slick-index="0" aria-hidden="true" tabindex="-1" style="width: 159px;">
                                    <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">Agosto 1, 2020</time>
                                    <ul class="ritekhed-bgcolor">
                                        <li>CIT <span>03</span></li>
                                        <li class="ritekhed-fixture-addtext">FullBook</li>
                                    </ul>
                                </div>
                                <div class="ritekhed-fixture-table-slider-layer slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 159px;">
                                    <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">Agosto 1, 2020</time>
                                    <ul class="ritekhed-bgcolor">
                                        <li class="ritekhed-fixture-vs"><small>CIT</small> Vs <span>03</span></li>
                                        <li>KIN <span>03</span></li>
                                    </ul>
                                </div>
                                <div class="ritekhed-fixture-table-slider-layer slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 159px;">
                                    <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">Agosto 1, 2020</time>
                                    <ul class="ritekhed-bgcolor">
                                        <li class="ritekhed-fixture-vs"><small>CIT</small> Vs <span>03</span></li>
                                        <li>KIN <span>03</span></li>
                                    </ul>
                                </div>
                                <div class="ritekhed-fixture-table-slider-layer slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 159px;">
                                    <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">Agosto 1, 2020</time>
                                    <ul class="ritekhed-bgcolor">
                                        <li class="ritekhed-fixture-vs"><small>CIT</small> Vs <span>03</span></li>
                                        <li>KIN <span>03</span></li>
                                    </ul>
                                </div>
                                <div class="ritekhed-fixture-table-slider-layer slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 159px;">
                                    <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">Agosto 1, 2020</time>
                                    <ul class="ritekhed-bgcolor">
                                        <li class="ritekhed-fixture-vs"><small>CIT</small> Vs <span>03</span></li>
                                        <li>KIN <span>03</span></li>
                                    </ul>
                                </div>
                               <div class="ritekhed-fixture-table-slider-layer slick-slide" data-slick-index="5" aria-hidden="true" tabindex="-1" style="width: 159px;">
                                    <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">Agosto 1, 2020</time>
                                    <ul class="ritekhed-bgcolor">
                                        <li class="ritekhed-fixture-vs"><small>CIT</small> Vs <span>03</span></li>
                                        <li>KIN <span>03</span></li>
                                    </ul>
                                </div>
                                <div class="ritekhed-fixture-table-slider-layer slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 159px;">
                                    <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">Agosto 1, 2020</time>
                                    <ul class="ritekhed-bgcolor">
                                        <li class="ritekhed-fixture-vs"><small>CIT</small> Vs <span>03</span></li>
                                        <li>KIN <span>03</span></li>
                                    </ul>
                                </div>
                                <div class="ritekhed-fixture-table-slider-layer slick-slide slick-cloned slick-active" data-slick-index="8" aria-hidden="false" tabindex="-1" style="width: 159px;">
                                    <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">Agosto 1, 2020</time>
                                    <ul class="ritekhed-bgcolor">
                                        <li class="ritekhed-fixture-vs"><small>CIT</small> Vs <span>03</span></li>
                                        <li>KIN <span>03</span></li>
                                    </ul>
                                </div>
                                <div class="ritekhed-fixture-table-slider-layer slick-slide slick-cloned slick-active" data-slick-index="9" aria-hidden="false" tabindex="-1" style="width: 159px;">
                                    <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">Agosto 1, 2020</time>
                                    <ul class="ritekhed-bgcolor">
                                        <li>BRC <span>05</span></li>
                                        <li>RM <span>01</span></li>
                                    </ul>
                                </div><div class="ritekhed-fixture-table-slider-layer slick-slide slick-cloned slick-active" data-slick-index="10" aria-hidden="false" tabindex="-1" style="width: 159px;">
                                    <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">Agosto 1, 2020</time>
                                    <ul class="ritekhed-bgcolor">
                                        <li class="ritekhed-fixture-vs"><small>CIT</small> Vs <span>03</span></li>
                                        <li>KIN <span>03</span></li>
                                    </ul>
                                </div><div class="ritekhed-fixture-table-slider-layer slick-slide slick-cloned slick-active" data-slick-index="11" aria-hidden="false" tabindex="-1" style="width: 159px;">
                                    <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">Agosto 2, 2020</time>
                                    <ul class="ritekhed-bgcolor">
                                        <li>BRC <span>05</span></li>
                                        <li>RM <span>01</span></li>
                                    </ul>
                                </div><div class="ritekhed-fixture-table-slider-layer slick-slide slick-cloned slick-active" data-slick-index="12" aria-hidden="false" tabindex="-1" style="width: 159px;">
                                    <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">Agosto 3, 2020</time>
                                    <ul class="ritekhed-bgcolor">
                                        <li>BRC <span>05</span></li>
                                        <li>RM <span>01</span></li>
                                    </ul>
                                </div>
                                <div class="ritekhed-fixture-table-slider-layer slick-slide slick-cloned slick-active" data-slick-index="13" aria-hidden="false" tabindex="-1" style="width: 159px;">
                                    <time class="ritekhed-bgcolor-two" datetime="2008-02-14 20:00">Agosto 4, 2020</time>
                                    <ul class="ritekhed-bgcolor">
                                        <li>BRC <span>05</span></li>
                                        <li>RM <span>01</span></li>
                                    </ul>
                                </div>
                             </div>
                            
                            
                            </div>
                                
                                
                                
                            
                            <span class="slick-arrow-right slick-arrow" style=""><i class="fa fa-chevron-right"></i></span></div>
                            <!-- Fixture Table List -->
                    </div>

                    <iframe src="https://challonge.com/es/zjw8o526/module" width="100%" height="600" frameborder="0" scrolling="auto" allowtransparency="true"></iframe>

                </div>
            </div>
            <!-- Main Section -->

            
            <!-- Seccion de equipos registrados-->
            <div class="ritekhed-main-section">
                <div class="container">
                    <div class="row">
                        
                        
                        <!-- Ranking Table -->
                        <div class="col-md-6">
                            <div class="ritekhed-match-fixture ritekhed-team-ranking">
                                <div class="ritekhed-classic-heading">
                                    <h2>Equipos registrados</h2>
                                </div>
                                <table class="ritekhed-client-detail">
                                    <tbody><tr>
                                        <th>Equipo</th>
                                        <th>Liga</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>1</span>
                                            <figure><img src="./noimagelogo.png" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>LETHAL FUSION</h6>
                                                <span>Raptor - Muerte</span>
                                            </div>
                                        </td>
                                        <td>PRO</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span>2</span>
                                            <figure><img src="./noimagelogo.png" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>PzKpfw</h6>
                                                <span>JPeiper - Leibstandarte</span>
                                            </div>
                                        </td>
                                        <td>PRO</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span>3</span>
                                            <figure><img src="./noimagelogo.png" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Quita maridos scuad</h6>
                                                <span>Yaja - Arepa</span>
                                            </div>
                                        </td>
                                        <td>INTERMEDIA</td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <span>4</span>
                                            <figure><img src="./noimagelogo.png" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Mexican Power</h6>
                                                <span>Skeletor1447 - Ayax</span>
                                            </div>
                                        </td>
                                        <td>INTERMEDIA</td>
                                    </tr>
                                  
                                </tbody></table>
                            </div>
                        </div>
                        <!-- Ranking Table -->

                          <!-- Ranking Table -->
                          <div class="col-md-6">
                            <div class="ritekhed-match-fixture ritekhed-team-ranking">
                                <div class="ritekhed-classic-heading">
                                    <h2>Equipos por confirmar nombre de equipo</h2>
                                </div>
                                <table class="ritekhed-client-detail">
                                    <tbody><tr>
                                        <th>Jugadores</th>
                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>1</span>
                                            <figure><img src="./noimagelogo.png" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Sin nombre</h6>
                                                <span>Willyou - BO$$</span>
                                            </div>
                                        </td>
                                        
                                    </tr>

                                    <tr>
                                        <td>
                                            <span>2</span>
                                            <figure><img src="./noimagelogo.png" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Sin nombre</h6>
                                                <span>Kaput - Yankees Kaput</span>
                                            </div>
                                        </td>
                                        
                                    </tr>


                                    <tr>
                                        <td>
                                            <span>2</span>
                                            <figure><img src="./noimagelogo.png" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Sin nombre</h6>
                                                <span>Liberated-Dace - Freddy</span>
                                            </div>
                                        </td>
                                        
                                    </tr>

                                    <tr>
                                        <td>
                                            <span>3</span>
                                            <figure><img src="./noimagelogo.png" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Sin nombre</h6>
                                                <span>Marcos - Dany</span>
                                            </div>
                                        </td>
                                        
                                    </tr>

                                    
                                    <tr>
                                        <td>
                                            <span>4</span>
                                            <figure><img src="./noimagelogo.png" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Sin nombre</h6>
                                                <span>Facha - Sumadre</span>
                                            </div>
                                        </td>
                                        
                                    </tr>

                                    <tr>
                                        <td>
                                            <span>5</span>
                                            <figure><img src="./noimagelogo.png" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Sin nombre</h6>
                                                <span>Gatienso - Marcos</span>
                                            </div>
                                        </td>
                                        
                                    </tr>

                                    <tr>
                                        <td>
                                            <span>6</span>
                                            <figure><img src="./noimagelogo.png" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Sin nombre</h6>
                                                <span>Edo - Danky</span>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                
                                    <tr>
                                        <td>
                                            <span>7</span>
                                            <figure><img src="./noimagelogo.png" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Sin nombre</h6>
                                                <span>*Hernán* - Coronel74</span>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                
                                
                                </tbody></table>
                            </div>
                        </div>
                        <!-- Ranking Table -->


                    </div>
                </div>
            </div>
            <!-- Main Section -->

         

            <!-- Main Section -->
            <div class="ritekhed-main-section" ng-show="false">
                <div class="container">
                    <div class="row">
                        
                        <!-- Counter -->
                        <div class="col-md-12">
                            <div class="ritekhed-counter">
                                <ul class="row">
                                    <li class="col-md-3">
                                        <div class="ritekhed-counter-wrap">
                                            <i class="ritekhed-color fa fa-globe"></i>
                                            <span class="word-count" id="word-count1">32</span>
                                            <small>Jugadores</small>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <div class="ritekhed-counter-wrap">
                                            <i class="ritekhed-color fa fa-wine-glass"></i>
                                            <span class="word-count" id="word-count2">16</span>
                                            <small>Equipos</small>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <div class="ritekhed-counter-wrap">
                                            <i class="ritekhed-color fa fa-hand-point-right"></i>
                                            <span class="word-count" id="word-count4">2</span>
                                            <small>Ligas</small>
                                        </div>
                                    </li>
                                    <li class="col-md-3">
                                        <div class="ritekhed-counter-wrap">
                                            <i class="ritekhed-color far fa-heart"></i>
                                            <span class="word-count" id="word-count3">100 USD</span>
                                            <small>Premios</small>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Counter -->

                        <!-- Match Fixtures -->
                        <div class="col-md-6">
                            <div class="ritekhed-match-fixture">
                                <div class="ritekhed-classic-heading">
                                    <h2>LIGA 1 - RONDA 1</h2>
                                </div>
                                <table class="ritekhed-client-detail">
                                    <tbody><tr>
                                        <td>
                                            <figure><img src="./player-stats-img1.jpg" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Ocean Kings</h6>
                                                <span>St. Patrick’s Institute</span>
                                            </div>
                                        </td>
                                        <td><span>VS</span></td>
                                        <td>
                                            <figure><img src="./player-stats-img2.jpg" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Bloody Wave</h6>
                                                <span>Marine College</span>
                                            </div>
                                        </td>
                                        <td>Agosto 1, 2020</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <figure><img src="./player-stats-img3.jpg" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>L.A Pirates</h6>
                                                <span>Bebop Institute</span>
                                            </div>
                                        </td>
                                        <td><span>VS</span></td>
                                        <td>
                                            <figure><img src="./player-stats-img4.jpg" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Ocean Kings</h6>
                                                <span>Icarus College</span>
                                            </div>
                                        </td>
                                        <td>Agosto 1, 2020</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <figure><img src="./player-stats-img5.jpg" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Red Wings</h6>
                                                <span>Marine College</span>
                                            </div>
                                        </td>
                                        <td><span>VS</span></td>
                                        <td>
                                            <figure><img src="./player-stats-img6.jpg" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Lucky Clovers</h6>
                                                <span>Elric Bros School</span>
                                            </div>
                                        </td>
                                        <td>Agosto 1, 2020</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <figure><img src="./player-stats-img6.jpg" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Draconians</h6>
                                                <span>Atlantic School</span>
                                            </div>
                                        </td>
                                        <td><span>VS</span></td>
                                        <td>
                                            <figure><img src="./player-stats-img1.jpg" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Ocean Kings</h6>
                                                <span>St. Patrick’s Institute</span>
                                            </div>
                                        </td>
                                        <td>Agosto 1, 2020</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <figure><img src="./player-stats-img2.jpg" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Bloody Wave</h6>
                                                <span>Marine College</span>
                                            </div>
                                        </td>
                                        <td><span>VS</span></td>
                                        <td>
                                            <figure><img src="./player-stats-img3.jpg" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>L.A Pirates</h6>
                                                <span>Bebop Institute</span>
                                            </div>
                                        </td>
                                        <td>Agosto 1, 2020</td>
                                    </tr>
                                </tbody></table>
                            </div>
                        </div>
                        <!-- Match Fixtures -->
                        
                        <!-- Ranking Table -->
                        <div class="col-md-6">
                            <div class="ritekhed-match-fixture ritekhed-team-ranking">
                                <div class="ritekhed-classic-heading">
                                    <h2>Ranking mejores equipos</h2>
                                </div>
                                <table class="ritekhed-client-detail">
                                    <tbody><tr>
                                        <th>Team Rank</th>
                                        <th>P</th>
                                        <th>W</th>
                                        <th>L</th>
                                        <th>D</th>
                                        <th>PTS</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>1</span>
                                            <figure><img src="./player-stats-img3.jpg" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Ocean Kings</h6>
                                                <span>Patrick’s Institute</span>
                                            </div>
                                        </td>
                                        <td>13</td>
                                        <td>11</td>
                                        <td>01</td>
                                        <td>02</td>
                                        <td>24</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>2</span>
                                            <figure><img src="./player-stats-img4.jpg" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Ocean Kings</h6>
                                                <span>Patrick’s Institute</span>
                                            </div>
                                        </td>
                                        <td>13</td>
                                        <td>09</td>
                                        <td>02</td>
                                        <td>02</td>
                                        <td>20</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>3</span>
                                            <figure><img src="./player-stats-img5.jpg" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Ocean Kings</h6>
                                                <span>Patrick’s Institute</span>
                                            </div>
                                        </td>
                                        <td>12</td>
                                        <td>09</td>
                                        <td>03</td>
                                        <td>00</td>
                                        <td>18</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>4</span>
                                            <figure><img src="./player-stats-img6.jpg" alt=""></figure>
                                            <div class="player-stats-text">
                                                <h6>Ocean Kings</h6>
                                                <span>Patrick’s Institute</span>
                                            </div>
                                        </td>
                                        <td>12</td>
                                        <td>07</td>
                                        <td>04</td>
                                        <td>01</td>
                                        <td>15</td>
                                    </tr>
                                </tbody></table>
                            </div>
                        </div>
                        <!-- Ranking Table -->


                    </div>
                </div>
            </div>
            <!-- Main Section -->

         

            <!-- Main Section -->
            <div class="ritekhed-main-section" ng-show="false">
                <div class="container">
                    <div class="row">
                        
                        <!-- Result -->
                       
                        <!-- Result -->
                        <div class="col-md-6">
                            <div class="ritekhed-classic-heading">
                                <h2>Resultado último encuentro</h2>
                            </div>
                            <div class="ritekhed-latest-result-wrap">
                                <div class="ritekhed-latest-result">
                                    <ul>
                                        <li>
                                            <span>Corner FC</span>
                                            <img src="./latest-result-1.png" alt="">
                                            <span>Win</span>
                                        </li>
                                        <li>
                                            <div class="ritekhed-result-time">
                                                <div class="ritekhed-time-wrap">
                                                    3:1
                                                    <small>2 Agosto 2020 21:00 (FT)</small>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <span>LiMax</span>
                                            <img src="./latest-result-2.png" alt="">
                                            <span>Loss</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Result -->

                        <!-- Result -->
                        <div class="col-md-6">
                            <div class="ritekhed-classic-heading">
                                <h2>Resultado último encuentro</h2>
                            </div>
                            <div class="ritekhed-latest-result-wrap">
                                <div class="ritekhed-latest-result">
                                    <ul>
                                        <li>
                                            <span>Corner FC</span>
                                            <img src="./latest-result-1.png" alt="">
                                            <span>Win</span>
                                        </li>
                                        <li>
                                            <div class="ritekhed-result-time">
                                                <div class="ritekhed-time-wrap">
                                                    3:1
                                                    <small>14 Agosto 2020 21:00 (FT)</small>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <span>LiMax</span>
                                            <img src="./latest-result-2.png" alt="">
                                            <span>Loss</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Result -->
                       
                    </div>
                </div>
            </div>
            <!-- Main Section -->

         

        </div>
        <!-- Content -->

        <!-- Footer -->
        <footer id="ritekhed-footer" class="ritekhed-footer-one">
            <!-- Footer Widget -->
            

            <!-- CopyRight -->
            <div class="ritekhed-copyright">
                <div class="container">
                    <div class="row">
                        <aside class="col-md-6"><p>© 2020, Todos los derechos reservados COH LATINOAMÉRICA</a></p></aside>
                        <aside class="col-md-6">
                            <ul class="ritekhed-copyright-link">
                                <li><a href="">Terminos y condiciones</a></li>
                                <li><a href="">Política de privacidad</a></li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
            <!-- CopyRight -->

        </footer>
        <!-- Footer -->
    </div>

  

    <!-- jQuery -->
    <script src="jquery.js"></script>
    <script src="popper.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="slick.slider.min.js"></script>
    <script src="fancybox.min.js"></script>
    <script src="isotope.min.js"></script>
    <script src="smartmenus.min.js"></script>
    <script src="progressbar.js"></script>
    <script src="counter.js"></script>
    <script src="jquery.countdown.min.js"></script>
    <script src="js(1)"></script>
    <script src="functions.js"></script>


</body></html>