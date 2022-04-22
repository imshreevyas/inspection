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
        $this->generateSidebarData();
    }

    // All Views Start

    public function index()
    {
        return view('welcome_message');
    }

    public function notFoundPage()
    {
        return view('Admin/mainNotfound');
    }

    public function dashboard()
    {
        return $this->loadViews('dashboard');
    }

    public function login()
    {
        return view('Admin/auth/login');
    }

    // Sidebar Section Starts
    public function addSidebar()
    {
        $data['pageHas'] = 'form';
        $data['pageName'] = 'Add Sidebar';
        return $this->loadViews('sidebar/addSidebar', $data);
    }

    public function editSidebar($id)
    {
        $data['pageHas'] = 'form';
        $data['pageName'] = 'Add Sidebar';
        $data['singleSidebar'] = $this->admin_model->singleSidebar(['id' => $id]);
        return $this->loadViews('sidebar/editSidebar', $data);
    }

    public function allSidebar()
    {
        $data['pageHas'] = 'tableView';
        $data['pageName'] = 'All Sidebar';
        $data['allSidebar'] = $this->admin_model->sidebarMaster();
        return $this->loadViews('sidebar/manageSidebar', $data);
    }

    // Sidebar Section Ends

    // Vendor Section Starts
    public function addVendor()
    {
        $data['pageHas'] = 'form';
        $data['pageName'] = 'Add Vendor';
        return $this->loadViews('vendors/addVendor', $data);
    }

    public function editVendor($id)
    {
        $data['pageHas'] = 'form';
        $data['pageName'] = 'Add Vendor';
        return $this->loadViews('vendors/addVendor', $data);
    }

    public function allVendor()
    {
        $data['pageHas'] = 'form';
        $data['pageName'] = 'Add Vendor';
        return $this->loadViews('vendors/addVendor', $data);
    }

    // Vendor Section Ends

    //  General Settings Sectioin starts
    public function addGeneralSettings()
    {
        $data['pageHas'] = 'form';
        $data['pageName'] = 'Add Settings';
        return $this->loadViews('generalSettings/addGeneralSettings', $data);
    }

    public function editGeneralSettings($id)
    {
        $data['pageHas'] = 'form';
        $data['pageName'] = 'Add Settings';
        $data['allGeneralSettings'] = $this->admin_model->generalSettings(['id' => $id]);
        return $this->loadViews('generalSettings/addGeneralSettings', $data);
    }

    public function allGeneralSettings()
    {
        $data['pageHas'] = 'tableView';
        $data['pageName'] = 'All General Settings';
        $data['allGeneralSettings'] = $this->admin_model->generalSettings();
        return $this->loadViews('generalSettings/manageGeneralSettings', $data);
    }
    //  General Settings Sectioin ends
    
// ------------ All Views Ends ------------

