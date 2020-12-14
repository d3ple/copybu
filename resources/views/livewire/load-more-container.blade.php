<div class="mb-4">
    @foreach ($posts as $post)
        <div class="mb-12">
            <livewire:post-card short :post="$post">
        </div>
    @endforeach

    @if($posts->hasMorePages())
        <livewire:load-more-button :page="$page" :perPage="$perPage" />
    @endif
</div>