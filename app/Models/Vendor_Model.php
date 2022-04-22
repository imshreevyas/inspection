<?php
namespace App\Models;

use CodeIgniter\Model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Vendor_Model extends Model
{
    protected $table = null;

    // *************************************************************************Employee Functions*********************************************************************
    public function update_last_login_emp($table,$username)
    {
        $request = \Config\Services::request();
        $builder = $this->db->table($table);
        $builder->where('username', $username);
        $builder->update(array('last_login' => date('Y-m-d H:i:s'),'last_login_ip' => $request->getIPAddress()));
        return true;
    }

    public function validate_credentials($table,$username, $password, $vendor_id = 0)
    {

        $where['username'] = $username;
        if($vendor_id != 0){
            $where['vendor_id'] = $vendor_id;
        }

        $builder = $this->db->table($table);
        $result = $builder->getWhere($where)->getResultArray();
        
        if (count($result) == 1) {
            if (!check_HashPass($password, $result[0]['password'])) {
                $result['status'] = 0;
                return $result;
            }
            if ($result[0]['status'] == 1) {
                $this->update_last_login_emp($table,$username);
                return $result[0];
            } else {
                $result['status'] = 2;
                return $result;
            }
        }else{
            $result['status'] = 0;
            return $result;
        }
    }

    function send_mail($mail_data)
    {
        $email_config = Array(
            'charset' => 'utf-8',
            'mailType' => 'html',
        );
        $email = \Config\Services::email();
        $email->initialize($email_config);
        $email->setNewline("\r\n");
        $email->setCRLF("\r\n");
        $sender_email       = get_direct_value('general_settings','value','name','system_email');
        $sender_name        = get_direct_value('general_settings','value','name','sender_name');

        $receiver_email     = $mail_data['receiver_email'];
        $receiver_cc_email  = isset($mail_data['receiver_cc_email'])?$mail_data['receiver_cc_email']:array();
        $receiver_bcc_email = isset($mail_data['receiver_bcc_email'])?$mail_data['receiver_bcc_email']:array();
        $mail_subject       = $mail_data['mail_subject'];
        $mail_body          = $mail_data['mail_body'];
        $attachments        = isset($mail_data['attachment'])?$mail_data['attachment']:array();

        $email->setFrom($sender_email, $sender_name);
        $email->setTo($receiver_email);

        if(count($receiver_cc_email) > 0){
            $email->setCC($receiver_cc_email);
        }
        if(count($receiver_bcc_email) > 0){
            $email->setBCC($receiver_bcc_email);
        }

        if(!empty($attachments)){
            $email->attach($mail_data['attachment'],'application/pdf',$mail_data['file_name'], false);
        }

/*        if(!empty($attachments) && is_array($attachments)){
            foreach ($attachments as $key => $value) {
                $email->attach($value);
            }
        }*/

        $email->setSubject($mail_subject);
        $email->setMessage($mail_body);

        if ($email->send()){
            return 1;
        }
        else{
            return 0;
            // pre($email->printDebugger(['headers']));
        }
    }

    public function create_excel($table, $where, $fields){

        $styleArray = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
            'fill' => array(
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => array('argb' => 'FF4F81BD')
            ),
            'font'  => array(
                'bold'  => true,
                'color' => array('rgb' => 'ffffff'),
                'size'  => 10,
                'name'  => 'Verdana'
            )
        );

        $rows = 2;
        $builder = $this->db->table($table);
        $checkIfRowExist = $builder->where($where)->get()->getResultArray();
        $fileName = $table.'.xlsx';  
        $spreadsheet = new Spreadsheet();
    
        $sheet = $spreadsheet->getActiveSheet();
        $alphabet = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $newAlp = []; // 25
        
        for ($i=0; $i < count($alphabet); $i++) { 
            if(count($newAlp) == 25 && count($fields) > 25){
                for ($j=0; $j < 2; $j++) {
                    for ($k=0; $k < count($alphabet); $k++) { 
                        $newAlp[] = $alphabet[$j].$alphabet[$k];
                    }
                }
            }
            else
                $newAlp[] = $alphabet[$i];
        }

        $cell = 'A1:'.$newAlp[count($fields)-1].'1';
        $sheet->getStyle($cell)->applyFromArray($styleArray);
        foreach ($fields as $key=>$field) {
            $sheet->setCellValue($alphabet[$key].'1', $field);
        }

        foreach ($checkIfRowExist as $key=>$val){
            foreach ($fields as $key=>$field) {
                $sheet->setCellValue($alphabet[$key] . $rows, $val[$fields[$key]]);
            }
            $rows++;
        } 
        
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename='.$fileName);
        $writer->save("php://output");
    }


    public function allRoles($where = [])
    {
        return $this->db->table('roles')->where($where)->orderBy('roles.id','DESC')->get()->getResultArray();
    }

    public function getRolePermission($id){
        return $this->db->table('roles')->select('perms')->where('id',$id)->get()->getRowArray();
    }
    
    public function sidebarMaster()
    {
        return $this->db->table('sidebar_master')->where('panel_type','2')->orderBy('sidebar_master.id','ASC')->get()->getResultArray();
    }

    public function employeeList($where)
    {
        return $this->db->table('vendor_emp')->where($where)->orderBy('id','DESC')->get()->getResultArray();
    }
    
    public function singleEmployee($where)
    {
        return $this->db->table('vendor_emp')->where($where)->get()->getRowArray();
    }
    
    
    public function clientList($where){
        return $this->db->table('vendor_clients')->where($where)->orderBy('id','DESC')->get()->getResultArray();
    }

    public function clientListDropdown($where){
        $where['status'] = 1;
        return $this->db->table('vendor_clients')->where($where)->orderBy('id','DESC')->get()->getResultArray();
    }
    
    public function singleClient($where)
    {
        return $this->db->table('vendor_clients')->where($where)->get()->getRowArray();
    }

    public function assetsList($where){
        return $this->db->table('vendor_assets')->where($where)->orderBy('id','DESC')->get()->getResultArray();
    }
    
    public function singleAsset($where)
    {
        return $this->db->table('vendor_assets')->where($where)->get()->getRowArray();
    }

    //************************************************Coupons Functions*********************************************

    public function get_coupon($id)
    {
        $coupon = $this->db->get_where('coupons', array('id' => $id))->result_array();
        return $coupon[0];
    }

    public function couponList($where_array = 'FALSE')
    {
        if (is_array($where_array) && isset($where_array)) {
            $this->db->where($where_array);
        }
        return $this->db->table('coupons')->select('*')->get()->getResultArray();
    }

    public function delete_coupon($coupon_id)
    {
        $this->db->where('id', $coupon_id);
        if ($this->db->delete('coupons'))
            return 1;
        else
            return 0;
    }
   
    public function check_unique_code($coupon_code)
    {
        $coupon_query = $this->db->select("id")->get_where("coupons", array('UPPER(coupon_code)' => strtoupper($coupon_code)));
        if ($coupon_query->num_rows() < 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    
    public function checkIfUinqueForVendor($data, $table){
        return $this->db->table($table)->where([$data, 'vendor_id' => $vendor_id])->get()->getRowArray();
    }
   

}