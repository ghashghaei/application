<?php
$attribute=array('id'=>'form','class'=>'test');
echo form_open('',$attribute);
?>
<div class="row mt-4 pt-4 mainform">
<div class="col-2 mt-3">money_val:</div>
    <div class="col-4">
        <input type="text" name="money_val" class="form-control">
    </div>
</div>
<div class="row mt-4 pt-4 mainform">
<div class="col-2 mt-3">money_date:</div>
    <div class="col-4">
        <input type="text" name="money_date" class="form-control">
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
            url:'<?=base_url("index.php/Accountant/get_payment_data");?>',
            dataType:'json',
            type:'POST',
            data:form.serialize(),
            success:function (data) {
                var ResId=json_to_array(data,'ResId');
                var Msg=json_to_array(data,'Msg');
                if(ResId==1){
                    document.getElementById("form").reset();
                }
                
            },
            error:function (data) {
                alert("ertebat ba server ba moshkel movajeh ast");
            }
        })
    });
   
</script>




