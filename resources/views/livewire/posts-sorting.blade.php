<div class="bg-green-100 mb-5 p-4 rounded">
    <label for="sorting">Сортировать по: </label>

    <select name="sorting" id="sorting">
        <option wire:click="$emit('sortTypeClicked', 'date')" value="date">дате добавления</option>
        <option wire:click="$emit('sortTypeClicked', 'max-rating')" value="max-rating">рейтингу от максимального</option>
        <option wire:click="$emit('sortTypeClicked', 'min-rating')" value="min-rating">рейтингу от минимального</option>
    </select>
</div>
