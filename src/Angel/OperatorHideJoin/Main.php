<?php

namespace Angel\OperatorHideJoin;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\utils\TextFormat;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{

    public function onEnable(){
       $this->getServer()->getPluginManager()->registerEvents($this, $this);
       $this->saveDefaultConfig();
       $this->getLogger()->info(TextFormat::DARK_GREEN . "Operator join is invisible now." . TextFormat::GREEN . " (Crypt)");
    }
	
	public function onJoin(PlayerJoinEvent $event){
		if($event->getPlayer()->isOp()){
		   $player = $event->getPlayer();
		   $name = $player->getName();
		   $event->setJoinMessage(false);
                   $eff = new EffectInstance(Effect::getEffect(Effect::INVISIBILITY), 500 * 20, 1, false);
                   $player->addEffect($eff);
		}
	}
	
	public function onQuit(PlayerQuitEvent $event){
		if($event->getPlayer()->isOp()){
		   $player = $event->getPlayer();
		   $name = $player->getName();
		   $event->setQuitMessage(false);
		}
	}
}
