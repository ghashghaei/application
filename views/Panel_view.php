<?php
$attribute=array('id'=>'form','class'=>'test');
echo form_open('',$attribute);
?>
<div class=" mt-4 pt-4 mainform">

    <div class="row mt-2 pt-2" id="ajax">
        {content}

    </div>
    <div class="row mt-4 pt-4 mainform">
        <div class="col-6">
            <button type="button" name="payment" id="payment" class="btn btn-primary col-6">Payment Registeration</button>
        </div>

    </div>
    <div class="row mt-4 pt-4 mainform">
        <div class="col-6">
            <button type="button" name="report" id="report" class="btn btn-primary col-6">Report</button>
        </div>

    </div>
    <div class="row mt-4 pt-4 mainform">
        <div class="col-6">
            <button type="button" name="exit" id="exit" class="btn btn-primary col-6">Exit </button>
        </div>

    </div>
</div>


<?php
echo form_close('');
?>

<script>
 $.ajax({
            url:'<?=base_url("index.php/Accountant/panel");?>',
            dataType:'json',
            type:'POST',
            data:{
                '<?= $this->security->get_csrf_token_name(); ?>':'<?= $this->security->get_csrf_hash();?>'
            },
            success:function (data) {
                var content=json_to_array(data,'content');
                $("#ajax").html(content);
            },
            error:function (data) {

            }
        })
        $("#payment").click(function () {
        var form=$(this.form);
        $.ajax({
            url:'<?=base_url("index.php/Accountant/payment_page");?>',
            dataType:'json',
            type:'POST',
            data:form.serialize(),
            success:function (data) {
                var ResId=json_to_array(data,'ResId');
                if(ResId==1){
                    window.location = '<?= base_url("index.php/Accountant/payment"); ?>'; 
                } 
            },
            error:function (data) {
                alert("ertebat ba server ba moshkel movajeh ast");
            }
        })
    });
    $("#report").click(function () {
        var form=$(this.form);
        $.ajax({
            url:'<?=base_url("index.php/Accountant/report_accountant");?>',
            dataType:'json',
            type:'POST',
            data:form.serialize(),
            success:function (data) {
                var ResId=json_to_array(data,'ResId');
                if(ResId==1){
                    window.location = '<?= base_url("index.php/Accountant/report"); ?>'; 
                } 
            },
            error:function (data) {
                alert("ertebat ba server ba moshkel movajeh ast");
            }
        })
    });
    $("#exit").click(function () {
        var form=$(this.form);
        $.ajax({
            url:'<?=base_url("index.php/Accountant/exit_panel");?>',
            dataType:'json',
            type:'POST',
            data:form.serialize(),
            success:function (data) {
                var ResId=json_to_array(data,'ResId');
                if(ResId==1){
                    window.location = '<?= base_url("index.php/Accountant/exit_page"); ?>';
                }
            },
            error:function (data) {
                alert("ertebat ba server ba moshkel movajeh ast");
            }
        })
    });
</script>



