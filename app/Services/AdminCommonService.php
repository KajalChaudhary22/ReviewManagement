<?php

namespace App\Services;
class AdminCommonService
{
    public static function showStatus($status): string
    {
        // $status = ucfirst(strtolower($status));
        // dd($status);
        switch ($status) {
            case 'Active':
                return '<span class="status-badge status-active">'.$status.'</span>';
            case 'In Progress':
                return '<span class="status in-progress">'.$status.'</span>';
            case 'Pending':
                return '<span class="status-badge status-pending">'.$status.'</span>';
            case 'Success':
            case 'Completed':
                return '<span class="status completed">'.$status.'</span>';
            case 'Suspended':
                return '<span class="status-badge status-suspended">'.$status.'</span>';
            case 'Inactive':
                return '<span class="status inactive">'.$status.'</span>';
            case '':
                    return '<span class="status pending">'.$status.'</span>';
            default:
                return '<span class="status pending">'.$status.'</span>';
        }
    }
}