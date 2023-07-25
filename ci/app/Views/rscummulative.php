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
        <?php //dd($studs); ?>

    <?php foreach($studs as $stu): ?>
    <?php $stud = $stu['comment']; ?>
    <div class="container sheet padding-5mm">
        <header>
            <div class="logoheader">
                <img class="logo" src="assets/rs/img/AAIS_Logo_semifull.png" alt="">
                <p>📱TEL: 08139381306, <br>08108097322, 07036511151, <br> 08033519155 <br><br> 🌐WEB: <i>www.aaic.sgm.ng</i></p>
            </div>
            <p class="title">Cummulative Report for 2022/2023 Session</p>
            <div class="details">
                <div class="float-left">
                    <p class="name">Name: <b><?=$stu[0]['name']?></b>  </p>
                    <p class="adm">Class: <b><?=$stud['class']?></b>  </p>
                    <p class="genr">General Remarks: <b><?genRemark($stud['cat_total'] + $stud['project_total'] + $stud['exam_total'])?></b>  </p>
                </div>
                <div class="float-right">
                <p class="admn">ADM NO: <b><?=$stud['students_id']?></b> </p>
                    <p class="pres">Present in School: <b><?=$stud['present']?></b> times </p>
                    <p class="abst">Absent in School: <b><?=$stud['absent']?></b> times</p>
                </div>
                <div>
                    <p style="line-height: 1rem;"><b><u>Legends</u></b> <br><b>E</b>-Exam <br><b>C</b>-CAT <br><b>P</b>-Project</p>
                </div>
                
            </div>
            
        </header>
        <main>
            <table class="table table-sm table-bordered">
                <thead class="">
                    <!-- <tr>
                        <th>SUBJECTS</th>
                        <th>CAT (30)</th>
                        <th>PROJECT (10)</th>
                        <th>EXAM (60)</th>
                        <th>PERCENTAGE</th>
                        <th>GRADE</th>
                        <th>REMARK</th>
                    </tr> -->
                    <tr>
                        <th></th>
                        <th colspan="4">1st Term</th>
                        <th colspan="4">2nd Term</th>
                        <th colspan="4">3rd Term</th>
                        <th colspan="3"></th>
                    </tr>
                    <tr>
                        <th>SUBJECTS</th>
                                <th>C</th>    
                                <th>P</th>    
                                <th>E</th>
                                <th>%</th>

                                <th>C</th>    
                                <th>P</th>    
                                <th>E</th>
                                <th>%</th>

                                <th>C</th>    
                                <th>P</th>    
                                <th>E</th>                                 
                                <th>%</th> 

                        <th>T.%</th>
                        <th>GRD</th>
                        <th>REM</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td scope="row"><i><b>Obtainable</b></i></td>
                        <td><i>360</i></td>
                        <td><i>120</i></td>
                        <td><i>720</i></td>
                        <td><i>100%</i></td>

                        <td><i>360</i></td>
                        <td><i>120</i></td>
                        <td><i>720</i></td>
                        <td><i>100%</i></td>

                        <td><i>360</i></td>
                        <td><i>120</i></td>
                        <td><i>720</i></td>
                        <td><i>100%</i></td>
                        <td><i>100%</i></td>
                        <td>A+</td>
                        <td><i>Exc.</i></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">English</td>
                        <td><?=$stu[0]['en_cat']?></td>
                        <td><?=$stu[0]['en_project']?></td>
                        <td><?=$stu[0]['en_exam']?></td>
                        <td><?=$stu[0]['en_total']?>%</td>

                        <td><?=$stu[1]['en_cat']?></td>
                        <td><?=$stu[1]['en_project']?></td>
                        <td><?=$stu[1]['en_exam']?></td>
                        <td><?=$stu[1]['en_total']?>%</td>

                        <td><?=$stu[2]['en_cat']?></td>
                        <td><?=$stu[2]['en_project']?></td>
                        <td><?=$stu[2]['en_exam']?></td>
                        <td><?=$stu[2]['en_total']?>%</td>
                        <?php $en_t = $stu[0]['en_total']+$stu[1]['en_total']+$stu[2]['en_total']; ?>
                        <td><b><?=cctotal($en_t)?></b></td>
                        <td><?=grade(cctotal($en_t))?></td>
                        <td><?=ccremark(cctotal($en_t))?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">Arabic</td>
                        <td><?=$stu[0]['ar_cat']?></td>
                        <td><?=$stu[0]['ar_project']?></td>
                        <td><?=$stu[0]['ar_exam']?></td>
                        <td><?=$stu[0]['ar_total']?>%</td>


                        <td><?=$stu[1]['ar_cat']?></td>
                        <td><?=$stu[1]['ar_project']?></td>
                        <td><?=$stu[1]['ar_exam']?></td>
                        <td><?=$stu[1]['ar_total']?>%</td>

                        <td><?=$stu[2]['ar_cat']?></td>
                        <td><?=$stu[2]['ar_project']?></td>
                        <td><?=$stu[2]['ar_exam']?></td>
                        <td><?=$stu[2]['ar_total']?>%</td>
                        <?php $ar_t = $stu[0]['ar_total']+$stu[1]['ar_total']+$stu[2]['ar_total']; ?>
                        <td><b><?=cctotal($ar_t)?></b></td>
                        <td><?=grade(cctotal($ar_t))?></td>
                        <td><?=ccremark(cctotal($ar_t))?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">Yoruba</td>
                        <td><?=$stu[0]['yo_cat']?></td>
                        <td><?=$stu[0]['yo_project']?></td>
                        <td><?=$stu[0]['yo_exam']?></td>
                        <td><?=$stu[0]['yo_total']?>%</td>

                        <td><?=$stu[1]['yo_cat']?></td>
                        <td><?=$stu[1]['yo_project']?></td>
                        <td><?=$stu[1]['yo_exam']?></td>
                        <td><?=$stu[1]['yo_total']?>%</td>

                        <td><?=$stu[2]['yo_cat']?></td>
                        <td><?=$stu[2]['yo_project']?></td>
                        <td><?=$stu[2]['yo_exam']?></td>
                        <td><?=$stu[2]['yo_total']?>%</td>
                        <?php $yo_t = $stu[0]['yo_total']+$stu[1]['yo_total']+$stu[2]['yo_total']; ?>
                        <td><b><?=cctotal($yo_t)?></b></td>
                        <td><?=grade(cctotal($yo_t))?></td>
                        <td><?=ccremark(cctotal($yo_t))?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">Mathematics</td>
                        <td><?=$stu[0]['mt_cat']?></td>
                        <td><?=$stu[0]['mt_project']?></td>
                        <td><?=$stu[0]['mt_exam']?></td>
                        <td><?=$stu[0]['mt_total']?>%</td>


                        <td><?=$stu[1]['mt_cat']?></td>
                        <td><?=$stu[1]['mt_project']?></td>
                        <td><?=$stu[1]['mt_exam']?></td>
                        <td><?=$stu[1]['mt_total']?>%</td>

                        <td><?=$stu[2]['mt_cat']?></td>
                        <td><?=$stu[2]['mt_project']?></td>
                        <td><?=$stu[2]['mt_exam']?></td>
                        <td><?=$stu[2]['mt_total']?>%</td>
                        <?php $mt_t = $stu[0]['mt_total']+$stu[1]['mt_total']+$stu[2]['mt_total']; ?>
                        <td><b><?=cctotal($en_t)?></b></td>
                        <td><?=grade(cctotal($en_t))?></td>
                        <td><?=ccremark(cctotal($en_t))?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">BST 1</td>
                        <td><?=$stu[0]['bs1_cat']?></td>
                        <td><?=$stu[0]['bs1_project']?></td>
                        <td><?=$stu[0]['bs1_exam']?></td>
                        <td><?=$stu[0]['bs1_total']?>%</td>


                        <td><?=$stu[1]['bs1_cat']?></td>
                        <td><?=$stu[1]['bs1_project']?></td>
                        <td><?=$stu[1]['bs1_exam']?></td>
                        <td><?=$stu[1]['bs1_total']?>%</td>

                        <td><?=$stu[2]['bs1_cat']?></td>
                        <td><?=$stu[2]['bs1_project']?></td>
                        <td><?=$stu[2]['bs1_exam']?></td>
                        <td><?=$stu[2]['bs1_total']?>%</td>
                        <?php $bs1_t = $stu[0]['bs1_total']+$stu[1]['bs1_total']+$stu[2]['bs1_total']; ?>
                        <td><b><?=cctotal($bs1_t)?></b></td>
                        <td><?=grade(cctotal($bs1_t))?></td>
                        <td><?=ccremark(cctotal($bs1_t))?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">BST 2</td>
                        <td><?=$stu[0]['bs2_cat']?></td>
                        <td><?=$stu[0]['bs2_project']?></td>
                        <td><?=$stu[0]['bs2_exam']?></td>
                        <td><?=$stu[0]['bs2_total']?>%</td>


                        <td><?=$stu[1]['bs2_cat']?></td>
                        <td><?=$stu[1]['bs2_project']?></td>
                        <td><?=$stu[1]['bs2_exam']?></td>
                        <td><?=$stu[1]['bs2_total']?>%</td>

                        <td><?=$stu[2]['bs2_cat']?></td>
                        <td><?=$stu[2]['bs2_project']?></td>
                        <td><?=$stu[2]['bs2_exam']?></td>
                        <td><?=$stu[2]['bs2_total']?>%</td>
                        <?php $bs2_t = $stu[0]['bs2_total']+$stu[1]['bs2_total']+$stu[2]['bs2_total']; ?>
                        <td><b><?=cctotal($bs2_t)?></b></td>
                        <td><?=grade(cctotal($bs2_t))?></td>
                        <td><?=ccremark(cctotal($bs2_t))?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">PVS</td>
                        <td><?=$stu[0]['pv_cat']?></td>
                        <td><?=$stu[0]['pv_project']?></td>
                        <td><?=$stu[0]['pv_exam']?></td>
                        <td><?=$stu[0]['pv_total']?>%</td>

                        <td><?=$stu[1]['pv_cat']?></td>
                        <td><?=$stu[1]['pv_project']?></td>
                        <td><?=$stu[1]['pv_exam']?></td>
                        <td><?=$stu[1]['pv_total']?>%</td>

                        <td><?=$stu[2]['pv_cat']?></td>
                        <td><?=$stu[2]['pv_project']?></td>
                        <td><?=$stu[2]['pv_exam']?></td>
                        <td><?=$stu[2]['pv_total']?>%</td>
                        <?php $pv_t = $stu[0]['pv_total']+$stu[1]['pv_total']+$stu[2]['pv_total']; ?>
                        <td><b><?=cctotal($pv_t)?></b></td>
                        <td><?=grade(cctotal($pv_t))?></td>
                        <td><?=ccremark(cctotal($pv_t))?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">CCA</td>
                        <td><?=$stu[0]['ca_cat']?></td>
                        <td><?=$stu[0]['ca_project']?></td>
                        <td><?=$stu[0]['ca_exam']?></td>
                        <td><?=$stu[0]['ca_total']?>%</td>


                        <td><?=$stu[1]['ca_cat']?></td>
                        <td><?=$stu[1]['ca_project']?></td>
                        <td><?=$stu[1]['ca_exam']?></td>
                        <td><?=$stu[1]['ca_total']?>%</td>

                        <td><?=$stu[2]['ca_cat']?></td>
                        <td><?=$stu[2]['ca_project']?></td>
                        <td><?=$stu[2]['ca_exam']?></td>
                        <td><?=$stu[2]['ca_total']?>%</td>
                        <?php $ca_t = $stu[0]['ca_total']+$stu[1]['ca_total']+$stu[2]['ca_total']; ?>
                        <td><b><?=cctotal($ca_t)?></b></td>
                        <td><?=grade(cctotal($ca_t))?></td>
                        <td><?=ccremark(cctotal($ca_t))?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">National Value</td>
                        <td><?=$stu[0]['nv_cat']?></td>
                        <td><?=$stu[0]['nv_project']?></td>
                        <td><?=$stu[0]['nv_exam']?></td>
                        <td><?=$stu[0]['nv_total']?>%</td>


                        <td><?=$stu[1]['nv_cat']?></td>
                        <td><?=$stu[1]['nv_project']?></td>
                        <td><?=$stu[1]['nv_exam']?></td>
                        <td><?=$stu[1]['nv_total']?>%</td>

                        <td><?=$stu[2]['nv_cat']?></td>
                        <td><?=$stu[2]['nv_project']?></td>
                        <td><?=$stu[2]['nv_exam']?></td>
                        <td><?=$stu[2]['nv_total']?>%</td>
                        <?php $nv_t = $stu[0]['nv_total']+$stu[1]['nv_total']+$stu[2]['nv_total']; ?>
                        <td><b><?=cctotal($nv_t)?></b></td>
                        <td><?=grade(cctotal($nv_t))?></td>
                        <td><?=ccremark(cctotal($nv_t))?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">Business St</td>
                        <td><?=$stu[0]['bu_cat']?></td>
                        <td><?=$stu[0]['bu_project']?></td>
                        <td><?=$stu[0]['bu_exam']?></td>
                        <td><?=$stu[0]['bu_total']?>%</td>


                        <td><?=$stu[1]['bu_cat']?></td>
                        <td><?=$stu[1]['bu_project']?></td>
                        <td><?=$stu[1]['bu_exam']?></td>
                        <td><?=$stu[1]['bu_total']?>%</td>

                        <td><?=$stu[2]['bu_cat']?></td>
                        <td><?=$stu[2]['bu_project']?></td>
                        <td><?=$stu[2]['bu_exam']?></td>
                        <td><?=$stu[2]['bu_total']?>%</td>
                        <?php $bu_t = $stu[0]['bu_total']+$stu[1]['bu_total']+$stu[2]['bu_total']; ?>
                        <td><b><?=cctotal($bu_t)?></b></td>
                        <td><?=grade(cctotal($bu_t))?></td>
                        <td><?=ccremark(cctotal($bu_t))?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">IRS</td>
                        <td><?=$stu[0]['ir_cat']?></td>
                        <td><?=$stu[0]['ir_project']?></td>
                        <td><?=$stu[0]['ir_exam']?></td>
                        <td><?=$stu[0]['ir_total']?>%</td>


                        <td><?=$stu[1]['ir_cat']?></td>
                        <td><?=$stu[1]['ir_project']?></td>
                        <td><?=$stu[1]['ir_exam']?></td>
                        <td><?=$stu[1]['ir_total']?>%</td>

                        <td><?=$stu[2]['ir_cat']?></td>
                        <td><?=$stu[2]['ir_project']?></td>
                        <td><?=$stu[2]['ir_exam']?></td>
                        <td><?=$stu[2]['ir_total']?>%</td>
                        <?php $ir_t = $stu[0]['ir_total']+$stu[1]['ir_total']+$stu[2]['ir_total']; ?>
                        <td><b><?=cctotal($ir_t)?></b></td>
                        <td><?=grade(cctotal($ir_t))?></td>
                        <td><?=ccremark(cctotal($ir_t))?></td>
                    </tr>
                    <tr class="text-center">
                        <td scope="row" class="text-left">Qur'an</td>
                        <td><?=$stu[0]['qr_cat']?></td>
                        <td><?=$stu[0]['qr_project']?></td>
                        <td><?=$stu[0]['qr_exam']?></td>
                        <td><?=$stu[0]['qr_total']?>%</td>


                        <td><?=$stu[1]['qr_cat']?></td>
                        <td><?=$stu[1]['qr_project']?></td>
                        <td><?=$stu[1]['qr_exam']?></td>
                        <td><?=$stu[1]['qr_total']?>%</td>

                        <td><?=$stu[2]['qr_cat']?></td>
                        <td><?=$stu[2]['qr_project']?></td>
                        <td><?=$stu[2]['qr_exam']?></td>
                        <td><?=$stu[2]['qr_total']?>%</td>
                        <?php $qr_t = $stu[0]['qr_total']+$stu[1]['qr_total']+$stu[2]['qr_total']; ?>
                        <td><b><?=cctotal($qr_t)?></b></td>
                        <td><?=grade(cctotal($qr_t))?></td>
                        <td><?=ccremark(cctotal($qr_t))?></td>
                    </tr>
                    <!-- <tr class="text-center"> 
                        <td scope="row"><b>Total</b></td>
                        <td><?=$stu[0]['cat_total']?></td>
                        <td><?=$stu[0]['project_total']?></td>
                        <td><?=$stu[0]['exam_total']?></td>
                        <td><?=($stu[0]['cat_total'] + $stu[0]['project_total'] + $stu[0]['exam_total'])?> / 1200</td>
                        <td><?=grade($stu[0]['en_total'])?></td>
                        <td><?=ccremark($stu[0]['en_total'])?></td>
                    </tr>-->
                </tbody>
            </table>
            <div class="stats">
                
                &nbsp;
                &nbsp;
                &nbsp;
                <p class="stat">Number in class: <b> <?=$vars['nic']?> </b></p>
                <p class="stat">Percentage: <b><?= per($stu[0]['cat_total'] + $stu[0]['project_total'] + $stu[0]['exam_total'])?>%</b></p>
                &nbsp;
                &nbsp; 
                &nbsp;
                &nbsp;
                &nbsp;

                <p class="stat">Remark: <b><?=remark(per($stu[0]['cat_total'] + $stu[0]['project_total'] + $stu[0]['exam_total']))?></b></p>
                <br>
                <p class="stat">School Opened:   <b> <?=$vars['schOpened']?> </b> times</p>
                <!-- <p class="stat">Absent:  <b>20</b> times</p> -->
                <p class="stat">School Resumes: <b><?=$vars['schResume']?></b></p>
                <p class="stat">School Fees:  <b>&#x20a6;<?=$vars['schFees']?></b></p>
            </div>
        </main>
        <footer>
            <p class="comment">Teacher's Comment: </p>
            <b><?=$stud['comment']?></b>
        </footer>
    </div>
    <?php endforeach; ?>

</body>

</html>