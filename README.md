# DDEV Drupal Core Development plugin

I maintain this fork of [justafish/ddev-drupal-core-dev](https://github.com/justafish/ddev-drupal-core-dev)
for my own tinkering. I have diverged parts of it from the upstream so don't use this
unless someone asks you to.

I keep the [upstream branch](https://github.com/simesy/ddev-drupal-core-dev/tree/upstream) aligned with
the upstream along with anything I'm trying to get merged upstream.

Ping @sime in #ddev-for-core-dev on [Drupal Slack](https://www.drupal.org/community/contributor-guide/reference-information/talk/tools/slack).

## Setting up

```
git clone https://git.drupalcode.org/project/drupal.git drupal
cd drupal
ddev config --omit-containers=db --disable-settings-management
ddev start
ddev get simesy/ddev-drupal-core-dev
ddev restart
ddev composer install
```

## Checking the basic workflow

```
ddev drupal list

# Install drupal
ddev drupal install minimal

# Run PHPUnit tests
ddev phpunit core/modules/text/tests/src/Functional/GenericTest.php

# Run Nightwatch tests (currently only runs on Chrome)
ddev nightwatch --tag core
ddev nightwatch --tag a11y:admin --adminTheme seven
```
