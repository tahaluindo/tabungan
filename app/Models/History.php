<?php

namespace App\Models;

use CodeIgniter\Model;

class History extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'history';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = History::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_history', 'id_user', 'amount', 'jenis_transaksi', 'status', 'tanggal'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
