<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Signup extends Controller
{
    public function index()
    {
        $data = array(
            'bootstrap' => "assets/vendor/bootstrap",
            'css' => "assets/css"
        );

        return view('home/signup', $data);
    }

    public function new()
    {
        $model = new UserModel();
        
        $field = [
            'name' => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password')
        ];

        if($model->save($field))
        {
            return redirect()->to('/login');
        }else
        {
            return redirect()->to('/');
        }
    }
} 