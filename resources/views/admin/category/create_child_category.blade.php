<option class="ms-3" {{$singleCategory->id == $child_category->id ? "selected" : ""}} value="{{ $child_category->id }}">{{ $child_category->name }}</option>
@if ($child_category->categories)
        @foreach ($child_category->categories as $childCategory)
            @includeIf('admin.category.create_child_category', ['child_category' => $childCategory])
        @endforeach
@endif