// ------------ All functions Starts ------------

    // Sidebar Insert & Update function
    public function dataInsertSidebar()
    {

        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();
            $data['parent_name'] = $this->request->getPost('parent');
            $data['sidebar_name'] = $this->request->getPost('name');
            $data['sidebar_url'] = $this->request->getPost('url');
            $data['sidebar_icon'] = $this->request->getPost('icon');

            $data['add_access'] = $this->request->getPost('add');
            $data['edit_access'] = $this->request->getPost('edit');
            $data['view_access'] = $this->request->getPost('view');
            $data['update_access'] = $this->request->getPost('update_status');
            $data['panel_type'] = 1;

            if ($data['add_access'] == 0 && $data['edit_access'] == 0 && $data['view_access'] == 0 && $data['update_access'] == 0) {
                return $this->respond(['status' => $this->unAuthorized, 'message' => 'Atleast one access is mandatory']);
            }

            $rules = [
                'parent' => ['label' => 'parent', 'rules' => 'required'],
                'name' => ['label' => 'name', 'rules' => 'required'],
                'url' => ['label' => 'url', 'rules' => 'required'],
                'icon' => ['label' => 'icon', 'rules' => 'required'],
            ];

            if ($this->validate($rules) == false) {
                return $this->respond(['status' => $this->unAuthorized, 'message' => $validation->getErrors()]);
            } else {
                $data['created_date'] = date('Y-m-d H:i:s');
                $data['status'] = 1;
                if ($this->addData('sidebar_master', $data)) {
                    return $this->respond(['status' => $this->statusOk, 'message' => ['Data inserted Successfully']]);
                } else {
                    return $this->respond(['status' => $this->unAuthorized, 'message' => ['Something went wrong, please try again!']]);
                }
            }
        } else {
            return $this->respond(['status' => $this->unAuthorized, 'message' => 'Access Denied']);
        }
    }

    public function dataUpdateSidebar()
    {

        if ($this->request->getMethod() === 'post') {

            $validation = \Config\Services::validation();
            $rules = [
                'data.parent_name' => ['label' => 'parent', 'rules' => 'required'],
                'data.sidebar_name' => ['label' => 'name', 'rules' => 'required'],
                'data.sidebar_url' => ['label' => 'url', 'rules' => 'required'],
                'data.sidebar_icon' => ['label' => 'icon', 'rules' => 'required'],
            ];

            if ($this->validate($rules) == false) {
                return $this->respond(['status' => $this->unAuthorized, 'message' => $validation->getErrors()]);
            } else {

                $data = $this->request->getPost('data');
                $where = $this->request->getPost('where');
                $where['id'] = base64_decode($where['id']);

                if ($data['add_access'] == 0 && $data['edit_access'] == 0 && $data['view_access'] == 0 && $data['update_access'] == 0) {
                    return $this->respond(['status' => $this->unAuthorized, 'message' => 'Atleast one access is mandatory']);
                }

                if ($this->updateData('sidebar_master', $data, $where)) {
                    return $this->respond(['status' => $this->statusOk, 'message' => ['Data Updated Successfully']]);
                } else {
                    return $this->respond(['status' => $this->unAuthorized, 'message' => ['Something went wrong, please try again!']]);
                }
            }
        } else {
            return $this->respond(['status' => $this->unAuthorized, 'message' => 'Access Denied']);
        }
    }

    // General Settings Insert & Update Functions
    public function dataInsertGeneralSettings()
    {

        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();
            $data['name'] = $this->request->getPost('name');
            $data['value'] = $this->request->getPost('value');
            $data['description'] = $this->request->getPost('description');

            $rules = [
                'name' => ['label' => 'name', 'rules' => 'required'],
                'value' => ['label' => 'value', 'rules' => 'required'],
                'description' => ['label' => 'description', 'rules' => 'required'],
            ];

            if ($this->validate($rules) == false) {
                return $this->respond(['status' => $this->unAuthorized, 'message' => $validation->getErrors()]);
            } else {

                $data['created_date'] = date('Y-m-d H:i:s');
                $data['status'] = 1;

                if ($this->addData('generalsettings', $data)) {
                    return $this->respond(['status' => $this->statusOk, 'message' => ['Data inserted Successfully']]);
                } else {
                    return $this->respond(['status' => $this->unAuthorized, 'message' => ['Something went wrong, please try again!']]);
                }
            }
        } else {
            return $this->respond(['status' => $this->unAuthorized, 'message' => 'Access Denied']);
        }
    }

    public function dataUpdateGeneralSettings()
    {

        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();
            $data['name'] = $this->request->getPost('name');
            $data['value'] = $this->request->getPost('value');
            $data['description'] = $this->request->getPost('description');

            $rules = [
                'name' => ['label' => 'name', 'rules' => 'required'],
                'value' => ['label' => 'value', 'rules' => 'required'],
                'description' => ['label' => 'description', 'rules' => 'required'],
            ];

            if ($this->validate($rules) == false) {
                return $this->respond(['status' => $this->unAuthorized, 'message' => $validation->getErrors()]);
            } else {

                $data['created_date'] = date('Y-m-d H:i:s');
                $data['status'] = 1;

                if ($this->addData('generalsettings', $data)) {
                    return $this->respond(['status' => $this->statusOk, 'message' => ['Data inserted Successfully']]);
                } else {
                    return $this->respond(['status' => $this->unAuthorized, 'message' => ['Something went wrong, please try again!']]);
                }
            }
        } else {
            return $this->respond(['status' => $this->unAuthorized, 'message' => 'Access Denied']);
        }
    }

    // Vendor Insert & Update Functions
    
    public function dataInsertVendor()
    {
        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();
            $data['name'] = $this->request->getPost('cname');
            $data['username'] = $this->request->getPost('cusername');
            $data['password'] = password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT);
            $data['dycrptPass'] = $this->request->getPost('pass');
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
            } else {
                // add expiry date here from package master & role id for vendor as well
                $data['created_date'] = date('Y-m-d H:i:s');
                $data['created_date'] = 2; // vendor role
                $data['created_date'] = date('Y-m-d H:i:s');
                $data['status'] = 1;

                if ($this->addData('vendor', $data)) {

                    // send welcome email with username and password
                    return $this->respond(['status' => $this->statusOk, 'message' => ['Data inserted Successfully']]);
                } else {
                    return $this->respond(['status' => $this->unAuthorized, 'message' => ['Something went wrong, please try again!']]);
                }
            }
        } else {
            return $this->respond(['status' => $this->unAuthorized, 'message' => 'Access Denied']);
        }
    }

    public function dataUpdateVendor()
    {
        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();
            $data['name'] = $this->request->getPost('cname');
            $data['username'] = $this->request->getPost('cusername');
            $data['password'] = password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT);
            $data['dycrptPass'] = $this->request->getPost('pass');
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
            } else {
                // add expiry date here from package master & role id for vendor as well
                $data['created_date'] = date('Y-m-d H:i:s');
                $data['created_date'] = 2; // vendor role
                $data['created_date'] = date('Y-m-d H:i:s');
                $data['status'] = 1;

                if ($this->addData('vendor', $data)) {

                    // send welcome email with username and password
                    return $this->respond(['status' => $this->statusOk, 'message' => ['Data inserted Successfully']]);
                } else {
                    return $this->respond(['status' => $this->unAuthorized, 'message' => ['Something went wrong, please try again!']]);
                }
            }
        } else {
            return $this->respond(['status' => $this->unAuthorized, 'message' => 'Access Denied']);
        }
    }


    // check login credentials & set session
    public function checkLogin()
    {
        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $rules = [
                'username' => ['label' => 'username', 'rules' => 'required'],
                'password' => ['label' => 'password', 'rules' => 'required'],
            ];

            if ($this->validate($rules) == false) {
                return $this->respond(['status' => $this->unAuthorized, 'message' => $validation->getErrors()]);
            }

            $adminDetails = $this->admin_model->validate_credentials($username, $password);
            if ($adminDetails['status'] == 1) {

                // set admin sessions
                $adminSession = array(
                    'adminId' => $adminDetails['id'],
                    'adminName' => $adminDetails['name'],
                    'role' => $adminDetails['role'],
                    'is_logged_in' => true,
                );
                $this->session->set($adminSession);

                return $this->respond(['status' => $this->statusOk, 'message' => ['User Verified, Welcome Back.']]);
            } else if ($adminDetails['status'] == 0) {
                return $this->respond(['status' => $this->unAuthorized, 'message' => ['Incorrect Username / Password']]);
            } else if ($adminDetails['status'] == 2) {
                return $this->respond(['status' => $this->unAuthorized, 'message' => ['User Deactivated']]);
            }
        } else {
            return $this->respond(['status' => $this->methodNotAllowed, 'message' => 'Access Denied']);
        }
    }

    public function loadViews($url = '/', $data = [])
    {
        if (!session('is_logged_in')) {
            return redirect()->to(base_url('/mainAdmin/'));
        } else {
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

    // common function to add data in DB
    public function addData($table, $data)
    {
        $builder = $this->db->table($table);
        if ($builder->insert($data)) {
            return true;
        } else {
            return false;
        }

    }
    
    // common function to update data in DB
    public function updateData($table,$data,$where){
        $builder = $this->db->table($table);
        if($builder->update($data, $where))
            return true;
        else
            pre($this->db->getLastQuery());
    }

    // generate Sidebar data
    public function generateSidebarData(){
        $newsidebar = []; 
        $sidebars =  $this->admin_model->adminSidebar();  // get sidebar master
        foreach($sidebars as $singleSidebar){
            $newsidebar[$singleSidebar['parent_name']][] = $singleSidebar;
        }
        $session['sidebar'] = $newsidebar;
        $this->session->set($session);
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
