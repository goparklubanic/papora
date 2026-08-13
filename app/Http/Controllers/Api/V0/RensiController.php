<?php

namespace App\Http\Controllers\Api\V0;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class RensiController extends Controller
{
    public function rensi(): JsonResponse
    {
        $sql = "SELECT
            master_id,
            CASE
                WHEN tj_id != '00' AND ss_id = '00' AND pg_id = '00' AND kg_id = '00' AND sk_id = '00' THEN 'Tujuan'
                WHEN tj_id != '00' AND ss_id != '00' AND pg_id = '00' AND kg_id = '00' AND sk_id = '00' THEN 'Sasaran'
                WHEN tj_id != '00' AND ss_id != '00' AND pg_id != '00' AND kg_id = '00' AND sk_id = '00' THEN 'Program'
                WHEN tj_id != '00' AND ss_id != '00' AND pg_id != '00' AND kg_id != '00' AND sk_id = '00' THEN 'Kegiatan'
                WHEN tj_id != '00' AND ss_id != '00' AND pg_id != '00' AND kg_id != '00' AND sk_id != '00' THEN 'Sub Kegiatan'
            END AS kategori,
            deskripsi_1 AS deskripsi
        FROM ccd_descs";
        

        $rows = DB::select($sql);
        return response()->json([
            'success' => true,
            'data'    => $rows,
        ]);
    }
    public function hierarchy(): JsonResponse
    {
        $sql = <<<SQL
        WITH RECURSIVE tree AS (
            SELECT
                master_id,
                deskripsi_1,
                tj_id, ss_id, pg_id, kg_id, sk_id,
                CASE
                    WHEN sk_id != '00' THEN tj_id||'-'||ss_id||'-'||pg_id||'-'||kg_id||'-00'
                    WHEN kg_id != '00' THEN tj_id||'-'||ss_id||'-'||pg_id||'-00-00'
                    WHEN pg_id != '00' THEN tj_id||'-'||ss_id||'-00-00-00'
                    WHEN ss_id != '00' THEN tj_id||'-00-00-00-00'
                    ELSE NULL
                END AS parent_id
            FROM ccd_descs
        ),
        hierarchy AS (
            SELECT
                master_id, deskripsi_1, parent_id, 0 AS level
            FROM tree
            WHERE parent_id IS NULL

            UNION ALL

            SELECT
                t.master_id, t.deskripsi_1, t.parent_id, h.level + 1
            FROM tree t
            JOIN hierarchy h ON t.parent_id = h.master_id
        )
        SELECT
            master_id,
            parent_id,
            level,
            CASE level
                WHEN 0 THEN 'Tujuan'
                WHEN 1 THEN 'Sasaran'
                WHEN 2 THEN 'Program'
                WHEN 3 THEN 'Kegiatan'
                WHEN 4 THEN 'Sub Kegiatan'
            END AS level_label,
            deskripsi_1
        FROM hierarchy
        ORDER BY master_id
        SQL;

        $rows = collect(DB::select($sql));

        $tree = $this->buildTree($rows);

        return response()->json([
            'success' => true,
            'data'    => $tree,
        ]);
    }

    /**
     * Convert flat rows (each with master_id + parent_id) into a nested tree.
     */
    private function buildTree($rows, $parentId = null)
    {
        return $rows
            ->filter(fn ($row) => $row->parent_id === $parentId)
            ->map(function ($row) use ($rows) {
                return [
                    'master_id'   => $row->master_id,
                    'level'       => $row->level,
                    'level_label' => $row->level_label,
                    'deskripsi_1' => $row->deskripsi_1,
                    'children'    => $this->buildTree($rows, $row->master_id),
                ];
            })
            ->values();
    }

}
