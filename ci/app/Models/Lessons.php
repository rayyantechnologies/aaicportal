<?php
namespace App\Models;

use CodeIgniter\Model;

class Lessons extends Model
{
    protected $table = 'lesson_plans';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['class','term','subject','week','duration','periods','topic','t_aid','ref_bk','objectives','content','evaluation','presentation'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}


