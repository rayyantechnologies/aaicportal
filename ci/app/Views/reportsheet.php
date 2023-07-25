<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid py-3">
        <div class="row">
            <div class="card container-fluid py-3">
                <form action="<?=base_url('classreportsheet')?>" method="get">
                    <div class="row">
                        <h5>Reportsheets</h5><span>
                            Select class to View/Print their Reportsheets
                        </span>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mt-4">
                            <select class="form-select" name="clss" id="">
                                    <option value="" selected disabled>Classes</option>
                                    <?php foreach ($classes as $cls):?>
                                    <option value="<?=$cls?>"><?=$cls?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="my-4 col-sm-12 text-end">
                            <button type="submit" class="btn btn-primary">Next</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Container-fluid Ends -->