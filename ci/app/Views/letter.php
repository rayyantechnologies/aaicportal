<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="assets/rs/css/paper.css">
    <link rel="stylesheet" href="assets/rs/css/style.css">
    <style>
        .flex{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }
    </style>

    <!-- Set page size here: A5, A4, A4 landscape, letter, legal or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>@page { size: A5 }</style>
    <title>AAIS Newsletter</title>
</head>

<body class="A5">
        <!-- <header>
            <img class="logo" src="assets/rs/img/AAIS_Logo_full.png" alt="">
            <p class="title">Report for First Term 2022/2023 Session</p>

        </header> -->
        <?php foreach($studs as $stud): ?>
    <div class="container sheet flex">

            <main style="margin-left: 20px;">

                <img width="500px" src="assets/rs/img/AAIS_Logo_full.png" alt="">
                <h2 class="text-center">Mid Term Newsletter</h2>
                <p style="font-size: 1.4rem;">As Salamu Alaykum Warahmotullah, <br>Dear Parent, <i><b>(Mr & Mrs <?=$stud['lname']?>)</b></i> <br> We are using this medium to inform you that <br>there will be mid term break tomorrow, <br> Thursday and Friday. <br> To track your child's progress, visit <br> <i><b>www.aaic.sgm.ng</b></i> and sign in with the<br> following details: <br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<b>ADM No:</b> <?=$stud['adm']?> <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<b>Phone No:</b> <?=$stud['phone']?> <br><br>
                All students yet to balance up by Monday, <br>will not be allowed to stay in class. <br><br>
                Jazakumullahu Khairan
                </p>
            </main>
    </div>

        <?php endforeach; ?>

</body>

</html>