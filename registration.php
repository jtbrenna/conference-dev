<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="">
    <meta name="dcterms.created" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Template</title>

    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include 'header.php';?>
    <?php include 'nav.php';?>
    <div class="panel panel-default col-md-10 col-md-offset-1">
      <div class="panel-body">

        <p>Please fill out the following form in order to register for the conference. As in past years, there is NO registration or conference fee. We would appreciate if ALL persons planning to attend register individually so we can plan accordingly.</p>
        <p>Attendee Registration will remain open until Friday, November 15, 2014. If you’re planning to attend but have not registered already, please do so in order to help us finalize conference organization.</p>
        
        <form class="form-horizontal">
          <fieldset>
            <legend>2014 NCAAE Registration Form</legend>
            <div class="form-group">
              <label for="inputEmail" class="col-lg-2 control-label">Email</label>
              <div class="col-lg-3">
                <input type="text" class="form-control" id="inputEmail" placeholder="Email">
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label">Registration Type</label>
              <div class="col-lg-10">
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">Attendee Registration</label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="select" class="col-lg-2 control-label">Title</label>
              <div class="col-lg-2">
                <select class="form-control" id="select">
                  <option>-None-</option>
                  <option>Mr.</option>
                  <option>Mrs.</option>
                  <option>Dr.</option>
                  <option>Prof.</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="inputFirstName" class="col-lg-2 control-label">First Name</label>
              <div class="col-lg-3">
                <input type="text" class="form-control" id="inputFirstName" placeholder="First Name">
              </div>
            </div>

            <div class="form-group">
              <label for="inputLastName" class="col-lg-2 control-label">Last Name</label>
              <div class="col-lg-3">
                <input type="text" class="form-control" id="inputLastName" placeholder="Last Name">
              </div>
            </div>

    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Textarea</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="textArea"></textarea>
        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
      </div>
    </div>

    


    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>

      </div>
    </div>
  </body>
</html>