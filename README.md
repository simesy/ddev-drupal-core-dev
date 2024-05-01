# DDEV Drupal Core Development plugin

## Context of the fork

I maintain this fork of [justafish/ddev-drupal-core-dev](https://github.com/justafish/ddev-drupal-core-dev)
for my own tinkering. I have diverged parts of it from the upstream, so please be aware
that my requirements may differ from yours.

I keep the [upstream branch](https://github.com/simesy/ddev-drupal-core-dev/tree/upstream) aligned with
the upstream along with anything I may be looking to get merged upstream.

Ping @sime in #ddev-for-core-dev on [Drupal Slack](https://www.drupal.org/community/contributor-guide/reference-information/talk/tools/slack).

## Philosophy

1. I'm working on Drupal core: Drupal repo first, tooling is secondary.
2. My tooling never makes "git status" dirty.
3. My tooling doesn't alter the Drupal application.

## Setting up

```
# Clone the Drupal core codebase into the current directory.
git clone https://git.drupalcode.org/project/drupal.git drupal
cd drupal

# Configure and start a minimal DDEV project.
# This creates a .ddev folder and DDEV manages its own .gitingore
ddev config --omit-containers=db --disable-settings-management
ddev start

# Use DDEV to install Drupal's composer dependencies. The host machine does not need PHP.
ddev composer install

# Get the latest release of this plugin. This adds files to the .ddev folder.
ddev get simesy/ddev-drupal-core-dev
ddev restart
```

## Installing and Testing

```
# This plugin provides a "drupal" command, see what it offers.
ddev drupal list

# Install (or re-install) Drupal.
ddev drupal install minimal

# Run a small sample of PHPUnit tests.
ddev phpunit core/modules/text/tests/src/Functional/GenericTest.php

# Run Nightwatch tests.
ddev nightwatch --tag core

# Todo, I have temporarily removed a lot of examples here.
```
