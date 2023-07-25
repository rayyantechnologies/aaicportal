<?php

namespace App\Controllers;


class Logic extends BaseController
{
   public $session;

   function __construct()
   {
       $this->session = session();

   }

	public function index()
	{
		$session = session();
		$variables = new \App\Models\Variables();
		$installed = $variables->where('name', 'installed')->find()[0]['value'];

		if($installed){
			if ($session->logged_in == TRUE) {
			$session = session();
			$this->dashboard();
		} else {
            if ($session->logged_in == TRUE) {
			 $this->dashboard();
            }else{
                $this->login();
            }
		}
		}else{
			$this->setup();
		}
		
	}

	public function dashboard()
	{
        $session = session();
        if ($session->logged_in == TRUE) {

            if($session->level == 99){
                $variables = new \App\Models\Variables();
                $allVars = $variables->findAll();



                echo view('template/header');
                echo view('template/navbar');
                echo view('template/sidebar');
                echo view('dashboard99', ['allvars'=>$allVars]);
                echo view('template/footer');
                echo view('template/jsfooter');
            }else{
                echo view('template/header');
                echo view('template/navbar');
                echo view('template/sidebar');
                echo view('dashboard');
                echo view('template/footer');
                echo view('template/jsfooter');
            }
        }else{
            $this->login();
        }
	}

	public function students()
	{
       if ($this->session->logged_in == TRUE) {

    		$students = new \App\Models\Students();
    		$variables = new \App\Models\Variables();
    		$all = $students->findAll();
    		$classes = explode(',', $variables->where('name', 'classes')->find()[0]['value']);

    		echo view('template/header');
    		echo view('template/navbar');
    		echo view('template/sidebar');
    		echo view('student', ['students' => $all, 'classes' => $classes]);
    		echo view('template/footer');
    		echo view('template/jsfooter');
        } else{
            return redirect()->to(base_url());
        }
	}


    public function editStudent($adm)
    {
       if ($this->session->logged_in == TRUE) {
            $students = new \App\Models\Students();
            $variables = new \App\Models\Variables();
            $all = $students->findAll();
            $data = $students->where('adm', $adm)->find()[0];
            $classes = explode(',', $variables->where('name', 'classes')->find()[0]['value']);

            echo view('template/header');
            echo view('template/navbar');
            echo view('template/sidebar');
            echo view('edstudent', ['data'=> $data, 'students' => $all, 'classes' => $classes]);
            echo view('template/footer');
            echo view('template/jsfooter');
        } else{
            return redirect()->to(base_url());
        }
    }


    public function pEditStudent()
    {
       if ($this->session->logged_in == TRUE) {
            $incoming = $this->request->getPost();
            // var_dump($incoming);
            $students = new \App\Models\Students();

            $res = $students->update($incoming['id'], $incoming);
            if ($res) {
                $this->msg('Student Updated');
            } else {
                $this->msg('Student fail to Update');
            }
        } else{
            return redirect()->to(base_url());
        }
    }


    public function attendance($cls)
    {
       if ($this->session->logged_in == TRUE) {
            $students = new \App\Models\Students();
            $variables = new \App\Models\Variables();
            $all = $students->where('class', 'JS'.$cls)->find();
            $classes = explode(',', $variables->where('name', 'classes')->find()[0]['value']);

            echo view('attendance', ['students' => $all, 'class' => 'JS'.$cls]);
        } else{
            return redirect()->to(base_url());
        }
    }

    public function pAttendance()
    {
       if ($this->session->logged_in == TRUE) {
            $incoming = $this->request->getPost();
            $students = new \App\Models\Students();
            $Attendance = new \App\Models\Attendance();
            $variables = new \App\Models\Variables();
            $all = $students->where('class', $incoming['class'])->find();

            $data = [];
            foreach ($all as $k => $stud) {
                if(array_key_exists($stud['adm'], $incoming) ){
                    $data[$k] = [$stud['adm'] => 1];
                }else{
                    $data[$k] = [$stud['adm'] => 0];
                }
            }
            $data['note'] = $incoming['note'];
            $data = json_encode($data);
            $today = date('dmy');
            $class = $incoming['class'];
            $res = $Attendance->where('date', $today)->find();
            if($res){
                $Attendance->update($res['id'], [$class => $data]);
                $this->msg('Attendance Updated');

            }else{
                $Attendance->insert(['date'=>$today, $class => $data]);
                $this->msg('New attendance added');

            }
        } else{
            return redirect()->to(base_url());
        }
    }

