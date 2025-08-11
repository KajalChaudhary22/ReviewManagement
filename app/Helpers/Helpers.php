<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Helpers
{
    public static function showStatus($status): string
    {
        $status = ucfirst(strtolower($status));
        // dd($status);
        switch ($status) {
            case 'Active':
                return '<span class="status-badge status-active">Active</span>';
            case 'Pending':
                return '<span class="status-badge status-pending">Pending</span>';
            case 'Suspended':
                return '<span class="status-badge status-suspended">Suspended</span>';
            case 'Inactive':
                return '<span class="status-badge status-inactive">Inactive</span>';
                case '':
                    return '<span class="status-badge status-pending">'.$status.'</span>';
            default:
                return '<span class="status-badge status-pending">Unknown</span>';
        }
    }
    
}