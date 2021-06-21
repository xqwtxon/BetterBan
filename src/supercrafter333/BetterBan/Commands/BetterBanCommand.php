<?php

namespace supercrafter333\BetterBan\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use supercrafter333\BetterBan\BetterBan;
use supercrafter333\BetterBan\Forms\BBDefaultForms;

/**
 * Class BetterBanCommand
 * @package supercrafter333\BetterBan\Commands
 */
class BetterBanCommand extends Command implements PluginIdentifiableCommand
{

    /**
     * BetterBanCommand constructor.
     * @param string $name
     * @param string $description
     * @param string|null $usageMessage
     * @param array $aliases
     */
    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        parent::__construct("betterban", "Open the BetterBan Form!", $usageMessage, $aliases);
    }

    /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param array $args
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        if ($sender instanceof Player) {
            $sender->sendForm(BBDefaultForms::openMenuForm());
            return;
        } else {
            $sender->sendMessage("Only In-Game!");
            return;
        }
    }

    /**
     * @return Plugin
     */
    public function getPlugin(): Plugin
    {
        return BetterBan::getInstance();
    }
}