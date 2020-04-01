<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class=" mt-4 pt-4 mainform">
    <input type="hidden" name="id" value="{id}">
    <div class="row mt-2 pt-2">
        <label>tell:</label>
        <div class="col-4">
            <input type="text" name="tel" value="{tel}" class="form-control">
        </div>
    </div>
    <div class="row mt-2 pt-2">
        <label>name:</label>
        <div class="col-4">
            <input type="text" name="name" value="{name}" class="form-control">
        </div>
    </div>
    <div class="row mt-2 pt-2">
        <label>family:</label>
        <div class="col-4">
            <input type="text" name="family" value="{family}" class="form-control">
        </div>
    </div>
    <div class="row mt-2 pt-2">
        {message}
        <div class="col-2 text-center">
            <button type="submit" name="update" value ="update" class="btn btn-primary col-6">update</button>
        </div>
    </div>
</div>

