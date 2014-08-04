<div class="navbar navbar-default">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Brand</a>
  </div>
  <div class="navbar-collapse collapse navbar-responsive-collapse">
	<ul class="nav navbar-nav">
<?php 
if(basename($_SERVER['PHP_SELF'])=="home.php"){
    print '<li class="active"><a href="#">Home</a></li>';
} else {
    print '<li class="grow"><a href="home.php">Home</a></li>';
} 
?>

<?php 
if(basename($_SERVER['PHP_SELF'])=="history.php"){
    print '<li class="active"><a href="#">History</a></li>';
} else {
    print '<li class="grow"><a href="history.php">History</a></li>';
} 
?>

<?php 
if(basename($_SERVER['PHP_SELF'])=="registration.php"){
    print '<li class="active"><a href="#">Registration</a></li>';
} else {
    print '<li class="grow"><a href="registration.php">Registration</a></li>';
} 
?>

<?php 
if(basename($_SERVER['PHP_SELF'])=="program.php"){
    print '<li class="active"><a href="#">Program</a></li>';
} else {
    print '<li class="grow"><a href="program.php">Program</a></li>';
} 
?>  

<?php 
if(basename($_SERVER['PHP_SELF'])=="locations.php"){
    print '<li class="active"><a href="#">Locations</a></li>';
} else {
    print '<li class="grow"><a href="locations.php">Locations</a></li>';
} 
?> 

<?php 
if(basename($_SERVER['PHP_SELF'])=="travel.php"){
    print '<li class="active"><a href="#">Travel &amp; Hotels</a></li>';
} else {
    print '<li class="grow"><a href="travel.php">Travel &amp; Hotels</a></li>';
} 
?>

<?php 
if(basename($_SERVER['PHP_SELF'])=="events.php"){
    print '<li class="active"><a href="#">Events</a></li>';
} else {
    print '<li class="grow"><a href="events.php">Events</a></li>';
} 
?> 

<?php 
if(basename($_SERVER['PHP_SELF'])=="sponsors.php"){
    print '<li class="active"><a href="#">Sponsors</a></li>';
} else {
    print '<li class="grow"><a href="sponsors.php">Sponsors</a></li>';
} 
?>  

<?php 
if(basename($_SERVER['PHP_SELF'])=="contact.php"){
    print '<li class="active"><a href="#">Contact Us</a></li>';
} else {
    print '<li class="grow"><a href="contact.php">Contact Us</a></li>';
} 
?> 
</ul>
    <form class="navbar-form navbar-right">
      <input type="text" class="form-control col-md-8" placeholder="Search">
    </form>
  </div>
</div>