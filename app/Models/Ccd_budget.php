<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ccd_budget extends Model
{
    // table name ccd_descs, primary key master_id, autoincrement off
    protected $table = 'ccd_budgets';
    protected $primaryKey = 'budget_hash';
    public $incrementing = false;
    protected $guarded = [];

    // Relationship
    // Ccd_budgets belongs to Ccd_descs, ccd_descs foreign key master_id
    public function deskripsi()
    {
        return $this->belongsTo(Ccd_desc::class, 'master_id');
    }
}
