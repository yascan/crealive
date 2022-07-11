<div class="form-check">
    <input class="form-check-input" type="checkbox" value="{{$child_category->id}}" id="categories{{$child_category->id}}" name="categories[]">
    <label class="form-check-label" for="categories{{$child_category->id}}">
        {{$child_category->name}}
    </label>
</div>
@if ($child_category->categories)
        @foreach ($child_category->categories as $childCategory)
            @includeIf('admin.article.child_category', ['child_category' => $childCategory])
        @endforeach
@endif
