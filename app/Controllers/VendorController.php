<?php

namespace App\Controllers;

use App\Models\Vendor_model;
use CodeIgniter\API\ResponseTrait;

class VendorController extends BaseController
{
    //Common Variables
    use ResponseTrait;
    protected $vendorFolder;
    protected $statusOk;
    protected $unAuthorized;
    protected $methodNotAllowed;
    protected $internalServerError;
    protected $session;
    protected $vendor_id;
    protected $vendorURL;
    protected $vendorUsername;

    public function __construct()
    {
        helper(['form', 'common', 'cookie']);

        // librarys & all other imports
        $this->vendor_model = new Vendor_model();
        $this->session = \Config\Services::session();
        $this->db = \Config\Database::connect();

        // set variable values
        $this->vendorFolder = 'vendor/';
        $this->vendorURL = 'Vendor/';
        $this->statusOk = 200;
        $this->unAuthorized = 401;
        $this->methodNotAllowed = 405;
        $this->internalServerError = 500;
        $this->vendorId = $this->session->get('vendorId');
        $uri = service('uri');
        $segments = $uri->getSegments();
        $this->vendorUsername = $segments[1];
        $this->createSidebarFromRole();
        
    }

    // All Views Start
    public function index()
    {
        return view('welcome_message');
    }

    public function dashboard(){
        return $this->loadViews('dashboard');
    }

    public function login(){
        $data['vendorUsername'] = $this->vendorUsername;
        return view('Vendor/auth/login',$data);
    }


    //  Role Section Starts
    public function addRole(){
        $data['pageHas'] = 'form';
        $data['pageName'] = 'Add Role';
        $data['vendorSidebar'] = $this->vendor_model->sidebarMaster();
        return $this->loadViews('roles/addRole',$data);
    }

    public function allRoles(){
        $data['pageHas'] = 'tableView';
        $data['pageName'] = 'All Roles';
        $data['allRoles'] = $this->vendor_model->allRoles(['created_by' => $this->vendorId]);
        return $this->loadViews('roles/manageRoles',$data);
    }

    public function editRole($id){
        if($id == '')
            return redirect()->to(base_url('/'.$this->vendorFolder.'/'.$this->vendorUsername.'/manageRoles'));

        $data['pageHas'] = 'form';
        $data['pageName'] = 'Edit Role';
        $data['vendorSidebar'] = $this->vendor_model->sidebarMaster();
        $data['singleRole'] = $this->vendor_model->allRoles(['id' => $id]);
        return $this->loadViews('roles/editRole',$data);
    }
    //  role Section Ends
    

    // Employee Section Starts
    public function addEmployees(){
        $data['pageHas'] = 'form';
        $data['pageName'] = 'Add Employees';
        return $this->loadViews('employees/addEmployee',$data);
    }

    public function allEmployees(){
        $data['pageHas'] = 'tableView';
        $data['pageName'] = 'All Sidebar';
        $data['allEmployees'] = $this->vendor_model->employeeList($id);
        return $this->loadViews('employees/manageEmployees',$data);
    }
    // Employee Section Ends


    public function addProduct(){
        $data['pageHas'] = 'form';
        $data['pageName'] = 'Add Product';
        return $this->loadViews('Products/addProduct',$data);
    }

    public function addClient(){
        $data['pageHas'] = 'form';
        $data['pageName'] = 'Add Client';
        return $this->loadViews('clients/addClient',$data);
    }

    public function addInspectionSchedule(){
        $data['pageHas'] = 'form';
        $data['pageName'] = 'Add Settings';
        return $this->loadViews('generalSettings/addGeneralSettings',$data);
    }

    

    public function allProducts(){
        $data['pageHas'] = 'tableView';
        $data['pageName'] = 'All Sidebar';
        $data['allSidebar'] = $this->vendor_model->sidebarMaster();
        return $this->loadViews('sidebar/manageSidebar',$data);
    }

    public function allClients(){
        $data['pageHas'] = 'tableView';
        $data['pageName'] = 'All Sidebar';
        $data['allSidebar'] = $this->vendor_model->sidebarMaster();
        return $this->loadViews('sidebar/manageSidebar',$data);
    }

    public function allInspectionSchedule(){
        $data['pageHas'] = 'tableView';
        $data['pageName'] = 'All Sidebar';
        $data['allSidebar'] = $this->vendor_model->sidebarMaster();
        return $this->loadViews('sidebar/manageSidebar',$data);
    }
    // All Views Ends



    // All functions Starts
    
