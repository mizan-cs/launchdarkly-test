## Launchdarkly
Launchdarkly is a tool that we can use to controll a feature of function for a spesific user by its peremeter.

**Feature flags:**
To create a feature flag go to https://app.launchdarkly.com/default/test/features

then,

Create Flag > Enter name and details > Save Flag


**How to configure with code:**
1. Install the SDK
```
composer require launchdarkly/server-sdk
```
2. Then require Composer's autoloader:

This is require for row php. In Laravel it is not require.
```
require 'vendor/autoload.php';
```
3. Create a single instance of LDClient:
```
$client = new LaunchDarkly\LDClient("YOUR_SDK_KEY");
```
4. Initilize the user data which is going to make the request
```
$user = new LaunchDarkly\LDUser("example@domain.com");
```
5. Write the logic for user
```PHP
if ($client->variation("your.flag.key", $user)) {
    // application code to show the feature
} else {
    // the code to run if the feature is off
}
```


**User configuration:**

To set if user can acceess the feature or not you have to enter the user data. By default any user will get `false` when they will execute the request.
> * Go to "Feature flags > flag-name"
>
> * Select "Targeting" Tab
>
>* In "Target individual users" there are 2 section True and False
>
> * Add the email of the user who will execute into `False` condition of the feature or add into `True`.

Now if you run the code it will show the result accoring to the condition of LaunchDarkly flag.

Demo Project Link: https://github.com/mizan-cs/launchdarkly-test

**How to run demo project**

> * Clone the code
>
> * Install the dependency `composer install`
>
> * In .env enter the SDK Key to `LAUNCH_DARKLY_SDK_KEY` variable
>
> * php artisan migrate
>
> * create 2 user for test different feature
>
> * php artisan serve
>
> * Go to `http://127.0.0.1:8000/`
