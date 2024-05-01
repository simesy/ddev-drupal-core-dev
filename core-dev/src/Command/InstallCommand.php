<?php
#ddev-generated

namespace DrupalCoreDev\Command;

use Drupal\Core\Command\InstallCommand as CoreInstallCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
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
    $settings = __DIR__ . '/../../../../sites/default/settings.php';
    $files = __DIR__ . '/../../../../sites/default/files';
    $filesystem->chmod($files . '/../', 0755);
    $filesystem->chmod($settings, 0777, 0000, true);
    $filesystem->remove($settings);
    $filesystem->chmod($files, 0777, 0000, true);
    $filesystem->remove($files);
    return parent::execute($input, $output);
  }
}
