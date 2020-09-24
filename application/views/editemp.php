<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee Update</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<style> 
        .GFG { 
            background-color: white; 
            border: 2px solid black; 
            color: green; 
            padding: 5px 10px; 
            text-align: center; 
            display: inline-block; 
            font-size: 20px; 
            margin: 10px 30px; 
            cursor: pointer; 
            float: right;
        } 

      </style>

</head>
<body>

<div class="container">
  <?php if($responce = $this->session->flashdata('success')): ?>
      <div class="box-header">
        <div class="col-lg-6">
           <div class="alert alert-success"><?php echo $responce;?></div>
        </div>
      </div>
    <?php endif;?>

    <button class="GFG" 
    onclick="window.location.href = '<?=base_url('home/emplist')?>';"> 
        Back To List
    </button> 

  <h2>Update Employee</h2>
  <form action="<?=base_url('home/updatemp')?>" method="post" enctype="multipart/form-data" id="form1" name="form1">
    <input type="hidden" name="hdneditid" value="<?=$user[0]['id']?>">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?=$user[0]['name']?>" required>
    </div>

    <div class="form-group">
      <label for="address">Address:</label>
      <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" value="<?=$user[0]['address']?>" required>
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?=$user[0]['email']?>" onchange="ValidateEmail(document.form1.email)" required> 
    </div>

    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="number" class="form-control" id="phone" placeholder="Enter phone" name="phone" value="<?=$user[0]['phone']?>" required>
    </div>

    <div class="form-group"> 
        <label class="control-label" for="dob">Date</label>
        <input class="form-control" id="dob" name="dob" placeholder="MM/DD/YYY" value="<?=date('m-d-Y',strtotime($user[0]['dob']))?>" type="text"/>
    </div>

    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" name="image" accept=".jpg, .png">
    </div>
 
   
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>


<script type="text/javascript">
  var FromEndDate = new Date();
    $(function () {
        $("#dob").datepicker({
          format: "mm/dd/yyyy",
          todayHighlight: true,
          autoclose: true,
          endDate: FromEndDate
        });
    });
</script>

<script type="text/javascript">
function ValidateEmail(inputText)
{
  var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if(inputText.value.match(mailformat))
  {
    document.form1.email.focus();
    return true;
  }else
  {
  alert("You have entered an invalid email address!");
   document.form1.email.focus();
   return false;
  }
}
</script>

</body>
</html>
