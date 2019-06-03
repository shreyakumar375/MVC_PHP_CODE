<?php 
session_start();
include("userviewheader.php");
?>
<!DOCTYPE>
<html>
<head>
	<link rel="stylesheet" href="http://localhost/phpfiles/Task_Mngt/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Task_Mngt/css/Mystyle.css">
  <link rel="stylesheet" href="../Task_Mngt/css/Testcase1.css">
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
    .tables
    {
      border-style: solid;
      text-align: center;
    }
    th
    {
      text-align: center;
    }
    .color
    {
      color: white;
      width: 100%;
      background: #363D63;
    }
    .btn
    {
      float: right;
      margin-bottom: 20px;

    }
    label
    {
      text-align: left;
    }
    .mar-10{margin-left: 10px !important;}
    .create-button{margin-top:102px !important;}
    .btn
    {
      margin-right: 10px;
      font-size: 10px;
    }
    td
    {
      text-align: center;
    } 
  </style>
  
</head>
<body class="userview-body">
  
  </br></br></br>
  <form>
    <div style="" class="useview-color"><h3>User Details<a href="?rt=user/homepage" class="back-divuserview"><img src="../Task_Mngt/images/Backicon.png" title="Back" alt="arrow" height="50px" width="50px"></a></h3></div>

    <table border="1px" width="100%" class="tables">
      <thead>
        <tr>
          <th width="20%">Serial Id</th>
          <th width="20%">Employee Name</th>
          <!-- <th width="10%">Employee Password</th> -->
          <th width="20%">Employee Emai-ID</th>
          <th width="20%">Employee Creation Date</th>
          <th width="20%">Employee Creation Date&Time</th>
          <!-- <th width="20%">Action</th> -->
        </tr>
      </thead>
      <tbody id="userviewTBody"></tbody>
    </table>
  </form>
</body>
  <br><br>
  <?php require_once("Footer.php"); ?>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  
  
  //fetching user details from database
  $(document).ready(function(){
    displayRecords();
  });

  function displayRecords()
  {
    var flag = ($('#show_inactive').is(':checked')) ? 0 : 1;
    $('#userTBody').html('');
    $.ajax({
      cache:false,
      datatype:"json",
      type: "POST",
      url: '?rt=user/getDetails',
      data:{ajaxcall:true,flag:flag}
    }).done(function(data){
      if(JSON.parse(data)){
        var data = JSON.parse(data);
        //alert(data);
        console.log(data);
        var html="";
        var count = data.MVC.user_result.length;
        if(count>0){
          for (var i = 0; i < count; i++) {
            html +='<tr>';

            html +='<td>';
            html += i+1;
            html +='</td>';
            html +='<td>';
            html += data.MVC.user_result[i].TM_info_user_name;
            html +='</td>';
            /*html +='<td>';
            html += data.MVC.user_result[i].TM_info_user_pass;
            html +='</td>';*/
            html +='<td>';
            html += data.MVC.user_result[i].TM_info_user_emailid;
            html +='</td>';
            html +='<td>';
            html += data.MVC.user_result[i].TM_info_user_created_date;
            html +='</td>';
            html +='<td>';
            html += data.MVC.user_result[i].TM_info_user_created_date_time;
            html +='</td>';
            /*html +='<td>';
            html += '<img title="Edit" src="../Task_Mngt/images/Edit_icon.png" id="edit" editid="'+data.MVC.user_result[i].id+'">&nbsp;&nbsp;&nbsp;<img title="Delete" src="../Task_Mngt/images/delete.png" id="del" deleteid="'+data.MVC.user_result[i].id+'">';
            html +='</td>';*/

            html +='</tr>';

          }

          $('#userviewTBody').append(html);
        }
      }
    }).fail(function(){

    })
  }
</script>