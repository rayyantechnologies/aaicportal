<?php

namespace App\Controllers;

class Live extends BaseController
{
    public function indivreportsheet()
    {
        $adm = $this->request->getGet('adm');
        $phone = $this->request->getGet('phone');
        $variables = new \App\Models\Variables();
        $Broadsheet = new \App\Models\Broadsheet();
        $students = new \App\Models\Students();
        $Indiv = new \App\Models\Indiv();
        $res = $students->where('adm', $adm)->where('phone',$phone)->find();
        $rp = $variables->where('name','ReportSheet')->first()['value'];

        if($res){
            $adm = $res[0]['adm'];
            if($rp == 0){
                $clss = $res[0]['class'];
                $t = $variables->where('name','term')->first()['value'];
                $s = $variables->where('name','session')->first()['value'];
                $st = $s.$t;

                $classes = explode(',', $variables->where('name', 'classes')->find()[0]['value']);
                $noInClass = $variables->where('name', 'nic_'.$clss)->find()[0]['value'];
                $schOpened = $variables->where('name', 'schoolOpened')->find()[0]['value'];
                $schResume = $variables->where('name', 'schoolResume')->find()[0]['value'];
                $schFees = $variables->where('name', 'schoolFees')->find()[0]['value'];

                $stud = $Broadsheet->where('students_id', $adm)->where('sessionterm',$st)->find();

                $data = [
                    'studs'=>$stud,
                    'vars'=>['nic'=>$noInClass,'schOpened'=>$schOpened,'schResume'=>$schResume,'schFees'=>$schFees]
                ];


                echo view('logics');
                echo view('rsmin', $data);
            }else{
                $clss = $res[0]['class'];
                $t = $variables->where('name','term')->first()['value'];
                $s = $variables->where('name','session')->first()['value'];
                $st = $s.$t;

                $classes = explode(',', $variables->where('name', 'classes')->find()[0]['value']);
                $noInClass = $variables->where('name', 'nic_'.$clss)->find()[0]['value'];
                $schOpened = $variables->where('name', 'schoolOpened')->find()[0]['value'];
                $schResume = $variables->where('name', 'schoolResume')->find()[0]['value'];
                $schFees = $variables->where('name', 'schoolFees')->find()[0]['value'];

                    $stud = $Broadsheet->join('indiv_students', 'indiv_students.students_id = broadsheet.students_id')->where('broadsheet.students_id',$adm)->where('indiv_students.students_id',$adm)->where('broadsheet.sessionterm',$st)->where('indiv_students.session',$s)->where('indiv_students.term',$t)->find();

                $data = [
                    'studs'=>$stud,
                    'vars'=>['nic'=>$noInClass,'schOpened'=>$schOpened,'schResume'=>$schResume,'schFees'=>$schFees]
                ];


                echo view('logics');
                echo view('rs', $data);
            }
        }else{
            $this->msg('Incorrect Details Supplied');
        }
    }

    public function newintake()
    {
        $pin = $this->request->getGet('pin');
        $studentDB = [
            'hostname' => 'localhost',
            'database' =>  WRITEPATH.'../../adminer/aaicStudDB',
            'DBDriver' => 'SQLite3',
        ];
        $db = \Config\Database::connect($studentDB);
        $bd = $db->table('pins');
        $res = $bd->where('pin',$pin)->get()->getResultArray();
        if($res != [] && $res[0]['used'] != 1){
            // $dd = $bd->update(['used'=>1],['pin'=>$pin]);
            echo view('live/reg', ['pin'=>$pin]);
        }else{
             echo view('live/msg', ['title'=>'😢 Sorry 😭','msg'=>'Your access pin is invalid. Kindly contact the admin via 07036511151', 'url'=>'<a href="https://aaic.sgm.ng" class="bg-red-600 rounded-3xl py-2 px-4 text-white hover:bg-gray-200 mt-6 mb-6 md:text-4xl text-2xl font-medium">Go to Homepage</a>']);
        }
    }

