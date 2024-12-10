<form action="/search" method="GET" class="searchbar">
    @csrf
    <input type="text" name="query" id="searchBar" placeholder="Search products...">
    <button type="submit"><span class="material-icons-sharp search-btn">search</span></button>
</form>
