<?php
// Couleur du texte des champs si erreur saisie utilisateur
$color_font_warn="#FF0000";
// Couleur de fond des champs si erreur saisie utilisateur
$color_form_warn="#FFCC66";
// Ne rien modifier ci-dessous si vous n’êtes pas certain de ce que vous faites !
$list['f_5']=array("Sélectionnez","MBK"," Peugeot"," Piaggio"," Kymco"," Derbi"," Aprilia"," Autres");
$list['f_7']=array("50cc"," 125cc");
$list['f_8']=array("(2T) = 2 Temps"," (4T) = 4 Temps");
if(isset($_POST['submit'])){
	$erreur="";
	// Nettoyage des entrées
	while(list($var,$val)=each($_POST)){
	if(!is_array($val)){
		$$var=strip_tags($val);
	}else{
		while(list($arvar,$arval)=each($val)){
				$$var[$arvar]=strip_tags($arval);
			}
		}
	}
	// Formatage des entrées
	$f_1=trim(ucwords(eregi_replace("[^a-zA-Z0-9éèàäö\ -]", "", $f_1)));
	$f_2=strip_tags(trim($f_2));
	$f_3=trim(ucwords(eregi_replace("[^a-zA-Z0-9éèàäö\ -]", "", $f_3)));
	$f_4=trim(eregi_replace("[^0-9\ +]", "", $f_4));
	// Verification des champs
	if(strlen($f_1)<2){
		$erreur.="<li><span class='txterror'>Le champ &laquo; Votre Nom & Prénom &raquo; est vide ou incomplet.</span>";
		$errf_1=1;
	}
	if(strlen($f_2)<2){
		$erreur.="<li><span class='txterror'>Le champ &laquo; Votre adresse mail &raquo; est vide ou incomplet.</span>";
		$errf_2=1;
	}else{
		if(!ereg('^[-!#$%&\'*+\./0-9=?A-Z^_`a-z{|}~]+'.
		'@'.
		'[-!#$%&\'*+\/0-9=?A-Z^_`a-z{|}~]+\.'.
		'[-!#$%&\'*+\./0-9=?A-Z^_`a-z{|}~]+$',
		$f_2)){
			$erreur.="<li><span class='txterror'>La syntaxe de votre adresse e-mail n'est pas correcte.</span>";
			$errf_2=1;
		}
	}
	if(strlen($f_3)<2){
		$erreur.="<li><span class='txterror'>Le champ &laquo; Votre Adresse Postal &raquo; est vide ou incomplet.</span>";
		$errf_3=1;
	}
	if(strlen($f_4)<2){
		$erreur.="<li><span class='txterror'>Le champ &laquo; Votre N° de téléphone &raquo; est vide ou incomplet.</span>";
		$errf_4=1;
	}
	if($f_5==0){
		$erreur.="<li><span class='txterror'>Le champ &laquo; Quelle est la marque de votre véhicule 2 roues ? &raquo; n'a pas été défini.</span>";
		$errf_5=1;
	}
	if(strlen($f_6)<2){
		$erreur.="<li><span class='txterror'>Le champ &laquo; Veuillez indiquez le model de votre véhicule &raquo; est vide ou incomplet.</span>";
		$errf_6=1;
	}
	if($f_7==""){
		$erreur.="<li><span class='txterror'>Le champ &laquo; Cylindré de votre véhicule (Cm3) &raquo; n'a pas été défini.</span>";
		$errf_7=1;
	}
	if($f_8==""){
		$erreur.="<li><span class='txterror'>Le champ &laquo; Type &raquo; n'a pas été défini.</span>";
		$errf_8=1;
	}
	if(strlen($f_9)<2){
		$erreur.="<li><span class='txterror'>Le champ &laquo; Votre plaque d'immatriculation &raquo; est vide ou incomplet.</span>";
		$errf_9=1;
	}
	if($erreur==""){
		// Création du message
		$titre="Message de votre site";
		$tete="From:Site@Http://jbdeuxroues.ga/\n";
		$corps.="Votre Nom & Prénom : ".$f_1."\n";
		$corps.="Votre adresse mail : ".$f_2."\n";
		$corps.="Votre Adresse Postal : ".$f_3."\n";
		$corps.="Votre N° de téléphone : ".$f_4."\n";
		$corps.="Quelle est la marque de votre véhicule 2 roues ? : ".$list['f_5'][$f_5]."\n";
		$corps.="Veuillez indiquez le model de votre véhicule : ".$f_6."\n";
		$corps.="Cylindré de votre véhicule (Cm3) : ".$list['f_7'][$f_7]."\n";
		$corps.="Type : ".$list['f_8'][$f_8]."\n";
		$corps.="Votre plaque d'immatriculation : ".$f_9."\n";
		if(mail("jb2roues.contact@gmail.com", $titre, stripslashes($corps), $tete)){
			$ok_mail="true";
		}else{
			$erreur.="<li><span class='txterror'>Une erreur est survenue lors de l'envoi du message, veuillez refaire une tentative.</span>";
		}
	}
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>JB2ROUES - Réparation Scooter 2 T | Site de redirection</title>
		<meta charset="utf-8" />
		<link rel="apple-touch-icon" sizes="76x76" href="images/logo.png">
		<link rel="icon" type="image/png" href="images/logo.png">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/bar.css" />
		<style type="text/css" media="screen">
			INPUT { color: #000; font-size: 11px; font-family: verdana, Arial, Helvetica, Geneva, Swiss, SunSans-Regular; background-color: #EEEEEE }
			SELECT { color: #000; font-size: 11px; font-family: verdana, Arial, Helvetica, Geneva, Swiss, SunSans-Regular; background-color: #EEEEEE }
			TEXTAREA { color: #000; font-size: 11px; font-family: verdana, Arial, Helvetica, Geneva, Swiss, SunSans-Regular; background-color: #EEEEEE }
			.txterror { color: black; font-size: 11px; font-family: Verdana, Arial, Helvetica, Geneva, Swiss, SunSans-Regular }
			.txtform { color: black; font-size: 12px; font-family: Verdana, Arial, Helvetica, Geneva, Swiss, SunSans-Regular }
			
		</style>
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div class="container">

						<!-- Header -->
							<header id="header">
								<div class="inner">

									<!-- Logo -->
									&nbsp;&nbsp;&nbsp;<img class="n-logo" src="images/logo.png" width="80" height="" alt="">

									<!-- Nav -->
										<nav id="nav">
											<ul>
												<li class="current_page_item"><a href="index.html">Acceuil</a></li>
												<li><a href="devis.php">DEVIS</a></li>
											</ul>
										</nav>

								</div>
							</header>

						<!-- Banner -->
							<div id="banner">
								<h2><strong>JB 2 ROUES - Réparation Scooter 2T</strong>
							</div>

					</div>
				</div>

			<!-- Main Wrapper -->
				<div id="main-wrapper">
					<div class="wrapper style1">
						<div class="inner">

							<!-- Feature 1 -->
								<section class="container box feature1">
									<div class="row">
										<div class="col-12">
											<header class="first major">
												<h2>Les sites en redirection</h2>
												<p>Retrouvez ci-dessous, tout les lien de nos sites en redirection...</p>
											</header>
										</div>
										<div class="col-4 col-12-medium">
											<section>
												<a href="https://www.facebook.com/jbdeux.roues.3" class="image featured"><img src="https://img.hebus.com/hebus_2013/06/08/preview/1370727777_28978.jpg" alt="" /></a>
												<header><i class="fab fa-facebook"></i>
													<h3>JB2ROUES</h3>
													<p>Page Facebook</p>
												</header>
											</section>
										</div>
										<div class="col-4 col-12-medium">
											<section>
												<a href="https://www.facebook.com/jbdeux.roues.3" class="image featured"><img src="https://static.wixstatic.com/media/6bcfdd_6a0c4c670a224d05a06d841be70592b9~mv2.jpg/v1/fill/w_650,h_350,al_c/6bcfdd_6a0c4c670a224d05a06d841be70592b9~mv2.jpg" alt="" /></a>
												<header><i class="fa fa-globe"></i>
													<h3>JB2ROUES</h3>
													<p>Site de demande de devis + actu</p>
												</header>
											</section>
										</div>
										<div class="col-4 col-12-medium">
											<section>
												<a href="https://jb2roues.sumup.link/" class="image featured"><img src="https://i.ytimg.com/vi/w6UTY2o5kxg/maxresdefault.jpg" alt="" /></a>
												<header><i class="fa fa-cart-arrow-down"></i>
													<h3>JB2ROUES</h3>
													<p>Site boutique</p>
												</header>
											</section>
										</div>
										<div class="col-12">
											<p>Les liens ci-dessus sont des sites créer pour "JB2ROUES". Tout les liens sont officiel.</p>
										</div>
									</div>
								</section>

						</div>
					</div>
				</div>
				<!-- Main Wrapper -->
				<div id="main-wrapper">
					<div class="wrapper style2">
						<div class="inner">
							<div class="container">
								<div id="content">

									<!-- Content -->

									<? if($ok_mail=="true"){ ?>
										<table width='100%' border='0' cellspacing='1' cellpadding='1'>
											<tr><td><span class='txtform'>Le message ci-dessous nous a bien été transmis, et nous vous en remercions.</span></td></tr>
											<tr><td>&nbsp;</td></tr>
											<tr><td><tt><?echo nl2br(stripslashes($corps));?></tt></td></tr>
											<tr><td>&nbsp;</td></tr>
											<tr><td><span class='txtform'>Nous allons y donner suite dans les meilleurs délais.<br>A bientôt.</span></td></tr>
										</table>
									<? }else{ ?>
									<form action='<? echo $PHP_SELF ?>' method='post' name='Form'>
									<table width='100%' border='0' cellspacing='1' cellpadding='1'>
									<? if($erreur){ ?><tr><td colspan='2' bgcolor='red'><span class='txterror'><font color='white'><b>&nbsp;ERREUR, votre message n'a pas été transmis</b></font></span></td></tr><tr><td colspan='2'><ul><?echo$erreur?></ul></td></tr><?}?>
									<tr><td colspan='2'><span class='txterror'>Les champs marqué d'un * sont obligatoires</span></td></tr>
									<tr><td align='right' width='30%'><span class='txtform'>Votre Nom & Prénom* :</span></td><td><input type='text' style='width:200 <?if($errf_1==1){print("; background-color: ".$color_form_warn."; color: ".$color_font_warn);}?>;' name='f_1' value='<?echo stripslashes($f_1);?>' size='24' border='0'></td></tr>
									<tr><td align='right' width='30%'><span class='txtform'>Votre adresse mail* :</span></td><td><input type='text' style='width:200 <?if($errf_2==1){print("; background-color: ".$color_form_warn."; color: ".$color_font_warn);}?>;' name='f_2' value='<?echo stripslashes($f_2);?>' size='24' border='0'></td></tr>
									<tr><td align='right' width='30%'><span class='txtform'>Votre Adresse Postal* :</span></td><td><input type='text' style='width:200 <?if($errf_3==1){print("; background-color: ".$color_form_warn."; color: ".$color_font_warn);}?>;' name='f_3' value='<?echo stripslashes($f_3);?>' size='24' border='0'></td></tr>
									<tr><td align='right' width='30%'><span class='txtform'>Votre N° de téléphone* :</span></td><td><input type='text' style='width:200 <?if($errf_4==1){print("; background-color: ".$color_form_warn."; color: ".$color_font_warn);}?>;' name='f_4' value='<?echo stripslashes($f_4);?>' size='24' border='0'></td></tr>
									<tr><td align='right' width='30%'><span class='txtform'>Quelle est la marque de votre véhicule 2 roues ?* :</span></td><td><select style='width:200 <?if($errf_5==1){print("; background-color: ".$color_form_warn."; color: ".$color_font_warn);}?>;' name='f_5' size='1'>
									<? for($id=0;$id<count($list['f_5']);$id++){
									if($id==$f_5){$ct="selected";}
									print("<option ".$ct." value=".$id.">".$list['f_5'][$id]."</option>");
									unset($ct);
									}?>
									</select></td></tr>
									<tr><td align='right' width='30%'><span class='txtform'>Veuillez indiquez le model de votre véhicule* :</span></td><td><textarea style='width:360 <?if($errf_6==1){print("; background-color: ".$color_form_warn."; color: ".$color_font_warn);}?>;' name='f_6' rows='6' cols='40'><?echo$f_6?></textarea></td></tr>
									<tr><td align='right' width='30%'><span class='txtform'>Cylindré de votre véhicule (Cm3)* :</span></td><td>
									<table border='0' cellspacing='0' cellpadding='0'>
									<? for($id=0;$id<count($list['f_7']);$id++){
									if($id==$f_7){$ct="checked";}
									print("<tr><td><input ".$ct." type='radio' name='f_7' value=".$id." border='0'></td><td><span class='txtform'>".$list[f_7][$id]."</span></td></tr>");
									unset($ct);
									}?>
									</table>
									</td></tr>
									<tr><td align='right' width='30%'><span class='txtform'>Type* :</span></td><td>
									<table border='0' cellspacing='0' cellpadding='0'>
									<? for($id=0;$id<count($list['f_8']);$id++){
									if($id==$f_8){$ct="checked";}
									print("<tr><td><input ".$ct." type='radio' name='f_8' value=".$id." border='0'></td><td><span class='txtform'>".$list[f_8][$id]."</span></td></tr>");
									unset($ct);
									}?>
									</table>
									</td></tr>
									<tr><td align='right' width='30%'><span class='txtform'>Votre plaque d'immatriculation* :</span></td><td><textarea style='width:360 <?if($errf_9==1){print("; background-color: ".$color_form_warn."; color: ".$color_font_warn);}?>;' name='f_9' rows='6' cols='40'><?echo$f_9?></textarea></td></tr>
									<tr><td align='right' width='30%'></td><td><input type='submit' name='submit' value='Envoyer' border='0'></td></tr>
									</table>
									</form>
									<? } ?>

								</div>
							</div>
						</div>
					</div>

			<!-- Footer Wrapper -->
				<div id="footer-wrapper">
					<footer id="footer" class="container">
						<div class="row">
							<div class="col-6 col-12-medium imp-medium">

								<!-- Contact -->
									<section>
										<h2>NOUS CONTACTER</h2>
										<div>
											<div class="row">
												<div class="col-6 col-12-small">
													<dl class="contact">
														<dt>Facebook</dt>
														<dd><a href="https://www.facebook.com/jbdeux.roues.3">facebook.com/jbdeux.roues.3</a></dd>
														<dt>Tel</dt>
														<dd><a href="tel:0780492459">+33780492459</a></dd>
														<dd><a href="tel:0781930979">+33781930979</a></dd>
														<dt>Email</dt>
														<dd><a href="mailto:jb2roues.contact@gmail.com">jb2roues.contact@gmail.com</a></dd>
													</dl>
												</div>
												<div class="col-6 col-12-small">
													<dl class="contact">
														<dt>Adresse</dt>
														<dd>
															2 Rue des Bleuets<br />
															21600 Longvic<br />
															Bourgogne / France
														</dd>
													</dl>
												</div>
											</div>
										</div>
									</section>

							</div>
							<div class="col-12">
								<div id="copyright">
									<ul class="menu">
										<li>&copy; <script>document.write(new Date().getFullYear())</script> - JB2ROUES™</li><li> V.1.0 </li><li> ALL RIGHT RESERVED</li><li>PROPULSÉ & DÉVELOPPER AVEC ❤ PAR JB2ROUES GROUPE.</a></li>
									</ul>
								</div>
							</div>
						</div>
					</footer>
				</div>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>