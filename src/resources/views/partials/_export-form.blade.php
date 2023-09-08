<div class="exportForm">
    <form class="exportForm" action="/export">
        <label for="format">Format</label>
        <select name="format">
            <option value="csv">CSV</option>
            <option value="xml">XML</option>
        </select>
        <label for="data">Data</label>
        <select name="data">
            <option value="full">Full (Titles and Authors)</option>
            <option value="title">Titles only</option>
            <option value="author">Authors only</option>
        </select>

        <input type="submit" value="Export">
    </form>
</div>
