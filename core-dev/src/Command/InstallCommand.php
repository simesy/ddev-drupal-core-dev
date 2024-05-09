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
    $filesystem = new Filesystem();
    $settings = __DIR__ . '/../../../../sites/default';
    $filesystem->chmod($settings, 0775, 0000, false);
    try {
      $filesystem->remove($settings . '/settings.php');
      $filesystem->remove($settings . '/files');
      $output->writeln('Removed a previous installation.');
    }
    catch (IOException $e) {
      // This would fail if there was no previous installation, naively proceed to install Drupal.
    }

    $return = parent::execute($input, $output);
    $filesystem->chmod($settings, 0777, 0000, false);
    return $return;
  }

}
