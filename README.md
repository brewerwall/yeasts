# Yeasts
The yeast repository that can be found at brewerwall.com/api/v1/yeasts. Feel free to fork and use however.  If you see a mistake or would like to add any missing yeasts, submit a pull request with the modifications/additions.

## Updating Yeasts
If you would like to update yeasts, update `yeasts_master.json`.  Once the file has been updated run:
```bash
./generate
```

This command will generate a CSV and MYSQL file, along with copying over the master JSON file to another json file.  This is merely a bash script that calls a php file, so you must have php available.
