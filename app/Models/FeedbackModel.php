<?php namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table = 'feedback';
    protected $allowedFields = ['id','id_user','name','rate','critic','advise','posted_at'];
}

?>