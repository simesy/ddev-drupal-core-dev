# ddev-core-dev

This is a DDEV addon for doing Drupal core development.

```
git clone https://git.drupalcode.org/project/drupal.git drupal
cd drupal
ddev config --project-type=drupal10
ddev start
ddev exec corepack enable
ddev get justafish/ddev-drupal-core-dev
ddev restart
ddev composer install

# See included commands
ddev drupal list

# Install drupal
ddev drupal install

# Verify some sample tests that require a working site
ddev phpunit core/tests/Drupal/FunctionalTests/Core
```

## Nightwatch Examples

You can watch Nightwatch running in real time at https://drupal.ddev.site:7900
for Chrome and https://drupal.ddev.site:7901 for Firefox. The password is
"secret". YMMV using Firefox as core tests don't currently run on it.

Only core tests
```
ddev nightwatch --tag core
```

Skip running core tests
```
ddev nightwatch --skiptags core
```

Run a single test
```
ddev nightwatch tests/Drupal/Nightwatch/Tests/exampleTest.js
```

a11y tests for both the admin and default themes
```
ddev nightwatch --tag a11y
```

a11y tests for the admin theme only
```
ddev nightwatch --tag a11y:admin
```

a11y tests for the default theme only
```
ddev nightwatch --tag a11y:default
```

a11y test for a custom theme used as the default theme
```
ddev nightwatch --tag a11y:default --defaultTheme bartik
```

a11y test for a custom admin theme
```
ddev nightwatch --tag a11y:admin --adminTheme seven
```
