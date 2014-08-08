<!--<html>
	<head>

		<style>
		@font-face{font-family:'Digital';
		src:url('webfontkit/digitaldream-webfont.eot?v=3.2.1');
		src:url('webfontkit/digitaldream-webfont.eot?#iefix&v=3.2.1') format('embedded-opentype'),
		url('webfontkit/digitaldream-webfont.woff?v=3.2.1') format('woff'),
		url('webfontkit/digitaldream-webfont.ttf?v=3.2.1') format('truetype'),
		url('webfontkit/digitaldream-webfont.svg#digitaldream-webfont?v=3.2.1') format('svg');font-weight:normal;font-style:normal;}
		#counter{
		font-size: 0.9em;
		font-family: Digital;
		font-weight: bold;
		color: #fff;
		font-weight: normal;
		}
		html{
			background: url('fondo_formulario.jpg');
			background-repeat: repeat;
		}
		.tityogob{
		text-align: center;
		padding-top: 12%;
		clear: both
		}
		.tituloyogob {
color: white;
font-size: 2em;
font-weight: bold;
text-align: center;
}
		</style>
	</head>
	<body>
<div align="center" class="tityogob" style="">
            	<span >
<div align="center">
<script languaje="JavaScript">
function getTime() {
now = new Date();
y2k = new Date("Aug 9 2014 23:59:59");
days = (y2k - now) / 1000 / 60 / 60 / 24;
daysRound = Math.floor(days);
hours = (y2k - now) / 1000 / 60 / 60 - (24 * daysRound);
hoursRound = Math.floor(hours);
minutes = (y2k - now) / 1000 /60 - (24 * 60 * daysRound) - (60 * hoursRound);
minutesRound = Math.floor(minutes);
seconds = (y2k - now) / 1000 - (24 * 60 * 60 * daysRound) - (60 * 60 * hoursRound) - (60 * minutesRound);
secondsRound = Math.round(seconds);
sec = (secondsRound == 1) ? " segundo" : " segundos";
min = (minutesRound == 1) ? " minuto" : " minutos, ";
hr = (hoursRound == 1) ? " hora" : " horas, ";
dy = (daysRound == 1) ? " día" : " d&iacute;as, "
document.getElementById("counter").innerHTML = + daysRound + ":" + hoursRound + ":" + minutesRound + ":" + secondsRound ;
newtime = window.setTimeout("getTime();", 1000);
}
</script>
<body onLoad="getTime()">
</div>
<span class="tituloyogob" style="font-size: 2.5em; font-family:Digital; font-weight: bold;" id="counter"></span>

            	</span><br>
            	<span class="tituloyogob" style="font-size: 3.5em; font-family: Arial; font-weight: bold; ">
            		YoGobierno 3.0
            	</span><br>
<span class="tituloyogob2" style="font-size: 1.2em; font-family: Arial; font-weight: bold; color:#fff;">
            		Orgullosos de hacer un mejor Ecuador
            	</span>
            </div>
	</body>
</html>-->
<?php
//die();
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );
