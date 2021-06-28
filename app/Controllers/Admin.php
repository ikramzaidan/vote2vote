<?php namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
use App\Models\AdminModel;
use App\Models\CandidateModel;

class Admin extends Controller
{
    public function index()
    {
        $session = session();
        $log  = $session->sess_log;

        if($log==2){
            $usrn = $session->sess_usrnm;
            $data = [
                'tittle'    => "Admin - Dashboard",
                'bootstrap' => "assets/vendor/bootstrap",
                'vendor'    => "assets/vendor",
                'css'       => "assets/css",
                'js'        => "assets/js",
                'img'       => "assets/img",
                'usrn'      => $usrn
            ];

            echo view('admin/sidebar', $data);
            echo view('admin/content-home');
            echo view('admin/footer');
        }elseif($log==1){
            return redirect()->to('/');
        }else{
            return redirect()->to('/admin/login');
        }
    }

    public function users()
    {
        $session = session();
        $log  = $session->sess_log;

        if($log==2){
            $usrn = $session->sess_usrnm;
            $data = [
                'tittle'    => "Admin - Users Table",
                'bootstrap' => "assets/vendor/bootstrap",
                'vendor'    => "assets/vendor",
                'css'       => "assets/css",
                'js'        => "assets/js",
                'img'       => "assets/img",
                'usrn'      => $usrn
            ];

            echo view('admin/sidebar', $data);
            echo view('admin/content-table');
            echo view('admin/footer');
        }elseif($log==1){
            return redirect()->to('/');
        }else{
            return redirect()->to('/admin/login');
        }
    }

    public function candidates()
    {
        $session = session();
        $log  = $session->sess_log;

        if($log==2){
            $usrn = $session->sess_usrnm;
            $data = [
                'tittle'    => "Admin - Candidates Table",
                'bootstrap' => "assets/vendor/bootstrap",
                'vendor'    => "assets/vendor",
                'css'       => "assets/css",
                'js'        => "assets/js",
                'img'       => "assets/img",
                'usrn'      => $usrn
            ];

            echo view('admin/sidebar', $data);
            echo view('admin/content-table');
            echo view('admin/footer');
        }elseif($log==1){
            return redirect()->to('/');
        }else{
            return redirect()->to('/admin/login');
        }
    }

    public function newCandidate()
    {
        $session = session();
        $log  = $session->sess_log;

        if($log==2){
            $usrn = $session->sess_usrnm;
            $data = [
                'tittle'    => "Admin - Candidates Table",
                'bootstrap' => "assets/vendor/bootstrap",
                'vendor'    => "assets/vendor",
                'css'       => "assets/css",
                'js'        => "assets/js",
                'img'       => "assets/img",
                'usrn'      => $usrn
            ];

            echo view('admin/sidebar', $data);
            echo view('admin/content-newCandidate');
            echo view('admin/footer');
        }elseif($log==1){
            return redirect()->to('/');
        }else{
            return redirect()->to('/admin/login');
        }
    }

    public function svNewCandidate()
    {
        $session = session();
        $log  = $session->sess_log;

        if($log==2){
            $model = new CandidateModel();
            $validated = $this->validate([
                'file' => [
                    'uploaded[filePhoto]',
                    'mime_in[filePhoto,image/jpg,image/jpeg,image/png]',
                    'max_size[filePhoto,4096]',
                ],
            ]);
            if($validated){
                $flPhoto = $this->request->getFile('filePhoto');
                $flName  = $flPhoto->getName();
                $flExt   = $flPhoto->getClientExtension();
                $field = [
                    'name_1' => $this->request->getVar('name_1'),
                    'name_2' => $this->request->getVar('name_2'),
                    'type'   => $this->request->getVar('type'),
                    'desc_1' => $this->request->getPost('text_1'),
                    'desc_2' => $this->request->getPost('text_2'),
                    'image'  => $flName
                ];
                if($flPhoto->move(WRITEPATH . '../public/uploads/photoCandidate/')){
                    $model->save($field);
                    $msg = 'Kandidat baru berhasil disimpan';

                    return redirect()->to('/admin/newCandidate')->with('msg-s',$msg);
                }
            }else{
                $msg = 'File Foto tidak valid';

                return redirect()->to('/admin/newCandidate')->with('msg-i',$msg);
            }
        }elseif($log==1){
            return redirect()->to('/');
        }else{
            return redirect()->to('/admin/login');
        }
    }

    public function stat()
    {
        $session = session();
        $log  = $session->sess_log;

        if($log==2){
            $usrn = $session->sess_usrnm;
            $data = [
                'tittle'    => "Admin - QuickReal Count",
                'bootstrap' => "assets/vendor/bootstrap",
                'vendor'    => "assets/vendor",
                'css'       => "assets/css",
                'js'        => "assets/js",
                'img'       => "assets/img",
                'usrn'      => $usrn
            ];

            echo view('admin/sidebar', $data);
            echo view('admin/content-stat');
            echo view('admin/footer');
        }elseif($log==1){
            return redirect()->to('/');
        }else{
            return redirect()->to('/admin/login');
        }
    }

    public function login()
    {
        $session = session();
        $log = $session->sess_log;

        if($log==0){
            $data = [
                'bootstrap' => "assets/vendor/bootstrap",
                'css'       => "assets/css"
            ];

            return view('admin/login', $data);
        }elseif($log==1){
            return redirect()->to('/');
        }else{
            return redirect()->to('/admin');
        }
    }

    public function create()
    {
        $session = session();
        $log  = $session->sess_log;
        if($log==2){
            $data = array (
                'bootstrap' => "assets/vendor/bootstrap",
                'css'       => "assets/css"
            );

            return view('admin/create', $data);
        }elseif($log==1){
            return redirect()->to('/');
        }else{
            return redirect()->to('/admin');
        }     
    }

    function auth()
    {
        $session = session();
        $model   = new AdminModel();
        $usrn    = $this->request->getVar('username');
        $pasw    = $this->request->getVar('password');

        $data  = $model->where('username', $usrn)->first();
        
        if($data){
            $pswd  = $data['password'];
            if(password_verify($pasw, $pswd)){
                $session_data = [
                    'sess_id'    => $data['id'],
                    'sess_usrnm' => $data['username'],
                    'sess_lvl'   => $data['level'],
                    'sess_tokn'  => md5(sha1($data['username'])),
                    'sess_log'   => 2
                ];

                $datime = new Time('now','Asia/Jakarta');
                $logged = [
                    'id'         => $data['id'],
                    'logged_at'  => $datime
                ];

                $session->set($session_data);
                $model->save($logged);

                return redirect()->to('/admin');                
            }else{
                $msg = "Password Salah!";
                return redirect()->to('/admin/login')->with('msg',$msg); 
            }
        }else{
            $msg = "Username dan Password Salah!";
            return redirect()->to('/admin/login')->with('msg',$msg);
        }
    }

    function add()
    {
        $model = new AdminModel();

        $pass = $this->request->getVar('password');
        $field = [
            'name' => $this->request->getVar('name'),
            'level' => $this->request->getVar('level'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($pass, PASSWORD_DEFAULT),
            'logged_at' => '0'
        ];

        if($model->save($field))
        {
            return redirect()->to('/admin/login');
        }else
        {
            return redirect()->to('/');
        }

    }

    function logout()
    {
        $session = session();
        $session->destroy();
        
        return redirect()->to('/admin/login');
    }
}