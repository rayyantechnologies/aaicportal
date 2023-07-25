<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid py-3">

        <div class="row">
            <div class="col-md-8">
                <div class="card" style="min-height: 1000vh;">
                    <h3 class="card-title pt-3 pl-3">Score Sheet</h3>
                    <div class="card-body">
                        <ul class="list-group">
                                                    <?php //var_dump($lists) ?>

                            <?php foreach ($subjects as $skey => $subject) : ?>
                                <?php foreach ($classes as $ckey => $cls) : ?>
                                    <li id="<?= 'par' . $skey . $ckey ?>" role="tablist" class="list-group-item"> <a data-bs-toggle="collapse" data-bs-parent="#<?= 'par' . $skey . $ckey ?>" href="#<?= $cls . $skey ?>"><?= $cls . ' ' . $subject['s'] . ' Edit Board' ?></a> </li>
                                    <div id="<?= $cls . $skey ?>" class="collapse in" role="tabpanel">
                                        <div class="card-body">
                                            <?= $cls . ' ' . $subject['s'] . ' Edit Board' ?>
                                            <table id="<?= 'scoreboard' . $skey . $ckey ?>" class="table table-striped table-responsive">
                                                <thead class="thead">
                                                    <tr>
                                                        <!-- <td>ID</td> -->
                                                        <td>Name</td>
                                                        <td>Class</td>
                                                        <td><?= $subject['scd'] ?>CAT</td>
                                                        <td><?= $subject['scd'] ?>Project</td>
                                                        <td><?= $subject['scd'] ?>Exam</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($list[$cls] as $row) : 
                                                    ?>
                                                    <tr>
                                                        <td><?=$row['id']?></td>
                                                        <td><?=$row['name']?></td>
                                                        <td><?=$row['class']?></td>
                                                        <td><?=$row[$subject['scd'].'_cat']?></td>
                                                        <td><?=$row[$subject['scd'].'_project']?></td>
                                                        <td><?=$row[$subject['scd'].'_exam']?></td>
                                                    </tr>
                                                    <?php endforeach; 
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-title pt-3 pl-3">Actions</h3>
                    <div class="card-body">
                        <ul class="list-group">
                            <li id="addstudent" role="tablist" class="list-group-item"> <a data-toggle="collapse" data-parent="#addstudent" href="#Form">...---...</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- ./ Content -->

            <script src="<?= base_url('assets/js/jquery-3.5.1.min.js') ?>"></script>
            <script src="<?= base_url('assets/js/jquery.tabledit.min.js') ?>"></script>
            <script>
                <?php foreach ($subjects as $skey => $subject) : ?>
                    <?php foreach ($classes as $ckey => $cls) : ?>
                        $('#<?= 'scoreboard' . $skey . $ckey ?>').Tabledit({
                            url: '<?= base_url('updatescore') ?>',
                            inputClass: 'size',
                            editButton: false,
                            deleteButton: false,
                            hideIdentifier: true,
                            columns: {
                                identifier: [0, 'id'],
                                editable: [
                                    [3, '<?= $cls . '-' . $subject['scd'] . '_' ?>CAT'],
                                    [4, '<?= $cls . '-' . $subject['scd'] . '_' ?>Project'],
                                    [5, '<?= $cls . '-' . $subject['scd'] . '_' ?>Exam']
                                ]
                            },
                            onAjax: function(action, serialize) {
                                console.log('onAjax(action, serialize)');
                                console.log(action);
                                console.log(serialize);
                            }
                        });
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </script>