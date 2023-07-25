<?php
namespace App\Models;

use CodeIgniter\Model;

class Indiv extends Model
{
    protected $table = 'indiv_students';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['students_id','term','session','class','paid','balance','present','absent','comment'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}


