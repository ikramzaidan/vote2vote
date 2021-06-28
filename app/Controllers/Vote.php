<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\CandidateModel;

class Vote extends Controller
{
    public function index()
	{
		$session = session();
		$user    = new UserModel();
		$log     = $session->sess_log;
		$section = $session->sess_section;
		$ids     = $session->sess_id;

		$who     = $user->where('id', $ids)->first();

		if($log == 1){
			$data = [
				'bootstrap' => "assets/vendor/bootstrap",
                'vendor'    => "assets/vendor",
                'css'       => "assets/css",
                'js'        => "assets/js",
				'img'       => "assets/img",
				'yourname'  => $who['name']
			];
			if($section == 0){
				echo view('vote/first', $data);
				echo view('vote/footer');
			}elseif($section == 1){
				echo view('vote/third', $data);
				echo view('vote/footer');
			}elseif($section == 2){
				return view('vote/finish', $data);
			}
		}else{
			return redirect()->to('/login');
		}

	}

	function elect(){
		$session = session();
		$user      = new UserModel();
		$candidate = new CandidateModel();

		$log     = $session->sess_log;
		$section = $session->sess_section;

		if($log == 1){
			$idc       = $this->request->getVar('id');
			$idx       = $session->sess_id;

			$who       = $user->where('id', $idx)->first();
			$where     = $candidate->where('id', $idc)->first();

			$voter     = $where['voter'];
			$update    = [
				'id'    => $idc,
				'voter' => $voter+1
			];

			if($section != 2){
				if($section == 0){
					$data = [
						'id'      => $who['id'],
						'section' => '1'
					];
					$updTSess = [
						'sess_section' => '1'
					];
				}elseif($section == 1){
					$data = [
						'id'      => $who['id'],
						'section' => '2'
					];
					$updTSess = [
						'sess_section' => '2'
					];
				}
				if($candidate->save($update) && $user->save($data)){
					$session->set($updTSess);
					return redirect()->to('/vote');
				}else{
					echo "Gagal memilih!";
				}
			}else{
				redirect()->to('home');
			}
		}else{
			return redirect()->to('/login');
		}
	}

	function electd(){
		$session = session();
		$user      = new UserModel();
		$candidate = new CandidateModel();

		$log     = $session->sess_log;
		$section = $session->sess_section;
		if($log==1){
			$idx       = $session->sess_id;
			$who       = $user->where('id', $idx)->first();

			$db = \Config\Database::connect();
			$idq     = $this->request->getPost('id');

			if(!isset($idq)){
				$session->setFlashdata('msg','Kamu belum memilih kandidat!');
				return redirect()->to('/vote');
			}
			$ids = join(",",$idq);
			$query = $db->query("SELECT * FROM candidates WHERE id IN ($ids)");
			foreach($query->getResult() as $row){
				$vte = $row->voter;
				$idn = $row->id;

				$candidate->where('id', $idn)->set(['voter' => $vte+1])->update();
			}
			if($section != 2){
				if($section == 0){
					$data = [
						'id'      => $who['id'],
						'section' => '1'
					];
					$updTSess = [
						'sess_section' => '1'
					];
				}elseif($section == 1){
					$data = [
						'id'      => $who['id'],
						'section' => '2'
					];
					$updTSess = [
						'sess_section' => '2'
					];
				}
			}else{
				redirect()->to('/home');
			}
			if($user->save($data)){
				$session->set($updTSess);
				return redirect()->to('/vote');
			}else{
				$session->setFlashdata('msg','Kamu belum memilih kandidat!');
				return redirect()->to('/vote');
			}
		}
	}

	function tes(){
		$session = session();
		$data = [
			'bootstrap' => "assets/vendor/bootstrap",
			'vendor'    => "assets/vendor",
			'css'       => "assets/css",
			'js'        => "assets/js",
			'img'       => "assets/img"
		];

		return view('vote/third', $data);
	}
}