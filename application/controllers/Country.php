<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Country extends CI_Controller
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
        $this->load->model('country_mod');
    }

    public function index()
    {
        redirect("country/country_list");
    }

    public function country_list()
    {
        $data['country_list']     = $this->country_mod->country_list_db();

        $data['subview']                 = 'country/country_list';
        $data['meta_title']         = 'Country List';
        $this->load->view('index', $data);
    }

    public function country_create()
    {
        $data['subview']                 = 'country/country_create';
        $data['meta_title']         = 'Country Create';
        $this->load->view('index', $data);
    }

    public function country_create_process()
    {
        $post = $this->input->post();

        $where["country = '" . $post['country'] . "'"]         = NULL;
        $country_list             = $this->country_mod->country_list_db($where);
        if (count($country_list) > 0) {
            $this->session->set_flashdata('error', 'Duplicate Country!');
            redirect($_SERVER['HTTP_REFERER']);
        }

        $form_data = array(
            'country'               => $post['country'],
            'country_code'               => $post['country_code'],
            'created_by'         => $this->session->userdata('id')
        );
        $id_country = $this->country_mod->country_create_process_db($form_data);

        $this->session->set_flashdata('success', 'Your country data has been Created!');
        redirect($_SERVER['HTTP_REFERER']);
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


    public function upload_country()
    {
        $file = $_FILES['upload_excel']['tmp_name'];
        $ext = explode(".", $_FILES['upload_excel']['name']);
        if (empty($file)) {
            $this->session->set_flashdata('error', 'File is not uploaded!');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            if (strtolower(end($ext)) === 'csv' && $_FILES['upload_excel']['size'] > 0) {
                $delimiter = $this->getFileDelimiter($file);
                $this->country_mod->country_truncate_process_db();
                $i = 0;
                $handle = fopen($file, "r") or die("can't open file");
                while (($row = fgetcsv($handle, 2048, $delimiter))) {
                    $i++;
                    if ($i == 1) continue;

                    $data = [
                        'country' => $row[0],
                        'country_code' => $row[1],
                        'created_by' => $this->session->userdata('id')
                    ];

                    $this->country_mod->country_create_process_db($data);
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

    public function download_country()
    {
        $file_name = 'country_' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/csv;");

        // get data 
        $country = $this->country_mod->country_download_list_db();

        // file creation 
        $file = fopen('php://output', 'w');

        $header = array("Country", "Country Code");
        fputcsv($file, $header);
        foreach ($country as $key => $value) {
            fputcsv($file, $value);
        }
        fclose($file);
        exit;
    }

    public function country_update($id)
    {
        $where['id']                 = $id;
        $country_list                     = $this->country_mod->country_list_db($where);
        if (count($country_list) < 1) {
            // $this->session->set_flashdata('error', 'Agent Not Found!');
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['country_list']     = $country_list[0];

        $data['subview']                 = 'country/country_update';
        $data['meta_title']         = 'Country Update';
        $this->load->view('index', $data);
    }

    public function country_update_process($id)
    {
        $post = $this->input->post();

        $form_data = array(
            'country'  => $post['country'],
            'country_code'  => $post['country_code']
        );
        $where['id'] = $id;
        $id_country = $this->country_mod->country_update_process_db($form_data, $where);

        $this->session->set_flashdata('success', 'Your country data has been Updated!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function country_delete_process($id)
    {
        $where['id'] = $id;
        $this->country_mod->country_delete_process_db($where);

        $this->session->set_flashdata('success', 'Your country data has been Deleted!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function city_list($id)
    {
        $where['id']                 = $id;
        $country_list                     = $this->country_mod->country_list_db($where);
        if (count($country_list) < 1) {
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['country_list']     = $country_list[0];

        unset($where);
        $where['id_country'] = $id;
        $data['city_list'] = $this->country_mod->city_list_db($where);

        $data['subview']                 = 'country/city_list';
        $data['meta_title']         = 'City List';
        $this->load->view('index', $data);
    }

    public function city_create_process()
    {
        $post = $this->input->post();

        $where["city = '" . $post['city'] . "'"]         = NULL;
        $city_list             = $this->country_mod->city_list_db($where);
        if (count($city_list) > 0) {
            $this->session->set_flashdata('error', 'Duplicate City!');
            redirect($_SERVER['HTTP_REFERER']);
        }

        $form_data = array(
            'id_country'         => $post['id_country'],
            'city'               => $post['city'],
            'city_code'          => $post['city_code'],
            'created_by'         => $this->session->userdata('id')
        );
        $id_city = $this->country_mod->city_create_process_db($form_data);

        $this->session->set_flashdata('success', 'Your city data has been Created!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function download_city($id)
    {
        $where['id'] = $id;
        $country = $this->country_mod->country_list_db($where);
        $file_name = 'city_' . $country[0]['country'] . '_' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/csv;");

        // get data 
        unset($where);
        $where['id_country'] = $id;
        $country = $this->country_mod->city_download_list_db();

        // file creation 
        $file = fopen('php://output', 'w');

        $header = array("City", "City Code");
        fputcsv($file, $header);
        foreach ($country as $key => $value) {
            fputcsv($file, $value);
        }
        fclose($file);
        exit;
    }

    public function upload_city($id)
    {
        $where['id']                      = $id;
        $country_list                     = $this->country_mod->country_list_db($where);
        if (count($country_list) < 1) {
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
                $where['id_country'] = $id;
                $this->country_mod->city_delete_process_db($where);
                $i = 0;
                $handle = fopen($file, "r") or die("can't open file");
                while (($row = fgetcsv($handle, 2048, $delimiter))) {
                    $i++;
                    if ($i == 1) continue;

                    $data = [
                        'id_country' => $id,
                        'city' => $row[0],
                        'city_code' => $row[1],
                        'created_by' => $this->session->userdata('id')
                    ];

                    $this->country_mod->city_create_process_db($data);
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

    public function city_update($id)
    {
        $where['id']                 = $id;
        $city_list                     = $this->country_mod->city_list_db($where);
        if (count($city_list) < 1) {
            // $this->session->set_flashdata('error', 'Agent Not Found!');
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['city_list']     = $city_list[0];
        $this->load->view('country/city_update', $data);
    }

    public function city_update_process($id)
    {
        $post = $this->input->post();

        $form_data = array(
            'city'  => $post['city'],
            'city_code' => $post['city_code']
        );
        $where['id'] = $id;
        $id_city = $this->country_mod->city_update_process_db($form_data, $where);

        $this->session->set_flashdata('success', 'Your city data has been Updated!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function city_delete_process($id)
    {
        $where['id'] = $id;
        $this->country_mod->city_delete_process_db($where);

        $this->session->set_flashdata('success', 'Your city data has been Deleted!');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
