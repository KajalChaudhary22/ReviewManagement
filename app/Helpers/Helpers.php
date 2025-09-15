<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class Helpers
{
    public static function showStatus($status): string
    {
        // $status = ucfirst(strtolower($status));
        // dd($status);
        switch ($status) {
            case 'Active':
            case 'In Progress':
                return '<span class="status in-progress">'.$status.'</span>';
            case 'Pending':
                return '<span class="status pending">'.$status.'</span>';
            case 'Success':
            case 'Completed':
                return '<span class="status completed">'.$status.'</span>';
            case 'Suspended':
                return '<span class="status suspended">'.$status.'</span>';
            case 'Inactive':
                return '<span class="status inactive">'.$status.'</span>';
            case '':
                    return '<span class="status pending">'.$status.'</span>';
            default:
                return '<span class="status pending">'.$status.'</span>';
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
    public static function showTimeAgo($datetime)
    {
        if (!$datetime) {
            return '';
        }

        return Carbon::parse($datetime)->diffForHumans();
    }
    public static function showNotificationType($type)
    {
        switch ($type) {
            case 'msg':
                return '<i class="fas fa-envelope"></i>';
            case 'star':
                return '<i class="fas fa-star"></i>';
            case 'success':
                return '<i class="fas fa-check-circle"></i>';
            case 'pending':
                return '<i class="fas fa-exclamation-circle"></i>';
            default:
                return '<i class="fas fa-exclamation-circle"></i>';
        }
    }
    
}