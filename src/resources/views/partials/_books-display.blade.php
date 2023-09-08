@unless (count($books) == 0)
    <table>
        <tr>
            <th>@sortablelink('title', 'Title')</th>
            <th>@sortablelink('author', 'Author')</th>
            <th>Delete</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td><a href="/books/author/{{ $book->author }}">{{ $book->author }}</a></td>
                <td class="deleteButton"><a href="/books/delete/{{ $book->id }}">X</a></td>
            <tr>
        @endforeach
    </table>
    <div class="pagination">
        {!! $books->appends(\Request::except('page'))->render() !!}
    </div>
    <h2>Export Data</h2>
    @include('partials._export-form')
@else
    <h2>No Books Found</h2>
@endunless
