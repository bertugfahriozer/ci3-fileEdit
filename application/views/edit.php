<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Liste</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <form action="<?=base_url('welcome/editPost/'.str_replace('.php','',$file))?>" class="form-row" method="post">
        <div class="col">
        <textarea name="fileContent" class="form-control" rows="70"><?=strip($fileContent)?></textarea>
        </div>
        <div class="col-12">
        <button type="submit" class="btn btn-success">Gönder</button>
        </div>
    </form>
</div>
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.js"></script>
</body>
</html>