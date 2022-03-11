<?php

namespace App\Controllers;

use App\Models\Admin_model;
use CodeIgniter\API\ResponseTrait;

class AdminController extends BaseController
{
    //Common Variables
    use ResponseTrait;
    protected $adminFolder;
    protected $statusOk;
    protected $unAuthorized;
    protected $methodNotAllowed;
    protected $internalServerError;
    protected $session;
    protected $admin_id;
    protected $adminURL;

    public function __construct()
    {
        helper(['form', 'common', 'cookie']);

        // librarys & all other imports
        $this->admin_model = new Admin_model();
        $this->session = \Config\Services::session();
        $this->db = \Config\Database::connect();

        // set variable values
        $this->adminFolder = 'Admin/';
        $this->adminURL = 'mainAdmin/';
        $this->statusOk = 200;
        $this->unAuthorized = 401;
        $this->methodNotAllowed = 405;
        $this->internalServerError = 500;




        $this->admin_id = $this->session->get('admin_id');
        
    }


    // All Views Start
    public function loadViews($url = '/', $data = [])
    {
        if (!session('is_logged_in')) {
            return redirect()->to(base_url('/mainAdmin/')); 
        }else{
            $uri = service('uri');
            $segments = $uri->getSegments();
            $data['url'] = $segments[1];
            $data['projectName'] = getDirectValue('generalsettings', 'value', 'name', 'siteName'); // get Project Name
            $data['adminURL'] = $this->adminURL;
            $underMaintenance = getDirectValue('generalsettings', 'value', 'name', 'underMaintenance'); // get underMaintenance status

            
            if ($underMaintenance == 0) {
                // $data['left_sidebar'] = $this->loadSidebarFields();
                $data['username'] = 'Shree vyas';
                $data['notice_count'] = 2;
                $data['title'] = $data['projectName'] . ' - ' . ucfirst($segments[1] == '' ? 'login' : $segments[1]);
                $url = $this->adminFolder . $url;
                // admin_logs('pageAccess', '1', $data['url']); // Admin Activities Logs.
                return View($url, $data);

            } else {
                $data['title'] = $data['projectName'] . ' - Site Under Maintenance';
                return View($this->adminFolder . 'commonPage/underMaintenance', $data);
            }
        }
    }

    public function index()
    {
        return view('welcome_message');
    }
    
    public function notFoundPage()
    {
        return view('Admin/mainNotfound');
    }

    public function dashboard(){
        return $this->loadViews('dashboard');
    }

    public function login(){
        return view('Admin/auth/login');
    }

    public function addSidebar(){
        $data['pageHas'] = 'form';
        $data['pageName'] = 'Add Sidebar';
        return $this->loadViews('sidebar/addSidebar',$data);
    }

    public function addVendor(){
        $data['pageHas'] = 'form';
        $data['pageName'] = 'Add Vendor';
        return $this->loadViews('vendors/addVendor',$data);
    }

    public function addGeneralSettings(){
        $data['pageHas'] = 'form';
        $data['pageName'] = 'Add Settings';
        return $this->loadViews('generalSettings/addGeneralSettings',$data);
    }

    public function allGeneralSettings(){
        $data['pageHas'] = 'tableView';
        $data['pageName'] = 'All General Settings';
        $data['allGeneralSettings'] = $this->admin_model->generalSettings();
        return $this->loadViews('generalSettings/manageGeneralSettings',$data);
    }

    public function allSidebar(){
        $data['pageHas'] = 'tableView';
        $data['pageName'] = 'All Sidebar';
        $data['allSidebar'] = $this->admin_model->sidebarMaster();
        return $this->loadViews('sidebar/manageSidebar',$data);
    }
    // All Views Ends



    // All functions Starts

    

    // check login credentials & set session
    public function checkLogin(){
        if ($this->request->getMethod() === 'post') {
            $validation =  \Config\Services::validation();
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $rules = [
                'username' => ['label' => 'username', 'rules' => 'required'],
                'password' => ['label' => 'password', 'rules' => 'required']
            ];

            if ($this->validate($rules) == false) {
                return $this->respond(['status' => $this->unAuthorized, 'message' => $validation->getErrors()]);
            }

            $adminDetails = $this->admin_model->validate_credentials($username, $password);
            if($adminDetails['status'] == 1){

                // set admin sessions
                $adminSession = array(
                    'adminId'           => $adminDetails['id'],
                    'adminName'         => $adminDetails['name'],
                    'role'               => $adminDetails['role'],
                    'is_logged_in'    => true
                );
                $this->session->set($adminSession);

                return $this->respond(['status' => $this->statusOk, 'message' => ['User Verified, Welcome Back.']]);

            }else if($adminDetails['status'] == 0){
                return $this->respond(['status' => $this->unAuthorized, 'message' => ['Incorrect Username / Password']]);
            }else if($adminDetails['status'] == 2){
                return $this->respond(['status' => $this->unAuthorized, 'message' => ['User Deactivated']]);
            } 

        }else{
            return $this->respond(['status' => $this->methodNotAllowed, 'message' => 'Access Denied']);
        }
    }

