<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    private $view = APPPATH . 'views/';

    public function index()
    {
        $viewdata = new stdClass();
        $files = glob(APPPATH . 'views/*.php');
        $viewdata->files = clearFilter($files);
        $this->load->view('welcome_message', $viewdata);
    }

    public function edit($file)
    {
        $viewdata = new stdClass();
        $viewdata->file = $file;
        $viewdata->fileContent = htmlentities(file_get_contents($this->view . $file));
        $this->load->view('edit', $viewdata);
    }

    public function editPost($file)
    {
        if($this->input->method() == 'post') {
            $this->load->library('form_validation');
            $config = [
                ['field' => 'fileContent',
                    'label' => 'İçerik',
                    'rules' => 'trim|required'],
            ];
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                redirect('welcome/edit/' . $file);
            } else {
                $data=langDataFormetter(strip($this->input->post('fileContent',true)));
                if (file_exists($this->view . $file.'.php')) {
                    $this->load->helper('file');
                    if (checkDirectoryView($this->view) && write_file($this->view.$file.'.php', $data,'r+')) {
                        var_dump(write_file($this->view.$file.'.php', $data,'r+'));
                        echo 'başarılı';
                    } else {
                        echo 'olmadı yar';
                    }
                }
            }
        }else
            echo $this->input->method();
    }
}
