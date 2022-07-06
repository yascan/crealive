<li class="categoryList">
    {{ $child_category->name }}
    <a class="float-end btn-delete" href="{{route('admin.category.delete', $child_category->id)}}">Sil</a>
    <a class="float-end btn-update" href="{{route('admin.category.edit', $child_category->id)}}">Düzenle</a>
</li>
@if ($child_category->categories)
    <ul class="">
        @foreach ($child_category->categories as $childCategory)
            @includeIf('admin.category.child_category', ['child_category' => $childCategory])
        @endforeach
    </ul>
@endif
