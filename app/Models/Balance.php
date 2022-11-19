<?php

namespace App\Models;

use CodeIgniter\Model;

class Balance extends Model
{

    protected $table            = 'account_balance';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Balance::class;
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['id_user', 'balance'];


	// Dates
	protected $useTimestamps = true;
	protected $dateFormat    = 'datetime';
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
}
