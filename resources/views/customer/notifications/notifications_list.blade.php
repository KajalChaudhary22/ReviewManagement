@forelse ( $allNotifications as $notification )
<div class="p-4 hover:bg-gray-50 cursor-pointer notification-item">
    <div class="flex items-start">
        <div class="p-2 rounded-full bg-blue-100 text-blue-600 mr-4">
            {!! \App\Helpers\Helpers::showNotificationType($notification?->type) !!}
        </div>
        <div class="flex-1">
            <h4 class="font-medium">{{ $notification?->title }}</h4>
            <p class="text-gray-600">{{ $notification?->message }}</p>
            <p class="text-sm text-gray-500 mt-1">{{ \App\Helpers\Helpers::showTimeAgo($notification?->created_at) }}</p>
        </div>
        <button class="text-gray-400 hover:text-gray-600 remove-notification">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>
@empty
<p class="p-4 text-center text-gray-500">No notifications</p> 
@endforelse
   

