<!DOCTYPE html>
<html>
<head>
 <title>HTML5 Layout</title>
 <link rel="stylesheet" type="text/css" href="jqueryslidemenu.css" />

<!--[if lte IE 7]>
<style type="text/css">
html .jqueryslidemenu{height: 1%;} /*Holly Hack for IE7 and below*/
</style>
<![endif]-->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<script type="text/javascript" src="jqueryslidemenu.js"></script>
 <link rel=stylesheet href= vriendenboek.css
</head>
<body>
 <div class="wrapper">
 <header>
 <h1>Vriendenboek</h1>


<div id="myslidemenu" class="jqueryslidemenu">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="vrienden.php">Vrienden</a>
  <ul>
  <li><a href="vrienden.php">Vrienden</a></li>
  <li><a href="vriend_toevoegen.php">Vriend toevoegen</a></li>
  <li><a href="vriend_wijzigen.php">Vriend wijzigen</a></li>
  <li><a href="vriend_verwijderen.php">vriend verwijderen</a></li>
  </ul>
</li>
<li><a href="automerken.php">Automerken</a>
  <ul>
  <li><a href="automerken.php">Automerken</a></li>
  <li><a href="automerk_toevoegen.php">Automerk toevoegen</a></li>
  <li><a href="automerk_wijzigen.php">Automerk wijzigen</a></li>
  <li><a href="automerk_verwijderen.php">Automerk verwijderen</a></li>
  </ul>
  <li><a href="koppelingen.php">Koppelingen</a>
  <ul>
  <li><a href="automerk_koppelen.php">Automerk koppelen</a></li>
  <li><a href="automerk_ontkoppelen.php">Automerk ontkoppelen</a></li>
  </ul>
</li>
<li><a href="aivd.php">AIVD</a>
  <ul>
  <li><a href="">AIVD 1.2</a></li>
  <li><a href="">AIVD 1.3</a>
    <ul>
    <li><a href="#">AIVD 1.4</a></li>
    <li><a href="#">AIVD 1.5</a></li>
    <li><a href="#">AIVD 1.6</a>
    </ul>
  </li>
  </ul>
</li>
<li><a href="bouwmethode.php">Bouwmethode</a></li>
</ul>
<br style="clear: left" />
</div>

 </header>
 
 <section class="courses">
 	
 <!--Dit is het artikel links boven((((Hier komt straks de php uitslag in te staan))))--->
<figure>
 <img src="images/vrienden1.jpg" alt="Foto1 vrienden dierenrijk" />
 <figcaption>Vrienden komt u ook in het dierenrijk tegen</figcaption>
 </figure>
 <hgroup>
 <h2>Een inleiding</h2>
 <h3>IWP 2 vriendenboek</h3>
 </hgroup>
 <p>Dit vriendenboek is ontwikkeld door Chris Smeets met als doel het 
 	Succesvol afronden van IWP 2 aan de Fontys te Eindhoven
 	het ontwikkelen van dit vriendenboek koste veel tijd, maar was wel 
 	erg interessant.</p>
 </article> 
 

 <!--Dit is het artikel links onder((((Hier komt straks de php uitslag in te staan))))--->
<figure>
 <img src="images/vrienden2.jpg" alt="Foto2 vrienden dierenrijk" />
 <figcaption>Vrienden door dik en dun!</figcaption>
 </figure>
 <hgroup>
 <h2>Uitleg pagina</h2>
 <h3>Hoe werkt het?</h3>
 </hgroup>
 <p>U kunt op deze pagina vriend worden en vrienden toevoegen, daarnaast is er een 
 	optie om uw auto toe te voegen. In het navigatiemenu treft u de mogelijkheden
 	waarover u kunt beschikken om w vrienden toe te voegen, te verwijderen of te bewerken. 
 	Veel plezier</p>
 </article> 
 
 
 </section>
 <aside>
 <section class="popular-recipes">
 <h2>Over vrienden</h2>
  <a href="http://nl.wikipedia.org/wiki/Vrienden">Vrienden op WikipediA </a>
 <a href="http://www.amstel.nl/agecheck">Vrienden van amstel live</a>
 <a href="https://nl-nl.facebook.com/">Registreer je op Facebook</a>
 <a href="https://www.youtube.com/user/fijnevriendentv">Youtube Fijne vrienden</a>
 </section>
 
 
 <section class="contact-details">
 <h2>Contact</h2>
 <p>Chris Smeets<br />
 Clausstraat 29<br />
 6096 CG<br />
 Grathem<br/>
 06-46191653</p>
 </section>
 </aside>
 <footer>
 &copy; Vriendenboek Chris Smeets
 </footer>
 </div><!-- .wrapper -->
</body>
</html>