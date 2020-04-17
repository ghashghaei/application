<?php
$attribute=array('id'=>'form','class'=>'test');
echo form_open('',$attribute);
?>
<div class="row mt-4 pt-4 mainform">
<div class="col-2 mt-3">username:</div>
    <div class="col-4">
        <input type="text" name="username" class="form-control">
    </div>
</div>
<div class="row mt-4 pt-4 mainform">
<div class="col-2 mt-3">password:</div>
    <div class="col-4">
        <input type="text" name="password" class="form-control">
    </div>
</div>
<div class="row mt-4 pt-4 mainform">
    <div class="col-2 mt-3">name:</div>
    <div class="col-4">
        <input type="text" name="name" class="form-control">
    </div>
</div>
<div class="row mt-4 pt-4 mainform">
    <div class="col-2 mt-3">family:</div>
    <div class="col-4">
        <input type="text" name="family" class="form-control">
    </div>
</div>
<div class="row mt-4 pt-4 mainform">
    <div class="col-2 mt-3">tell:</div>
    <div class="col-4">
        <input type="text" name="tell" class="form-control">
    </div>
</div>
<div class="row mt-4 pt-4 mainform">
    <div class="col-4">
        <button type="button" name="save" id="save" value ="save" class="btn btn-primary col-6">save</button>
    </div>
    
</div>

<?php
echo form_close('');
?>
<script>
    $("#save").click(function () {
        var form=$(this.form);
        $.ajax({
            url:'<?=base_url("index.php/Accountant/get_data");?>',
            dataType:'json',
            type:'POST',
            data:form.serialize(),
            success:function (data) {
                var ResId=json_to_array(data,'ResId');
                var Msg=json_to_array(data,'Msg');
                if(ResId==1){
                    document.getElementById("form").reset();
                }
                window.location = '<?= base_url("index.php/Accountant/panel_page"); ?>';
            },
            error:function (data) {
                alert("ertebat ba server ba moshkel movajeh ast");
            }
        })
    });
   
</script>