    public function lesson()
    {
       if ($this->session->logged_in == TRUE) {

            $Lessons = new \App\Models\Lessons();
            $variables = new \App\Models\Variables();
            $classes = explode(',', $variables->where('name', 'classes')->find()[0]['value']);
            $subjects = explode(',', $this->session->subj);
            $term = $variables->where('name', 'term')->find()[0]['value'];
            if(count($subjects) == 0){
                // $all = $Lessons->findAll();
            }elseif (count($subjects) == 1) {
                if($subjects[0] == ''){$all = $Lessons->findAll();}
                else{$all = $Lessons->where('subject', $subjects[0])->find();}
            }elseif(count($subjects) == 2){
                $all = $Lessons->where('subject', $subjects[0])->orWhere('subject', $subjects[1])->find();
            }elseif(count($subjects) == 3){
                $all = $Lessons->where('subject', $subjects[0])->orWhere('subject', $subjects[1])->orWhere('subject', $subjects[2])->find();
            }


            echo view('template/header');
            echo view('template/navbar');
            echo view('template/sidebar');
            echo view('lesson',
                ['lessons' => $all,
                'classes' => $classes,
                'term' => $term,
                'subjects' => $subjects]);
            echo view('template/footer');
            echo view('template/jsfooter');
        } else{
            return redirect()->to(base_url());
        }
    }

    public function clesson()
    {
       if ($this->session->logged_in == TRUE) {

            $variables = new \App\Models\Variables();
            $classes = explode(',', $variables->where('name', 'classes')->find()[0]['value']);
            $subjects = explode(',', $this->session->subj);
            $term = $variables->where('name', 'term')->find()[0]['value'];

            if (count($subjects) == 1) {
                if($subjects[0] == ''){$subjects = explode(',', $variables->where('name', 'subjects')->find()[0]['value']);}
            }
            echo view('clesson',
                [
                'classes' => $classes,
                'term' => $term,
                'subjects' => $subjects]);
        } else{
            return redirect()->to(base_url());
        }
    }

    public function editLesson($id)
    {
       if ($this->session->logged_in == TRUE) {
            $Lessons = new \App\Models\Lessons();
            $variables = new \App\Models\Variables();
            $classes = explode(',', $variables->where('name', 'classes')->find()[0]['value']);
            $subjects = explode(',', $this->session->subj);
            $term = $variables->where('name', 'term')->find()[0]['value'];

            echo view('edlesson',
                [
                'data' => $Lessons->where('id', $id)->find()[0],
                'classes' => $classes,
                'term' => $term,
                'subjects' => $subjects]);
        } else{
            return redirect()->to(base_url());
        }
    }


    public function print($id)
    {
            $Lessons = new \App\Models\Lessons();
            echo view('printer',
                ['data' => $Lessons->where('id', $id)->find()[0]]);
    }

    public function fprint($id)
    {
       if ($this->session->logged_in == TRUE) {
            $Lessons = new \App\Models\Lessons();
            echo view('fprinter',
                ['data' => $Lessons->where('id', $id)->find()[0]]);
        } else{
            return redirect()->to(base_url());
        }
    }

    public function pEditLesson()
    {
       if ($this->session->logged_in == TRUE) {
            $incoming = $this->request->getPost();
            // var_dump($incoming);
            $lessons = new \App\Models\Lessons();

            $res = $lessons->update($incoming['id'], $incoming);
            if ($res) {
                $this->msg('Lesson Updated');
            } else {
                $this->msg('Lesson fail to Update');
            }
        } else{
            return redirect()->to(base_url());
        }
    }

    public function addlesson()
    {
       if ($this->session->logged_in == TRUE) {
            $incoming = $this->request->getPost();
            // var_dump($incoming);
            $lessons = new \App\Models\Lessons();
            $res = $lessons->insert($incoming);
            if ($res) {
                $this->msg('Lesson Added');
            } else {
                $this->msg('Lesson fail to Add');
            }
        } else{
            return redirect()->to(base_url());
        }
    }