    // check login credentials & set session
    public function checkLogin(){

        $uri = service('uri');
        $segments = $uri->getSegments();
        $vendorUsername = $segments[1];
        $vendor_id = getDirectValue('vendor','id','username',$vendorUsername);
        
        if($vendor_id == ''){
            return $this->respond(['status' => $this->unAuthorized, 'message' => ['Invalid username in URL']]);
        }

        try {
            if ($this->request->getMethod() === 'post') {

                $table = 'vendor';
                $validation =  \Config\Services::validation();
                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');
                $loginType = $this->request->getVar('loginType');
    
                $rules = [
                    'username' => ['label' => 'username', 'rules' => 'required'],
                    'password' => ['label' => 'password', 'rules' => 'required']
                ];
    
                if ($this->validate($rules) == false) {
                    return $this->respond(['status' => $this->unAuthorized, 'message' => $validation->getErrors()]);
                }
    
                if($loginType == '1'){
                    $table = 'vendor_emp';
                    $vendorDetails = $this->vendor_model->validate_emp_credentials($table,$username, $password, $vendor_id);
                }else
                    $vendorDetails = $this->vendor_model->validate_credentials($table,$username, $password);


                if($vendorDetails['status'] == 1){
    
                    // set vendor sessions
                    $vendorSession = array(
                        'vendorId'           => $vendorDetails['id'],
                        'vendorName'         => $vendorDetails['name'],
                        'vendorUsername'     => $vendorDetails['username'],
                        'role'               => $vendorDetails['role_id'],
                        'is_logged_in'       => true
                    );
                    $this->session->set($vendorSession);
                    return $this->respond(['status' => $this->statusOk, 'message' => ['User Verified, Welcome Back.']]);
    
                }else if($vendorDetails['status'] == 0){
                    return $this->respond(['status' => $this->unAuthorized, 'message' => ['Incorrect Username / Password']]);
                }else if($vendorDetails['status'] == 2){
                    return $this->respond(['status' => $this->unAuthorized, 'message' => ['User Deactivated']]);
                } 
    
            }else{
                return $this->respond(['status' => $this->methodNotAllowed, 'message' => 'Access Denied']);
            }
        } catch (\Exception $e) {
            $data['functionName'] = 'Vendor Check Login Function';
            $data['errorMsg'] = $e->getMessage();
            $data['user_id'] = 0;
            $data['user_id'] = date('Y-m-d h:i:s');
            $this->createErrorLog($data);
        }
    }

