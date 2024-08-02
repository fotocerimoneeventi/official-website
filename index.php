<?php

$salvataggio_completato = 0;
$error=array();

$messaggio = array();
$messaggio['nome'] = '';
$messaggio['cognome'] = '';
$messaggio['telefono'] = '';
$messaggio['email'] = '';
$messaggio['testo'] = '';


if( array_key_exists('invia', $_POST) ){
    include 'common/mail/mail.php';
    
    if( empty ($_POST['nome']) ){ $error[] = 'nome'; }else{ $messaggio['nome'] = $_POST['nome']; }
    if( empty ($_POST['cognome']) ){ $error[] = 'cognome'; }else{ $messaggio['cognome'] = $_POST['cognome']; }
    if( empty ($_POST['telefono']) ){ $error[] = 'telefono'; }else{ $messaggio['telefono'] = $_POST['telefono']; }
    if( empty ($_POST['email']) ){ $error[] = 'email'; }else{ $messaggio['email'] = $_POST['email']; }
    if( empty ($_POST['testo']) ){ $error[] = 'testo'; }else{ $messaggio['testo'] = $_POST['testo']; }
    
    if( !count($error) ){
        
        $txt = "<p>Sei stato contattato da {$messaggio['cognome']} {$messaggio['nome']}<br/>";
        $txt .= "Email: {$messaggio['email']} <br/>";
        $txt .= "Telefono: {$messaggio['telefono']} </p>";
        $txt .= "<p>Messaggio: <br/>";
        $txt .= str_replace("\n", "<br/>", $messaggio['testo']);
        $txt .= "</p>";
        
        if ( invia_mail($txt, 'Contatto dal sito fotocerimonieeventi.it', 'info@fotocerimonieeventi.it', 'info@fotocerimonieeventi.it') ){
            $messaggio['nome'] = $messaggio['cognome'] = $messaggio['telefono'] = $messaggio['email'] = $messaggio['testo'] = '';
            $salvataggio_completato = 1;
        }
    }
    
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

	<!--SEO BASED-->
	<meta name="robots" 		content="all"							/>
	<meta name="robots" 		content="index, follow" 				/>
	<meta name="revisit-after" 	content="13 days"						/>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="it-IT">
	<meta name="owner" 			content="Alberto Marà"					/>
	<meta name="author" 		content="Alberto Marà"				 	/>
   	<meta name="design" 		content="Alberto Marà"				 	/>

	<meta name="description" lang="it" content="I servizi per le cerimonie e gli eventi di roma! Matrimoni, battesimi, maturità e tutto quello che vorresti fosse immortale e nei tuoi ricordi" />
	<title>FOTO CERIMONIE ED EVENTI ROMA</title>




	<!--MINIATURE-->
	<!--thumb-->
    <link rel="image_src" href="common/template/thumbsite.png" />
    <!--favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>




	<!--CSS THEME-->
	<!--[if lte IE 7]>
		<script type="text/javascript">
			/* <![CDATA[ */
				window.top.location = '../common/error/no_browser/mod_errorbrowser.html';
			/* ]]> */
		</script>
	<![endif]-->
	<!--[if !IE]>--> 	<link rel="stylesheet" type="text/css" href="css/no_ie_stylesheet.css" /> 	<!--<![endif]-->
	<!--[if IE]> 		<link rel="stylesheet" type="text/css" href="css/ie_stylesheet.css" />		<![endif]-->




	<!--webfont-->
    <link rel="stylesheet" type="text/css" href="webfont/Josefin/stylesheet.css" />




	<!--SCRIPT-->
	<!--jQuery library-->
	<script type="text/javascript" src="scripts/jquery.v1.4.3.js"></script>

    
    <!--scrollAnchoor-->
	<script type="text/javascript">
    function goToByScroll(id){
     	$('html,body').animate({scrollTop: $("#"+id).offset().top},'slow');
	}
	</script>
    


	</head>

	<body id="top">

			<style>.boxalarm{width:800px; text-align:center; margin:30px auto 0 auto; padding:5px 5px 5px 5px; background:#C00; font-family:'Arial Black', Gadget, sans-serif; font-size:15px; color:#FFF !important; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;}</style>
			<?php
				if( count($error) ){
					$campi = implode(', ', $error);
					echo "<div class='boxalarm'><p>Compilare correttamente i campi: $campi</p></div>";
				}
			?>
			

		<!--Menu linkrapido-->
		<div style="position:fixed; bottom:90px;">
			<a href="javascript:void(0)" onClick="goToByScroll('top')" style="display:block; margin-bottom:-15px;" ><img style="margin-left:-10px;" src="img/uppp.png" alt="foto cerimonie e eventi roma" /></a>
		</div>

		<div style="position:fixed; bottom:300px;">
			 <a href="javascript:void(0)" onClick="goToByScroll('1')" ><h3 style="display:none;">foto matrimoni, Wedding style</h3><img style="margin-left:-10px;" src="img/wddingmini.png" alt="Le foto matrimonio &quot;Weddin&quot;" /></a>
		</div>
		<div style="position:fixed; bottom:250px;">
			<a href="javascript:void(0)" onClick="goToByScroll('2')" ><h3 style="display:none;">foto matrimoni, servizio Classic</h3><img style="margin-left:-10px;" src="img/classicmini.png" alt="le foto matrimonio del servizio &quot;Classic&quot;" /></a>
		</div>
		<div style="position:fixed; bottom:200px;">
			<a href="javascript:void(0)" onClick="goToByScroll('3')" ><h3 style="display:none;">foto matrimoni, servizio Love</h3><img style="margin-left:-10px;" src="img/lovemini.png" alt="fotograia matrimoni per chi si ama davvero, stile &quot;Love&quot;" /></a>
		</div>
		<div style="position:fixed; bottom:150px;">
			<a href="javascript:void(0)" onClick="goToByScroll('4')" ><h3 style="display:none;">foto matrimoni, servizio ForLife</h3><img style="margin-left:-10px;" src="img/forlifemini.png" alt="il top gamma della fotografia per matrimoni... &quot;ForLife&quot;" /></a>
		</div>

		<div style="position:fixed; bottom:20px;">
			<a href="javascript:void(0)" onClick="goToByScroll('contatto')" style="margin-top:-15px;" ><img style="margin-left:-10px;" src="img/contatto.png" alt="Info, prenotazioni e preventivi..." /></a>
		</div>

        <div id="wrap">
    
            <!--header-->
                <div class="menu">
                    <h1><font style="display:none">FOTO CERIMONIE E EVENTI ROMA</font><img src="img/logo.png" style="margin:-140px 0 0 -58px;" alt="Benvenuti in foto cerimonie e eventi Roma, il sito per il tuo matrimonio o per le tue foto di cerimonie!"/></h1>
                    <h2 style="display:none">CERIMONIE, MATRIMONI, BATTESIMI, TUTTO QUELLO CHE DESIDERI DA UN SERVIZIO FOTOGRAFICO E VIDEO PER LE TUE CERIMONIE</h2>
				<h2><font  style="display:none">servizi fografici e videografici per matrimoni</font><img src="img/img_iltuomatrimonioequi.png" /></h2>
                    <div class="menu_voice">
                       <a href="javascript:void(0)" onClick="goToByScroll('1')" >WEDDING</a> - <a href="javascript:void(0)" onClick="goToByScroll('2')" >CLASSIC</a> - <a href="javascript:void(0)" onClick="goToByScroll('3')" >LOVE</a> - <a href="javascript:void(0)" onClick="goToByScroll('4')" >FORLIFE</a>
                    </div>
                </div>
    
            <!--content-->
                <div class="wrap_content">
 
					<!--#wedding-->
					<img src="img/img_top.png" style="margin:-30px auto 0px auto;" id="1" alt="" />
						<div class="content">
							<?php include("#wedding.php");?>
                       		 </div>
                    
                    <!--#wedding-->
					<img src="img/img_top.png" style="margin:-30px auto 0px auto;" id="2" alt="" />
						<div class="content">
							<?php include("#classic.php");?>
 						</div>
                    
                    <!--#love-->
					<img src="img/img_top.png" style="margin:-30px auto 0px auto;" id="3" alt="" />
						<div class="content">
							<?php include("#love.php");?>
						</div>                    

                    <!--#forlife-->
					<img src="img/img_top.png" style="margin:-30px auto 0px auto;" id="4" alt="" />
						<div class="content">
							<?php include("#forlife.php");?>
						</div>

                </div>
    
				<div class="wrap_content">
                    <img src="img/img_top.png" style="margin:-30px auto 0px auto;" id="contatto" alt="" />
                    <div class="content">
                        <img src="img/cintatto_top.png" style="margin-bottom:-355px; z-index:55;" alt="info, prenotazioni e preventivi... contattaci!" />
                        
				    <form name="frm_mail" action="" method="POST" style="margin-left:34px; position:relative; z-index:56;">
                            <table style="padding:10px 10px 10px;">
                                <tr>
                                    <td>
                                    	NOME:<input type="text" class="textbox" name="nome" id="nome" value="<?php echo htmlspecialchars($messaggio['nome']); ?>" />
                                    </td>
                                    <td>
                                    	&nbsp;&nbsp;COGNOME:<input type="text" class="textbox" name="cognome" id="cognome" value="<?php echo htmlspecialchars($messaggio['cognome']); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    	EMAIL:<input type="text" class="textbox" name="email" id="email" value="<?php echo htmlspecialchars($messaggio['email']); ?>" />
                                    </td>
                                    <td>
                                    	&nbsp;&nbsp;TELEFONO:<input type="text" class="textbox" name="telefono" id="telefono" value="<?php echo htmlspecialchars($messaggio['telefono']); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                    	MESSAGGIO:<br />
								<textarea class="textareabox" name="testo" id="testo" ><?php echo htmlspecialchars($messaggio['testo']); ?></textarea>
                                    </td>
                                </tr>
                            </table>
							&nbsp;&nbsp;&nbsp;<input type="reset" value="Resetta da capo" class="resetbutton" /> &nbsp;&nbsp;&nbsp; <input alue="Ivia il messaggio" type="submit" class="submitbutton" name="invia" id="invia" /> &nbsp;&nbsp;&nbsp; <input type="button" value="Per info dirette chiamare: 328 106 33 50" class="resetbutton" disabled/>
                        </form><br /><br />


                    </div>
        		</div>

        </div>
        <div style="text-align:center;"><img src="img/finewrap.png" alt="" /></div>
	

        <!--footer-->
        <div><?php include("footbar/footbar.php");?></div>


	</body>

</html>