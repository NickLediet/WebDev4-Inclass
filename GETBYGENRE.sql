SELECT mov.*, g.genre_name  FROM tbl_movies mov
  JOIN tbl_mov_genre mg ON mov.movies_id = mg.movies_id
  JOIN tbl_genre g ON mg.genre_id = g.genre_id
  WHERE g.genre_name = "action";

/* THIS IS THE QUERY TO GET OUR GENRES WITH NAMES */
SELECT 
  mov.*,
  GROUP_CONCAT(DISTINCT g.genre_name) genre
  FROM 
    tbl_mov_genre mg
    JOIN tbl_movies mov ON mov.movies_id = mg.movies_id
    JOIN tbl_genre g ON mg.genre_id = g.genre_id
  GROUP BY 
    mov.movies_id;