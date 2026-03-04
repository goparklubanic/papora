<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property string $budget_hash
 * @property int $master_ik
 * @property numeric|null $t1
 * @property numeric|null $t2
 * @property numeric|null $t3
 * @property numeric|null $t4
 * @property numeric|null $t5
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Ccd_desc|null $deskripsi
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_budget newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_budget newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_budget query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_budget whereBudgetHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_budget whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_budget whereMasterIk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_budget whereT1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_budget whereT2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_budget whereT3($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_budget whereT4($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_budget whereT5($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_budget whereUpdatedAt($value)
 */
	class Ccd_budget extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $tahun
 * @property string $master_id
 * @property string $tj_id
 * @property string $ss_id
 * @property string $pg_id
 * @property string $kg_id
 * @property string $sk_id
 * @property string $deskripsi_1
 * @property string $deskripsi_2
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ccd_budget> $budgets
 * @property-read int|null $budgets_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ccd_indicator> $indicators
 * @property-read int|null $indicators_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_desc newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_desc newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_desc query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_desc whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_desc whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_desc whereDeskripsi1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_desc whereDeskripsi2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_desc whereKgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_desc whereMasterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_desc wherePgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_desc whereSkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_desc whereSsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_desc whereTahun($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_desc whereTjId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_desc whereUpdatedAt($value)
 */
	class Ccd_desc extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $master_ik
 * @property string $master_id
 * @property string $ik_id
 * @property string $indikator
 * @property string $satuan
 * @property string|null $baseline
 * @property float|null $t1
 * @property float|null $t2
 * @property float|null $t3
 * @property float|null $t4
 * @property float|null $t5
 * @property string|null $iku_alasan
 * @property string|null $iku_formulasi
 * @property string|null $iku_tipehitung
 * @property string|null $iku_do
 * @property string|null $iku_sumberdata
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Ccd_desc|null $deskripsi
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator whereBaseline($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator whereIkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator whereIkuAlasan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator whereIkuDo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator whereIkuFormulasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator whereIkuSumberdata($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator whereIkuTipehitung($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator whereIndikator($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator whereMasterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator whereMasterIk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator whereSatuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator whereT1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator whereT2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator whereT3($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator whereT4($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator whereT5($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ccd_indicator whereUpdatedAt($value)
 */
	class Ccd_indicator extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $role
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

