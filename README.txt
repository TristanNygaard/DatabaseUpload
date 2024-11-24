Tristan Nygaard - 23.11.2024

This was a simple project where the user draws a picture, gives it a title, then it is uploaded to a database. For now, I have only tested it on a local host utilizing XAMPP. This project is just the grounds for what will actually be a core part of my upcoming personal website (which is still in the works). It will involve basically the same steps, just not hosted locally. 

Using phpMyAdmin, I was able to confirm that the drawing and upload system works - the output file is not yet utilized but will be on completed version.

To test it yourself you can use XAMPP or any other local hosting app - I like this once since you can activate Apache and MySQL right in the control panel.

To create the database in order to store the photo contents (unless you just use a folder?), the SQL code is below:
CREATE TABLE uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

For any questions or anything, feel free to reach me at tnygaard@u.rochester.edu