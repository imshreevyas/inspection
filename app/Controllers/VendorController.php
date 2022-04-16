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
    protected $LoggedInUserID;
    protected $user_type;

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
        $this->LoggedInUserID = $this->session->get('LoggedInUserID');
        $this->user_type = $this->session->get('user_type');
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

        $where = $this->getWhereFromUserType();
        $where['role_name'] = 'Vendor_Admin';
        $vendorAdminRoles = $this->vendor_model->allRoles($where);
        $data['vendorSidebar'] = $this->generateSidebarData(json_decode($vendorAdminRoles[0]['perms'], true), 'addRole');

        return $this->loadViews('roles/addRole',$data);
    }

    public function allRoles(){
        $data['pageHas'] = 'tableView';
        $data['pageName'] = 'All Roles';

        $where = $this->getWhereFromUserType();  // get created by and vendor id according to user type.
        $data['allRoles'] = $this->vendor_model->allRoles($where);
        return $this->loadViews('roles/manageRoles',$data);
    }

    public function editRole($id){
        if($id == '')
            return redirect()->to(base_url('/'.$this->vendorFolder.'/'.$this->vendorUsername.'/manageRoles'));

        $data['pageHas'] = 'form';
        $data['pageName'] = 'Edit Role';

        $where = $this->getWhereFromUserType();
        $where['role_name'] = 'Vendor_Admin';
        $vendorAdminRoles = $this->vendor_model->allRoles($where);
        $data['vendorSidebar'] = $this->generateSidebarData(json_decode($vendorAdminRoles[0]['perms'], true), 'addRole');

        $data['singleRole'] = $this->vendor_model->allRoles(['id' => $id]);
        return $this->loadViews('roles/editRole',$data);
    }
    //  role Section Ends
    

    // Employee Section Starts
    public function addEmployees(){
        $data['pageHas'] = 'form';
        $data['pageName'] = 'Add Employees';
        $where = $this->getWhereFromUserType();
        $data['allRoles'] = $this->vendor_model->allRoles($where);
        return $this->loadViews('employees/addEmployee',$data);
    }

    public function editEmployees($id){
        if($id == '')
            return redirect()->to(base_url('/'.$this->vendorFolder.'/'.$this->vendorUsername.'/manageEmployees'));

        $data['pageHas'] = 'tableView';
        $data['pageName'] = 'Edit Employee';

        $where = $this->getWhereFromUserType();
        $data['allRoles'] = $this->vendor_model->allRoles($where);
        
        $where['id'] = $id;
        $data['singleEmployees'] = $this->vendor_model->singleEmployee($where);
        return $this->loadViews('employees/editEmployee',$data);
    }

    public function allEmployees(){
        $data['pageHas'] = 'tableView';
        $data['pageName'] = 'All Employee';
        $where = $this->getWhereFromUserType();
        $data['allEmployees'] = $this->vendor_model->employeeList($where);
        return $this->loadViews('employees/manageEmployees',$data);
    }
    // Employee Section Ends


    // Clients Section Starts
    public function addClient(){
        $data['pageHas'] = 'form';
        $data['pageName'] = 'Add Client';
        $where = $this->getWhereFromUserType();
        $data['allRoles'] = $this->vendor_model->allRoles($where);
        return $this->loadViews('clients/addClient',$data);
    }

    public function editClient($id){
        if($id == '')
            return redirect()->to(base_url('/'.$this->vendorFolder.'/'.$this->vendorUsername.'/manageClients'));

        $data['pageHas'] = 'tableView';
        $data['pageName'] = 'Edit Clients';

        $where = $this->getWhereFromUserType();
        $data['allRoles'] = $this->vendor_model->allRoles($where);

        $where['id'] = $id;
        $data['singleClient'] = $this->vendor_model->singleClient($where);
        return $this->loadViews('clients/editClient',$data);
    }

    public function allClients(){
        $data['pageHas'] = 'tableView';
        $data['pageName'] = 'All Client';
        $where = $this->getWhereFromUserType();
        $data['allClients'] = $this->vendor_model->clientList($where);
        return $this->loadViews('clients/manageClients',$data);
    }
    // Clients Section Ends


    // Assets Section Starts
    public function addAsset(){
        $data['pageHas'] = 'form';
        $data['pageName'] = 'Add Asset';
        $where = $this->getWhereFromUserType();
        $data['allRoles'] = $this->vendor_model->allRoles($where);
        $data['allClients'] = $this->vendor_model->clientListDropdown($where);
        return $this->loadViews('assets/addAsset',$data);
    }

    public function editAsset($id){
        if($id == '')
            return redirect()->to(base_url('/'.$this->vendorFolder.'/'.$this->vendorUsername.'/manageAssets'));

        $data['pageHas'] = 'tableView';
        $data['pageName'] = 'Edit Asset';
        
        $where = $this->getWhereFromUserType();
        $data['allRoles'] = $this->vendor_model->allRoles($where);
        $data['allClients'] = $this->vendor_model->clientListDropdown($where);

        $where['id'] = $id;
        $data['singleClient'] = $this->vendor_model->singleAsset($where);
        return $this->loadViews('assets/editAssets',$data);
    }

    public function allAssets(){
        $data['pageHas'] = 'tableView';
        $data['pageName'] = 'All Asset';
        $where = $this->getWhereFromUserType();
        $data['allClients'] = $this->vendor_model->assetsList($where);
        return $this->loadViews('assets/manageAssets',$data);
    }

    // Assets Section Ends



    // Product Sections Starts
    public function addProduct(){
        $data['pageHas'] = 'form';
        $data['pageName'] = 'Add Product';
        return $this->loadViews('Products/addProduct',$data);
    }
    // Product Section Ends

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


    public function allInspectionSchedule(){
        $data['pageHas'] = 'tableView';
        $data['pageName'] = 'All Sidebar';
        $data['allSidebar'] = $this->vendor_model->sidebarMaster();
        return $this->loadViews('sidebar/manageSidebar',$data);
    }
    // All Views Ends



    // All functions Starts
    
    
    // Role Insert and update Function
    public function dataInsertRole(){
        try {
            if($this->request->getMethod() === 'post'){
                
                $validation =  \Config\Services::validation();
                $roleName = $this->request->getPost('roleName');
                $roles = $this->request->getPost('role');
                
                // validate input
                $rules = [
                    'roleName' => ['label' => 'roleName', 'rules' => 'trim|required'],
                    'role' => ['label' => 'rol ', 'rules' => 'trim|required']
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
                $data['vendor_id'] = $this->vendorId;
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
    
    
    // Employee Insert and update Function
    public function dataInsertEmployee(){

        if ($this->request->getMethod() === 'post') {

            
            $validation =  \Config\Services::validation();

            $rules = [

                'data.name'     => [
                    'label' => 'Name',
                    'rules' => 'required|is_unique[vendor_emp.name]',
                    'errors' => [
                        'is_unique' => 'Username Already Taken.'
                    ],
                ],

                'data.username' => [
                    'label' => 'Username', 
                    'rules' => 'required|is_unique[vendor_emp.username]',
                    'errors' => [
                        'is_unique' => 'Username Already Taken.'
                    ],
                ],

                'data.email'     => ['label' => 'Email', 'rules' => 'required|valid_email'],
                'data.mobile'    => ['label' => 'Mobile', 'rules' => 'required|min_length[10]|max_length[10]'],
                'data.role_id'   => ['label' => 'Role ', 'rules' => 'required'],
                'data.pass'      => ['label' => 'Password', 'rules' => 'required'],
                'data.cpass'     => ['label' => 'Confirm Password', 'rules' => 'required|matches[data.pass]'],
            ];

            if ($this->validate($rules) == false) {
                return $this->respond(['status' => $this->unAuthorized, 'message' => $validation->getErrors()]);
            }else{
                $data = $this->request->getPost('data');
                

                $data['vendor_id'] = $this->vendorId;
                $data['password'] = password_hash($data['pass'], PASSWORD_DEFAULT);
                $data['dycrptPass'] = $data['pass'];
                $data['created_date'] = date('Y-m-d H:i:s');
                $data['status'] = 1;

                unset($data['pass']);
                unset($data['cpass']);
                
                try{
                    if($this->addData('vendor_emp',$data))
                        return $this->respond(['status' => $this->statusOk, 'message' => ['Data inserted Successfully']]);
                    else
                        return $this->respond(['status' => $this->unAuthorized, 'message' => ['Something went wrong, please try again!']]);
                }catch(Exception $e){
                    return $this->respond(['status' => $this->unAuthorized, 'message' => ['Error Msg:'.$e]]);
                }
                
            }
        }else{
            return $this->respond(['status' => $this->unAuthorized, 'message' => 'Access Denied']);
        }
    }

    public function dataUpdateEmployee(){

        if ($this->request->getMethod() === 'post') {

            $validation =  \Config\Services::validation();
            $where = $this->request->getPost('where');
            $where['id'] = base64_decode($where['id']);
            
            $rules = [

                'data.name'     => [
                    'label' => 'Name',
                    'rules' => 'required|is_unique[vendor_emp.name,id,'.$where['id'].']',
                    'errors' => [
                        'is_unique' => 'Name Already Taken.'
                    ],
                ],

                'data.username' => [
                    'label' => 'Username', 
                    'rules' => 'required|is_unique[vendor_emp.username,id,'.$where['id'].']',
                    'errors' => [
                        'is_unique' => 'Username Already Taken.'
                    ],
                ],

                'data.email'     => ['label' => 'Email', 'rules' => 'required|valid_email'],
                'data.mobile'    => ['label' => 'Mobile', 'rules' => 'required|min_length[10]|max_length[10]'],
                'data.role_id'   => ['label' => 'Role ', 'rules' => 'required'],
                
            ];

            if ($this->validate($rules) == false) {
                return $this->respond(['status' => $this->unAuthorized, 'message' => $validation->getErrors()]);
            }else{

                $data = $this->request->getPost('data');
                if($data['pass'] != ''){
                    $data['password'] = password_hash($data['pass'], PASSWORD_DEFAULT);
                    $data['dycrptPass'] = $data['pass'];
                }

                unset($data['pass']);

                if($this->updateData('vendor_emp', $data , $where )){
                    return $this->respond(['status' => $this->statusOk, 'message' => ['Data Updated Successfully']]);
                } else {
                    return $this->respond(['status' => $this->unAuthorized, 'message' => ['Something went wrong, please try again!']]);
                }
            }
        }else{
            return $this->respond(['status' => $this->unAuthorized, 'message' => 'Access Denied']);
        }
    }


    // Client Insert and update Function
    public function dataInsertClient(){
        if ($this->request->getMethod() === 'post') {

            
            $validation =  \Config\Services::validation();

            $rules = [

                'data.name'     => [
                    'label' => 'Name',
                    'rules' => 'required'
                ],
                'data.email'     => ['label' => 'Email', 'rules' => 'required|trim|valid_email'],
                'data.mobile'    => [
                    'label' => 'Mobile',
                    'rules' => 'required|trim| min_length[10]|max_length[10]|is_unique[vendor_client.mobile]',
                    'errors' => [
                        'is_unique' => 'Mobile Number Already Taken.'
                    ], 
                ],
            ];

            if ($this->validate($rules) == false) {
                return $this->respond(['status' => $this->unAuthorized, 'message' => $validation->getErrors()]);
            }else{

                $data = $this->request->getPost('data');
                $data['vendor_id'] = $this->vendorId;
                $data['created_date'] = date('Y-m-d H:i:s');
                $data['created_by'] = $this->vendorId;
                $data['status'] = 1;

                try{
                    if($this->addData('vendor_clients',$data))
                        return $this->respond(['status' => $this->statusOk, 'message' => ['Data inserted Successfully']]);
                    else
                        return $this->respond(['status' => $this->unAuthorized, 'message' => ['Something went wrong, please try again!']]);
                }catch(Exception $e){
                    return $this->respond(['status' => $this->unAuthorized, 'message' => ['Error Msg:'.$e]]);
                }
                
            }
        }else{
            return $this->respond(['status' => $this->unAuthorized, 'message' => 'Access Denied']);
        }
    }

    public function dataUpdateClient(){
        if ($this->request->getMethod() === 'post') {

            $validation =  \Config\Services::validation();
            $where = $this->request->getPost('where');
            $where['id'] = base64_decode($where['id']);
            
            $rules = [

                'data.name'     => [
                    'label' => 'Name',
                    'rules' => 'required|trim| is_unique[vendor_emp.name,id,'.$where['id'].']',
                    'errors' => [
                        'is_unique' => 'Name Already Taken.'
                    ],
                ],
                'data.email'     => ['label' => 'Email', 'rules' => 'required|trim| valid_email'],
                'data.mobile'    => ['label' => 'Mobile', 'rules' => 'required|trim| min_length[10]|max_length[10]'],
                
            ];

            if ($this->validate($rules) == false) {
                return $this->respond(['status' => $this->unAuthorized, 'message' => $validation->getErrors()]);
            }else{

                $data = $this->request->getPost('data');

                if($this->updateData('vendor_clients', $data , $where )){
                    return $this->respond(['status' => $this->statusOk, 'message' => ['Data Updated Successfully']]);
                } else {
                    return $this->respond(['status' => $this->unAuthorized, 'message' => ['Something went wrong, please try again!']]);
                }
            }
        }else{
            return $this->respond(['status' => $this->unAuthorized, 'message' => 'Access Denied']);
        }
    }

    public function addNewClient($name){
        $data['name'] = $name;
        $data['email'] = 'dummy@dummymail.com';
        $data['mobile'] = '9999999999';
        $data['address'] = 'dummy address';
        $data['created_date'] = date('Y-m-d H:i:s');
        $data['status'] = 1;
        foreach($this->getWhereFromUserType() as $key=>$value){
            $data[$key] = $value;
        }
        if($this->user_type == 'admin')
            $data['created_by'] = $this->vendorId;

        return $this->addDataReturnId('vendor_clients',$data);
    }

    // Assets Insert and update Function
    public function dataInsertAsset(){
        if ($this->request->getMethod() === 'post') {

            $validation =  \Config\Services::validation();
            $rules = [
                'data.name'     => [
                    'label' => 'Name',
                    'rules' => 'required|'
                ],
                'data.product_code'     => [
                    'label' => 'Name',
                    'rules' => 'required|is_unique[vendor_assets.product_code]'
                ]
            ];

            if ($this->validate($rules) == false) {
                return $this->respond(['status' => $this->unAuthorized, 'message' => $validation->getErrors()]);
            }else{

                $data = $this->request->getPost('data');
                $data['created_date'] = date('Y-m-d H:i:s');
                $data['status'] = 1;

                if($data['client_id'] == -1){
                    $data['client_id'] = $this->addNewClient($data['client_otherName']);
                }
                
                foreach($this->getWhereFromUserType() as $key=>$value){
                    $data[$key] = $value;
                }
                
                if($this->user_type == 'admin')
                    $data['created_by'] = $this->vendorId;
                    
                unset($data['client_otherName']);

                try{
                    if($this->addData('vendor_assets',$data))
                        return $this->respond(['status' => $this->statusOk, 'message' => ['Data inserted Successfully']]);
                    else
                        return $this->respond(['status' => $this->unAuthorized, 'message' => ['Something went wrong, please try again!']]);
                }catch(Exception $e){
                    return $this->respond(['status' => $this->unAuthorized, 'message' => ['Error Msg:'.$e]]);
                }
                
            }
        }else{
            return $this->respond(['status' => $this->unAuthorized, 'message' => 'Access Denied']);
        }
    }

    public function dataUpdateAsset(){
        if ($this->request->getMethod() === 'post') {

            $validation =  \Config\Services::validation();
            $where = $this->request->getPost('where');
            $where['id'] = base64_decode($where['id']);
            
            $rules = [

                'data.name'     => [
                    'label' => 'Name',
                    'rules' => 'required|trim| is_unique[vendor_emp.name,id,'.$where['id'].']',
                    'errors' => [
                        'is_unique' => 'Name Already Taken.'
                    ],
                ],
                'data.email'     => ['label' => 'Email', 'rules' => 'required|trim| valid_email'],
                'data.mobile'    => ['label' => 'Mobile', 'rules' => 'required|trim| min_length[10]|max_length[10]'],
                
            ];

            if ($this->validate($rules) == false) {
                return $this->respond(['status' => $this->unAuthorized, 'message' => $validation->getErrors()]);
            }else{

                $data = $this->request->getPost('data');

                if($this->updateData('vendor_clients', $data , $where )){
                    return $this->respond(['status' => $this->statusOk, 'message' => ['Data Updated Successfully']]);
                } else {
                    return $this->respond(['status' => $this->unAuthorized, 'message' => ['Something went wrong, please try again!']]);
                }
            }
        }else{
            return $this->respond(['status' => $this->unAuthorized, 'message' => 'Access Denied']);
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

    // common function to add data in DB
    public function addDataReturnId($table,$data){
        $builder = $this->db->table($table);
        if($builder->insert($data))
            return $this->db->insertID();
        else
            return 0;
    }
    
    public function updateData($table,$data,$where){
        $builder = $this->db->table($table);
        if($builder->update($data, $where))
            return true;
        else
            return false;
    }

    // check login credentials & set session
    public function checkLogin(){

        $uri = service('uri');
        $segments = $uri->getSegments();
        $vendorUsername = $segments[1];
        $vendor_id = getDirectValue('vendor', 'status', 'username', $vendorUsername);
        
        if($vendor_id == '')
            return $this->respond(['status' => $this->unAuthorized, 'message' => ['Invalid URL / Invalid username in URL']]);
        else if($vendor_id == 0)
            return $this->respond(['status' => $this->unAuthorized, 'message' => ['Vendor Deactivated! please contact admin.']]);

        try {
            
            if ($this->request->getMethod() === 'post') {

                $validation =  \Config\Services::validation();

                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');
                $loginType = $this->request->getVar('loginType');

                $table = 'vendor';
                $userSession = [];
                $userSession['user_type'] = $loginType == '1' ? 'emp' : 'admin';    // Set user type as Admin, Emp for created by
                $userSession['vendorId'] = $vendor_id;                              // by default his own id when admin.

                $rules = [
                    'username' => ['label' => 'username', 'rules' => 'required'],
                    'password' => ['label' => 'password', 'rules' => 'required']
                ];
    
                if ($this->validate($rules) == false) {
                    return $this->respond(['status' => $this->unAuthorized, 'message' => $validation->getErrors()]);
                }

                if($loginType == '1'){
                    $table = 'vendor_emp';
                    $userDetails = $this->vendor_model->validate_credentials($table, $username, $password, $vendor_id);
                }else
                    $userDetails = $this->vendor_model->validate_credentials($table, $username, $password, 0);
                
                if($userDetails['status'] == 1){
                    
                    // set vendor sessions
                    if($loginType == '1')
                        $userSession['vendorId']           = $userDetails['vendor_id'];
                    
                    $userSession['LoggedInUserID']     = $userDetails['id'];
                    $userSession['vendorName']         = $userDetails['name'];
                    $userSession['vendorUsername']     = $userDetails['username'];
                    $userSession['role']               = $userDetails['role_id'];
                    $userSession['is_logged_in']       = true;
                    
                    $this->session->set($userSession);
                    return $this->respond(['status' => $this->statusOk, 'message' => ['User Verified, Welcome Back.']]);
    
                }else if($userDetails['status'] == 0){
                    return $this->respond(['status' => $this->unAuthorized, 'message' => ['Incorrect Username / Password']]);
                }else if($userDetails['status'] == 2){
                    return $this->respond(['status' => $this->unAuthorized, 'message' => ['User Deactivated']]);
                } 
    
            }else
                return $this->respond(['status' => $this->methodNotAllowed, 'message' => 'Access Denied']);

        } catch (\Exception $e) {

            $data['functionName'] = 'Vendor Check Login Function';
            $data['errorMsg'] = $e->getMessage();
            $data['created_date'] = date('Y-m-d h:i:s');
            $this->createErrorLog($data);
        }
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
                $data['vendorUsername'] = $this->vendorUsername;
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

    public function createSidebarFromRole(){
        if(session('is_logged_in')){
            $user_perms = json_decode($this->loadSidebarFields(session('role')),true);  // get roles as per Role id
            $newsidebar = $this->generateSidebarData($user_perms, 'session');
            $vendorSidebar['roleSidebar'] = $newsidebar;
            // set side of user in session.
            $this->session->set($vendorSidebar);
        }
    }
    
    public function generateSidebarData($user_perms, $page = 'session'){
        $newsidebar = []; 
        $sidebars =  $this->vendor_model->sidebarMaster();  // get sidebar master
        foreach($sidebars as $singleSidebar){
            if(isset($user_perms[$singleSidebar['sidebar_url']])){
                if($page == 'addRole')
                    $newsidebar[] = $singleSidebar;
                else
                    $newsidebar[$singleSidebar['parent_name']][] = $singleSidebar;
            }
        }
        return $newsidebar;
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
        return redirect()->to(base_url('/vendor/'.$this->vendorUsername));
    }

    public function getWhereFromUserType(){
        $where = [];
        if($this->user_type == 'emp'){
            $where['vendor_id'] = $this->vendorId;
            $where['created_by'] = $this->LoggedInUserID;
        } else if($this->user_type == 'admin'){
            $where['vendor_id'] = $this->vendorId;
        }

        return $where;
    }

    // All functions Ends
}
