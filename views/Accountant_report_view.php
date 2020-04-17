
<table class="table mt-4">
    <thead class="thead-dark">
    <tr>
        <th scope="col" class="text-center">#</th>
        <th scope="col" class="text-center">money_val</th>
        <th scope="col" class="text-center"> money_date</th>
        
    </tr>
    </thead>
    <tbody id="ajax">

    </tbody>
</table>
<script>
    function Load_Report(){
        $.ajax({
            url:'<?=base_url("index.php/Accountant/get_data_accountant");?>',
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
    }
    $(document).ready(function () {
     setTimeout(function () {
        Load_Report();
     },1000)
    });
</script>