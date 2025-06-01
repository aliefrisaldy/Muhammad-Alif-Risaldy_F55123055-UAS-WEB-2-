@props([
    'type' => 'success', 
    'message' => session($type) // default ambil dari session
])

@php
    $bgColor = $type === 'error' ? 'bg-red-500' : 'bg-green-500';
    $iconPath = $type === 'error'
        ? 'M6 18L18 6M6 6l12 12'
        : 'M9 12l2 2l4-4';
@endphp

<div 
    x-data="{
        show: false,
        message: @js($message),
        init() {
            if (this.message) {
                setTimeout(() => this.show = true, 150); 
                setTimeout(() => this.show = false, 3200);
            }
        }
    }" 
    class="relative"
>
    <template x-if="message">
        <div 
            x-show="show"
            x-transition:enter="transform transition ease-out duration-700"
            x-transition:enter-start="translate-x-full opacity-0"
            x-transition:enter-end="translate-x-0 opacity-100"
            x-transition:leave="transform transition ease-in duration-500"
            x-transition:leave-start="translate-x-0 opacity-100"
            x-transition:leave-end="translate-x-full opacity-0"
            x-cloak
            class="fixed top-4 right-6 {{ $bgColor }} text-white font-bold p-4 rounded-lg shadow-lg z-50 flex items-center space-x-3"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $iconPath }}" />
            </svg>
            <span x-text="message"></span>
        </div>
    </template>
</div>
