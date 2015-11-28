<!DOCTYPE html>
<html>

<head>
  <?php
    include("database.php");
    //create select query
    try {
        $shouts = $db->query("SELECT * FROM shouts ORDER BY id DESC");
    } catch (Exception $e) {
        echo "Data could not be retrieved from the database.";
        exit;
    }
    $pageTitle = "Shout Box";
    include("inc/head.php");
   ?>
</head>
  
<body>
  <?php include("inc/header.php"); ?>
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading text-center"><h1>SHOUT IT OUT!</h1></div>
      <div class="panel-body">
        <ul>
          <!-- fetch in shouts from database -->
          <?php foreach($shouts->fetchAll(PDO::FETCH_ASSOC) as $row){ ?>
            <li><span><?php echo $row['time']; ?> - </span><?php echo "<b>".$row['user'].":</b>"; ?> <?php echo $row["message"]; ?></li>
          <?php } ?>
        </ul>
      </div>
      <div id="input">
        <?php if(isset($_GET["error"])): ?>
          <div class="error">
            <?php echo $_GET["error"]; ?>
          </div>
        <?php endif;?>
        <!-- forms for user's name, message and submit button -->
        <div class="panel-footer">
          <form method="POST" action="process.php">
              <div class="col-md-3 form-group">
                <label class="control-label">Name (maximum of 20 characters): </label>
                <input class="form-control" type="text" name="user" maxlength="20" placeholder="Enter Your Name" />
              </div>
              <div class="col-md-9 form-group">
                <label class="control-label">Message (maximum of 100 characters): </label>
                <input class="form-control" type="text" name="message" maxlength= "100" placeholder="Enter A Message"/>
              </div>
            <br/>
            <div class="form-group">
              <input class="btn btn-success btn-block" type="Submit" name="submit" value="Shout It Out"/>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include("inc/footer.php"); ?>
</body>
  
</html>