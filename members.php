<!DOCTYPE html>
<html>

<head>
  <?php
  $pageTitle = "Active Members";
  include("inc/head.php");
  include("inc/members.php");
   ?>
</head>      
    
<body>    
  <?php include("inc/header.php"); ?>
  <div class="container">
    <h3 class="page-header">Members</h3>
    <table class="table table-striped">
      <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Major</th>
        <th>Contact</th>
      </tr>
      <?php
      foreach($members as $member){
        echo "<tr>
                <td>{$member['name']}</td>
                <td>{$member['position']}</td>
                <td>{$member['major']}</td>
                <td>{$member['contact']}</td>
              </tr>";
        }
       ?>
    </table>
  </div>
</body>
  
</html>