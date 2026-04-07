Setup instructions for PHP + MySQL backend

1. Place the `php` folder inside your web server document root for the `portfolio` site (already placed in this workspace).
2. Edit `db.php` and set `$user`, `$pass`, `$host`, `$db` to match your MySQL credentials.
3. Import the SQL schema into MySQL:

   mysql -u root -p < schema.sql

4. Run a local PHP server for quick testing (from the `portfolio` folder):

   php -S localhost:8000

5. Open `http://localhost:8000/contact.html` and submit the form. The form is wired to `php/save_contact.php`.

6. If using Apache/XAMPP, ensure PHP is enabled and MySQL is running. Place the `portfolio` folder inside `htdocs` (on Windows with XAMPP).

7. Troubleshooting:
   - Check web server error logs for PHP errors.
   - Make sure the database `portfolio_db` exists and credentials in `db.php` are correct.
