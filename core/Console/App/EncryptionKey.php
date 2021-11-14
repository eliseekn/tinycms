<?php

/**
 * @copyright 2021 - N'Guessan Kouadio Elisée (eliseekn@gmail.com)
 * @license MIT (https://opensource.org/licenses/MIT)
 * @link https://github.com/eliseekn/tinymvc
 */

namespace Core\Console\App;

use Core\Support\Config;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Generate application encryption key
 */
class EncryptionKey extends Command
{
    protected static $defaultName = 'app:key';

    protected function configure()
    {
        $this->setDescription('Generate application encryption key');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        Config::loadEnv();

        Config::saveEnv([
            'APP_ENV' => env('APP_ENV') . PHP_EOL,
            'APP_NAME' => env('APP_NAME') . PHP_EOL,
            'APP_URL' => env('APP_URL') . PHP_EOL,
            'APP_LANG' => env('APP_LANG') . PHP_EOL . PHP_EOL,
            'DB_DRIVER' => env('DB_DRIVER') . PHP_EOL,
            'DB_NAME' => env('DB_NAME') . PHP_EOL,
            'DB_HOST' => env('DB_HOST') . PHP_EOL,
            'DB_PORT' => env('DB_PORT') . PHP_EOL,
            'DB_USERNAME' => env('DB_USERNAME') . PHP_EOL,
            'DB_PASSWORD' => env('DB_PASSWORD') . PHP_EOL . PHP_EOL,
            'MAILER_TRANSPORT' => env('MAILER_TRANSPORT') . PHP_EOL,
            'MAILER_HOST' => env('MAILER_HOST') . PHP_EOL,
            'MAILER_PORT' => env('MAILER_PORT') . PHP_EOL,
            'MAILER_USERNAME' => env('MAILER_USERNAME') . PHP_EOL,
            'MAILER_PASSWORD' => env('MAILER_PASSWORD') . PHP_EOL . PHP_EOL,
            'ENCRYPTION_KEY' => generate_token()
        ]);

        $output->writeln('<info>Application encryption key has been generated</info>');

        return Command::SUCCESS;
    }
}
