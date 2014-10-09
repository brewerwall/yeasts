## Yeasts
The yeast repository that can be found at brewerwall.com/api/v1/yeasts.

## Updating Yeasts
If you would like to update yeasts, update `yeasts_master.json`.  Once the file has been updated run:
```php
php generate_formats.php
```

This command will generate a CSV and MYSQL file, along with copying over the master file to another json file.
