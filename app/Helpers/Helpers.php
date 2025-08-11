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
    public static function statusActionButton($id, string $status = 'Pending'): string
    {
        $idEncrypted = custom_encrypt($id);
        $status = ucfirst(strtolower($status));

        switch ($status) {
            case 'Active':
                return '<button class="action-btn status" data-id="'.$idEncrypted.'" data-status="Suspended">
                            <i class="fa fa-trash"></i> Suspend
                        </button>';
            case 'Suspended':
                return '<button class="action-btn status" data-id="'.$idEncrypted.'" data-status="Active">
                            <i class="fa fa-check"></i> Activate
                        </button>';
            case 'Pending':
                return '<button class="action-btn status" data-id="'.$idEncrypted.'" data-status="Rejected">
                            <i class="fa fa-times"></i> Reject
                        </button>';
            default:
                return '';
        }
    }
    
}