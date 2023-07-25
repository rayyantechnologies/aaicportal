<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-10">
                <div class="card">
                    <div class="card-body text-center">
                        <a href="<?=base_url('clesson')?>" class="btn btn-primary btn-block"> Create Lesson Plan</a> <br> <hr>
                        <?php foreach ($classes as $class) : ?>
                            <div class="accordion mb-3 text-start" id="<?= $class ?>Example">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="<?= $class ?>Heading">
                                        <button class="accordion-button fw-bold h5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $class ?>Collapse" aria-expanded="true" aria-controls="<?= $class ?>Collapse">
                                            <?= $class ?> Note
                                        </button>
                                    </h2>
                                   <div id="<?= $class ?>Collapse" class="accordion-collapse collapse" aria-labelledby="<?= $class ?>Heading" data-bs-parent="#<?= $class ?>Example">
                                        <div class="accordion-body">
                                             <?php foreach ($lessons as $key => $lesson) : ?>
                                                <?php if ($lesson['class'] == $class):?>
                                                    <li class="list-group-item list-group-item-action">
                                                        <a href="<?=base_url('editlesson/'.$lesson['id'])?>" >Week <?= $lesson['week'] . ' ' . $lesson['topic']?> </a>
                                                        <a class="btn btn-warning" href="<?=base_url('print/'.$lesson['id'])?>">PRT</a>
                                                        <a class="btn btn-danger" href="<?=base_url('fprint/'.$lesson['id'])?>">Full PRT</a>
                                                    </li>

                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2">
                <div class="card">
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
<!-- <link href="assets/css/summernote.css" rel="stylesheet"> -->
<!-- <script src="https://unpkg.com/summernote@0.8.18/dist/summernote.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js" integrity="sha512-kZv5Zq4Cj/9aTpjyYFrt7CmyTUlvBday8NGjD9MxJyOY/f2UfRYluKsFzek26XWQaiAp7SZ0ekE7ooL9IYMM2A==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>