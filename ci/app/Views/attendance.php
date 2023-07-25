<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('assets/css/awsm.css')?>">
    <title>Attendance || <?=$class?></title>
</head>
<style>
    .container{
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0px 0px;
        margin-right: 10px;
        /*grid-template-rows: 1fr 1fr;*/
    }
    .single{
        /*background-color: red;*/
        display: inline-block;
    }
    .container article input[type=checkbox]{
        display: none;
    }
    .container article input[type=checkbox]:checked + .single{
        background-color: #11ab03;
    }
</style>
<?php
    function fletter($val)
    {
       return strtoupper(substr($val, 0, 1));
    }
 ?>
<body>
    <center><h1>AAIC Attendance</h1></center>
    <center><h3><?=$class?></h3></center>
    <hr>
    <form action="<?=base_url('attendance')?>" method="post">
        <input type="hidden" name="class" value="<?=$class?>">
        <div class="container">
            <?php foreach ($students as $k => $stud):?>
                <article style=" margin: 0; padding: 0; text-align:center;">
                    <input checked type="checkbox" name="<?=$stud['adm']?>" value="1" id="<?=$stud['adm']?>">
                    <label class="single" for="<?=$stud['adm']?>">
                        <h1 style=""><?=fletter($stud['fname'])?><?=fletter($stud['lname'])?></h1> <small><?=$stud['fname'].' '.$stud['lname']?></small>
                    </label>
                </article>
            <?php endforeach; ?>
        </div>
        <hr>
        <textarea name="note" id="" cols="30" rows="10"></textarea>

        <center><input type="submit" value="Upload"></center>
    </form>

</body>
</html>