	public function indivStudent()
	{
		$students = new \App\Models\Students();
		$variables = new \App\Models\Variables();
		$all = $students->findAll();
		$classes = explode(',', $variables->where('name', 'classes')->find()[0]['value']);
		$session = $variables->where('name', 'session')->find()[0]['value'];
		$term = $variables->where('name', 'term')->find()[0]['value'];
		$schoolOpened = $variables->where('name', 'schoolOpened')->find()[0]['value'];

		echo view('template/header');
		echo view('template/navbar');
		echo view('template/sidebar');
		echo view('indivstudent', ['students' => $all, 'classes' => $classes, 'vars' => ['session'=>$session, 'term'=>$term, 'schoolOpened'=>$schoolOpened]]);
		echo view('template/footer');
		echo view('template/jsfooter');
	}

	public function updIndivStudent()
	{
		$incoming = $this->request->getPost();
		$Indiv = new \App\Models\Indiv();
		$res = $Indiv->insert($incoming);
		if ($res) {
			$this->msg('Student Termly data Added');
		} else {
			$this->msg('Student Termly data fail to Add');
		}
	}

	public function addstudent()
	{
       if ($this->session->logged_in == TRUE) {
    		$incoming = $this->request->getPost();
    		$students = new \App\Models\Students();
    		$res = $students->insert($incoming);
    		if ($res) {
    			$this->msg('Student Added');
    		} else {
    			$this->msg('Student fail to Add');
    		}
        } else{
            return redirect()->to(base_url());
        }
	}

	public function broadsheet()
	{
		$variables = new \App\Models\Variables();
		$Subjects = new \App\Models\Subjects();
		$classes = explode(',', $variables->where('name', 'classes')->find()[0]['value']);
		$subjects = explode(',', $variables->where('name', 'subjects')->find()[0]['value']);
		$subjFull = [];
		foreach ($subjects as $key => $subj) {
			$subjFull[$key]['s'] = $Subjects->where('subject_code', $subj)->find()[0]['subject'];
			$subjFull[$key]['scd'] = $subj;
		}

		echo view('template/header');
		echo view('template/navbar');
		echo view('template/sidebar');
		echo view('broadsheet', ['subjects' => $subjFull, 'classes' => $classes]);
		echo view('template/footer');
		echo view('template/jsfooter');
	}

	public function reportsheet()
	{
		$variables = new \App\Models\Variables();
		$classes = explode(',', $variables->where('name', 'classes')->find()[0]['value']);

		echo view('template/header');
		echo view('template/navbar');
		echo view('template/sidebar');
		echo view('reportsheet', ['classes' => $classes]);
		echo view('template/footer');
		echo view('template/jsfooter');
	}

    public function creportsheet()
    {
        $variables = new \App\Models\Variables();
        $classes = explode(',', $variables->where('name', 'classes')->find()[0]['value']);

        echo view('template/header');
        echo view('template/navbar');
        echo view('template/sidebar');
        echo view('creportsheet', ['classes' => $classes]);
        echo view('template/footer');
        echo view('template/jsfooter');
    }

	public function classreportsheet()
	{
		$variables = new \App\Models\Variables();
		$Broadsheet = new \App\Models\Broadsheet();
		$students = new \App\Models\Students();
		$Indiv = new \App\Models\Indiv();
		$clss = $this->request->getGet('clss');
		
		$t = $variables->where('name','term')->first()['value'];
		$s = $variables->where('name','session')->first()['value'];
		$st = $s.$t;

		$classes = explode(',', $variables->where('name', 'classes')->find()[0]['value']);
		$noInClass = $variables->where('name', 'nic_'.$clss)->find()[0]['value'];
		$schOpened = $variables->where('name', 'schoolOpened')->find()[0]['value'];
		$schResume = $variables->where('name', 'schoolResume')->find()[0]['value'];
		$schFees = $variables->where('name', 'schoolFees')->find()[0]['value'];

			$stud = $Broadsheet->join('indiv_students', 'indiv_students.students_id = broadsheet.students_id')->where('broadsheet.class',$clss)->where('indiv_students.class',$clss)->where('broadsheet.sessionterm',$st)->where('indiv_students.session',$s)->where('indiv_students.term',$t)->find();

		$data = [
			'studs'=>$stud,
			'vars'=>['nic'=>$noInClass,'schOpened'=>$schOpened,'schResume'=>$schResume,'schFees'=>$schFees]
		];


		echo view('logics');
		echo view('rs', $data);
	}


