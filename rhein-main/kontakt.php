<?php
session_start();

// define variables and set to empty values
//for display error message
$vornameErr = $vorname1Err = $nachnameErr = $nachname1Err = $geschlechtErr = $geschlecht1Err = $strasseErr = $plzErr = $plz1Err = $stadtErr =  $stadt1Err = $mobileRufnummerErr = $emailErr = $security_codeErr =  $q1Err = $alterErr = $betreuungErr = $telefaxErr = $commentsErr = $erhaltenErr = "";

$ansprache = $vorname = $vorname1 = $nachname = $nachname1 = $geschlecht = $geschlecht1 = $strasse =  $plz = $plz1 = $stadt = $stadt1 =  $mobileRufnummer = $email = $q1 = $alter = $betreuung = $telefax = $caregiver = $betreuung = $comments = $voraussichtliche = $errorMessage= $errorMessage_front= $telefax = $per_email = $per_post = $per_telefon = $per_telefax = "";

$error = FALSE;
$error_front = FALSE;//Find global error for every fields
//for css background color
$error_vorname = FALSE;
$error_nachname = FALSE;
$error_vorname1 = FALSE;
$error_nachname1 = FALSE;
$error_geschlecht = FALSE;
$error_geschlecht1 = FALSE;
$error_strasse = FALSE;
$error_hausnummer = FALSE;
$error_plz = FALSE;
$error_stadt = FALSE;
$error_plz1 = FALSE;
$error_stadt1 = FALSE;
$error_mobileRufnummer = FALSE;
$error_email = FALSE;
$error_security_code = FALSE;
$error_q1 = FALSE;
$error_alter = FALSE;
$error_betreuung = FALSE;
$error_telefax = FALSE;
$error_erhalten = FALSE;
$error_comments = FALSE;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if (empty($_POST["vorname"])) {
	 $error = TRUE;
$error_front = TRUE;
$error_front = TRUE;
	 $error_vorname = TRUE;
     $vornameErr = "Dieses Feld ist ein Pflichtfeld!";
   } 
   else {
     $vorname = test_input($_POST["vorname"]);
	 $vorname = ucfirst("$vorname");
     // check if name only contains letters and whitespace
     if (!preg_match("/([a-zßäöüA-ZÄÖÜ]){2,16}+[ ]?+([a-zäöüßA-ZÄÖÜ]{1,2})?+[ ]?+[\/]?+[ ]?+([a-zäöüßA-ZÄÖÜ]*)?$/",$vorname)) {
	 	$error = TRUE;
		$error_front = TRUE;
	 	$error_vorname = TRUE;
       	$vornameErr = "Ungültiger Vorname *";
     }
   }
   
    if (empty($_POST["nachname"])) {
		$error = TRUE;
		$error_front = TRUE;
		$error_nachname = TRUE;
     	$nachnameErr = "Dieses Feld ist ein Pflichtfeld!";
   } 
   else {
     	$nachname = test_input($_POST["nachname"]);
		$nachname = ucfirst("$nachname");
     // check if name only contains letters and whitespace
     	if (!preg_match("/([a-zäöüßA-ZÄÖÜ]){2,16}+[ ]?+([a-zäöüßA-ZÄÖÜ]{1,2})?+[ ]?+[\/]?+[ ]?+([a-zäöüßA-ZÄÖÜ]*)?$/",$nachname)) {
		 	$error = TRUE;
			$error_front = TRUE;
			$error_nachname = TRUE;
       		$nachnameErr = "Ungültiger Nachname*"; 
     }
   }

   if (empty($_POST["geschlecht"])) {
		$error = TRUE;
		$error_front = TRUE;
		$error_geschlecht = TRUE;
     	$geschlechtErr = "Dieses Feld ist ein Pflichtfeld!";
   } 
   
   else {
			$geschlecht = test_input($_POST["geschlecht"]);
			switch ($geschlecht){
			case "Herr":
			$Männlich="selected";
			break;
			case "Frau":
			$Weiblich="selected";
			}
   }
			
   
   if (!empty($_POST["stadt"])) {
     $stadt = test_input($_POST["stadt"]);
   }
     
 if (!empty($_POST["caregiver"])) {
     $caregiver = test_input($_POST["caregiver"]);
   }
 if (!empty($_POST["betreuung"])) {
     $betreuung = test_input($_POST["betreuung"]);
   }

 
    if (empty($_POST["comments"])) {
		$error = TRUE;
		$error_front = TRUE;
		$error_comments = TRUE;
     	$commentsErr = "Dieses Feld ist ein Pflichtfeld!";
   } 
   else {
     	$comments = test_input($_POST["comments"]);
   }
 
    if (empty($_POST["check_list"])) {
		$error = TRUE;
		$error_front = TRUE;
		$error_erhalten = TRUE;
     	$erhaltenErr = "Dieses Feld ist ein Pflichtfeld!";
   } 

    if (empty($_POST["security_code"])) {
		$error = TRUE;
		$error_front = TRUE;
		$error_security_code = TRUE;
     	$security_codeErr = "Dieses Feld ist ein Pflichtfeld!";
   } else {
	    
		if (!($_SESSION['security_code'] ==$_POST['security_code'])) {
			
		// Insert your code for showing an error message here
			$error = TRUE;
			$error_front = TRUE;
			$error_security_code = TRUE;
			$security_codeErr = "Ungültiger Sicherheitscode!";

   			}   
	   
   }

 if(!empty($_POST['check_list'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected){
//echo $selected."</br>";
switch ($selected){
				
			case "Per E-Mail":
			$per_email = 'Per E-Mail';
			if (empty($_POST["email"])) {
			$error = TRUE;
			$error_front = TRUE;
			$error_email = TRUE;
			$emailErr = "Dieses Feld ist ein Pflichtfeld!";
			} else {
			$email = test_input($_POST["email"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@([a-z0-9-]+\.)+([a-züöäß]{2,4}|com|net|info|biz|edu|mil|museum)$/i",$email)) {
			$error = TRUE;
			$error_front = TRUE;
			$error_email = TRUE;
			$emailErr = "Fehler: Ungültige Email-Adresse!"; 
			}
			}
			break;
			
			case "Per Post":
			$per_post = 'Per Post';
			 if (empty($_POST["strasse"])) {
			$error = TRUE;
			$error_front = TRUE;
			$error_strasse = TRUE;
			$strasseErr = "Dieses Feld ist ein Pflichtfeld!";
			} else {
			$strasse = test_input($_POST["strasse"]);

			}
			if (empty($_POST["plz"])) {
			$error = TRUE;
			$error_front = TRUE;
			$error_plz = TRUE;
			$plzErr = "Dieses Feld ist ein Pflichtfeld!";
			} else {
			$plz = test_input($_POST["plz"]);
			}
			break;
			
			case "Per Telefon":
			$per_telefon = 'Per Telefon';
			if (empty($_POST["mobileRufnummer"])) {
			$error = TRUE;
			$error_front = TRUE;
			$error_mobileRufnummer = TRUE;
			$mobileRufnummerErr = "Dieses Feld ist ein Pflichtfeld!";
			} else {
			$mobileRufnummer = test_input($_POST["mobileRufnummer"]);

			}
			break;
			
			case "Per Telefax":
			$per_telefax = 'Per Telefax';
			if (empty($_POST["telefax"])) {
			$error = TRUE;
			$error_front = TRUE;
			$error_telefax = TRUE;
			$telefaxErr = "Dieses Feld ist ein Pflichtfeld!";
			} else {
			$telefax = test_input($_POST["telefax"]);

			}
			break;
			}
}
}

//disply checklist for email 
 if(!empty($_POST['check_list'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected){

$message .= "$selected";
$message .= "     ";
}
 }
   
//For email
if ($error_front==TRUE)

		{
			$errorMessage_front = "<h2 style='vertical-align:middle;'>Bitte alle Pflichtfelder ausfüllen!</h2>";
		}
if ($error==false)

		{

			$betreff = "Anfrage über Online-Kontaktformular";
		
			// rhein-main@actiovita.de
			$company_email = "rhein-main@actiovita.de";

			
			$nachricht = 'Guten Tag.

			

Folgende Anfrage wurde über die actioVITA Webseite verschickt:

Zu Ihrer Person: 

Anrede: '.trim($_POST['geschlecht']).'

Name: '.trim($_POST['nachname']).'

Vorname: '.trim($_POST['vorname']).'

Ihr Verwandtschaftsverhältnis zur zu betreuenden Person: '.trim($_POST['caregiver']).'

Wie möchten Sie Ihre Rückantwort erhalten?: '.$message.'

E-Mail Adresse: '.trim($_POST['email']).'

Straße/Hausnummer: '.trim($_POST['strasse']).'

PLZ/Ort: '.trim($_POST['plz']).'

Telefax: '.trim($_POST['telefax']).'

Telefon: '.trim($_POST['mobileRufnummer']).'

Fragen oder Anmerkungen: '.trim($_POST['comments']).'';

	$header = "From: " . " <" . $company_email . ">\r\n".

    "Reply-To: " . " <" . $_POST['email'] . ">\r\n".

    'Content-Type: text/plain; charset=UTF-8' . "\r\n" .

	'X-Mailer: PHP/' . phpversion();


	mail("$company_email", $betreff, $nachricht, $header);
	
	sleep(0.5);
	if($email) {
		mail("$email", $betreff, $nachricht, $header);
    }
	

	//mail($empfaenger, $betreff, $nachricht, $header);

  //$errorMessage = "<h2 style='vertical-align:middle;'>Ihre Nachricht wurde erfolgreich abgeschickt!</h2>";	
  	header('Location: vielen-dank.html');

			}	
							
/*--End email--*/

}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0 " />
	<title>actioVITA Rhein-Main | Kontakt</title>
	<link type="text/css" rel="stylesheet" href="css/bootstrap.css">
	<link type="text/css" rel="stylesheet" href="css/all.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,400,700,300' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<style>
.visibility {
	display: none;
	}
.error {
  color: #c30;
}
</style>
</head>
<body>
<div id="wrapper">
	<header id="header">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-box">
					<div class="top-bar">
						<ul class="add-nav">
							<li><a href="../index.html"><b>bundesweit</b></a></li>
							<li><a href="impressum.html">Impressum</a></li>
						</ul>
						<ul class="social">
							<li><a href="https://www.facebook.com/pages/actioVITA-GMBH/251976334907488" target="_blank" class="icon-social-facebook"></a></li>
							<li><a href="https://twitter.com/actiovita" target="_blank" class="icon-social-twitter"></a></li>
							<li><a href="https://plus.google.com/108996571677360435067/" target="_blank" class="icon-google"></a></li>
						</ul>
						<div class="resize-box">
							<span>Schrift:</span>
							<ul class="resizer" title="wählen Sie bitte eine Schriftgröße: kleiner | Standard | größer">
								<li><a href="#" id="decrease">A</a></li>
								<li><a href="#" id="reset">A</a></li>
								<li><a href="#" id="increase">A</a></li>
							</ul>
						</div>
					</div>
					<div class="contacr-row2">
						<a href="kontakt.php" class="tel tel-link icon-email">Online-Kontaktformular</a>
					</div>
<div class="contacr-row">
						<a class="tel tel-link icon-phone">06196 - 9710770</a>
						<span>Wir beraten Sie gerne!</span>
					</div>
				</div>
				<div class="navbar-header">
					<a class="navbar-brand" href="/rhein-main/"><img src="images/logo.png" height="102" width="490" alt="actiovita rhein-main umsorgt zuhause leben"><small><img src="images/logo-small.png" width="440" height="87" alt="actiovita rhein-main umsorgt zuhause leben"></small></a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						Bitte wählen...
					</button>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<div class="navbar-holder">
						<div class="navbar-frame">
							<ul class="nav navbar-nav" id="nav">
								<li><a href="/rhein-main/" class="icon-home"></a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">actioVITA Rhein-Main <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="actiovita_grundsaetzliches.html">Grundsätzliches</a></li>
										<li><a href="actiovita_vor-ort.html">actioVITA vor Ort</a></li>
										<li><a href="actiovita_vorgehensweise.html">Vorgehensweise</a></li>
                                        <li><a href="actiovita_stellenangebote.html">Stellenangebote</a></li>
									</ul>
								</li>
								<li><a href="ambulante-pflege.html">Ambulante Pflege</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Betreuung <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="betreuung_24-stunden.html">24-Stunden-Betreuung</a></li>
										<li><a href="betreuung_stundenbetreuung-tagesbetreuung.html">Stunden-/tageweise Betreuung</a></li>
										<li><a href="betreuung_aufgabenbereiche.html">Aufgabenbereiche</a></li>
									</ul>
								</li>
                                <li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Informationen <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="info_pflegebeduerftigkeit.html">Pflegebedürftigkeit</a></li>
										<li><a href="info_pflegestufen.html">Pflegestufen</a></li>
										<li><a href="info_pflegesachleistungen-pflegegeld.html">Pflegesachleistungen & Pflegegeld</a></li>
                                        <li><a href="info_pflegeversicherungen.html">Pflegeversicherungen</a></li>
									</ul>
								</li>
								<li><a href="http://www.actiovita.de/blog/">News</a></li>
								<li><a class="active" href="kontakt.php">Kontakt</a></li>
							</ul>
						</div>
					</div>
				</div>
				 <div class="contacr-row mobile">
						<a href="kontakt.php" class="tel tel-link icon-email">Online-Kontaktformular</a>
					</div>
				<div class="contacr-row mobile">
					<a class="tel tel-link icon-phone">06471 - 92740</a>
					<span>Wir beraten Sie gerne!</span>
				</div>
			</div>
		</nav>
	</header>
	<main id="main" role="main">
		<div class="container">
			<div class="post-wrap">
				<h1>Ihr Weg zu actioVITA RHEIN-MAIN</h1>
                
				<div class="row">
					<div class="col-sm-11">
						<article class="post">
                                                                      <div class="row">
  <div class="col-xs-16 col-sm-6 col-md-6">
    <p><strong>actioVITA Rhein-Main GmbH</strong><br>
Ludwig-Erhard-Str. 16-18<br>
65760 Eschborn<br>
  <br>
      Telefon: 06196 / 9710770<br>
      Telefax: 06196 / 9710799<br>
  <br>
      E-Mail:<br>
      <a href="mailto:rhein-main@actiovita.de">rhein-main@actiovita.de</a></p>
    <p>Homepage:<br>
  <a href="http://www.actiovita.de/rhein-main">www.actiovita.de/rhein-main</a></p>
      <p>&nbsp;</p>
        <p>Zögern Sie bitte nicht uns zu kontaktieren. Sie haben dabei die Möglichkeit uns per Kontaktformular (rechts), per Email oder Telefon zu erreichen (oben).</p>
        <p>Wir freuen uns auf Ihre Anfrage und beantworten diese umgehend.</p>
        <p><em>Ihr actioVITA Team</em></p>
  </div>
  <div class="col-xs-16 col-sm-10 col-md-10">
   <form role="form" action="" method="post">
   	<div class="success" style="color:#000000"> <?php echo $errorMessage;?> </div>
    <div class="error"> <?php if($error_front == "true") 

	{ ?>  <?php }

	?>  <?php echo $errorMessage_front;?> </div>
    <div class="form-group">
    <label for="Zu Ihrer Person">Bitte lassen Sie mir umfassende Informationen zum actioVITA - Betreuungsangebot und zum weiteren Vorgehen zukommen:</label>
  </div>
   <div class="form-group">
    <label for="geschlecht">Anrede:*</label>
    							<select class="form-control" name="geschlecht" id="geschlecht"   <?php if($error_geschlecht == "true") 

	{ ?> style="color: #F00; font-weight: bold; background-color: #e8e8e8;" <?php }

	?>>
                                
                               <?php  echo "
<option value='' selected disabled>-- bitte w&auml;hlen --</option>
<option value=Herr $Männlich>Herr</option>
<option value=Frau $Weiblich>Frau</option>
</select>";?>
                                <span class="error"> <?php echo $geschlechtErr;?></span>
  </div>
   <div class="form-group">
    <label for="nachname">Name*:</label>
    						<input type="text" class="form-control" id="nachname" name="nachname" placeholder="Nachname" autocomplete="off" <?php if($error_nachname == "true") 

	{ ?> style="color: #F00; font-weight: bold; background-color: #e8e8e8;" <?php }

	?> value="<?php echo $nachname;?>"><span class="error"> <?php echo $nachnameErr;?></span>
  </div>
   <div class="form-group">
    <label for="vorname">Vorname*:</label>
    						<input type="text" class="form-control" id="vorname" name="vorname" placeholder="Vorname" autocomplete="off" <?php if($error_vorname == "true") 

	{ ?> style="color: #F00; font-weight: bold; background-color: #e8e8e8;" <?php }

	?> value="<?php echo $vorname;?>"><span class="error"> <?php echo $vornameErr;?></span>
  </div>

  <div class="form-group">
    <label for="caregiver">Ihr Verwandtschaftsverhältnis zur zu betreuenden Person:</label>
    						<input type="text" class="form-control" id="caregiver" name="caregiver" placeholder="" autocomplete="off" value="<?php echo $caregiver;?>">
  </div>
  <div class="form-group">
    <label for="frage">Wie möchten Sie Ihre Rückantwort erhalten?*</label>
	<label for="frage_message">
 <span class="error"> <?php echo $erhaltenErr;?></span></label>
  </div>
  <div class="form-group">
    <label>
      <input type="checkbox" name="check_list[]" value="Per E-Mail" id = "per_email" <?php if($per_email) { echo "checked";}?>> &nbsp;&nbsp;Per E-Mail<br/>
  	</label>                                   
  </div>
    <div  class="form-group <?php if (!$per_email) echo "visibility";?>" id = "Email_container" >
    <label for="email">E-Mail Adresse *:</label>
    						<input type="text" class="form-control" id="email" name="email" placeholder="E-Mail Adresse
" autocomplete="off" <?php if($error_email == "true") 

	{ ?> style="color: #F00; font-weight: bold; background-color: #e8e8e8;" <?php }

	?>  value="<?php echo $email;?>"> <span class="error"> <?php echo $emailErr;?></span>
  </div>

  <div class="form-group">
    <label>
      <input type="checkbox" name="check_list[]" value="Per Post" id = "per_post" <?php if($per_post) { echo "checked";}?>> &nbsp;&nbsp;Per Post<br/>
  	</label>                                   
  </div>
  <!--Per post-->
<div id = "post_container" class="<?php if (!$per_post) echo "visibility";?>">
<div class="form-group" >
    <label for="strasse">Straße/Hausnummer*:</label>
    						<input type="text" class="form-control" id="strasse" name="strasse" id="strasse" placeholder="Straße/Hausnummer" autocomplete="off" <?php if($error_strasse == "true") 

	{ ?> style="color: #F00; font-weight: bold; background-color: #e8e8e8;" <?php }

	?> value="<?php echo $strasse;?>"> <span class="error"> <?php echo $strasseErr;?></span>
  </div>
   <div class="form-group">
    <label for="plz">PLZ/Ort*</label>
    						<input type="text" class="form-control" id="plz" name="plz" placeholder="PLZ" autocomplete="off" <?php if($error_plz == "true") 

	{ ?> style="color: #F00; font-weight: bold; background-color: #e8e8e8;" <?php }

	?>  value="<?php echo $plz;?>"> <span class="error"> <?php echo $plzErr;?></span>
  </div>
</div
 ><!-- End per post -->
   <div class="form-group">
    <label>
      <input type="checkbox" name="check_list[]" value="Per Telefon" id = "per_telefon" <?php if($per_telefon) { echo "checked";}?>>&nbsp;&nbsp;Per Telefon<br/>
  	</label>                                   
  </div>
  
   <div class="form-group <?php if (!$per_telefon) echo "visibility";?>" id ="telephone_container">
    <label for="mobileRufnummer">Telefonnummer*:</label>
    						<input type="text" class="form-control" id="mobileRufnummer" name="mobileRufnummer" placeholder="Telefonnummer" autocomplete="off" <?php if($error_mobileRufnummer == "true") 

	{ ?> style="color: #F00; font-weight: bold; background-color: #e8e8e8;" <?php }

	?>  value="<?php echo $mobileRufnummer;?>"> <span class="error"> <?php echo $mobileRufnummerErr;?></span>
  </div>
  
  <div class="form-group">
    <label>
      <input type="checkbox" name="check_list[]" value="Per Telefax" id = "per_telefax" <?php if($per_telefax) { echo "checked";}?>> &nbsp;&nbsp;Per Telefax<br/>
  	</label>                                   
  </div>
   <div class="form-group <?php if (!$per_telefax) echo "visibility";?>" id = "fax_container">
    <label for="telefax">Faxnummer*:</label>
    						<input type="text" class="form-control" id="telefax" name="telefax" placeholder="Faxnummer" autocomplete="off" <?php if($error_telefax == "true") 

	{ ?> style="color: #F00; font-weight: bold; background-color: #e8e8e8;" <?php }

	?>  value="<?php echo $telefax;?>"> <span class="error"> <?php echo $telefaxErr;?></span>
  </div>

 <div class="form-group">
    <label for="comments">Fragen oder Anmerkungen*:</label>
<textarea class="form-control" id="comments" name="comments" placeholder="Nachricht an uns..." autocomplete="off"  <?php if($error_comments == "true") 

	{ ?> style="color: #F00; font-weight: bold; background-color: #e8e8e8;" <?php }

	?> ><?php echo $comments;?></textarea><span class="error"> <?php echo $commentsErr;?></span>
  </div>
  <!-- For Security code-->
  
  <div class="form-group">
    <label for="security_code">Sicherheitscode<img src="CaptchaSecurityImages.php?width=100&height=25&characters=5" border="0" title="security_code" style="width:128px; padding-left:8px;"></label>
   <input type="text" class="form-control" id="security_code" name="security_code" placeholder="bitte Sicherheitscode eingeben..." autocomplete="off" <?php if($error_security_code == "true") 

	{ ?> style="color: #F00; font-weight: bold; background-color: #e8e8e8;" <?php }

	?>  style="margin-bottom:20px;"> <span class="error"> <?php echo $security_codeErr;?></span>
  </div>
  
  <!--End Security Code-->
  <button type="submit" class="btn btn-default">Formular absenden!</button>
</form>  </div>
</div>
                                                                     <nav>
                                                                        <ul class="pager">
                                                                         <li class="previous"><a href="javascript:history.back()"><span aria-hidden="true">←</span> zurück</a></li>
                                                                        </ul>
                                                                    </nav>
                                                                    </article>
					</div>
					<div class="col-sm-5">
						<div class="orange-box">
							<h2>GETESTET!</h2>
							<p>Bereits 2009 hat die<br><span class="highlight_text">Stiftung Warentest</span> die Leistungen von actioVITA bewertet.</p>
							<a class="btn btn-info" href="https://www.test.de/Pflege-zu-Hause-Vermittlungsagenturen-im-Test-1772650-1772585/" target="_blank">zum Test</a>
						</div>
						<!-- <div class="gray-box-second">
							<a href="#" class="gray-brand"><img width="143" height="30" alt="actiovita" src="images/img-05.png"></a>
							<p>Unsere <strong>24-Stunden-Betreuung</strong> bieten wir seit vielen Jahren <strong>bundesweit</strong> an und sind eine der führenden Vermittlungsagenturen in Deutschland.</p>
<a class="btn btn-info" href="../">bundesweite Pflege</a>
						</div> -->
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<h2>Konkrete Aufgabenbereiche</h2>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="heading1">
									<h3 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1"> Unterstützung im Haushalt</a>
									</h3>
								</div>
								<div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
									<div class="panel-body">
                                    <h5 style="margin-top:0px;">actioVITA-Betreuungskräfte:</h5>
										<ul class="bullet-list">
											<li>übernehmen das Aufräumen</li>
											<li>machen die Wohnung sauber</li>
											<li>waschen die Wäsche</li>
                                            <li>kümmern sich um leichte Gartenarbeit</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="heading2">
									<h3 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2" class="collapsed"> Hilfe in der Küche</a>
									</h3>
								</div>
								<div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
									<div class="panel-body">
                                    <h5 style="margin-top:0px;">actioVITA Betreuungskräfte:</h5>
										<ul class="bullet-list">
											<li>erstellen Kochplan</li>
											<li>erledigen die Einkäufe</li>
											<li>bereiten das Essen zu</li>
                                            <li>unterstützen im Umfang der Notwendigkeit beim Essen</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="heading3">
									<h3 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse3" class="collapsed"> Mitwirkung bei der Körperhygiene</a>
									</h3>
								</div>
								<div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
									<div class="panel-body">
                                    <h5 style="margin-top:0px;">actioVITA Betreuungskräfte:</h5>
										<ul class="bullet-list">
											<li>helfen beim An-/Ausziehen</li>
											<li>waschen den Pflegebedürftigen</li>
											<li>berücksichtigen Gebisspflege</li>
                                            <li>ermöglichen Duschen und Baden</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="heading4">
									<h3 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="true" aria-controls="collapse4" class="collapsed"> Förderung von Mobilität</a>
									</h3>
								</div>
								<div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
									<div class="panel-body">
                                    <h5 style="margin-top:0px;">actioVITA Betreuungskräfte:</h5>
										<ul class="bullet-list">
											<li>unterstützen Stehen und Gehen</li>
											<li>lagern im Bett um</li>
											<li>machen gemeinsame Spaziergänge und Ausflüge</li>
                                            <li>erledigen Botengänge</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="heading5">
									<h3 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="true" aria-controls="collapse5" class="collapsed"> Soziale Säule und Ansprechpartner</a>
									</h3>
								</div>
								<div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
									<div class="panel-body">
                                    <h5 style="margin-top:0px;">actioVITA Betreuungskräfte:</h5>
										<ul class="bullet-list">
											<li>haben Zeit für Gespräche</li>
											<li>achten auf menschliches Miteinander</li>
											<li>helfen, Kontakte zu Freunden zu halten</li>
                                            <li>sind an Ihrer Seite</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>
	<footer id="footer">
		<div class="decor-box">
			<span class="decor"></span>
		</div>
		<div class="container">
			<a href="#wrapper" class="btn-top icon-arrow-top2"></a>
		</div>
		<div class="f1">
			<div class="container">
				<div class="footer-img">
					<img src="images/img-08.png" height="183" width="571" alt="image_description">
				</div>
				<div class="row">
					<div class="col-sm-5">
						<h2> Wichtiges bei actioVITA <br> Rhein-Main</h2>
						<div class="open-close">
							<a href="#" class="opener">bitte wählen...</a>
							<ul class="sub-nav slide">
								<li><a href="actiovita_grundsaetzliches.html">über uns</a></li>
								<li><a href="actiovita_vor-ort.html">actioVITA vor Ort</a></li>
								<li><a href="ambulante-pflege.html">Ambulante Pflege</a></li>
                                <li><a href="actiovita_vorgehensweise.html">24 Stunden Betreuung</a></li>
								<li><a href="info_pflegebeduerftigkeit.html">allgemeine Informationen</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-5 col-sm-offset-1">
						<h2>&nbsp;</h2>
						<div class="open-close">
							<a href="#" class="opener">bitte wählen...</a>
							<ul class="sub-nav slide">
								<li><a href="kontakt.php">Online-Kontaktformular</a></li>
								<li><a href="https://www.test.de/Pflege-zu-Hause-Vermittlungsagenturen-im-Test-1772650-1772585/" target="_blank">"GUT" bei Stiftung Warentest</a></li>
								<li><a href="sitemap.html">Sitemap unserer Webseite</a></li>
								<li><a href="impressum.html">Impressum / Datenschutz</a></li>
								<li class="alt-item">
									Social Media:
									<ul class="social">
										<li><a href="https://www.facebook.com/pages/actioVITA-GMBH/251976334907488" target="_blank" class="icon-social-facebook"></a></li>
										<li><a href="https://twitter.com/actiovita" target="_blank" class="icon-social-twitter"></a></li>
										<li><a href="https://plus.google.com/108996571677360435067/" target="_blank" class="icon-google"></a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4 col-sm-offset-1">
						<div class="actio-brand">
							<a href="#"><img src="images/img-09.png" height="35" width="162" alt="actiovita"></a>
						</div>
						<p>actioVITA Rhein-Main GmbH</p>
						<address>Ludwig-Erhard-Str. 16-18 <br>65760 Eschborn</address>
						<dl class="contact-info">
							<dt>Telefon:</dt>
							<dd>06196 / 97 10 770</dd>
							<dt>Telefax:</dt>
							<dd>06196 / 97 10 799</dd>
							<dt> E-Mail:</dt>
							<dd><a href="mailto:&#114;&#104;&#101;&#105;&#110;&#45;&#109;&#97;&#105;&#110;&#64;&#97;&#99;&#116;&#105;&#111;&#118;&#105;&#116;&#97;&#46;&#100;&#101;">&#114;&#104;&#101;&#105;&#110;&#45;&#109;&#97;&#105;&#110;&#64;&#97;&#99;&#116;&#105;&#111;&#118;&#105;&#116;&#97;&#46;&#100;&#101;</A></dd>
						</dl>
					</div>
				</div>
				<div class="sub-info">
					<p>actioVITA Rhein-Main ist Mitglied im:</p>
					<div class="sub-logo">
						<img src="images/sub-logo.png" height="67" width="223" alt="Mitglied im Bundesverband privater Anbieter sozialer Dienste e.V.">
					</div>
					<ul class="social">
						<li><a href="https://www.facebook.com/pages/actioVITA-GMBH/251976334907488" target="_blank" class="icon-social-facebook"></a></li>
										<li><a href="https://twitter.com/actiovita" target="_blank" class="icon-social-twitter"></a></li>
										<li><a href="https://plus.google.com/108996571677360435067/" target="_blank" class="icon-google"></a></li>
					</ul>
				</div>
				<span class="copy">Copyright &copy;2005 - 2015 actioVITA Rhein-Main GmbH.  Alle Rechte vorbehalten.</span>
			</div>
		</div>
	</footer>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">window.jQuery || document.write('<script src="js/jquery-1.11.1.min.js"><\/script>')</script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.main.js"></script>
<script type="text/javascript">
        if (navigator.userAgent.match(/IEMobile\/10\.0/) || navigator.userAgent.match(/MSIE 10.*Touch/)) {
            var msViewportStyle = document.createElement('style')
            msViewportStyle.appendChild(
                document.createTextNode(
                    '@-ms-viewport{width:auto !important}'
                )
            )
            document.querySelector('head').appendChild(msViewportStyle)
        }
</script>
<script type="text/javascript">

	$(document).ready(function(){
        $('#per_email').click(function() {
            $('#Email_container').toggle();
            <!--$('.text_container1').css("color", "red");-->
        });
    });

    $(document).ready(function(){
        $('#per_post').click(function() {
            $('#post_container').toggle();
        });
    });

	    $(document).ready(function(){
        $('#per_telefon').click(function() {
            $('#telephone_container').toggle();
        });
    });

	    $(document).ready(function(){
        $('#per_telefax').click(function() {
            $('#fax_container').toggle();
        });
    });
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-7902070-1', 'auto');
  ga('send', 'pageview');
 
</script>
<!-- Google Code für ein Remarketing-Tag -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1070632248;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1070632248/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
</body>
</html>