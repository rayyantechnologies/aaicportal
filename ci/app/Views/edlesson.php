<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('assets/css/awsm.css')?>">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <title>Edit Lesson</title>
</head>
<body>
    <div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Lesson Planning</h5><span>Fill the required field to kick start a new lesson plan</span>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="<?=base_url('editlesson')?>" method="post">
                                <input type="hidden" value="<?=$data['id']?>" name="id">
                                <fieldset class="mb-3 row">
                                    <div class="col-sm-1-12">
                                        <div class="mb-3">
                                            <label for="inputName" class="col-sm-1-12 col-form-label">Subject</label>
                                            <div class="row">
                                            <div class="col-sm-1-12 col-md-6">
                                                <select class="form-control" value="<?=$data['subject']?>" name="subject" required>
                                                    <option value="">Select a Subject</option>
                                                    <?php foreach ($subjects as $subj) : ?>
                                                    <option class="text-uppercase" value="<?=$subj?>"><?=$subj?></option>
                                                    <?php endforeach; ?>
                                                  </select>
                                            </div>
                                            <label for="inputName" class="col-sm-1-12 col-form-label">Class</label>
                                            <div class="col-sm-1-12 col-md-6">
                                                  <select  value="<?=$data['class']?>" class="form-control" name="class" required>
                                                    <option value="">Select a Class</option>
                                                    <?php foreach ($classes as $class) : ?>
                                                    <option value="<?=$class?>"><?=$class?></option>
                                                    <?php endforeach; ?>
                                                  </select>
                                            </div>
                                            <input type="hidden" name="term"  value="<?=$data['term']?>">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-sm-1-12  col-form-label">Week, Duration & Period</label>
                                            <div class="row">
                                                <div class="col-sm-1-12 col-md-4">
                                                    <input type="number" class="form-control" name="week"  value="<?=$data['week']?>" placeholder="Week" required>
                                                </div>
                                                <div class="col-sm-1-12 col-md-4">
                                                    <input type="number" class="form-control" name="duration" value="<?=$data['duration']?>" placeholder="Duration in mins" required>
                                                </div>
                                                <div class="col-sm-1-12 col-md-4">
                                                    <input type="number" class="form-control" name="periods" value="<?=$data['periods']?>" placeholder="Number of Periods" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-sm-1-12  col-form-label">Topic, Teaching Aid & Reference Book</label>
                                            <div class="row">
                                                <div class="col-sm-1-12 col-md-4">
                                                    <input type="text" class="form-control" name="topic" value="<?=$data['topic']?>" placeholder="Topic" required>
                                                </div>
                                                <div class="col-sm-1-12 col-md-4">
                                                    <input type="text" class="form-control" name="t_aid" value="<?=$data['t_aid']?>" placeholder="Teaching Aid" required>
                                                </div>
                                                <div class="col-sm-1-12 col-md-4">
                                                    <input type="text" value="<?=$data['ref_bk']?>" class="form-control" name="ref_bk" placeholder="Reference Book" required>
                                                </div>
                                            </div>
                                        </div>
                                         <label for="inputName" class="col-sm-1-12 col-form-label">Objectives
                                        </label>
                                                <div class="col-sm-1-12 col-md-6">
                                                    <textarea name="objectives" id="objectives" value="<?=$data['objectives']?>" placeholder="Objectives" required cols="15" rows="5" class="form-control"></textarea>
                                                </div>
                                        <div class="mb-3">
                                            <label for="inputName" class="col-sm-1-12 col-form-label">Content
                                            </label>
                                            <div class="col-sm-1-12">
                                                <textarea name="content" placeholder="Content" required id="content" rows="20" class="form-control"></textarea>
                                            </div>
                                        </div>
                                         <div class="mb-3">
                                            <label for="inputName" class="col-sm-1-12 col-form-label">Presentations
                                            </label>
                                            <div class="row">
                                                <div class="col-sm-1-12 col-md-6">
                                                    <textarea name="presentation" id="presentation" placeholder="Presentation" required cols="15" rows="5" class="form-control"></textarea>
                                                </div>
                                            <label for="inputName" class="col-sm-1-12 col-form-label">Evaluation
                                            </label>
                                                <div class="col-sm-1-12 col-md-6">
                                                    <textarea name="evaluation" id="evaluation" placeholder="Evaluation" required cols="15" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div>
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
        </div>
    </div>
</div>
 <script type="text/javascript">
                $(document).ready(function() {
                    let content = `<?=$data['content']?>`
                $('#content').summernote('pasteHTML', content)
                $('#content').summernote({
                    toolbar: [
                      ['style', ['style']],
                      ['font', ['bold', 'underline', 'italic']],
                      ['color', ['color']],
                      ['para', ['ul','ol', 'paragraph']],
                      ['table', ['table']],
                      ['insert', ['picture']],
                      ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                  });

                   let presentation = `<?=$data['presentation']?>`
                $('#presentation').summernote('pasteHTML', presentation)
                $('#presentation').summernote({
                    toolbar: [
                      ['font', ['bold', 'underline', 'italic']],
                      ['para', ['ul','ol', 'paragraph']],
                      ['view', ['fullscreen', 'codeview', 'help']]

                    ]
                  });

                   let evaluation = `<?=$data['evaluation']?>`
                $('#evaluation').summernote('pasteHTML', evaluation)
                 $('#evaluation').summernote({
                    toolbar: [
                      ['font', ['bold', 'underline', 'italic']],
                      ['para', ['ul','ol', 'paragraph']],
                      ['view', ['fullscreen', 'codeview', 'help']]

                    ]
                  });

                  $('#objectives').summernote({
                    toolbar: [
                      ['font', ['bold', 'underline', 'italic']],
                      ['para', ['ul','ol', 'paragraph']],
                      ['view', ['fullscreen', 'codeview', 'help']]

                    ]
                  });
             });
            </script>
</body>
</html>