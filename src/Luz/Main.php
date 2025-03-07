<?php

declare(strict_types=1);

namespace Luz;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\entity\effect\EffectInstance;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\math\Vector3;

class Main extends PluginBase implements Listener {

    private const LIGHT_DURATION = 2147483647;
    private const LIGHT_THRESHOLD = 7;
    private array $autoLightPlayers = [];

    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("Infinite Lighting Plugin v3.5");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if ($command->getName() !== "light") {
            return false;
        }

        if (!$sender instanceof Player) {
            $sender->sendMessage("§cExclusive command for players");
            return true;
        }

        if (!$sender->hasPermission("light.use")) {
            $sender->sendMessage("§cNo permission");
            return true;
        }

        if (!isset($args[0])) {
            $sender->sendMessage("§eUse: /light <auto|on|off>");
            return true;
        }

        match (strtolower($args[0])) {
            "auto" => $this->toggleAutoLight($sender),
            "on" => $this->enableLight($sender),
            "off" => $this->disableLight($sender),
            default => $sender->sendMessage("§eUse: /light <auto|on|off>")
        };

        return true;
    }

    private function toggleAutoLight(Player $player): void {
        $name = $player->getName();
        
        if (isset($this->autoLightPlayers[$name])) {
            unset($this->autoLightPlayers[$name]);
            $this->disableLight($player);
            $player->sendTip("§cAuto mode disabled");
        } else {
            $this->autoLightPlayers[$name] = true;
            $this->checkLightLevel($player);
            $player->sendTip("§aAuto mode activated");
        }
    }

    public function onPlayerMove(PlayerMoveEvent $event): void {
        $player = $event->getPlayer();
        if (isset($this->autoLightPlayers[$player->getName()])) {
            $this->checkLightLevel($player);
        }
    }

    private function checkLightLevel(Player $player): void {
        $pos = $player->getPosition();
        $blockPos = new Vector3($pos->getFloorX(), $pos->getFloorY(), $pos->getFloorZ());
        $level = $player->getWorld()->getFullLight($blockPos);

        if ($level <= self::LIGHT_THRESHOLD) {
            if (!$player->getEffects()->has(VanillaEffects::NIGHT_VISION())) {
                $this->enableLight($player);
            }
        } else {
            if ($player->getEffects()->has(VanillaEffects::NIGHT_VISION())) {
                $this->disableLight($player);
            }
        }
    }

    private function enableLight(Player $player): void {
        $effect = new EffectInstance(
            VanillaEffects::NIGHT_VISION(),
            self::LIGHT_DURATION,
            0,
            false
        );
        
        $player->getEffects()->add($effect);
        if (!isset($this->autoLightPlayers[$player->getName()])) {
            $player->sendTip("§aLight on");
        }
    }

    private function disableLight(Player $player): void {
        $player->getEffects()->remove(VanillaEffects::NIGHT_VISION());
        if (!isset($this->autoLightPlayers[$player->getName()])) {
            $player->sendTip("§cLight off");
        }
    }
}