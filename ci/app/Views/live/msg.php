<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Allahu Akbar International College Sagamu</title>
    <meta name="viewport" content="width=device-width,
initial-scale=1, shrink-to-fit=no" />
    <meta content="AAIC is the leading Islamic Secondary school in Remo, Ogun State" name="description" />
    <meta name="author" content="Rayyan Technologies" />
    <meta name="website" content="https://aaic.sgm.ng" />
    <meta name="email" content="allahuakbarschools@gmail.com" />
    <meta name="version" content="1.4.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <!-- Css Main Css -->
    <!-- <link href="assets/libs/@iconscout/unicons/css/line.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/icons.min.css" /> -->
    <link rel="stylesheet" href="assets/tailwind.min.css" />
</head>

<body class="font-nunito text-base text-black dark:text-white
    dark:bg-slate-900 pt-0">
    <!-- Start -->
    <section class="relative bg-no-repeat bg-center pt-0" style="background:url('assets/utility.jpg'); background-position:center;">
        <div class="absolute inset-0 bg-black/25"></div>
        <div class="absolute
        inset-0 bg-gradient-to-b from-transparent via-black/40
        to-black"></div>
        <div class="container-fluid relative">
            <div class="grid grid-cols-1">
                <div class="flex flex-col min-h-screen
        justify-center md:px-10 pb-10 px-4 pt-2">
                    <div class="text-center py-4 rounded-3xl mt-0" style="background-color: rgba(200, 200, 200, 0.9); ">
                        <a href="#">
                            <img src="assets/logo.png" height="10px" class="mx-auto" alt="">
                        </a>
                    </div>
                    <div class="title-heading text-center my-auto pt-4">
                        <h1 class="text-white mt-3 mb-6 md:text-5xl text-3xl font-bold"><?=$title?></h1>
                        <p class="text-white mt-3 mb-6 md:text-3xl text-xl font-normal"><?=$msg?></p>
                        <?=$url?>

                    </div>
                    <div class="text-center">
                        <p class="mb-0
                            text-slate-400">© <script>
                            document.write(new Date().getFullYear())
                            </script> AAIC</p>
                    </div>
                </div>
            </div>
            <!--end grid-->
        </div>
        <!--end
                            container-->
    </section>
    <!--end section-->
</body>

</html>