# Laravel SQLite Disable Drop Foreign

Prevents dropForeign method from being called on sqlite databases

## Installation 
You can install the package via composer:

```bash
composer require esign/laravel-sqlite-disable-drop-foreign
```

## Usage

If you want to define the database connections on which the dropForeign method should be skipped, you could publish the config file:

```bash
php artisan vendor:publish --provider="Esign\\SQLiteDisableDropForeign\\SQLiteDisableDropForeignServiceProvider"
```