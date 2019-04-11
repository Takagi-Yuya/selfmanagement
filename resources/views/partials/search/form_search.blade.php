<form id="form1" action="{{ action('Admin\SearchController@search') }}" method="get" class="form-inline">
  <div class="form-group">
    <input id="sbox1" type="text" name="keyword" value="{{ $keyword }}" placeholder="キーワードを入力">
    <button id="sbtn1" type="submit"><i class="fas fa-search"></i></button>
  </div>
</form>
