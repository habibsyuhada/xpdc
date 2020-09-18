<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('shipment_mod');
        $this->load->model('operation_mod');
    }

    public function index()
    {
        redirect('operation/dashboard');
    }

    public function service_center()
    {
        $where = array('status' => 'Service Center');
        $data['list']        = $this->operation_mod->shipment_list($where);
        $data['subview']     = 'operation/service_center';
        $data['meta_title']  = 'Shipment List | Service Center';
        $this->load->view('index', $data);
    }

    public function departed()
    {
        $where = array('status' => 'Departed');
        $data['list']        = $this->operation_mod->shipment_list($where);
        $data['subview']     = 'operation/departed';
        $data['meta_title']  = 'Shipment List | Departed';
        $this->load->view('index', $data);
    }

    public function arrived()
    {
        $where = array('status' => 'Arrived');
        $data['list']        = $this->operation_mod->shipment_list($where);
        $data['driver']        = $this->operation_mod->driver_list();
        $data['subview']     = 'operation/arrived';
        $data['meta_title']  = 'Shipment List | Arrived';
        $this->load->view('index', $data);
    }

    public function with_courier()
    {
        $where = array('status' => 'With Courier');
        $data['list']        = $this->operation_mod->shipment_list($where);
        $data['subview']     = 'operation/with_courier';
        $data['meta_title']  = 'Shipment List | With Courier';
        $this->load->view('index', $data);
    }

    public function delivered()
    {
        $where = array('status' => 'Delivered');
        $data['list']           = $this->operation_mod->shipment_list($where);
        $data['subview']        = 'operation/delivered';
        $data['meta_title']     = 'Shipment List | Delivered';
        $this->load->view('index', $data);
    }

    public function arrived_process_db()
    {
        $post = $this->input->post();

        $form_data = array(
            'id_shipment'       => $post['id_shipment'],
            'date'              => date("Y-m-d"),
            'time'              => date("H:i:s"),
            'location'          => '',
            'pic_driver'        => $post['driver_name'],
            'status'            => "With Courier",
            'remarks'           => $post['remark'],
        );

        $this->shipment_mod->shipment_history_create_process_db($form_data);

        $form_data3 = array(
            'status'                        => "With Courier"
        );

        $where2 = array(
            'id' => $post['id_shipment']
        );
        $this->operation_mod->update_shipment_status($form_data3, $where2);
        $this->session->set_flashdata('success', 'Your Shipment History data has been Updated!');
        redirect('operation/arrived');
    }

    public function departed_process_db()
    {
        $post = $this->input->post();

        $form_data = array(
            'id_shipment'       => $post['id_shipment'],
            'date'              => date("Y-m-d"),
            'time'              => date("H:i:s"),
            'location'          => '',
            'status'            => "Arrived",
            'remarks'           => $post['remark'],
        );

        $this->shipment_mod->shipment_history_create_process_db($form_data);

        $form_data3 = array(
            'status'                        => "Arrived"
        );

        $where2 = array(
            'id' => $post['id_shipment']
        );
        $this->operation_mod->update_shipment_status($form_data3, $where2);
        $this->session->set_flashdata('success', 'Your Shipment History data has been Updated!');
        redirect('operation/departed');
    }

    public function with_courier_process_db()
    {
        $post = $this->input->post();

        $form_data = array(
            'id_shipment'       => $post['id_shipment'],
            'date'              => date("Y-m-d"),
            'time'              => date("H:i:s"),
            'location'          => '',
            'status'            => "Delivered",
            'remarks'           => $post['remark'],
        );

        $this->shipment_mod->shipment_history_create_process_db($form_data);

        $form_data3 = array(
            'status'                        => "Delivered"
        );

        $where2 = array(
            'id' => $post['id_shipment']
        );
        $this->operation_mod->update_shipment_status($form_data3, $where2);
        $this->session->set_flashdata('success', 'Your Shipment History data has been Updated!');
        redirect('operation/with_courier');
    }

    public function service_center_to_departed_process()
    {
        $post = $this->input->post();

        $form_data = array(
            'id_shipment'       => $post['id_shipment'],
            'date'              => date("Y-m-d"),
            'time'              => date("H:i:s"),
            'location'          => $post['location'],
            'status'            => "Departed",
            'remarks'           => $post['remark'],
        );

        $this->shipment_mod->shipment_history_create_process_db($form_data);

        $form_data2 = array(
            'main_agent_mawb_mbl'           => $post['main_agent_mawb_mbl'],
            'main_agent_carrier'            => $post['main_agent_carrier'],
            'main_agent_voyage_flight_no'   => $post['main_agent_voyage_flight_no'],
            'port_of_loading'               => $post['port_of_loading'],
            'port_of_discharge'             => $post['port_of_discharge'],
            'container_no'                  => $post['container_no']
        );

        $where = array(
            'id_shipment' => $post['id_shipment']
        );

        $this->operation_mod->service_center_update_process_db($form_data2, $where);

        $form_data3 = array(
            'status'                        => "Departed"
        );

        $where2 = array(
            'id' => $post['id_shipment']
        );
        $this->operation_mod->update_shipment_status($form_data3, $where2);
        $this->session->set_flashdata('success', 'Your Shipment History data has been Updated!');
        redirect('operation/service_center');
    }
}