    public function ccreportsheet()
    {
        $variables = new \App\Models\Variables();
        $Broadsheet = new \App\Models\Broadsheet();
        $students = new \App\Models\Students();
        $Indiv = new \App\Models\Indiv();
        $clss = $this->request->getGet('clss');
        
        $t = $variables->where('name','term')->first()['value'];
        $s = $variables->where('name','session')->first()['value'];
        $st = $s.$t;
        $where = "broadsheet.sessionterm='".$s."1' AND broadsheet.sessionterm='".$s."2' AND broadsheet.sessionterm='".$s."3'";
        $where1 = "broadsheet.class='".$clss."' AND indiv_students.class = '".$clss."'";
        $where2 = "broadsheet.class='".$clss."' AND indiv_students.class = '".$clss."' AND (broadsheet.sessionterm='22231' OR broadsheet.sessionterm='22232' OR broadsheet.sessionterm='22233')";
        $where3 = "broadsheet.class='".$clss."' AND (broadsheet.sessionterm='".$s."1' OR broadsheet.sessionterm='".$s."2' OR broadsheet.sessionterm='".$s."3')";
        // ->where('indiv_students.class',$clss)->where($where)->where('indiv_students.session',$s)->where('indiv_students.term',$t)

        $classes = explode(',', $variables->where('name', 'classes')->find()[0]['value']);
        $noInClass = $variables->where('name', 'nic_'.$clss)->find()[0]['value'];
        $schOpened = $variables->where('name', 'schoolOpened')->find()[0]['value'];
        $schResume = $variables->where('name', 'schoolResume')->find()[0]['value'];
        $schFees = $variables->where('name', 'schoolFees')->find()[0]['value'];

        $stuu = $Broadsheet->where($where3)->find();
        $vstuu = $Indiv->where('class',$clss)->where('session',$s)->where('term',$t)->find();

        $stt = array();
        $tstt = array();
        foreach ($vstuu as $key => $vsuu) {
                $stt['comment'] = $vsuu;
            foreach ($stuu as $key => $suu) {
                if(($vsuu['students_id'] == $suu['students_id']) && ($suu['sessionterm'] == $s.'1')){
                    $stt[0] = $suu;
                }elseif(($vsuu['students_id'] == $suu['students_id']) && ($suu['sessionterm'] == $s.'2')){
                    $stt[1] = $suu;
                }elseif(($vsuu['students_id'] == $suu['students_id']) && ($suu['sessionterm'] == $s.'3')){
                    $stt[2] = $suu;
                }
            }
            $tstt[$vsuu['students_id']]= $stt;
       }

        $data = [
            'studs'=>$tstt,
            'vars'=>['nic'=>$noInClass,'schOpened'=>$schOpened,'schResume'=>$schResume,'schFees'=>$schFees]
        ];


        echo view('logics');
        echo view('rscummulativ', $data);
    }


    public function newsletter()
    {
        $variables = new \App\Models\Variables();
        $students = new \App\Models\Students();

        $t = $variables->where('name','term')->first()['value'];
        $s = $variables->where('name','session')->first()['value'];
        $st = $s.$t;

        $stud = $students->findAll();

        $data = [
            'studs'=>$stud,
        ];
        echo view('letter', $data);
    }

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

