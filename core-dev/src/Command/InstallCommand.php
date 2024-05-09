<?php
#ddev-generated

namespace DrupalCoreDev\Command;

use Drupal\Core\Command\InstallCommand as CoreInstallCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Extends Drupal install site command.
 */
class InstallCommand extends CoreInstallCommand {

  /**
   * {@inheritdoc}
   */
  function execute(InputInterface $input, OutputInterface $output): int {

    // Minimally prepare Drupal for installation if it was previously installed.
    $filesystem = new Filesystem();
    $settings = __DIR__ . '/../../../../sites/default';
    $filesystem->chmod($settings, 0775, 0000, false);
    if ($filesystem->exists($settings . '/settings.php')) {
      $filesystem->remove($settings . '/settings.php');
    }
    if ($filesystem->exists($settings . '/files')) {
      $filesystem->remove($settings . '/files');
    }

    // Run the core installer.
    $return = parent::execute($input, $output);

    // Keep settings directory readable for users who want to manually remove.
    $filesystem->chmod($settings, 0777, 0000, false);
    $filesystem->chmod($settings . '/settings.php', 0775, 0000, false);
    return $return;
  }

}
