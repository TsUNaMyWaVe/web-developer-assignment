<div class="action-buttons">
    <a class="action-buttons" href="/books/add">Add a Book</a>
    @if(isset($author))
    <a class="action-buttons" href="/books/author/{{ $author }}/edit">Edit Author</a>
    @endif
</div>
