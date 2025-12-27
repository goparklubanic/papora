<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ccd_desc extends Model
{
    // table name ccd_descs, primary key master_id, autoincrement off
    protected $table = 'ccd_descs';
    protected $primaryKey = 'master_id';
    public $incrementing = false;
    protected $guarded = [];
    protected $keyType = 'string';

    // Relationship
    // Ccd_decs has many Ccd_indicators, ccd_indicators foreign key master_id
    public function indicators()
    {
        return $this->hasMany(Ccd_indicator::class, 'master_id');
    }

    // Ccd_descs has many Ccd_budgets, ccd_budgets foreign key master_id
    public function budgets()
    {
        return $this->hasMany(Ccd_budget::class, 'master_id');
    }

    // Ccd_descs has many Ccd_ikus, ccd_ikus foreign key ccd_desc_id

}
