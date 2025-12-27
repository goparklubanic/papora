<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ccd_indicator extends Model
{
    // table name ccd_indicators, primary key master_id, autoincrement off
    protected $table = 'ccd_indicators';
    protected $primaryKey = 'indicator_hash';
    public $incrementing = false;
    protected $guarded = [];
    protected $keyType = 'string';

    // Relationship
    // Ccd_indicators belongs to Ccd_descs, ccd_descs foreign key master_id
    public function deskripsi()
    {
        return $this->belongsTo(Ccd_desc::class, 'master_id');
    }
}
