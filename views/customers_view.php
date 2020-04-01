<?php
echo form_open('');
?>
<div class="row mt-4 pt-4 mainform">
<div class="col-2">tell:</div>
    <div class="col-4">
        <input type="text" name="tel" class="control-form">
    </div>
</div>
<div class="row mt-4 pt-4 mainform">
    <div class="col-2">name:</div>
    <div class="col-4">
        <input type="text" name="name" class="control-form">
    </div>
</div>
<div class="row mt-4 pt-4 mainform">
    <div class="col-2">family:</div>
    <div class="col-4">
        <input type="text" name="family" class="control-form">
    </div>
</div>
<div class="row mt-4 pt-4 mainform">
    <div class="col-2 text-center">
        <button type="submit" name="save" class="btn btn-primary col-6">save</button>
    </div>
    <div class="col-2 text-center">{message}</div>
</div>

<?php
echo form_close('');
?>
<table border="1" width="90%" class="mt-4">
    <tr>
        <td align="center">Row</td>
        <td align="center">Username</td>
        <td align="center">Fname Lname</td>
        <td align="center">Action</td>
    </tr>

    {content}

</table>

