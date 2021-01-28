<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Zone extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('home_mod');
        $this->load->model('zone_mod');
    }

    public function index()
    {
        redirect("zone/zone_list");
    }

    public function zone_list()
    {
        $data['zone_list']      = $this->zone_mod->zone_list_db_query();

        $data['subview']                 = 'zone/zone_list';
        $data['meta_title']         = 'Zone List';
        $this->load->view('index', $data);
    }

    public function zone_create()
    {
        $data['country']        = $this->zone_mod->country_list_db();

        $data['subview']                 = 'zone/zone_create';
        $data['meta_title']         = 'Zone Create';
        $this->load->view('index', $data);
    }

    public function get_country()
    {
        $country        = $this->zone_mod->country_list_db();
        $list = array();

        foreach ($country as $data) {
            $list[] = $data['country'];
        }
        echo json_encode($list);
    }

    public function zone_create_process()
    {
        $post = $this->input->post();

        // print_r($post);
        // die();

        $where["zone_name = '" . $post['zone_name'] . "'"]         = NULL;
        $zone_list             = $this->zone_mod->zone_list_db($where);
        if (count($zone_list) > 0) {
            $this->session->set_flashdata('error', 'Duplicate Country!');
            redirect($_SERVER['HTTP_REFERER']);
        }

        $form_data = array(
            'zone_name'                 => $post['zone_name'],
            'created_by'         => $this->session->userdata('id')
        );
        $id_zone = $this->zone_mod->zone_create_process_db($form_data);

        unset($form_data);

        foreach ($post['country'] as $value) {
            $form_data[] = array("id_zone" => $id_zone, "country" => $value);
        }
        $this->zone_mod->zone_detail_create_process_db($form_data);

        $this->session->set_flashdata('success', 'Your Zone data has been Created!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function zone_update($id)
    {
        $where['id']                 = $id;
        $zone_list                     = $this->zone_mod->zone_list_db($where);
        if (count($zone_list) < 1) {
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['zone_list']     = $zone_list[0];
        $data['country']        = $this->zone_mod->country_list_db();
        $detail_loop         = $this->zone_mod->zone_detail_list_db(array('id_zone' => $id));
        $data_detail = array();
        foreach ($detail_loop as $datas) {
            $data_detail[] = $datas['country'];
        }
        $data['detail'] = $data_detail;

        $data['subview']                 = 'zone/zone_update';
        $data['meta_title']         = 'Zone Update';
        $this->load->view('index', $data);
    }

    public function zone_update_process($id)
    {
        $post = $this->input->post();

        $form_data = array(
            'zone_name'                 => $post['zone_name'],
        );
        $where['id'] = $id;
        $this->zone_mod->zone_update_process_db($form_data, $where);

        unset($form_data);

        $delete = $this->zone_mod->zone_detail_delete_process_db(array('id_zone' => $id));

        foreach ($post['country'] as $value) {
            $form_data[] = array("id_zone" => $id, "country" => $value);
        }
        $this->zone_mod->zone_detail_create_process_db($form_data);

        $this->session->set_flashdata('success', 'Your Zone data has been Updated!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function zone_delete_process($id)
    {
        $where['id'] = $id;
        $this->zone_mod->zone_delete_process_db($where);

        unset($where);
        $where['id_zone'] = $id;
        $this->zone_mod->zone_detail_delete_process_db($where);

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function subzone_list($id)
    {
        $where['id']                 = $id;
        $zone_list                     = $this->zone_mod->zone_list_db($where);
        if (count($zone_list) < 1) {
            redirect($_SERVER['HTTP_REFERER']);
        }
        unset($where);
        $where['id_zone']                 = $id;
        $subzone_list                  = $this->zone_mod->subzone_list_db_query($where);
        $data['id_zone'] = $id;

        $data['sub_zone'] = $subzone_list;
        $data['zone'] = $zone_list[0];
        $data['city'] = $this->zone_mod->city_list_db();

        $data['subview']            = 'zone/subzone_list';
        $data['meta_title']         = 'Sub Zone List';
        $this->load->view('index', $data);
    }

    public function subzone_create_process()
    {
        $post = $this->input->post();

        $where["sub_zone = '" . $post['sub_zone'] . "'"]         = NULL;
        $zone_list             = $this->zone_mod->subzone_list_db($where);
        if (count($zone_list) > 0) {
            $this->session->set_flashdata('error', 'Duplicate Sub Zone!');
            redirect($_SERVER['HTTP_REFERER']);
        }

        $form_data = array(
            'id_zone'                 => $post['id_zone'],
            'sub_zone'                => $post['sub_zone'],
            'created_by'         => $this->session->userdata('id')
        );
        $id_subzone = $this->zone_mod->subzone_create_process_db($form_data);

        unset($form_data);

        foreach ($post['city'] as $value) {
            $form_data[] = array("id_subzone" => $id_subzone, "city" => $value);
        }

        $this->zone_mod->subzone_detail_create_process_db($form_data);

        $this->session->set_flashdata('success', 'Your sub zone data has been Created!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function subzone_update($id)
    {
        $where['id']                 = $id;
        $zone_list                   = $this->zone_mod->subzone_list_db($where);
        if (count($zone_list) < 1) {
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['subzone_list']          = $zone_list[0];

        unset($where);
        $where['id_subzone']        = $id;
        $city_list          = $this->zone_mod->subzone_detail_list_db($where);
        $cities = array();
        foreach ($city_list as $row) {
            $cities[] = $row['city'];
        }
        $data['cities'] = $cities;

        $data['city'] = $this->zone_mod->city_list_db();
        $this->load->view('zone/subzone_update', $data);
    }

    public function subzone_update_process($id)
    {
        $post = $this->input->post();

        $form_data = array(
            'sub_zone'                 => $post['sub_zone'],
        );
        $where['id'] = $id;
        $this->zone_mod->subzone_update_process_db($form_data, $where);

        unset($form_data);

        $delete = $this->zone_mod->subzone_detail_delete_process_db(array('id_subzone' => $id));

        foreach ($post['city'] as $value) {
            $form_data[] = array("id_subzone" => $id, "city" => $value);
        }
        $this->zone_mod->subzone_detail_create_process_db($form_data);

        $this->session->set_flashdata('success', 'Your sub zone data has been Updated!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function subzone_delete_process($id)
    {
        $where['id'] = $id;
        $this->zone_mod->subzone_delete_process_db($where);

        unset($where);
        $where['id_subzone'] = $id;
        $this->zone_mod->subzone_detail_delete_process_db($where);

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function download_zone()
    {
        $file_name = 'zone_' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/csv;");

        // get data 
        $zone = $this->zone_mod->zone_download_list_db();

        // file creation 
        $file = fopen('php://output', 'w');

        $header = array("Zone", "Country");
        fputcsv($file, $header);
        foreach ($zone as $key => $value) {
            fputcsv($file, $value);
        }
        fclose($file);
        exit;
    }

    public function download_subzone($id)
    {
        $where['id'] = $id;
        $zone = $this->zone_mod->zone_list_db($where);
        $file_name = 'subzone_' . $zone[0]['zone_name'] . '_' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/csv;");

        // get data 
        unset($where);
        $where['id_zone'] = $id;
        $subzone = $this->zone_mod->subzone_download_list_db();

        // file creation 
        $file = fopen('php://output', 'w');

        $header = array("Sub Zone Name", "City");
        fputcsv($file, $header);
        foreach ($subzone as $key => $value) {
            fputcsv($file, $value);
        }
        fclose($file);
        exit;
    }

    public function upload_zone()
    {
        $file = $_FILES['upload_excel']['tmp_name'];
        $ext = explode(".", $_FILES['upload_excel']['name']);
        if (empty($file)) {
            $this->session->set_flashdata('error', 'File is not uploaded!');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            if (strtolower(end($ext)) === 'csv' && $_FILES['upload_excel']['size'] > 0) {
                $delimiter = $this->getFileDelimiter($file);
                $this->zone_mod->zone_truncate_process_db();
                $this->zone_mod->zone_detail_truncate_process_db();
                $i = 0;
                $zone_name = '';
                $id_zone_temp = '';
                $handle = fopen($file, "r") or die("can't open file");
                while (($row = fgetcsv($handle, 2048, $delimiter))) {
                    $i++;
                    if ($i == 1) continue;
                    unset($data);

                    if ($zone_name != $row[0]) {
                        $data = [
                            'zone_name' => $row[0],
                            'created_by' => $this->session->userdata('id')
                        ];

                        $id_zone = $this->zone_mod->zone_create_process_db($data);
                        $id_zone_temp = $id_zone;
                        $zone_name = $row[0];
                    } else {
                        $id_zone = $id_zone_temp;
                    }

                    unset($data);
                    $data = [
                        'id_zone' => $id_zone_temp,
                        'country' => $row[1]
                    ];
                    $this->zone_mod->zone_detail_create_process_db_per($data);
                }

                fclose($handle);

                $this->session->set_flashdata('success', 'Your country data has been imported!');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('error', 'Invalid format file!');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function upload_subzone($id)
    {
        $where['id']                      = $id;
        $zone_list                     = $this->zone_mod->zone_list_db($where);
        if (count($zone_list) < 1) {
            redirect($_SERVER['HTTP_REFERER']);
        }
        $file = $_FILES['upload_excel']['tmp_name'];
        $ext = explode(".", $_FILES['upload_excel']['name']);
        if (empty($file)) {
            $this->session->set_flashdata('error', 'File is not uploaded!');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            if (strtolower(end($ext)) === 'csv' && $_FILES['upload_excel']['size'] > 0) {
                $delimiter = $this->getFileDelimiter($file);
                unset($where);
                $where['id_zone']                      = $id;
                $subzone_list                     = $this->zone_mod->subzone_list_db($where);
                foreach($subzone_list as $value){
                    unset($where);
                    $where['id_subzone'] = $value['id'];
                    $this->zone_mod->subzone_detail_delete_process_db($where);
                }
                unset($where);
                $where['id_zone'] = $id;
                $this->zone_mod->subzone_delete_process_db($where);
                $i = 0;
                $subzone_name = '';
                $id_subzone_temp = '';
                $handle = fopen($file, "r") or die("can't open file");
                while (($row = fgetcsv($handle, 2048, $delimiter))) {
                    $i++;
                    if ($i == 1) continue;

                    if ($subzone_name != $row[0]) {
                        $data = [
                            'id_zone' => $id,
                            'sub_zone' => $row[0],
                            'created_by' => $this->session->userdata('id')
                        ];

                        $id_subzone = $this->zone_mod->subzone_create_process_db($data);
                        $id_subzone_temp = $id_subzone;
                        $subzone_name = $row[0];
                    } else {
                        $id_subzone = $id_subzone_temp;
                    }

                    unset($data);
                    $data = [
                        'id_subzone' => $id_subzone_temp,
                        'city' => $row[1]
                    ];
                    $this->zone_mod->subzone_detail_create_process_db_per($data);
                }

                fclose($handle);
                $this->session->set_flashdata('success', 'Your city data has been imported!');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('error', 'Invalid format file!');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    function getFileDelimiter($file, $checkLines = 2)
    {
        $file = new SplFileObject($file);
        $delimiters = array(
            ',',
            '\t',
            ';',
            '|',
            ':'
        );
        $results = array();
        $i = 0;
        while ($file->valid() && $i <= $checkLines) {
            $line = $file->fgets();
            foreach ($delimiters as $delimiter) {
                $regExp = '/[' . $delimiter . ']/';
                $fields = preg_split($regExp, $line);
                if (count($fields) > 1) {
                    if (!empty($results[$delimiter])) {
                        $results[$delimiter]++;
                    } else {
                        $results[$delimiter] = 1;
                    }
                }
            }
            $i++;
        }
        $results = array_keys($results, max($results));
        return $results[0];
    }
}
