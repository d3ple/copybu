<div class="bg-green-100 mb-5 p-4 rounded">
    <label for="sorting">Сортировать по: </label>

    <select class="" name="sorting" id="sorting">
        <option 
            onclick="window.location = window.location.origin + window.location.pathname + '?sort=date'" 
            value="date"
            {{ request()->query('sort') === 'date' ? 'selected=true' : '' }}
        >
            дате добавления
        </option>
        <option 
            onclick="window.location = window.location.origin + window.location.pathname + '?sort=max-rating'" 
            value="max-rating"
            {{ request()->query('sort') === 'max-rating' ? 'selected=true' : '' }}
        >
            рейтингу от максимального
        </option>
        <option 
            onclick="window.location = window.location.origin + window.location.pathname + '?sort=min-rating'" 
            value="min-rating"
            {{ request()->query('sort') === 'min-rating' ? 'selected=true' : '' }}
        >
            рейтингу от минимального
        </option>
    </select>
</div>
