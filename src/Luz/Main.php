<?php

namespace Luz;
//Base
use pocketmine\plugin\PluginBase as Wolf;
//Comandos 
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
//Efeitos
use pocketmine\entity\Effect; 
use pocketmine\entity\EffectInstance;
//Tempo
use const INT32_MAX;

class Main extends Wolf {
  
  public function onEnable(){
    $this->getLogger()->notice("§aPlugin Lanterna v2.0 ativado com sucesso!\n§eCriador:  WolfZeroStar");
  }
  
  public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool {
    switch($cmd->getName()){
      case "luz":
        if($sender->hasPermission("luz.cmd")){
          if(!isset($args[0])){
            $sender->sendMessage("§6Use: /luz <on|off>");
            return true;
            }
            switch($args[0]){
              
              case "on":
                //$effect = new EffectInstance(Effect::getEffect(16), INT32_MAX, 1, false);
                $sender->getPlayer()->addEffect($effect);
                $effect = new EffectInstace::getEffect(16), INT32_MAX, 1, false;
                
                $sender->sendMessage("§7[§6LUZ§7] §aLuz Ativada Com Sucesso !");
                return true;
              case "off":
                //$player = $sender->getPlayer();
                $sender->getPlayer()->removeEffect(16);
                
                $sender->sendMessage("§7[§6LUZ§7] §4Luz Desativada Com Sucesso !");
                }
             }
         }
      return true;
      }
}
