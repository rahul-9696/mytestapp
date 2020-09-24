<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js
"></script>

<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">>

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

      #tblemplist_wrapper{
        width: 90%;
        margin-left: 30px;
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

  <h2>Employee info</h2>
  <button class="GFG" 
    onclick="window.location.href = '<?=base_url('home/addemployee')?>';"> 
        Add New
    </button> 

</div>

<table id="tblemplist" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>DOB</th>
                <th>Image</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
               foreach ($empinfo as $elist) {
               
              ?>
            <tr>
                <td><?=$elist['name']?></td>
                <td><?=$elist['address']?></td>
                <td><?=$elist['email']?></td>
                <td><?=$elist['phone']?></td>
                <td><?= date('F j, Y', strtotime($elist['dob']))?></td>
                <td><img src="<?=base_url('uploads/emp-img/').$elist['image']?>" style="width: 30px;"></td>
                <td>
                  <form method="POST" action="<?php echo base_url("home/editemployee"); ?>" style="width: 50px; display:inline-block;">
                      <input type="hidden" value="<?php echo $elist['id']; ?>" name="euid">
                      <div class="icon_input">
                         <i class="fa fa-pen"></i>
                         <input type="submit" value="" class="btn btn-info btn-sm btn_edit"> 
                     </div>  
                  </form>
                  <form method="POST" action="<?php echo base_url("home/delemp"); ?>" style="width: 50px;display: inline-block;">
                     <input type="hidden" value="<?php echo $elist['id']; ?>" name="duid">
                     <div class="icon_input">
                         <i class="fa fa-trash"></i>
                         <input type="submit" value="" class="btn btn-danger btn-sm btn_delete" onclick="return confirm('Are you sure to delete?');">
                     </div>
                  </form>

                </td>
            </tr>
          <?php } ?>
       </tbody>
    
    </table>


<script type="text/javascript">
  $(document).ready(function() {
    $('#tblemplist').DataTable();
} );
</script>
</body>
</html>
