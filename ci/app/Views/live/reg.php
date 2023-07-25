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
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <style>
        input:required:invalid{
            background-color: #992939;
        }
        input[type=file]:required:invalid{
            background-color: #992939 !important;
        }
        select:required:invalid,input:required:focus:invalid {
            background-color: #992939;
        }
        input:required:focus:valid{
            background-color: #299929;
        }
    </style>
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
                    <div class="title-heading  my-auto pt-4">
                        <h1 class="text-white mt-3 mb-6 md:text-5xl text-3xl font-bold text-center">Registration Form</h1>
                        <p class="text-center">Make sure all fields are white for successful submission</p>
                        <form action="<?=base_url('newintake')?>" method="post"  style="" id="regForm" enctype="multipart/form-data">
                            <input type="hidden" name="pin" value="<?=$pin?>">
                            <fieldset class="mb-3">
                                <label class="text-white md:text-2xl text-xl font-light">Surname: </label>
                                <input type="text" name="surname" class="p-4 rounded mb-4 w-full md:w-fit" placeholder="Surname" required>
                                <br class="block md:hidden">
                                <label class="text-white md:text-2xl text-xl font-light">Other Name: </label>
                                <input type="text" name="oname" class="p-4 rounded mb-4 w-full md:w-1/4" placeholder="First Name, Other Name" required>
                                <label class="text-white md:text-2xl text-xl font-light">Passport: </label>
                                <input type="file" name="passport" id="pasport" class="p-4 rounded bg-white mb-4 w-full md:w-fit" required>
                            </fieldset>
                            <fieldset class="mb-3">
                                <label class="text-white md:text-2xl text-xl font-light">Street: </label>
                                <input type="text" name="straddress" class="p-4 rounded mb-4 w-full md:w-1/3" placeholder="e.g: 21, Ajegunle Street" required>
                                <br class="block md:hidden">
                                <label class="text-white md:text-2xl text-xl font-light">Landmark:  </label><sup><a href="https://storage.googleapis.com/madebygoog.appspot.com/grow-ext-cloud-images-uploads/plus_codes_demo_6E7C25B2.mp4" target="_blank" class="text-black rounded-full bg-white px-1" title="What is Plus Code">?</a></sup>
                                <input type="text" name="landmark" class="p-4 rounded mb-4 w-full md:w-1/4" placeholder="e.g Opposite Zenith Bank" required>
                                <input type="text" name="pluscode" class="p-4 rounded mb-4 w-full md:w-1/4" placeholder="Plus Code: RMP3+6RH Sagamu">
                            </fieldset>
                             <fieldset class="mb-3">
                                <label class="text-white md:text-2xl text-xl font-light">Date of Birth: </label>
                                <input type="date" max="2014-01-01"  min="2010-01-01" name="dob" class="p-4 rounded mb-4 w-full md:w-1/4" placeholder="eg"  required>
                                <br class="block md:hidden">
                                <label class="text-white md:ml-3 md:text-2xl text-xl font-light">Gender: </label>
                                <select name="gender" class="p-4 rounded mb-4 w-full md:w-1/4" required>
                                    <option></option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <br class="block md:hidden">
                                <label class="text-white md:text-2xl text-xl font-light">Age: </label>
                                <input type="number" name="age" max="14" min="9" class="p-4 rounded mb-4 w-full md:w-1/4" placeholder="" required>
                            </fieldset>
                             <fieldset>
                                <label class="text-white md:text-2xl text-xl font-light">Last School Attended: </label>
                                <input type="text" name="lastschool" class="p-4 rounded mb-4 w-full md:w-1/3" required>
                                <br class="block md:hidden" required>
                                <label class="text-white md:text-2xl text-xl font-light">Last Class Attended: </label>
                                <input type="text" name="lastclass" class="p-4 rounded mb-4 w-full md:w-1/3" required>
                            </fieldset>

                            <hr class="bg-white my-5">


                            <fieldset class="mb-3">
                                <label class="text-white md:text-2xl text-xl font-light">Father's Details: </label>
                                <input type="text" name="fathername" class="p-4 rounded mb-4 w-full md:w-1/3" placeholder="Full Name" required>
                                <br class="block md:hidden">
                                <input type="number" name="fatherphone" class="p-4 rounded mb-4 w-full md:w-1/4" placeholder="Phone Number" required>
                                <input type="text" name="fatheroccu" class="p-4 rounded mb-4 w-full md:w-1/4" placeholder="Occupation" required>
                            </fieldset>
                            <fieldset class="mb-3">
                                <label class="text-white md:text-2xl text-xl font-light">Mother's Details: </label>
                                <input type="text" name="mothername" class="p-4 rounded mb-4 w-full md:w-1/3" placeholder="Full Name" required>
                                <br class="block md:hidden">
                                <input type="number" name="motherphone" class="p-4 rounded mb-4 w-full md:w-1/4" placeholder="Phone Number" required>
                                <input type="text" name="motheroccu" class="p-4 rounded mb-4 w-full md:w-1/4" placeholder="Occupation" required>
                            </fieldset>

                            <hr class="bg-white my-5">
                            <fieldset class="mb-3">
                                <label class="text-white md:text-2xl text-xl font-light">Entrance Examination Date: </label>
                                <select name="examDate" class="p-4 rounded mb-4 w-full md:w-1/3" required>
                                    <option></option>
                                    <option value="may20">May 20th</option>
                                    <option value="july22">July 22nd</option>
                                    <option value="aug19">Aug 19th</option>
                                </select>
                                <br class="block md:hidden">
                                <label class="text-white md:text-2xl text-xl font-light">Examination Mode: </label>

                                <label><input type="radio" name="mode" class=" rounded mb-4"  value="CBT"><span class="ml-3 text-white md:text-2xl text-xl font-light">CBT</span></label>
                                <label class="ml-3 text-white md:text-2xl text-xl font-light"><input type="radio" name="mode" class="bg-white p-4 rounded mb-4" value="PaperPencil"><span class="ml-1">Paper & Pencil</span></label>
                            </fieldset>

                            <div class="text-center">
                                <input type="submit" class="bg-green-600 rounded-3xl py-2 px-4 text-white hover:bg-gray-200 mt-6 mb-6 md:text-4xl text-2xl font-medium" value="Submit Form">
                            </div>

                        </form>

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


    <script>
        let regForm = document.querySelector('#regForm');
        let image = document.querySelector('#pasport');
        let allowedMimes = ['png', 'jpg', 'jpeg']; //allowed image mime types
        let maxMb = 240; //maximum allowed size (MB) of image

        function uploadImage() {
            if (!image.value) { // if the image input does not have value
                return showError('No image selected :(');
            }
            else {
                let mime = image.value.split('.').pop(); // get the extension/mime of image file
                if (!allowedMimes.includes(mime)) {  // if allowedMimes array does not have the extension
                    return showError("Only png,jpg,jpeg alowed");
                }
                else {
                    let mb = image.files[0].size / 1024; // convert the file size into byte to kb
                    // let mb = kb / 1024; // convert kb to mb
                    if (mb > maxMb) { // if the file size is gratter than maxMb
                        return showError(`The passport should be less than ${maxMb} KB`);
                    }
                    else { // if all the validations are good
                        // alert("Image has uploaded successfully :)")
                        return true;
                    }
                }
            }
        }

        function showError(errorMessage) {
            alert(errorMessage);
        }

        regForm.addEventListener('submit', (e)=>{
            e.preventDefault();
            if(uploadImage()){
                regForm.submit();
            }
        })

    </script>
</body>

</html>