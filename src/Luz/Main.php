<?php

namespace Luz;
//Base
use pocketmine\{Player, Server};
use pocketmine\plugin\PluginBase as Wolf;
//Comandos 
use pocketmine\command\{CommandSender, Command, ConsoleCommandSender};
//Efeitos
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
//Tempo
use const INT32_MAX;

class Main extends Wolf {

  protected static $effects = [];
  private $visible;
  private $duration;
  
  public function onEnable(){
    $this->getLogger()->notice("§aPlugin de Iluminação Infinita v2.0 ativado com sucesso!\n§eCriador:  [WolfZeroStar, Lu-a-png, Luriuker]\n§aInfinite Lighting plugin v2.0 successfully activated\n§gCreator: [WolfZeroStar, Lu-a-png, Luriuker]");
  }
  
  public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool {
    switch($cmd->getName()){
      case "luz":
        if ($sender instanceof ConsoleCommandSender) {
			$sender->sendMessage("§cEste comando só pode ser usado no jogo.");
			return false;
		}
    	if(count($args) < 1) {
			$sender->sendMessage("Use: /luz <on|off>");
			return false;
        }
        if($sender->hasPermission("luz.cmd")){
          if(!isset($args[0])){
            $sender->sendMessage("§c Você não tem permissão");
            return true;
            }
            switch($args[0]){
              
              case "on":
                $sender->getEffect(16)->getDuration(INT32_MAX)->getEffectLevel(1)->isVisible(false);
                $sender->sendMessage("§7[§6LUZ§7] §aLuz Ativada Com Sucesso !");

                return true;
              case "off":
             
                $sender->getEffect()->removeEffect(16);
                $sender->sendMessage("§7[§6LUZ§7] §4Luz Desativada Com Sucesso !");
                }
             }
         }
      return true;
      }
   
}
