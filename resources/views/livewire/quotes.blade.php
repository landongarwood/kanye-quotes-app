<div wire:poll.60000ms="fetchQuotes" wire:init="fetchQuotes">
    <div class="flex justify-center my-2">
        <button
            wire:click="fetchQuotes"
            wire:loading.attr="disabled"
            class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600 transition"
        >
            <span wire:loading.remove>Refresh Quotes</span>
            <span wire:loading>Refreshing...</span>
        </button>
    </div>

    <div class="p-4 space-y-3">
        @if (empty($quotes))
            <p class="text-gray-500">Loading quotes...</p>
        @else
            <ul class="pl-5">
                @foreach ($quotes as $quote)
                    <li class="text-gray-700 text-md py-2">{{ $quote }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
