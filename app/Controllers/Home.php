<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\CandidateModel;
use App\Models\FeedbackModel;

class Home extends Controller
{
	public function index()
	{
		$session = session();
		$model   = new UserModel();
		$log     = $session->sess_log;
		$who     = $session->sess_id;
		if($log == 1){
			$user    = $model->where('id', $who)->first();
			$data    = 
			[
				'bootstrap' => "assets/vendor/bootstrap",
				'css'       => "assets/css",
				'vendor'    => "assets/vendor",
				'usrn'      => $user['username'],
				'log'       => $log,
				'section'   => $user['section']
			];

			return view('home/home', $data);
		}elseif($log == 0){
			$data    = 
			[
				'bootstrap' => "assets/vendor/bootstrap",
				'css'       => "assets/css",
				'vendor'    => "assets/vendor",
				'log'       => $log,
				'section'   => $session->sess_section
			];

			return view('home/home', $data);
		}elseif($log == 2){
			return redirect()->to('/admin');
		}
	}

	public function stat()
	{	
		$session = session();
		$model   = new UserModel();
		$log     = $session->sess_log;
		$who     = $session->sess_id;
		if($log == 1){
			$user    = $model->where('id', $who)->first();
			$data    = 
			[
				'bootstrap' => "assets/vendor/bootstrap",
				'css'       => "assets/css",
				'vendor'    => "assets/vendor",
				'usrn'      => $user['username'],
				'section'   => $user['section'],
				'log'       => $log,
				'session'   => $session
			];
			return view('home/stats',$data);
		}elseif($log == 0){
			return redirect()->to('/');
		}elseif($log == 2){
			return redirect()->to('/admin');
		}
	}

	public function feedback()
	{
		$session = session();
		$model   = new UserModel();
		$log     = $session->sess_log;
		$who     = $session->sess_id;
		if($log == 1){
			$user    = $model->where('id', $who)->first();
			$data    = 
			[
				'bootstrap' => "assets/vendor/bootstrap",
				'css'       => "assets/css",
				'vendor'    => "assets/vendor",
				'usrn'      => $user['username'],
				'name'      => $user['name'],
				'feed'      => $user['feed'],
				'log'       => $log,
				'section'   => $user['section'],
				'session'   => $session
			];

			return view('home/feedback', $data);
		}elseif($log == 0){
			return redirect()->to('/');
		}elseif($log == 2){
			return redirect()->to('/admin');
		}
	}

	function psFeedback()
	{
		$session = session();
		$model   = new FeedbackModel();
		$log     = $session->sess_log;
		$who     = $session->sess_id;
		if($log == 1){
			if(isset($ids)||isset($nme)||isset($rat)){				
				$ids = $this->request->getVar('usrid');
				$nme = $this->request->getPost('name');
				$rat = $this->request->getPost('rate');
				$adv = $this->request->getVar('advise');
				$crt = $this->request->getVar('critic');
				$field = [
					'id_user' => $ids,
					'name'    => $nme,
					'rate'    => $rat,
					'critic'  => $crt,
					'advise'  => $adv
				];
				$model->save($field);
				$session->setFlashdata('msg-1','Terima Kasih. Feedback berhasil dikirim.');
                return redirect()->to('/home/feedback');
			}else{
				$session->setFlashdata('msg-0','Harap isi semua kolom!');
                return redirect()->to('/home/feedback');
			}
		}elseif($log == 0){
			return redirect()->to('/');
		}elseif($log == 2){
			return redirect()->to('/admin');
		}
	}

	public function profile()
	{
		$session = session();
		$model   = new UserModel();
		$log     = $session->sess_log;
		$who     = $session->sess_id;
		if($log == 1){
			$user    = $model->where('id', $who)->first();
			$data    = 
			[
				'bootstrap' => "assets/vendor/bootstrap",
				'css'       => "assets/css",
				'vendor'    => "assets/vendor",
				'usrn'      => $user['username'],
				'name'      => $user['name'],
				'feed'      => $user['feed'],
				'section'   => $user['section'],
				'desc'      => $user['desc'],
				'log'       => $log,
				'session'   => $session
			];

			return view('home/profile', $data);
		}elseif($log == 0){
			return redirect()->to('/');
		}elseif($log == 2){
			return redirect()->to('/admin');
		}
	}
	
	public function candidate()
	{
		$session = session();
		$model   = new UserModel();
		$log     = $session->sess_log;
		$who     = $session->sess_id;
		if($log == 1){
			$user    = $model->where('id', $who)->first();
			$data    = 
			[
				'bootstrap' => "assets/vendor/bootstrap",
				'css'       => "assets/css",
				'vendor'    => "assets/vendor",
				'usrn'      => $user['username'],
				'section'   => $user['section'],
				'log'       => $log,
				'session'   => $session
			];

			return view('home/candidate', $data);
		}elseif($log == 0){
			return redirect()->to('/');
		}elseif($log == 2){
			return redirect()->to('/admin');
		}
	}

	public function listCandidate()
	{
		$session = session();
		$model   = new UserModel();
		$log     = $session->sess_log;
		$who     = $session->sess_id;
		if($log == 1){
			$user    = $model->where('id', $who)->first();
			$data    = 
			[
				'bootstrap' => "assets/vendor/bootstrap",
				'css'       => "assets/css",
				'vendor'    => "assets/vendor",
				'usrn'      => $user['username'],
				'section'   => $user['section'],
				'log'       => $log,
				'session'   => $session
			];

			return view('home/listCandidate', $data);
		}elseif($log == 0){
			return redirect()->to('/');
		}elseif($log == 2){
			return redirect()->to('/admin');
		}
	}
}
