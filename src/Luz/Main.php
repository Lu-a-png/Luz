<?php

namespace Luz;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\command\ConsoleCommandSender;
use const INT32_MAX;

class Main extends PluginBase {

    public function onEnable(){
        $this->getLogger()->notice("§aPlugin de Iluminação Infinita v2.0 ativado com sucesso!\n§eCriador:  [WolfZeroStar, Lu-a-png, Luriuker]\n§aInfinite Lighting plugin v2.0 successfully activated\n§gCreator: [WolfZeroStar, Lu-a-png, Luriuker]");
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool {
        if($cmd->getName() === "luz"){
            if ($sender instanceof ConsoleCommandSender) {
                $sender->sendMessage("§cEste comando só pode ser usado no jogo.");
                return false;
            }
            if(count($args) < 1) {
                $sender->sendMessage("Use: /light <on|off>");
                return false;
            }
            if($sender->hasPermission("luz.cmd")){
                switch($args[0]){
                    case "on":
                        $sender->addEffect(16, INT32_MAX, 1, false);
                        $sender->sendMessage("§7[§6LIGHT§7] §aLight Activated Successfully !");
                        return true;
                    case "off":
                        $sender->removeEffect(16);
                        $sender->sendMessage("§7[§6LIGHT§7] §4Light Deactivated Successfully !");
                        return true;
                }
            } else {
                $sender->sendMessage("§c Você não tem permissão");
            }
        }
        return true;
    }
}
