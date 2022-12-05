<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller{
   
    public function __construct()
   {
     parent::__construct();
     $this->load->library('form_validation');
   }

    public function index() {
        
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
        'valid_email' => 'email tidak valid!',   
        'required' => 'email tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'password tidak boleh kosong!'
        ]);
       
        if($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('templates/auth_header', $data);   
            $this->load->view('auth/login');  
            $this->load->view('templates/auth_footer');   
             

        }else{

            $this->_login();
        }

    }           

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));   
        $password = $this->input->post('password', true);

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        //user ada
        if($user){
            if($user['is_active'] == 1){
                //cek pass
                if (password_verify($password, $user['password'])) {
                    $data =[
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('user');
                } else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah!
                  </div>');
                    redirect('auth'); 
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email belum diaktifasi!
              </div>');
                redirect('auth');

            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email belum terdaftar!
          </div>');
            redirect('auth');
        }
    }

    public function registration(){
        
        $this->form_validation->set_rules('name', 'Name', 'required|trim',[
        'required' => 'nama tidak boleh kosong!'     
        

        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
        'valid_email' => 'email tidak valid!',   
        'required' => 'email tidak boleh kosong!', 
        'is_unique' => 'email ini sudah terdaftar!'
        
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]',[
         'matches' => 'password tidak sama!',
         'required' => 'password tidak boleh kosong!',
         'min_length' => 'password terlalu pendek!'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == false){

            $data['title'] = 'User Registration';
            $this->load->view('templates/auth_header', $data);   
            $this->load->view('auth/registration');  
            $this->load->view('templates/auth_footer');  
        }else{
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), 
                PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()    
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun telah dibuat!
          </div>');
            redirect('auth');

        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Anda telah Logout!
      </div>');
        redirect('auth');
    }
}