    // validate sidebar insert frilds and insert into DB
    public function dataInsertSidebar(){

        if ($this->request->getMethod() === 'post') {
            $validation =  \Config\Services::validation();
            $data['parent_name'] = $this->request->getPost('parent');
            $data['sidebar_name'] = $this->request->getPost('name');
            $data['sidebar_url'] = $this->request->getPost('url');
            $data['sidebar_icon'] = $this->request->getPost('icon');

            $data['add_access'] = $this->request->getPost('add');
            $data['edit_access'] = $this->request->getPost('edit');
            $data['view_access'] = $this->request->getPost('view');
            $data['update_access'] = $this->request->getPost('update_status');
            $data['panel_type'] = 1;

            if($data['add_access'] == 0 && $data['edit_access'] == 0 && $data['view_access'] == 0 && $data['update_access'] == 0){
                return $this->respond(['status' => $this->unAuthorized, 'message' => 'Atleast one access is mandatory']);
            }

            $rules = [
                'parent' => ['label' => 'parent', 'rules' => 'required'],
                'name' => ['label' => 'name', 'rules' => 'required'],
                'url' => ['label' => 'url', 'rules' => 'required'],
                'icon' => ['label' => 'icon', 'rules' => 'required']
            ];

            if ($this->validate($rules) == false) {
                return $this->respond(['status' => $this->unAuthorized, 'message' => $validation->getErrors()]);
            }else{
                $data['created_date'] = date('Y-m-d H:i:s');
                $data['status'] = 1;
                if($this->addData('sidebar_master',$data)){
                    return $this->respond(['status' => $this->statusOk, 'message' => ['Data inserted Successfully']]);
                } else {
                    return $this->respond(['status' => $this->unAuthorized, 'message' => ['Something went wrong, please try again!']]);
                }
            }
        }else{
            return $this->respond(['status' => $this->unAuthorized, 'message' => 'Access Denied']);
        }
    }


    // validate general settings values and insert
    public function dataInsertGeneralSettings(){

        if ($this->request->getMethod() === 'post') {
            $validation =  \Config\Services::validation();
            $data['name'] = $this->request->getPost('name');
            $data['value'] = $this->request->getPost('value');
            $data['description'] = $this->request->getPost('description');

            $rules = [
                'name' => ['label' => 'name', 'rules' => 'required'],
                'value' => ['label' => 'value', 'rules' => 'required'],
                'description' => ['label' => 'description', 'rules' => 'required']
            ];

            if ($this->validate($rules) == false) {
                return $this->respond(['status' => $this->unAuthorized, 'message' => $validation->getErrors()]);
            }else{

                $data['created_date'] = date('Y-m-d H:i:s');
                $data['status'] = 1;

                if($this->addData('generalsettings',$data)){
                    return $this->respond(['status' => $this->statusOk, 'message' => ['Data inserted Successfully']]);
                } else {
                    return $this->respond(['status' => $this->unAuthorized, 'message' => ['Something went wrong, please try again!']]);
                }
            }
        }else{
            return $this->respond(['status' => $this->unAuthorized, 'message' => 'Access Denied']);
        }
    }


    // validate vendor details and insert
    public function dataInsertVendor(){
        if ($this->request->getMethod() === 'post') {
            $validation =  \Config\Services::validation();
            $data['name'] = $this->request->getPost('cname');
            $data['username'] = $this->request->getPost('cusername');
            $data['password'] = password_hash($this->request->getPost('pass'),PASSWORD_DEFAULT);
            $data['email'] = $this->request->getPost('cemail');
            $data['contact_number'] = $this->request->getPost('cnumber');
            $data['package_id'] = $this->request->getPost('pack_id');


            $rules = [
                'cname' => ['label' => 'cname', 'rules' => 'required'],
                'cusername' => ['label' => 'cusername', 'rules' => 'required'],
                'pass' => ['label' => 'pass', 'rules' => 'required'],
                'cemail' => ['label' => 'cemail', 'rules' => 'required'],
                'cnumber' => ['label' => 'cnumber', 'rules' => 'required'],
                'pack_id' => ['label' => 'pack_id', 'rules' => 'required'],
            ];

            if ($this->validate($rules) == false) {
                return $this->respond(['status' => $this->unAuthorized, 'message' => $validation->getErrors()]);
            }else{
                // add expiry date here from package master & role id for vendor as well
                $data['created_date'] = date('Y-m-d H:i:s');
                $data['created_date'] = 2; // vendor role
                $data['created_date'] = date('Y-m-d H:i:s');
                $data['status'] = 1;

                if($this->addData('vendor',$data)){

                    // send welcome email with username and password
                    return $this->respond(['status' => $this->statusOk, 'message' => ['Data inserted Successfully']]);
                } else {
                    return $this->respond(['status' => $this->unAuthorized, 'message' => ['Something went wrong, please try again!']]);
                }
            }
        }else{
            return $this->respond(['status' => $this->unAuthorized, 'message' => 'Access Denied']);
        }
    }

    // common function to add data in DB
    public function addData($table,$data){
        $builder = $this->db->table($table);
        if($builder->insert($data))
            return true;
        else
            return false;
    }


    // create Hash password
    public function hash_pass($pass)
    {
        return password_hash($pass, PASSWORD_DEFAULT);
    }

    // logout 
    public function SignOut()
    {
        $this->session->destroy();
        return redirect()->to(base_url('/mainAdmin/'));
    }
    // All functions Ends



}
