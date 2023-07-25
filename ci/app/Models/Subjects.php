<?php
namespace App\Models;

use CodeIgniter\Model;

class Subjects extends Model
{
    protected $table = 'subjects';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['subject','subject_code'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}


