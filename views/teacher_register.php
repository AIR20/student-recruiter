<!DOCTYPE html>
<html>
<?php require 'shared/head.php'; ?>
<body>
  <?php require 'shared/navbar.php'; ?>
  <div class="container">
    <div class="bs-docs-section">
      <div class = "row">
        <!--header-->
        <div class="main col-md-12">
          <h1 class="page-header"> Teacher registration</h1>
          <p>Register for an account</p>
        </div>

        <!--registration form-->
        <div class="well col-md-8 col-md-offset-2">
          <form action="" method="post" class="form-horizontal">
            
            <!--title, drop down-->
            <div class="form-group">
              <label class="col-sm-2 control-label">
                Title: 
              </label>
              <div class="col-sm-10">
                <select class="form-control" name="password">
                  <option value="Mr">Mr</option>
                  <option value="Mrs">Mrs</option>
                  <option value="Ms">Ms</option>
                  <option value="Miss">Miss</option>
                  <option value="Dr">Dr</option>
               </select>
              </div>
            </div>
          
            <!--first name-->
            <div class="form-group">
              <label class="col-sm-2 control-label">
                First name: <span class="error">*<?php echo $fnameErr; ?></span>
              </label>
              <div class="col-sm-10">
                <input class="form-control" type="text" name="fname" value="<?php echo $_SESSION['fname'];?>">
              </div>
            </div>

            <!--last name-->
            <div class="form-group">
              <label class="col-sm-2 control-label">
               Surname: <span class="error">*<?php echo $lnameErr; ?></span>
              </label>
              <div class="col-sm-10">
                <input class="form-control" type="text" name="lname" value="<?php echo $_SESSION['lname'];?>">
              </div>
            </div>
  
            <!--email-->
            <div class="form-group">
              <label class="col-sm-2 control-label">
                Email: <span class="error">*<?php echo $emailErr; ?></span>
              </label>
              <div class="col-sm-10">
                <input class="form-control" type="text" name="email" value="<?php echo $_SESSION['email'];?>">
              </div>
            </div>

            <!--date of birth-->
            <div class="form-group">
              <label class="col-sm-2 control-label">
               DOB: <span class="error">*<?php echo $dobErr?></span>
              </label>
              <div class="form-inline">
                <div class="col-sm-10">
                  <input class="form-control" placeholder="YYYY" type="text" name="year" value="<?php echo $_SESSION['year'];?>">
                  <input class="form-control" placeholder="MM" type="text" name="month" value="<?php echo $_SESSION['month'];?>">
                  <input class="form-control" placeholder="DD" type="text" name="day" value="<?php echo $_SESSION['day'];?>">
                </div>
              </div>
            </div>
            
            <!--address-->
            <div class="form-group">
              <label class="col-sm-2 control-label">
                Address line 1: <span class="error">*<?php echo $addr1Err; ?></span>
              </label>
              <div class="col-sm-10">
                <input class="form-control" type="text" name="addr1" value="<?php echo $_SESSION['addr1'];?>">
              </div>
            </div>
  
            <div class="form-group">
              <label class="col-sm-2 control-label">
                Address line 2: <span class="error"><?php echo $addr2Err; ?></span>
              </label>
              <div class="col-sm-10">
                <input class="form-control" type="text" name="addr2" value="<?php echo $_SESSION['addr2'];?>">
              </div>
            </div>
  
            <div class="form-group">
              <label class="col-sm-2 control-label">
                Address line 3: <span class="error">*<?php echo $townErr; ?></span>
              </label>
  
            <div class="col-sm-10">
              <input class="form-control" type="text" name="town" value="<?php echo $_SESSION['town'];?>">
            </div>
  
            <!-- postcode -->
            <div class="form-group">
              <label class="col-sm-2 control-label">
                Post code: <span class="error">*<?php echo $postcodeErr; ?></span>
              </label>
              <div class="col-sm-10">
                <input class="form-control" type="text" name="postcode" value="<?php echo $_SESSION['postcode'];?>">
              </div>
            </div>
            
            <!--school-->
            <div class="form-group">
              <label class="col-sm-2 control-label">
                Title: 
              </label>
              <div class="col-sm-10">
                <select class="form-control" name="password">
               </select>
              </div>
            </div>
            
            <!--submit form-->
            <input class="col-sm-offset-2 btn btn-primary" type="submit">

          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

