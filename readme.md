This Package developed based on this article [Visit]([https://www.google.com](https://filamentphp.com/content/leandrocfe-navigating-filament-pages-with-previous-and-next-buttons)]

# Navigation Buttons

**Navigation Buttons** is a simple Laravel package for adding "Previous" and "Next" navigation buttons to Filament resource pages, allowing users to navigate between records easily.

## Features

- Adds "Previous" and "Next" buttons on Filament resource pages.
- Handles navigation across records in a user-friendly manner.
- Provides notifications if no previous or next records are available.

## Requirements

- **Laravel**: ^9.x or ^10.x
- **PHP**: ^8.0
- **Filament**: ^3.0

## Installation

1. **Install the package via Composer:**

   Run the following command in your terminal to install the package:

   ```bash
   composer require hayder/navigation-buttons
   ```

2. **Publish the configuration file (optional):**

   If you wish to customize the package configuration (such as order column or direction), you can publish the configuration file:

   ```bash
   php artisan vendor:publish --tag="navigation-buttons-config"
   ```

   This will create a configuration file at `config/navigation-buttons.php` where you can define your custom settings.

3. **Publish the Translation Files (Optional):**

   If you want to customize the button labels or other translation strings, publish the translation files:

   ```bash
   php artisan vendor:publish --tag="navigation-buttons-translations"
   ```

### Usage

#### Apply the `HasNavigationButtons` Trait to Your Filament Resource Page:

In the `EditRecord` or any other Filament resource page, apply the `HasNavigationButtons` trait:

```php
namespace App\Filament\Resources\SomeResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\SomeResource;
use Hayder\NavigationButtons\Traits\HasNavigationButtons;
use Hayder\NavigationButtons\Actions\GoToPreviousRecordAction;
use Hayder\NavigationButtons\Traits\HasNavigationButtons;


class EditPage extends EditRecord
{
    use HasNavigationButtons;

    protected static string $resource = SomeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ...

            GoToPreviousRecordAction::make(),
            GoToNextRecordAction::make(),
        ]
    }
}
```

The trait will automatically add the "Previous" and "Next" buttons to the resource page header.

#### Notifications for Navigation:

The package will show a notification if no previous or next record is available.

Example of a notification when there's no next record:

```php
Notification::make()
->title('No next record found')
->danger()
->body('You are already at the last record.')
->send();
```

#### Configuration

The package comes with a configuration file that allows you to customize the following:

`order_column` : The column used to order records for navigation.
`order_direction` : The direction for ordering records (either asc or desc).
To modify these settings, publish the configuration file and update the values in `config/navigation-buttons.php`.

#### Customization

If you wish to customize the labels for the buttons, you can modify the translation files after publishing them.

```php
return [
    'previous' => 'Previous Record',
    'next' => 'Next Record',
];
```

### License

This package is open-source software licensed under the MIT license.
