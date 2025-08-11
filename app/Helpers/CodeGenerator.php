<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class CodeGenerator
{
    /**
     * Generate a formatted unique code for any model/table.
     *
     * @param string $prefix Prefix like 'USR', 'ADM', etc.
     * @param string $table DB table name
     * @param string $column Column name where code is stored
     * @param int $length Length of the number part (e.g., 6 = 000001)
     * @param string $separator Separator between prefix and number (default '-')
     * @return string
     */
    public static function generate(string $prefix, string $table, string $column, int $length = 6, string $separator = '-'): string
    {
        $latest = DB::table($table)
            ->where($column, 'LIKE', "$prefix$separator%")
            ->orderBy($column, 'desc')
            ->value($column);

        if ($latest) {
            // Extract numeric part after prefix and separator
            $number = (int) substr($latest, strlen($prefix) + strlen($separator));
            $number++;
        } else {
            $number = 1;
        }

        return $prefix . $separator . str_pad($number, $length, '0', STR_PAD_LEFT);
    }
}
