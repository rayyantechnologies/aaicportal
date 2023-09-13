<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Logic');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Logic::index');
$routes->get('/dashboard', 'Logic::dashboard');

$routes->get('/students', 'Logic::students');
$routes->post('/student', 'Logic::addstudent');
$routes->get('/editstudent/(:any)', 'Logic::editStudent/$1');
$routes->post('/editStudent', 'Logic::pEditStudent');

// indivStudent
$routes->get('/indivstudent', 'Logic::indivstudent');
$routes->post('/indivstudent', 'Logic::updIndivStudent');

$routes->post('/updvars', 'Logic::updateVars');

$routes->get('/broadsheet', 'Logic::broadsheet');

$routes->get('/newterm', 'Logic::newTerm');
$routes->get('/letter', 'Logic::newsletter');

$routes->get('/attendance/(:any)', 'Logic::attendance/$1');
$routes->post('/attendance', 'Logic::pAttendance');


$routes->get('/lesson', 'Logic::lesson');
$routes->get('/clesson', 'Logic::clesson');
$routes->get('/print/(:any)', 'Logic::print/$1');
$routes->get('/editlesson/(:any)', 'Logic::editLesson/$1');
$routes->post('/lesson', 'Logic::addlesson');
$routes->post('/editlesson', 'Logic::pEditLesson');

$routes->get('/reportsheet', 'Logic::reportsheet');
$routes->get('/creportsheet', 'Logic::creportsheet');
$routes->get('/ccreportsheet', 'Logic::ccreportsheet');
$routes->get('/classreportsheet', 'Logic::classreportsheet');
$routes->get('/arclassreportsheet', 'Logic::arclassreportsheet');

$routes->get('/newintake', 'Live::newintake');
$routes->post('/newintake', 'Live::postNewintake');
$routes->get('/ireportsheet', 'Live::indivreportsheet');

$routes->get('/editscoresheet', 'Logic::editscoresheet');
$routes->post('/updatescore', 'Logic::updatescore');

$routes->get('/login', 'Logic::login');
$routes->get('/logout', 'Logic::logout');
$routes->get('/register', 'Logic::register');
$routes->post('/login', 'Logic::postlogin');
$routes->post('/register', 'Logic::postregister');

$routes->post('/setup', 'Logic::postsetup');
$routes->get('/whm', 'Logic::whm');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
