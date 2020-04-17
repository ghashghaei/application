<?php
$attribute=array('id'=>'form','class'=>'test');
echo form_open('',$attribute);
?>
<div class="sidenav">
         <div class="login-main-text">
            <h2>Application<br> Login Page</h2>
            <p>Login or register from here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form>
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" class="form-control" name="username" placeholder="User Name">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" class="form-control" placeholder="Password">
                  </div>
                  <button type="button" name="Login" id="Login" value ="Login" class="btn btn-black">Login</button>
                  <button type="button" id="Register" class="btn btn-secondary">Register</button>
               </form>
            </div>
         </div>
      </div>
<?php
echo form_close('');
?>
<script>
    $("#Register").click(function () {


        var form=$(this.form);
        $.ajax({
            url:'<?=base_url("index.php/Accountant/check_register");?>',
            dataType:'json',
            type:'POST',
            data:form.serialize(),
            success:function (data) {
                var ResId=json_to_array(data,'ResId');
                var Msg=json_to_array(data,'Msg');
                if(ResId==1){
                   window.location = '<?= base_url("index.php/Accountant/register"); ?>';
                }
            },
            error:function (data) {
                alert("ertebat ba server ba moshkel movajeh ast");
            }
        })

    });
    $("#Login").click(function () {

        var form=$(this.form);
        $.ajax({
            url:'<?=base_url("index.php/Accountant/check_login");?>',
            dataType:'json',
            type:'POST',
            data:form.serialize(),
            success:function (data) {
                var ResId=json_to_array(data,'ResId');
                if(ResId==1){
                    document.getElementById("form").reset();
                    window.location = '<?= base_url("index.php/Accountant/panel_page"); ?>';
                }
                
            },
            error:function (data) {
                alert("ertebat ba server ba moshkel movajeh ast");
            }
        })

    });
</script>




