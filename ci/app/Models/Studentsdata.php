<?php
namespace App\Models;

use CodeIgniter\Model;

class Studentsdata extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['adm','fname','lname','phone','class','dob'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
