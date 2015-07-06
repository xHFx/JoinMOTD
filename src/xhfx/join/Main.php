<?php

namespace xhfx/join;

use pocketmine\plugin\PluginBase;  
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent; // Why you need this on JoinMOTD?
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\player\Player;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{ //Class name needs to be same as the file name.

        public function translateColors($message, $symbol = &){

                $message = str_replace($symbol."0", TextFormat::BLACK, $message);
                $message = str_replace($symbol."1", TextFormat::DARK_BLUE, $message);
                $message = str_replace($symbol."2", TextFormat::DARK_GREEN, $message);
                $message = str_replace($symbol."3", TextFormat::DARK_AQUA, $message);
                $message = str_replace($symbol."4", TextFormat::DARK_RED, $message);
                $message = str_replace($symbol."5", TextFormat::DARK_PURPLE, $message);
                $message = str_replace($symbol."6", TextFormat::GOLD, $message);
                $message = str_replace($symbol."7", TextFormat::GRAY, $message);
                $message = str_replace($symbol."8", TextFormat::DARK_GRAY, $message);
                $message = str_replace($symbol."9", TextFormat::BLUE, $message);
                $message = str_replace($symbol."a", TextFormat::GREEN, $message);
                $message = str_replace($symbol."b", TextFormat::AQUA, $message);
                $message = str_replace($symbol."c", TextFormat::RED, $message);
                $message = str_replace($symbol."d", TextFormat::LIGHT_PURPLE, $message);
                $message = str_replace($symbol."e", TextFormat::YELLOW, $message);
                $message = str_replace($symbol."f", TextFormat::WHITE, $message);
        
                $message = str_replace($symbol."k", TextFormat::OBFUSCATED, $message);
                $message = str_replace($symbol."l", TextFormat::BOLD, $message);
                $message = str_replace($symbol."m", TextFormat::STRIKETHROUGH, $message);
                $message = str_replace($symbol."n", TextFormat::UNDERLINE, $message);
                $message = str_replace($symbol."o", TextFormat::ITALIC, $message);
                $message = str_replace($symbol."r", TextFormat::RESET, $message);
        
                return $message;
        }
        
        public function onLoad(){
                $this->getLogger()->info(TextFormat::DARKRED . "Join MOTD has Been Loaded!!!");
        }
        public function onEnable(){
                $this->getServer()->getPluginManager()->registerEvents($this, $this);
                $this->getLogger()->info(TextFormat::DARKRED . "Join MOTD has been Enabled!");
                $this->saveDefaultConfig(); //Saves the config if you need one.
        }
        public function onDisable(){
                $this->getLogger()->info(TextFormat::DARKRED . "Join MOTD has been disabled.");
}
  public function onJoin(PlayerJoinEvent $event){
  $jmessage1 = $this->getConfig()->get("joinmessage1");
  $jmessage2 = $this->getConfig()->get("joinmessage2");
  $jmessage3 = $this->getConfig()->get("joinmessage3");
  $jmessage4 = $this->getConfig()->get("joinmessage4");
  $player = $event->getPlayer();
  $player->sendMessage($this->translateColors($jmessage1));
  $player->sendMessage($this->translateColors($jmessage2));
  $player->sendMessage($this->translateColors($jmessage3));
  $player->sendMessage($this->translateColors($jmessage4));
      }
  }
