<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-sm-12 h-100">
                <div class="card b-l-primary">
                    <div class="card-header">
                        <h5>Welcome, Admin</h5>
                    </div>
                    <div class="card-body">
                        <a href="#vars" class="btn btn-secondary">Update Variables</a>
                        <a href="<?=base_url('broadsheet')?>" class="btn btn-primary">Update Scores</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 h-100">
                <div class="card b-l-primary">
                    <div class="card-header">
                        <h5>Statistics</h5>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div id="vars" class="col-sm-12 h-100">
                <div class="card b-l-primary">
                    <div class="card-header mb-0 pb-0">
                        <h5>Update Variables</h5>
                    </div>
                    <div class="card-body">
                        <p>List of Variables & It's Current Values</p>
                        <ul class="">
                        <?php foreach ($allvars as $key => $var):?>
                            <li class=""><tt>Variable:</tt> <?=$var['name']?> ||| <i>Value:</i> <b><?=$var['value']?></b></li>
                        <?php endforeach;?>
                        </ul>
                        <hr>
                        <form action="<?=base_url('updvars')?>" method="POST">
                            <select name="id" id="" class="form-control">
                                <option value="">Select a Variable</option>
                                <?php foreach ($allvars as $key => $var):?>
                                <option value="<?=$var['id']?>"><?=$var['name']?></option>
                                <?php endforeach;?>
                            </select>
                            <input type="text" name="value" class="form-control" placeholder="Value to be Updated">
                            <input type="submit" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>