    // validate sidebar insert frilds and insert into DB
    public function dataInsertClients(){

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
    public function dataInsertEmployees(){

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

    // Role Insert function
    public function dataInsertRole(){
        try {
            if($this->request->getMethod() === 'post'){

                $validation =  \Config\Services::validation();
                $roleName = $this->request->getPost('roleName');
                $roles = $this->request->getPost('role');

                // validate input
                $rules = [
                    'roleName' => ['label' => 'roleName', 'rules' => 'trim|required'],
                    'role' => ['label' => 'rol ', 'rules' => 'required']
                ];

                if ($this->validate($rules) == false) {
                    $errorMsg = array(
                        'errorType' => 'error',
                        'errorMsg' => $validation->getErrors()
                    );
                    $this->session->set($errorMsg);
                    return redirect()->to(base_url('/'.$this->vendorFolder.'/'.$this->vendorUsername.'/addRole'));
                }

                $data['role_name'] = $roleName;
                $data['perms'] = json_encode($roles);
                $data['created_by'] = $this->vendorId;
                $data['panel_type'] = 2;
                $data['created_date'] = date('Y-m-d h:i:s');
                $data['status'] = 1;
                
                if($this->addData('roles',$data)){

                    $errorMsg = array(
                        'errorType' => 'success',
                        'errorMsg' => ['Data Insert Successfully']
                    );
                    $this->session->set($errorMsg);
                    return redirect()->to(base_url('/'.$this->vendorFolder.'/'.$this->vendorUsername.'/addRole'));
                } else {

                    $errorMsg = array(
                        'errorType' => 'error',
                        'errorMsg' => ['Something went wrong, please try again!']
                    );
                    $this->session->set($errorMsg);
                    return redirect()->to(base_url('/'.$this->vendorFolder.'/'.$this->vendorUsername.'/addRole'));
                }

            }else{
                $errorMsg = array(
                    'errorType' => 'error',
                    'errorMsg' => ['Access Denied']
                );
                $this->session->set($errorMsg);
                return redirect()->to(base_url('/'.$this->vendorFolder.'/'.$this->vendorUsername.'/addRole'));
            }
        } catch (\Throwable $th) {
            $errorMsg = array(
                'errorType' => 'error',
                'errorMsg' => ['Something went wrong, try later']
            );
            $this->session->set($errorMsg);
            return redirect()->to(base_url('/'.$this->vendorFolder.'/'.$this->vendorUsername.'/addRole'));
        }
    }

    public function dataUpdateRole($id){
        try {
            if($this->request->getMethod() === 'post'){

                $validation =  \Config\Services::validation();
                $roleName = $this->request->getPost('roleName');
                $roles = $this->request->getPost('role');


                // validate input
                $rules = [
                    'roleName' => ['label' => 'roleName', 'rules' => 'trim|required'],
                    'role' => ['label' => 'rol ', 'rules' => 'required']
                ];

                if ($this->validate($rules) == false) {
                    $errorMsg = array(
                        'errorType' => 'error',
                        'errorMsg' => $validation->getErrors()
                    );
                    $this->session->set($errorMsg);
                    return redirect()->to(base_url('/'.$this->vendorFolder.'/'.$this->vendorUsername.'/editRole/'.$id));
                }

                $data['role_name'] = $roleName;
                $data['perms'] = json_encode($roles);
                $data['created_by'] = $this->vendorId;
                $data['panel_type'] = 2;
                $data['created_date'] = date('Y-m-d h:i:s');
                $data['status'] = 1;
        
                if($this->updateData('roles',$data, ['id' => $id])){

                    $errorMsg = array(
                        'errorType' => 'success',
                        'errorMsg' => ['Data Updated Successfully']
                    );
                    $this->session->set($errorMsg);
                    return redirect()->to(base_url('/'.$this->vendorFolder.'/'.$this->vendorUsername.'/editRole/'.$id));
                } else {

                    $errorMsg = array(
                        'errorType' => 'error',
                        'errorMsg' => ['Something went wrong, please try again!']
                    );
                    $this->session->set($errorMsg);
                    return redirect()->to(base_url('/'.$this->vendorFolder.'/'.$this->vendorUsername.'/editRole/'.$id));
                }

            }else{
                $errorMsg = array(
                    'errorType' => 'error',
                    'errorMsg' => ['Access Denied']
                );
                $this->session->set($errorMsg);
                return redirect()->to(base_url('/'.$this->vendorFolder.'/'.$this->vendorUsername.'/editRole/'.$id));
            }
        } catch (\Throwable $th) {
            $errorMsg = array(
                'errorType' => 'error',
                'errorMsg' => ['Something went wrong, try later']
            );
            $this->session->set($errorMsg);
            return redirect()->to(base_url('/'.$this->vendorFolder.'/'.$this->vendorUsername.'/editRole/'.$id));
        }
    }

 
    

    // create system logs
    public function createSystemLog($data){
        return $this->addData('system_logs',$data);
    }

    // create error logs
    public function createErrorLog($data){
        return $this->addData('error_logs',$data);
    }

    // common function to add data in DB
    public function addData($table,$data){
        $builder = $this->db->table($table);
        if($builder->insert($data))
            return true;
        else
            return false;
    }
    
    public function updateData($table,$data,$where){
        $builder = $this->db->table($table);
        if($builder->update($data, $where))
            return true;
        else
            return false;
    }

    // common Loadview section
    public function loadViews($url = '/', $data = [])
    {
        
        // $sidebar = session('roleSidebar');
        // if(isset($sidebar[ucwords($url)]))
        //     pre(count($sidebar[ucwords($url)]));
        
        if (!session('is_logged_in')) {
            return redirect()->to(base_url('/'.$this->vendorFolder.'/'.$this->vendorUsername.'/login')); 
        }else{
            $uri = service('uri');
            $segments = $uri->getSegments();
            $vendorUsername = $segments[1];
            $data['url'] = $segments[2];

            $vendor_id = getDirectValue('vendor','id','username',$vendorUsername);

            if($vendor_id === 0){
                $errorMsg = array(
                    'errorMsg' => 'Invalid Panel Access'
                );
                $this->session->set($errorMsg);

                return redirect()->to(base_url('/'.$this->vendorFolder.'/'.$this->vendorUsername.'/login')); 
            }


            $data['projectName'] = getDirectValue('generalsettings', 'value', 'name', 'siteName'); // get Project Name
            $data['vendorURL'] = $this->vendorURL;

            $underMaintenance = getDirectValue('generalsettings', 'value', 'name', 'underMaintenance'); // get underMaintenance status
            if ($underMaintenance == 0) {
                $data['username'] = $this->vendorUsername;
                $data['notice_count'] = 2;
                $data['title'] = $data['projectName'] . ' - ' . ucfirst($segments[1] == '' ? 'login' : $segments[1]);
                $url = $this->vendorFolder . $url;
                // vendor_logs('pageAccess', '1', $data['url']); // vendor Activities Logs.
                return View($url, $data);

            } else {
                $data['title'] = $data['projectName'] . ' - Site Under Maintenance';
                return View($this->vendorFolder . 'commonPage/underMaintenance', $data);
            }
        }
    }

    //Get User Sidebar
    public function loadSidebarFields($roleId){
        $sidebarJson = $this->vendor_model->getRolePermission($roleId);
        return $sidebarJson['perms'];
    }

    // logout 
    public function SignOut()
    {
        $this->session->destroy();
        return redirect()->to(base_url('/vendor/'.$this->vendorUsername));
    }

    public function createSidebarFromRole(){
        $newsidebar = []; // sidebar as per user role
        if(session('is_logged_in')){
            $user_perms = json_decode($this->loadSidebarFields(session('role')),true);  // get roles as per Role id
            $sidebars =  $this->vendor_model->sidebarMaster();  // get sidebar master
            foreach($sidebars as $singleSidebar){
                if(isset($user_perms[$singleSidebar['sidebar_url']])){
                    $newsidebar[$singleSidebar['parent_name']][] = $singleSidebar;
                }else{
                    echo 'false';
                }
            }
            
            $vendorSidebar['roleSidebar'] = $newsidebar;
            $this->session->set($vendorSidebar);
        }
        // set vendor sessions
    }
    
    // create Hash password
    public function hash_pass($pass)
    {
        return password_hash($pass, PASSWORD_DEFAULT);
    }
    // All functions Ends
}