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
    // public static function generate(string $prefix, string $table, string $column, int $length = 6, string $separator = '-'): string
    // {
    //     $latest = DB::table($table)
    //         ->where($column, 'LIKE', "$prefix$separator%")
    //         ->orderBy($column, 'desc')
    //         ->value($column);

    //     if ($latest) {
    //         // Extract numeric part after prefix and separator
    //         $number = (int) substr($latest, strlen($prefix) + strlen($separator));
    //         $number++;
    //     } else {
    //         $number = 1;
    //     }

    //     return $prefix . $separator . str_pad($number, $length, '0', STR_PAD_LEFT);
    // }
    public static function generate(string $table, string $column): string
{
    // Config based on table + column
    $config = [
        'users.code' => ['prefix' => 'USR', 'length' => 10, 'separator' => '-'],
        'businesses.code' => ['prefix' => 'BSNS', 'length' => 8, 'separator' => '-'],
        'customers.code' => ['prefix' => 'CUST', 'length' => 8, 'separator' => '-'],
        'products.code' => ['prefix' => 'PRDCT', 'length' => 8, 'separator' => '-'],
        'services.code' => ['prefix' => 'PRDCT', 'length' => 8, 'separator' => '-'],
    ];

    $key = "$table.$column";

    if (!isset($config[$key])) {
        throw new \InvalidArgumentException("No code config found for {$table}.{$column}");
    }

    $prefix    = $config[$key]['prefix'];
    $length    = $config[$key]['length'];
    $separator = $config[$key]['separator'];

    // Get latest
    $latest = DB::table($table)
        ->where($column, 'LIKE', "$prefix$separator%")
        ->orderBy($column, 'desc')
        ->value($column);

    if ($latest) {
        $number = (int) substr($latest, strlen($prefix) + strlen($separator));
        $number++;
    } else {
        $number = 1;
    }

    return $prefix . $separator . str_pad($number, $length, '0', STR_PAD_LEFT);
}
}
