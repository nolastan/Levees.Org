<div class="book_panel">
This panel contains information
for displaying the book
  <label>Author</label>
  <!-- The php checks if there is existing
       data to pre-fill the input fields -->
  <input type="text" name="author" value="<?php
    if(!empty($author)) echo $author;
  ?>"/>
  <label>ISBN</label>
  <!-- The php checks if there is
    existing data to pre-fill the input fields -->
  <input type="text" name="isbn" value="<?php
    if(!empty($isbn)) echo $isbn;
  ?>"/>
</div>