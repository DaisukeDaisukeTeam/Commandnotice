<?php

namespace Lovetwice1012\Commandnotice;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
	
class Main extends PluginBase implements Listener{

	public function onEnable(): void{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onChat(PlayerCommandPreprocessEvent $event)
    {

        $player = $event->getPlayer();
        $user = $player->getName();
        $m = $event->getMessage();
        if (substr($m, 0, 1) == "/") {
            $this->getLogger()->info("§a$user §fがコマンド:§6$m §fを使用しました。");
            $players = Server::getInstance()->getOnlinePlayers();
            foreach ($players as $player) {
                if ($this->getServer()->isOp($player)) {
                    $player->sendMessage("§a$user §fがコマンド: §6$m §fを使用しました。");
                }
            }
        }
        if (substr($m, 0, 2) == "./") {
            $this->getLogger()->info("§a$user §fがコマンド: §6$m §fを使用しました。"); //infoにめっせーじを送る
            $players = Server::getInstance()->getOnlinePlayers();
            foreach ($players as $player) {
                if ($this->getServer()->isOp($player)) {
     $player->sendMessage("§a$user §fがコマンド: §6$m §fを使用しました。");
                }
            }
        }
    }

}