	public function editscoresheet()
	{
		$variables = new \App\Models\Variables();
		$Broadsheet = new \App\Models\Broadsheet();
		$students = new \App\Models\Students();
		
		$t = $variables->where('name','term')->first()['value'];
		$s = $variables->where('name','session')->first()['value'];
		$st = $s.$t;

		$stud = [];

		$classes = explode(',', $variables->where('name', 'classes')->find()[0]['value']);
		foreach ($classes as $cls) {
			$stud[$cls] = $Broadsheet->where(['sessionterm'=>$st, 'class' => $cls])->find();
		}

		$incoming = explode(',', $this->request->getGet('subj'));
		$data = [
			'subjects' => [['s' => $incoming[1], 'scd' => $incoming[0]]], 
			'classes' => $classes,
			'list' => $stud
		];
        $ses_data = [
            'subject' => $incoming[1],
            'subject_code' => $incoming[0]
        ];
        $session = session();
        $session->set($ses_data);
		// $Broadsheet->insert(['id'=>3,'mt'=>35]);

		echo view('template/header');
		echo view('template/navbar');
		echo view('template/sidebar');
		echo view('editboard', $data);
		echo view('template/footer');
		echo view('template/jsfooter');
	}

	public function updatescore()
	{
        $session = session();
		$Broadsheet = new \App\Models\Broadsheet();
		$variables = new \App\Models\Variables();
		$classes = explode(',', $variables->where('name', 'classes')->find()[0]['value']);
		$score_styles = explode(',', $variables->where('name', 'score_style')->find()[0]['value']);

		$incoming = $this->request->getPost();
		$id = $incoming['id'];
		$action = $incoming['action'];
        $data = '';
        foreach($classes as $class){
            foreach($score_styles as $ss){
	            if(isset($incoming[$class.'-'.$session->subject_code.'_'.$ss])){
	                $data = $class.'-'.$session->subject_code.'_'.$ss.' '. $incoming[$class.'-'.$session->subject_code.'_'.$ss];
	            }
	        }
		}
		// $data = $incoming[1];
		$column = explode('-', explode(' ', $data)[0])[1];
		$value = explode(' ', $data)[1];
		$res = $Broadsheet->update($id, [$column => $value]);
		var_dump($id,$action,$data,$res,$value,$column);
	}

    public function updateVars()
    {
        $session = session();
        $Variables = new \App\Models\Variables();

        $incoming = $this->request->getPost();
        $val = $incoming['value'];
        $id = $incoming['id'];
        $res = $Variables->set('value', $val)->where('id', $id)->update();
        $this->msg('Variable updated Successfully');
    }

	public function postlogin()
	{
		$users = new \App\Models\Users();
		$incoming = $this->request->getPost('login');
		$data = [
			'email' => $incoming['uname'],
			'password' => hash('sha256', $incoming['pass']),
		];
		$result = $users->where($data)->find();
		if ($result) {
			$ses_data = [
				'id' => $result[0]['id'],
				'lname' => $result[0]['lname'],
				'email' => $result[0]['email'],
                'level' => $result[0]['clearance'],
				'subj' => $result[0]['subject'],
				'logged_in' => TRUE,
			];
			$session = session();
			$session->set($ses_data);
            return redirect()->to(base_url());
			// $this->index();
		} else {
			$this->msg('Login Not Successful');
		}
	}


    public function postregister()
    {
        $users = new \App\Models\Users();
        $incoming = $this->request->getPost('reg');
        $suj = '';
        foreach($this->request->getPost('subject') as $k => $subj){
            if($k+1 == sizeof($this->request->getPost('subject')) ){
            $suj = $suj.$subj;
            }else{$suj = $suj.$subj.',';}
        }
        $data = [
            'fname'=> explode(' ',$incoming['name'])[1],
            'lname'=> explode(' ',$incoming['name'])[0],
            'email' => $incoming['email'],
            'subject' => $suj,
            'password' => hash('sha256', $incoming['pass']),
            'clearance' => 1,
        ];
        if($incoming['access'] == $_ENV['ACCESS_CODE']){
            var_dump($data);
            $res = $users->insert($data);
            if($res){
                $this->msg('Registeration Successful');
                return redirect()->to(base_url());
            }else{
                $this->msg('Registeration Invalid');
            }
        }else{
            $this->msg('Incorrect Access Code');
        }
    }

	public function msg($note)
	{
        echo view('template/header');
        echo view('msg', ['msg'=> $note]);
        echo view('template/jsfooter');
	}

	// public function register()
	// {
	//     $subjects = new \App\Models\Subjects();
	// 	$data = [
	// 		'subjects' => $subjects->findAll(),
	// 	];
	// 	echo view('authheader');
	// 	echo view('register', $data);
	// 	echo view('footer');
	// }

