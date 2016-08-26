<?php

namespace xhfx\join;

use pocketmine\plugin\PluginBase;  
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener{
    
    public $config;
    public $msgs;
    
    public function onEnable(){
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->config = $this->getConfig();
        $msg = $this->config->getAll();
        $this->msgs = $msg["joinmessages"];
    }
    
    public function onJoin(PlayerJoinEvent $e){
        $player = $e->getPlayer();
        foreach($this->msgs as $message){
            $player->sendMessage($message);
        }
    }
    
}
