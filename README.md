# Rapidez demo-helper

This package contains some of the code used specifically for https://demo.rapidez.io

It includes a middleware that sets specific configuration values based on the user's session.

## Installation

```
composer config repositories.demo-helper vcs https://github.com/rapidez/demo-helper.git
composer require rapidez/demo-helper
```

## Views

You can publish the views with:
```
php artisan vendor:publish --tag=rapidez-demo-helper-views
```

## License

GNU General Public License v3. Please see [License File](LICENSE) for more information.
