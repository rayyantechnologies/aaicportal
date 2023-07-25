<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>RPSS || Setup</title>
</head>
<body>
        <div class="container">
            <form method="post" action="<?=base_url('setup')?>">
                <p class="lead">
                    Setup Subjects
                </p>
                <fieldset>
                    <legend class="col-form-legend col-sm-1-12">Subjects</legend>
                    <div id="item" class="col-sm-1-12">
                          <select class="form-select" name="subjects[]" id="subjects">
                              <?php foreach($subjects as $subj): ?>
                            <option value="<?=$subj['subject_code']?>"><?=$subj['subject']?></option>
                            <?php endforeach; ?>
                          </select>
                          &nbsp; <button onclick="clon()" type="button">+</button>
                    </div>
                </fieldset>
                <div class="mb-3 row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>

        <script>
            function clon() {
                let item = document.querySelector('#subjects');
                let ele = document.getElementsByClassName('form-select');
                ele[ele.length-1].insertAdjacentElement('afterend',item.cloneNode(true));
            }
        </script>
</body>
</html>