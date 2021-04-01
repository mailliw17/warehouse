<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_auth');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');

        if ($this->form_validation->run() == false) {
            $judul['page_title'] = 'Halaman Login';
            $this->load->view('V_login', $judul);
        } else {
            $username = htmlspecialchars($this->input->post('username', true));
            $password = htmlspecialchars($this->input->post('password', true));

            //insert ke database
            $cek_user = $this->M_auth->auth_user($username, $password);

            if ($cek_user->num_rows() != 0) {
                $data = $cek_user->row_array();
                $id_user = $data['id_user'];
                $role = $data['role'];
                $nama = $data['nama'];
                $username = $data['username'];
                $this->session->set_userdata('nama', $nama);
                $this->session->set_userdata('username', $username);
                $this->session->set_userdata('id_user', $id_user);
                $this->session->set_userdata('role', $role);
                $this->session->set_userdata('login', TRUE);
                // if ($role == 'Admin') {
                // redirect('dashboard');
                // } elseif ($role == 'Operator Input') {
                //     redirect('C_qrcode');
                // } elseif ($role == 'Operator Output') {
                //     redirect('C_fifo');
                // }
                if ($role !== 'Lampu') {
                    redirect('dashboard');
                } elseif ($role == 'Lampu') {
                    redirect('lampu');
                }
            } else {
                $this->session->set_flashdata('gagal_login', 'Username / Password salah !');
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        //bersihkan session dan kembalikan ke halaman login
        $this->session->sess_destroy();
        redirect('auth');

        //pindah ke halaman landingpage
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Kamu berhasil Logout!
       </div>');
        redirect('auth');
    }

    public function register()
    {
        //form validasi by code igniter

        $this->form_validation->set_rules(
            'username',
            'Username',
            'trim|required|is_unique[user.username]',
            array(
                'is_unique' => 'Pembuatan Akun Gagal karena Username sudah terdaftar'
            )
        );

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]', [
            'matches' => 'Password tidak sama'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $judul['page_title'] = 'Input Nomor PO';
            $this->load->view('templates/header', $judul);
            $this->load->view('V_register');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'role' => htmlspecialchars($this->input->post('role', true)),
                'password' => md5($this->input->post('password1', true)),
            ];

            //insert ke database
            $this->M_auth->register($data);


            //pindah ke halaman landingpage
            $this->session->set_flashdata('message_berhasil', '<div class="alert alert-success" role="alert">
                </div>');
            redirect('auth/kelolaakun');
        }
    }

    function gantipassword()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $this->form_validation->set_rules('passwordLama', 'Password Lama', 'required|trim');

        $this->form_validation->set_rules('passwordBaru1', 'Password Baru 1', 'required|trim|matches[passwordBaru2]');

        $this->form_validation->set_rules('passwordBaru2', 'Password Baru 2', 'required|trim|matches[passwordBaru1]');

        if ($this->form_validation->run() == false) {
            //load tampilannya
            $judul['page_title'] = 'Ganti password';
            $this->load->view('templates/header', $judul);
            $this->load->view('V_gantipassword', $data);
            $this->load->view('templates/footer');
        } else {
            //cek password lama apakah sama dengan yang di database
            $passwordLama = md5($this->input->post('passwordLama'));
            $passwordBaru1 = md5($this->input->post('passwordBaru1'));
            if ($passwordLama != $data['user']['password']) {
                //kalau password lama gasama dgn dengan db
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Password lama Anda Salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('auth/gantipassword');
            } else {
                //kalau password nya benar
                //cek dulu password baru sama tidak dengan password lama
                if ($passwordLama == $passwordBaru1) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Password baru tidak boleh sama dengan password lama!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('auth/gantipassword');
                } else {
                    //password sudah oke
                    $password_hash = md5($this->input->post('passwordBaru1', true));

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password Berhasil diganti!
                    </div>');
                    redirect('auth');
                }
            }
        }
    }

    public function kelolaakun()
    {
        $data['user'] = $this->M_auth->kelolaakun()->result();

        $judul['page_title'] = 'Kelola Akun';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_kelolaakun', $data);
        $this->load->view('templates/footer');
    }

    public function hapusakun($id_user)
    {
        $this->M_auth->hapusakun($id_user);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Akun berhasil dihapus !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('auth/kelolaakun');
    }

    public function gantipasswordoperator($id_user)
    {
        $data['user'] = $this->M_auth->ambildataoperator($id_user);

        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $judul['page_title'] = 'Edit akun Operator';
            $this->load->view('templates/header', $judul);
            $this->load->view('V_gantipassword_operator', $data);
            $this->load->view('templates/footer');
        } else {
            //insert ke database
            $this->M_auth->gantipasswordoperator();

            //pindah ke halaman  landingpage
            $this->session->set_flashdata('message_berhasil_gantipass', '<div class="alert alert-success" role="alert">
                </div>');
            redirect('auth/kelolaakun');
        }
    }
}