	public function login()
	{
		echo view('template/header');
		echo view('login');
		echo view('template/jsfooter');
	}

    public function register()
    {
         $variables = new \App\Models\Variables();
        $subjects = explode(',', $variables->where('name', 'subjects')->find()[0]['value']);

        echo view('template/header');
        echo view('register', ['subjects' => $subjects]);
        echo view('template/jsfooter');
    }

	public function setup()
	{
		$Subjects = new \App\Models\Subjects();
		// $AVAILABLE_SUBJECTS = [
		// 	['English Language', 'en'],
		// 	['Mathematics', 'mt'],
		// 	['Arabic', 'ar'],
		// 	['Basic Science', 'bs'],
		// 	['Basic Tech', 'bu'],
		// 	['IRS', 'ir'],
		// ];
		$AVAILABLE_SUBJECTS = $Subjects->findAll();
		echo view('home', ['subjects' => $AVAILABLE_SUBJECTS]);
	}

	private function backupDB($tables = '*')
	{
		$db = mysqli_connect($_ENV['database.default.hostname'], $_ENV['database.default.username'], $_ENV['database.default.password'], $_ENV['database.default.database']);
		 if($tables == '*') { 
	        $tables = array();
	        $result = $db->query("SHOW TABLES");
	        while($row = $result->fetch_row()) { 
	            $tables[] = $row[0];
	        }
	    } else { 
	        $tables = is_array($tables)?$tables:explode(',',$tables);
	    }

	    $return = '';
	    $namer = '';
	    foreach($tables as $table){
	    	$namer = $table;
	        $result = $db->query("SELECT * FROM $table");
	        $numColumns = $result->field_count;

	        /* $return .= "DROP TABLE $table;"; */
	        $result2 = $db->query("SHOW CREATE TABLE $table");
	        $row2 = $result2->fetch_row();

	        $return .= "\n\n".$row2[1].";\n\n";

	        for($i = 0; $i < $numColumns; $i++) { 
	            while($row = $result->fetch_row()) { 
	                $return .= "INSERT INTO $table VALUES(";
	                for($j=0; $j < $numColumns; $j++) { 
	                    $row[$j] = addslashes($row[$j]);
	                    $row[$j] = $row[$j];
	                    if (isset($row[$j])) { 
	                        $return .= '"'.$row[$j].'"' ;
	                    } else { 
	                        $return .= '""';
	                    }
	                    if ($j < ($numColumns-1)) {
	                        $return.= ',';
	                    }
	                }
	                $return .= ");\n";
	            }
	        }

	        $return .= "\n\n\n";
	    }

	    $handle = fopen(utf8_encode($namer).'.sql','w+');
	    fwrite($handle,$return);
	    fclose($handle);
	    // echo "Database Export Successfully!";
	}

    private function populateBroadsheet()
    {
        $Variables = new \App\Models\Variables();
        $Students = new \App\Models\Students();
        $Broadsheet = new \App\Models\Broadsheet();

        $t = $Variables->where('name','term')->first()['value'];
        $s = $Variables->where('name','session')->first()['value'];
        $st = $s.$t;

        $studs = $Students->findAll();
        $stds = [];
        foreach ($studs as $k => $std) {
            if($std['class'] == 'Leaver'){
                $nn = '';
           }else{
                $stds[$k] = [
                    'students_id' => $std['adm'],
                    'name' => $std['lname'].' '.$std['fname'],
                    'class' => $std['class'],
                    'sessionterm' => $st,
                ];
            }
        }

        if(count($stds)){
            $Broadsheet->insertBatch($stds);
        }
        return $stds;
    }

    private function termIncr()
    {
        $Variables = new \App\Models\Variables();
        $Students = new \App\Models\Students();

        $t = $Variables->where('name','term')->first();
        $s = $Variables->where('name','session')->first();
        $c = $Variables->where('name','classes')->first();

        if($t['value'] == 3){
            $ns = substr($s['value'],2);
            $nns = $ns.($ns+1);
            $Variables->update($s['id'], ['value'=>$nns]);
            $Variables->update($t['id'], ['value'=>1]);

            // Increment Class
            $as = $Students->findAll();
            foreach ($as as $key => $st) {
                $this->classIncr($st);
            }
        }else{
            $Variables->update($t['id'], ['value'=>($t['value']+1)]);
        }
        return [$t['value'], $s['value']];
    }

