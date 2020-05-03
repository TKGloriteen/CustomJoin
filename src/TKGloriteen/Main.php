<?php

namespace TKGloriteen;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {

    public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getLogger()->info("§aCustomJoin enabled");
        $this->saveDefaultConfig();
    }
	public function onJoin(PlayerJoinEvent $event){
		$player = $event->getPlayer();
		$name = $player->getName();
		
		$join = $this->getConfig()->get("JoinMsg");
		$join = str_replace("{player}", $name, $join);
		
        $event->setJoinMessage($join);
    }
	public function onQuit(PlayerQuitEvent $event){
		$player = $event->getPlayer();
		$name = $player->getName();
		
		$quit = $this->getConfig()->get("QuitMsg");
		$quit = str_replace("{player}", $name, $quit);
		
		$event->setQuitMessage($quit);
		}
}