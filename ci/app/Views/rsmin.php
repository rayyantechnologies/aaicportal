<?php
function term($t) {
    if($t == 1){
        return "1st Term";
    }else if($t == 2){
        return "2nd Term";
    }else if($t == 3){
        return "3rd Term";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="assets/rs/css/paper.css">
    <link rel="stylesheet" href="assets/rs/css/style.css">

    <!-- Set page size here: A5, A4, A4 landscape, letter, legal or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>@page { size: A4 }</style>
    <title>AAIS Report Sheet</title>
</head>

<body class="A4">
    <?php foreach($studs as $stud): ?>
    <div class="container sheet padding-10mm">
        <header>
            <img class="logo" src="assets/rs/img/AAIS_Logo_full.png" alt="">
            <p class="title">Progress Report for <?=term($vars['t'])?> <?=$vars['s']?> Session</p>
            <div class="details">
                <div class="float-left">
                    <p class="name">Name: <b><?=$stud['name']?></b>  </p>
                </div>
                <div>
                    <p class="adm">Class: <b><?=$stud['class']?></b>  </p>
                </div>
                <div class="float-right">
                <p class="admn">ADM NO: <b><?=$stud['students_id']?></b> </p></div>

            </div>

        </header>
        <?php if($stud['class'] == 'SS1'): ?>
        <main>
            <table class="table table-sm table-bordered">
                <thead class="">
                    <tr>
                        <th>SUBJECTS</th>
                        <th>CAT (20)</th>
                        <th>CAT2 (10)</th>
                        <th>PROJECT (10)</th>
                        <th>EXAM (60)</th>
                        <th>PERCENTAGE</th>
                        <th>GRADE</th>
                        <th>REMARK</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td scope="row"><i><b>Obtainable</b></i></td>
                        <td><i>240</i></td>
                        <td><i>120</i></td>
                        <td><i>120</i></td>
                        <td><i>720</i></td>
                        <td><i>100%</i></td>
                        <td>A+</td>
                        <td><i>Excellent</i></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">English</td>
                        <td><?=$stud['en_cat']?></td>
                        <td></td>
                        <td><?=$stud['en_project']?></td>
                        <td><?=$stud['en_exam']?></td>
                        <td><?=$stud['en_total']?>%</td>
                        <td><?=grade($stud['en_total'])?></td>
                        <td><?=remark($stud['en_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">Arabic</td>
                        <td><?=$stud['ar_cat']?></td>
                        <td></td>
                        <td><?=$stud['ar_project']?></td>
                        <td><?=$stud['ar_exam']?></td>
                        <td><?=$stud['ar_total']?>%</td>
                        <td><?=grade($stud['ar_total'])?></td>
                        <td><?=remark($stud['ar_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">Yoruba/Physics</td>
                        <td><?=$stud['yo_cat']?></td>
                        <td></td>
                        <td><?=$stud['yo_project']?></td>
                        <td><?=$stud['yo_exam']?></td>
                        <td><?=$stud['yo_total']?>%</td>
                        <td><?=grade($stud['yo_total'])?></td>
                        <td><?=remark($stud['yo_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">Mathematics</td>
                        <td><?=$stud['mt_cat']?></td>
                        <td></td>
                        <td><?=$stud['mt_project']?></td>
                        <td><?=$stud['mt_exam']?></td>
                        <td><?=$stud['mt_total']?>%</td>
                        <td><?=grade($stud['mt_total'])?></td>
                        <td><?=remark($stud['mt_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">Chemistry/Literature</td>
                        <td><?=$stud['bs1_cat']?></td>
                        <td></td>
                        <td><?=$stud['bs1_project']?></td>
                        <td><?=$stud['bs1_exam']?></td>
                        <td><?=$stud['bs1_total']?>%</td>
                        <td><?=grade($stud['bs1_total'])?></td>
                        <td><?=remark($stud['bs1_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">Digital Tech</td>
                        <td><?=$stud['bs2_cat']?></td>
                        <td></td>
                        <td><?=$stud['bs2_project']?></td>
                        <td><?=$stud['bs2_exam']?></td>
                        <td><?=$stud['bs2_total']?>%</td>
                        <td><?=grade($stud['bs2_total'])?></td>
                        <td><?=remark($stud['bs2_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">Biology</td>
                        <td><?=$stud['pv_cat']?></td>
                        <td></td>
                        <td><?=$stud['pv_project']?></td>
                        <td><?=$stud['pv_exam']?></td>
                        <td><?=$stud['pv_total']?>%</td>
                        <td><?=grade($stud['pv_total'])?></td>
                        <td><?=remark($stud['pv_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">CCP/Government</td>
                        <td><?=$stud['ca_cat']?></td>
                        <td></td>
                        <td><?=$stud['ca_project']?></td>
                        <td><?=$stud['ca_exam']?></td>
                        <td><?=$stud['ca_total']?>%</td>
                        <td><?=grade($stud['ca_total'])?></td>
                        <td><?=remark($stud['ca_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">Civic Education</td>
                        <td><?=$stud['nv_cat']?></td>
                        <td></td>
                        <td><?=$stud['nv_project']?></td>
                        <td><?=$stud['nv_exam']?></td>
                        <td><?=$stud['nv_total']?>%</td>
                        <td><?=grade($stud['nv_total'])?></td>
                        <td><?=remark($stud['nv_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">Economics</td>
                        <td><?=$stud['bu_cat']?></td>
                        <td></td>
                        <td><?=$stud['bu_project']?></td>
                        <td><?=$stud['bu_exam']?></td>
                        <td><?=$stud['bu_total']?>%</td>
                        <td><?=grade($stud['bu_total'])?></td>
                        <td><?=remark($stud['bu_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">IRS</td>
                        <td><?=$stud['ir_cat']?></td>
                        <td></td>
                        <td><?=$stud['ir_project']?></td>
                        <td><?=$stud['ir_exam']?></td>
                        <td><?=$stud['ir_total']?>%</td>
                        <td><?=grade($stud['ir_total'])?></td>
                        <td><?=remark($stud['ir_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">Qur'an</td>
                        <td><?=$stud['qr_cat']?></td>
                        <td></td>
                        <td><?=$stud['qr_project']?></td>
                        <td><?=$stud['qr_exam']?></td>
                        <td><?=$stud['qr_total']?>%</td>
                        <td><?=grade($stud['qr_total'])?></td>
                        <td><?=remark($stud['qr_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row"><b>Total</b></td>
                        <td><?=$stud['cat_total']?></td>
                        <td></td>
                        <td><?=$stud['project_total']?></td>
                        <td><?=$stud['exam_total']?></td>
                        <td><?=($stud['cat_total'] + $stud['project_total'] + $stud['exam_total'])?> / 1200</td>
                        <td><?=grade($stud['en_total'])?></td>
                        <td><?=remark($stud['en_total'])?></td>
                    </tr>
                </tbody>
            </table>
        </main>
        <?php else: ?>
        <main>
            <table class="table table-sm table-bordered">
                <thead class="">
                    <tr>
                        <th>SUBJECTS</th>
                        <th>CAT (20)</th>
                        <th>CAT2 (10)</th>
                        <th>PROJECT (10)</th>
                        <th>EXAM (60)</th>
                        <th>PERCENTAGE</th>
                        <th>GRADE</th>
                        <th>REMARK</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td scope="row"><i><b>Obtainable</b></i></td>
                        <td><i>240</i></td>
                        <td><i>120</i></td>
                        <td><i>120</i></td>
                        <td><i>720</i></td>
                        <td><i>100%</i></td>
                        <td>A+</td>
                        <td><i>Excellent</i></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">English</td>
                        <td><?=$stud['en_cat']?></td>
                        <td></td>
                        <td><?=$stud['en_project']?></td>
                        <td><?=$stud['en_exam']?></td>
                        <td><?=$stud['en_total']?>%</td>
                        <td><?=grade($stud['en_total'])?></td>
                        <td><?=remark($stud['en_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">Arabic</td>
                        <td><?=$stud['ar_cat']?></td>
                        <td></td>
                        <td><?=$stud['ar_project']?></td>
                        <td><?=$stud['ar_exam']?></td>
                        <td><?=$stud['ar_total']?>%</td>
                        <td><?=grade($stud['ar_total'])?></td>
                        <td><?=remark($stud['ar_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">Yoruba</td>
                        <td><?=$stud['yo_cat']?></td>
                        <td></td>
                        <td><?=$stud['yo_project']?></td>
                        <td><?=$stud['yo_exam']?></td>
                        <td><?=$stud['yo_total']?>%</td>
                        <td><?=grade($stud['yo_total'])?></td>
                        <td><?=remark($stud['yo_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">Mathematics</td>
                        <td><?=$stud['mt_cat']?></td>
                        <td></td>
                        <td><?=$stud['mt_project']?></td>
                        <td><?=$stud['mt_exam']?></td>
                        <td><?=$stud['mt_total']?>%</td>
                        <td><?=grade($stud['mt_total'])?></td>
                        <td><?=remark($stud['mt_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">BST 1</td>
                        <td><?=$stud['bs1_cat']?></td>
                        <td></td>
                        <td><?=$stud['bs1_project']?></td>
                        <td><?=$stud['bs1_exam']?></td>
                        <td><?=$stud['bs1_total']?>%</td>
                        <td><?=grade($stud['bs1_total'])?></td>
                        <td><?=remark($stud['bs1_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">BST 2</td>
                        <td><?=$stud['bs2_cat']?></td>
                        <td></td>
                        <td><?=$stud['bs2_project']?></td>
                        <td><?=$stud['bs2_exam']?></td>
                        <td><?=$stud['bs2_total']?>%</td>
                        <td><?=grade($stud['bs2_total'])?></td>
                        <td><?=remark($stud['bs2_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">PVS</td>
                        <td><?=$stud['pv_cat']?></td>
                        <td></td>
                        <td><?=$stud['pv_project']?></td>
                        <td><?=$stud['pv_exam']?></td>
                        <td><?=$stud['pv_total']?>%</td>
                        <td><?=grade($stud['pv_total'])?></td>
                        <td><?=remark($stud['pv_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">CCA</td>
                        <td><?=$stud['ca_cat']?></td>
                        <td></td>
                        <td><?=$stud['ca_project']?></td>
                        <td><?=$stud['ca_exam']?></td>
                        <td><?=$stud['ca_total']?>%</td>
                        <td><?=grade($stud['ca_total'])?></td>
                        <td><?=remark($stud['ca_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">National Value</td>
                        <td><?=$stud['nv_cat']?></td>
                        <td></td>
                        <td><?=$stud['nv_project']?></td>
                        <td><?=$stud['nv_exam']?></td>
                        <td><?=$stud['nv_total']?>%</td>
                        <td><?=grade($stud['nv_total'])?></td>
                        <td><?=remark($stud['nv_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">Business St</td>
                        <td><?=$stud['bu_cat']?></td>
                        <td></td>
                        <td><?=$stud['bu_project']?></td>
                        <td><?=$stud['bu_exam']?></td>
                        <td><?=$stud['bu_total']?>%</td>
                        <td><?=grade($stud['bu_total'])?></td>
                        <td><?=remark($stud['bu_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">IRS</td>
                        <td><?=$stud['ir_cat']?></td>
                        <td></td>
                        <td><?=$stud['ir_project']?></td>
                        <td><?=$stud['ir_exam']?></td>
                        <td><?=$stud['ir_total']?>%</td>
                        <td><?=grade($stud['ir_total'])?></td>
                        <td><?=remark($stud['ir_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">Qur'an</td>
                        <td><?=$stud['qr_cat']?></td>
                        <td></td>
                        <td><?=$stud['qr_project']?></td>
                        <td><?=$stud['qr_exam']?></td>
                        <td><?=$stud['qr_total']?>%</td>
                        <td><?=grade($stud['qr_total'])?></td>
                        <td><?=remark($stud['qr_total'])?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row"><b>Total</b></td>
                        <td><?=$stud['cat_total']?></td>
                        <td></td>
                        <td><?=$stud['project_total']?></td>
                        <td><?=$stud['exam_total']?></td>
                        <td><?=($stud['cat_total'] + $stud['project_total'] + $stud['exam_total'])?> / 1200</td>
                        <td><?=grade($stud['en_total'])?></td>
                        <td><?=remark($stud['en_total'])?></td>
                    </tr>
                </tbody>
            </table>
        </main>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>

</body>

</html>