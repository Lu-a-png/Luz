<?php

namespace Luz;

use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\permission\Permission;
use pocketmine\entity\effect\EffectInstance;
use pocketmine\entity\effect\VanillaEffects;

class Main extends PluginBase {

    public function onEnable(): void {
        $this->getLogger()->notice("§aInfinite Lighting Plugin v2.0 successfully activated!\n§eby:  [Lu-a-png]");
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool {
        if ($cmd->getName() === "ligth") {
            if (!$sender instanceof Player) {
                $sender->sendMessage("This command can only be used by players.");
                return true;
            }
            if (count($args) < 1) {
                $sender->sendMessage("Use: /ligth <on|off>");
                return false;
            }
            if ($sender->hasPermission("luz.cmd")) {
                switch (strtolower($args[0])) {
                    case "on":
                        $effect = new EffectInstance(VanillaEffects::NIGHT_VISION(), INT32_MAX, 1, false);
                        $sender->getEffects()->add($effect);
                        $sender->sendTip("§7[§6LIGHT§7] §aLight Activated Successfully!");
                        return true;
                    case "off":
                        $sender->getEffects()->remove(VanillaEffects::NIGHT_VISION());
                        $sender->sendTip("§7[§6LIGHT§7] §4Light Deactivated Successfully!");
                        return true;
                    default:
                        $sender->sendMessage("Use: /ligth <on|off>");
                        return false;
                }
            } else {
                $sender->sendMessage("§c You do not have permission to use this command.");
            }
        }
        return true;
    }
}
