<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'Header.php';?>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
  	.btn{
  		float: right;

  	}
  </style>
</head>
<body>

  <div class="container">
    <h2> </h2>

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" class="btn" data-toggle="modal" data-target="#myModal">Create Profile</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" >&times;</button>
            <h4 class="modal-title">Employee Details</h4>
          </div>
          <div class="modal-body">
            <table>
             <tr>
              <td>
               Employee Id:<td><input type="text" name="empname"id="empname">
               </td></tr>
               <tr>
                <td>
                 Employee Name:<td><input type="text" name="empname"id="empname">
                 </td></tr>
                 <tr>
                  <td>
                   Employee Email_id:<td><input type="text" name="empname"id="empname">
                   </td></tr>
                   <tr>
                    <td>
                     Employee Creation Date:<td><input type="Date" name="empname"id="empname">
                     </td></tr>
                     <tr>
                      <td>
                       Employee Creation Date&Time:<td><input type="datetime-local" name="empname"id="empname">
                       </td>
                     </tr>
                     <tr>
                      <td>
                       <button class="btn-primary" value="Submit">Submit</button>
                     </td>
                   </tr>
                 </table>
               </div>
               <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            
          </div>
        </div>
        
      </div>

    </body>
    <br>
      <?php include 'Footer.php';?>
    </html>