    private function classIncr($student)
    {
        $Students = new \App\Models\Students();
        $Variables = new \App\Models\Variables();
        $c = $Variables->where('name','classes')->first();

        $needle = $student['class'];
        if($needle == 'Leaver'){
            $newClas = 'Leaver';
        }else{
            $haystack = explode(',', $c['value']);
            $result = array_search($needle, $haystack);
            if($result+1 == count($haystack)){
                $newClas = 'Leaver';
            }else{
                $newClas = $haystack[$result+1];
            }
        }

        $Students->update($student['id'], ['class'=>$newClas]);
    }

    public function newTerm()
    {


        // create a private function to increment term in respect to session
        $rs = $this->termIncr();

        $this->backupDB('broadsheet');
        $this->backupDB('indiv_students');

        // $db = \Config\Database::connect();
        // $query = $db->query('TRUNCATE TABLE broadsheet');
        // $query = $db->query('TRUNCATE TABLE indiv_students');

        $this->populateBroadsheet();

        echo('Done');
    }


	public function postsetup()
	{
		$forge = \Config\Database::forge();
		$Variables = new \App\Models\Variables();
		$Users = new \App\Models\Users();
		$incoming = $this->request->getPost();

		// $Variables->insert(['name' => 'schoolName', 'value' => $incoming['schoolName']]);
		// $Variables->insert(['name' => 'schoolAddress', 'value' => $incoming['schoolAddress']]);

		// $subjects = explode (",", $incoming['subjects']);
		$suj = '';
		foreach($incoming['subjects'] as $k => $subj){
			if($k+1 == sizeof($incoming['subjects']) ){
			$suj = $suj.$subj;
			}else{$suj = $suj.$subj.',';}
			
		}
		var_dump($suj);
		$fields = [
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'title'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
				'unique'         => true,
			],
			'author'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
				'default'        => 'King of Town',
			],
			'description' => [
				'type'           => 'TEXT',
				'null'           => true,
			],
			'status'      => [
				'type'           => 'ENUM',
				'constraint'     => ['publish', 'pending', 'draft'],
				'default'        => 'pending',
			],
		];
		// $forge->addField('id');
		// foreach ($suj as $key => $sj) {
		// 	$forge->addField($sj . " varchar(100) NOT NULL");
		// };
		// $res = $forge->createTable('broadsheet');
		// var_dump($res);

		// echo view('home');
	}

	public function whm()
	{
		$user = "rayyante";
		$token = "ZQY520837NKET7O75HIJ9KCS3RRJI3FU";
		// HUIEEZ9O1BTEIL64330Z8L7BRZOQTSWR phf
		// ZQY520837NKET7O75HIJ9KCS3RRJI3FU ray

		// $query = "https://v5.gigilist.com:2087/json-api/listaccts?api.version=1";
		$query = "https://v5.gigilist.com:2087/json-api/createacct?api.version=1&username=phfogun&domain=phfogun.org&quota=3000";
		// $query = "https://41.216.184.184:2087/json-api/listaccts?api.version=1";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$header[0] = "Authorization: whm $user:$token";
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($curl, CURLOPT_URL, $query);

		$result = curl_exec($curl);

		$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		if ($http_status != 200) {
			echo "[!] Error: " . $http_status . " returned\n";
		} else {
			$json = json_decode($result);
			echo "[+] Current cPanel users on the system:\n";
			var_dump($json);
			// foreach ($json->{'data'}->{'acct'} as $userdetails) {
			// 	echo "\t" . $userdetails->{'user'} . "\n";
			// }
		}

		curl_close($curl);
	}

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url());
    }

	// To Do
	// 1. Automatically Create Broadsheet table using subjects in vars
	// 2. Automatically populate Broadsheet & Indiv_Student created with student data on termly basis
	// 3. Create report sheet by class and individually
	//--------------------------------------------------------------------

}
