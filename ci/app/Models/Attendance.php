<?php
namespace App\Models;

use CodeIgniter\Model;

class Attendance extends Model
{
    protected $table = 'attendance';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['date','JS1','JS2','JS3'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}


