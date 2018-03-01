ALTER TABLE tbl_user
ADD user_new BOOLEAN;
UPDATE tbl_user
set user_new=false;

ALTER TABLE tbl_user
ADD user_createdAt TIMESTAMP;
UPDATE tbl_user
SET user_createdAt=NOW();

SELECT * FROM tbl_user;
