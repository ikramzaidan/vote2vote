<?php namespace App\Models;

use CodeIgniter\Model;

class CandidateModel extends Model
{
    protected $table = 'candidates';
    protected $allowedFields = ['id','name_1','name_2','type','voter','image','desc_1','desc_2'];
}

?>