    public function postNewintake()
    {
        $incoming = $this->request->getPost();
        $passport = $this->request->getFile('passport')->store('students/');


        $studentDB = [
            'hostname' => 'localhost',
            'database' =>  WRITEPATH.'../../adminer/aaicStudDB',
            'DBDriver' => 'SQLite3',
        ];
        $db = \Config\Database::connect($studentDB);
        $bd = $db->table('students');
        $PIN = $db->table('pins');

        $passSource = new \CodeIgniter\Files\File(WRITEPATH.'uploads/'.$passport, true);
        $source = file_get_contents(WRITEPATH.'uploads/'.$passport);
        $passBase64 = base64_encode($source);
        $blob = 'data:'.$passSource->getMimeType().';base64,'.$passBase64;
        $incoming['passport'] = $blob;
        $incoming['passportlink'] = $passport;

        $pinData = $PIN->where('pin',$incoming['pin'])->get()->getResultArray();
        if ($pinData != [] && $pinData[0]['used'] != 1) {
            $res = $bd->insert($incoming)->getResultArray();
            if($res == []){
                $PIN->update(['used'=>1],['pin'=>$incoming['pin']]);
                 $data = [
                    'title' => '🎉 Congratulation 🎊',
                    'msg' => 'Your Registration was successfull. Hold tight while we get back to you',
                    'url' => '<a class="bg-red-600 rounded-3xl py-2 px-4 text-white hover:bg-gray-200 mt-6 mb-6 md:text-4xl text-2xl font-medium" href="https://aaic.sgm.ng">Go to Homepage</a>',
                ];
                echo view('live/msg', $data);
            }
            else{
                $data = [
                    'title' => '😢 Sorry 😭',
                    'msg' => 'Your Registration was not successfull. Kindly contact the admin via 07036511151',
                    'url' => '<a class="bg-red-600 rounded-3xl py-2 px-4 text-white hover:bg-gray-200 mt-6 mb-6 md:text-4xl text-2xl font-medium" href="https://aaic.sgm.ng">Go to Homepage</a>',
                ];
                echo view('live/msg', $data);
            }
        }else{
            echo view('live/msg', ['title'=>'😢 Sorry 😭','msg'=>'Your access pin is invalid. Kindly contact the admin using via 07036511151', 'url'=>'<a href="https://aaic.sgm.ng" class="bg-red-600 rounded-3xl py-2 px-4 text-white hover:bg-gray-200 mt-6 mb-6 md:text-4xl text-2xl font-medium">Go to Homepage</a>']);
        }
        // $res = $bd->where('id', 2)->get()->getResultArray();
        // $bblob = $res[0]['passport'];
        // echo('<img src="'.$bblob.'">');
        // $res = $bd->where('pin',$pin)->get()->getResultArray();
        // if($res != [] && $res[0]['used'] != 1){
        //     // $dd = $bd->update(['used'=>1],['pin'=>$pin]);
        //     echo view('live/reg', ['pin'=>$pin]);
        // }else{

        // }


    }


    public function uniqidReal($lenght = 999999) {
        // uniqid gives 13 chars, but you could adjust it to your needs.
        if (function_exists("random_int")) {
            $bytes = random_int(0, ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            echo("no cryptographically secure random function available");
        }
        return substr(($bytes), 0, $lenght);

    }


    public function samp()
    {

    }

//     1 415755
// 2 366214
// 3 288552
// 4 416761
// 5 158871
// 6 14075
// 7 38421
// 8 369367
// 9 124837
// 10 92196
// 11 206349
// 12 430522
// 13 300479
// 14 237382
// 15 493838
// 16 498603
// 17 491447
// 18 477709
// 19 42289
// 20 367906
// 21 17735
// 22 494422
// 23 438762
// 24 92776
// 25 16876
// 26 208285
// 27 370008
// 28 320687
// 29 460751
// 30 92886
// 31 351663
// 32 408223
// 33 337398
// 34 306325
// 35 22087
// 36 155889
// 37 396924
// 38 17353
// 39 403225
// 40 483704
}