<div class="flex">
    <button class="text-green-400" wire:click.self="$emit('plusPressed')">▲</button>
    <span class="px-2">
        {{ $rating }}
    </span>
    <button class="text-red-400" wire:click.self="$emit('minusPressed')">▼</button>
</div>