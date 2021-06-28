<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller
{
    public function index()
    {
        $session = session();
        $log = $session->sess_log;

        if($log == 0){
        $data = array(
            'bootstrap' => "assets/vendor/bootstrap",
            'css' => "assets/css"
        );
        return view('home/login', $data);
        }elseif($log == 2){
            return redirect()->to('/admin');
        }else{
            return redirect()->to(base_url());
        }
    }

    function auth()
    {
        $model = new UserModel();
        $session = session();
        $usrn = $this->request->getVar('username');
        $pasw = $this->request->getVar('password');

        $data = $model->where('username', $usrn)->first();

        if($data){
            $pass = $data['password'];
            if($pasw == $pass){
                $session_data = [
                    'sess_id'       => $data['id'],
                    'sess_username' => $data['username'],
                    'sess_log'      => '1',
                    'sess_section'  => $data['section']
                ];

                $session->set($session_data);
                return redirect()->to('/');
            }else{
                $session->setFlashdata('msg','Password Salah!');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg','Username dan Password Salah!');
            return redirect()->to('/login');
        }
    }
}