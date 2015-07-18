<?php
namespace xhfx\join;

use pocketmine\plugin\PluginBase;  
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener{ //Class name needs to be same as the file name.
    public function onEnable(){
        $this->saveDefaultConfig(); //Saves the config if you need one.
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onJoin(PlayerJoinEvent $event){
        $player = $event->getPlayer();
        foreach($this->getConfig()->get("joinmessages") as $message){
            $player->sendMessage($message);
        }
    }
}
