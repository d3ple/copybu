<div class="flex">
    <button class="text-green-400" wire:click="$emit('plusPressed')">▲</button>
    <span class="px-2">
        {{ $rating }}
    </span>
    <button class="text-red-400" wire:click="$emit('minusPressed')">▼</button>
</div>