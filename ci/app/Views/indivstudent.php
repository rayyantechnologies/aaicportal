<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Termly Student Update</h5><span>Fill the required field to update
                            student data</span>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="<?=base_url('indivstudent')?>" method="post">
                                <fieldset class="mb-3 row">
                                    <div class="col-sm-1-12">
                                        
                                        <div class="mb-3">
                                            <label class="col-sm-1-12  col-form-label">Admission Number & Class</label>
                                            <div class="row">
                                                <div class="col-sm-1-12 col-md-6">
                                                    <input type="text" class="form-control" name="students_id" list="studentName" placeholder="Admission Number" required>
                                                    <datalist id="studentName">
                                                        <?php foreach ($students as $key => $student) : ?>
                                                            <option value="<?= $student['adm']?>"><?= $student['lname'] . ' ' . $student['fname'] .' of '.$student['class']?></option>
                                                        <?php endforeach; ?>
                                                    </datalist>
                                                </div>
                                                <div class="col-sm-1-12 col-md-6">
                                                  <select class="form-control" name="class" required>
                                                    <option value="">Select a Class</option>
                                                    <?php foreach ($classes as $class) : ?>
                                                    <option value="<?=$class?>"><?=$class?></option>
                                                    <?php endforeach; ?>
                                                  </select>
                                            </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="session" value="<?=$vars['session']?>">
                                        <input type="hidden" name="term" value="<?=$vars['term']?>">
                                        <input type="hidden" id="schoolOpened" value="<?=$vars['schoolOpened']?>">


                                        <div class="mb-3">
                                            <label for="inputName" class="col-sm-1-12 col-form-label">School Fees</label>
                                            <div class="row">
                                            <div class="col-sm-1-12 col-md-6">
                                                <label><input type="radio" name="paid" value="0" required> <span>Not Paid </span></label>
                                                &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                                <label><input type="radio" id="paid" name="paid" value="1" required> <span>Paid </span></label>
                                            </div>
                                            <div class="col-sm-1-12 col-md-6">
                                                <input type="tel" class="form-control" name="balance" required placeholder="Balance" >
                                            </div>
                                            
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputName" class="col-sm-1-12 col-form-label">Attendance
                                            </label>
                                            <div class="row">
                                                <div class="col-sm-1-12 col-md-6">
                                                    <input type="tel" class="form-control" name="present" id="present" placeholder="Number of times present" >
                                                </div>
                                                <div class="col-sm-1-12 col-md-6">
                                                    <input type="tel" class="form-control" name="absent" id="absent" placeholder="Number of times absent">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputName" class="col-sm-1-12 col-form-label">Comment
                                            </label>
                                            <textarea class="form-control" name="comment" placeholder="Teacher's comment" required></textarea>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="mb-3 row">
                                    <div class="col-sm-10">
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="list-group">
                        </div>
                        <?php foreach ($classes as $class) : ?>
                            <div class="accordion mb-3" id="<?= $class ?>Example">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="<?= $class ?>Heading">
                                        <button class="accordion-button fw-bold h5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $class ?>Collapse" aria-expanded="true" aria-controls="<?= $class ?>Collapse">
                                            <?= $class ?> Students
                                        </button>
                                    </h2>
                                    <div id="<?= $class ?>Collapse" class="accordion-collapse collapse" aria-labelledby="<?= $class ?>Heading" data-bs-parent="#<?= $class ?>Example">
                                        <div class="accordion-body">

                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

<script type="text/javascript">
    let present = document.querySelector('#present');
    let absent = document.querySelector('#absent');
    let schoolOpened = document.querySelector('#schoolOpened').value;

    present.addEventListener('blur',()=>{
        absent.value = schoolOpened - present.value;
    })

    let paid = document.querySelector('#paid');
    let balance = document.querySelector('[name = "balance"]');
    let npaid = document.querySelector('[name = "paid"]');

    paid.addEventListener('click',()=>{
            balance.disabled = true;
            balance.value = 0;
    })
    // npaid.addEventListener('click',()=>{
    //         balance.disabled = false;
    // })
</script>