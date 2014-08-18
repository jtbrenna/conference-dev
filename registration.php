<?php

$nameTitle = "";
$firstName = "";
$midInitial = "";
$lastName = "";
$affiliation = "";
$email = "";
$comments = "";
$absTitle = "";
$abstract = "";

if (isset($_POST["submit"])){

  function clean($elem){
    if(!is_array($elem))
        $elem = htmlentities($elem,ENT_QUOTES,"UTF-8");
    else
        foreach ($elem as $key => $value)
            $elem[$key] = clean($value);
    return $elem;
  }

  if(isset($_POST)) $_CLEAN['POST'] = clean($_POST); 

  $nameTitle = $_CLEAN['POST']['select'];
  $firstName = $_CLEAN['POST']['inputFirstName'];
  $midInitial = $_CLEAN['POST']['inputMiddleInitial'];
  $lastName = $_CLEAN['POST']['inputLastName'];
  if(isset($_CLEAN['POST']["radRegister"])){
    $type = $_POST["radRegister"];
  }
  $affiliation = $_CLEAN['POST']['inputInstitute'];
  $email = $_CLEAN['POST']['inputEmail'];
  $comments = $_CLEAN['POST']['textComments'];
  $absTitle = $_CLEAN['POST']['inputTitle'];
  $abstract = $_CLEAN['POST']['textAbstract'];
  if(isset($_CLEAN['POST']["radPoster"])){
    $poster = $_POST["radPoster"];
  }
   

        //Where the mail is going
        $to = 'nvanvalk@uvm.edu';

        // just sets these variable to the current date and time
        $todaysDate=strftime("%x");
        $currentTime=strftime("%X");

        /* subject line for the email message */
        $subject = "New 2014 NCAAE " . $type;

        // be sure to change Your Site and yoursite to something meaningful
        $mailFrom = "2014 NCAAE Registration <>";

        $cc = "";  // if you needed to Carbon Copy someone (person who fills out form will see this)
        $bcc = ""; // if you need to Blind Carbon Copy (person who fills out form will NOT see this)


        //build your message here.
        $message  = '<p>New 2014 NCAAE ' . $type . ' registered on ' . $todaysDate;

        $message .= '<ul><li><strong>Title</strong>: ' . $nameTitle . '</li>';
        $message .= '<li><strong>First Name</strong>: ' . $firstName . '</li>';
        $message .= '<li><strong>Middle Initial</strong>: ' . $midInitial . '</li>';
        $message .= '<li><strong>Last Name</strong>: ' . $lastName . '</li>';
        $message .= '<li><strong>Registration Type</strong>: ' . $type . '</li>';
        $message .= '<li><strong>Institutional Affiliation</strong>: ' . $affiliation . '</li>';
        $message .= '<li><strong>Email</strong>: ' . $email . '</li>';
        $message .= '<li><strong>Comments</strong>: ' . $comments . '</li>';

        if($type == 'Attendee'){
          $message .= '</ul>';
        }

        if($type == 'Presenter'){
          $message .= '<li><strong>Abstract Title</strong>: ' . $absTitle . '</li><br>';
          $message .= '<li><strong>Abstract</strong>: ' . $abstract . '</li><br>';
          $message .= '<li><strong>Willingness to present research in the form of a poster</strong>: ' . $poster . '</li></ul>';
        }

        
        /* message */
        $messageTop  = '<html><head><title>' . $subject . '</title></head><body>';
    
      

        /* To send HTML mail, you can set the Content-type header. */
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";

        /* additional headers */

        $headers .= "From: " . $mailFrom . "\r\n";

        if ($cc!="") $headers .= "CC: " . $cc . "\r\n";
        if ($bcc!="") $headers .= "Bcc: " . $bcc . "\r\n";

        $mailMessage = $messageTop . $message;

        /* this line actually sends the email */ 
        mail($to, $subject, $mailMessage, $headers);


        if($type == 'Attendee'){
          header("Location: formConfirmation.php");
        } else {
          header("Location: abstractConfirmation.php");
        }
        

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="">
    <meta name="dcterms.created" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>33rd Annual Northeast Conference on Andean Archaeology and Ethnohistory</title>

    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script type="text/javascript" src="js/form-validation.js" ></script>

    <script type="text/javascript">

              function presenterCheck() {
              if (document.getElementById('radPresenter').checked) {
                document.getElementById('ifPresenter').style.display = 'block';
              }
                else document.getElementById('ifPresenter').style.display = 'none';
              }

    </script>

  </head>

  <body>
    <?php include 'header.php';?>
    <?php include 'nav.php';?>

    <h2 class="col-md-offset-1 header-space">Registration</h2>

    <div class="panel panel-default col-md-10 col-md-offset-1">
      <div class="panel-body">

        <p>Please fill out the following form in order to register for the conference. As in past years, there is NO registration or conference fee. We would appreciate if ALL persons planning to attend register individually so we can plan accordingly.</p>
        <p>Attendee Registration will remain open until Friday, November 15, 2014. If you’re planning to attend but have not registered already, please do so in order to help us finalize conference organization.</p>
        
        <form class="form-horizontal" name="regForm" method="post" onsubmit="return validateForm(this)">
          <fieldset>
            <legend>2014 NCAAE Registration Form</legend>

            <div class="form-group" id="selectDiv">
              <label for="select" class="col-lg-2 control-label">Title <span style="color: red;">*</span></label>
              <div class="col-lg-2">
                <select class="form-control" id="select" name="select">
                  <option>-None-</option>
                  <option>Mr.</option>
                  <option>Mrs.</option>
                  <option>Ms.</option>
                  <option>Dr.</option>
                  <option>Prof.</option>
                </select>
              </div>
            </div>

            <div class="form-group" id="fNameDiv">
              <label for="inputFirstName" class="col-lg-2 control-label">First Name <span style="color: red;">*</span></label>
              <div class="col-lg-3">
                <input type="text" class="form-control" id="inputFirstName" name="inputFirstName" placeholder="First Name">
              </div>
              <div class="error" id="inputFirstNameError"></div>
            </div>

            <div class="form-group">
              <label for="inputMiddleInitial" class="col-lg-2 control-label">Middle Initial</label>
              <div class="col-lg-1">
                <input type="text" class="form-control" id="inputMiddleInitial" name="inputMiddleInitial" placeholder="">
              </div>
            </div>

            <div class="form-group" id="lNameDiv">
              <label for="inputLastName" class="col-lg-2 control-label">Last Name <span style="color: red;">*</span></label>
              <div class="col-lg-3">
                <input type="text" class="form-control" id="inputLastName" name="inputLastName" placeholder="Last Name">
              </div>
              <div class="error" id="inputLastNameError"></div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label">Registration Type</label>
              <div class="col-lg-10">
                <div class="radio">
                  <label>
                    <input type="radio" onclick="javascript:presenterCheck();" name="radRegister" id="radAttendee" value="Attendee" checked="">
                    Attendee Registration
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" onclick="javascript:presenterCheck();" name="radRegister" id="radPresenter" value="Presenter">
                    Presenter Registration
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="inputInstitute" class="col-lg-2 control-label">Institutional Affiliation</label>
              <div class="col-lg-3">
                <input type="text" class="form-control" id="inputInstitute" name="inputInstitute" placeholder="Institutional Affiliation">
              </div>
            </div>

            <div class="form-group" id="emailDiv">
              <label for="inputEmail" class="col-lg-2 control-label">Email <span style="color: red;">*</span></label>
              <div class="col-lg-3">
                <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
              </div>
              <div class="error" id="inputEmailError"></div>
            </div>

            <div class="form-group" id="emailConfDiv">
              <label for="inputEmailConf" class="col-lg-2 control-label">Confirm Email <span style="color: red;">*</span></label>
              <div class="col-lg-3">
                <input type="text" class="form-control" id="inputEmailConf" name="inputEmailConf" placeholder="Confirm Email">
              </div>
              <div class="error" id="inputEmailConfError"></div>
            </div>

            <div class="form-group" id="commentDiv">
              <label for="textArea" class="col-lg-2 control-label">Comments</label>
              <div class="col-lg-7">
                <textarea class="form-control" rows="3" id="textComments" name="textComments"></textarea>
              </div>
              <div class="error" id="textCommentsError"></div>
            </div>

            <div id="ifPresenter" style="display:none;">
              <br>
              <h4>Presenter Information</h4>
              <div class="form-group" id="titleDiv">
                <label for="inputTitle" class="col-lg-2 control-label">Title <span style="color: red;">*</span></label>
                <div class="col-lg-3">
                  <input type="text" class="form-control" id="inputTitle" name="inputTitle" placeholder="Title">
                </div>
                <div class="error" id="inputTitleError"></div>
              </div>

              <div class="form-group" id="abstractDiv">
                <label for="textAbstract" class="col-lg-2 control-label">Abstract <span style="color: red;">*</span></label>
                <div class="col-lg-7">
                  <textarea class="form-control" rows="3" id="textAbstract" name="textAbstract"></textarea>
                </div>
                <div class="error" id="textAbstractError"></div>
              </div>

              <div class="form-group">
                <label class="col-lg-offset-1 control-label">If we are unable to accommodate your oral presentation, would you be willing to present your research in the form of a poster?</label>
                <div class="col-lg-8 col-lg-offset-2">
                  <div class="radio">
                    <label>
                      <input type="radio" name="radPoster" id="radYes" value="Yes" checked="">
                      Yes
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="radPoster" id="radNo" value="No">
                      No
                    </label>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button class="btn btn-default" id="reset">Reset</button>
                <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
              </div>
            </div>

          </fieldset>
        </form>

      </div>
    </div>

    <?php include 'footer.php';?>
  </body>
</html>