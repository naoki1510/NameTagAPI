<?php

namespace naoki1510\nametagapi;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener

class NameTagAPI extends PluginBase implements Listener{
    /** @var NameTagAPI */
    public static $instance;
    
    /** @var self */
    public static function getInstance() : self{
        return self::instance;
    }
    
    /** @var int */
    public const POS_LEFT = 0;
    public const POS_RIGHT = 1;

    /** @var NameTag */
    public $tags;

    public function onEnable() {
        self::instance = $this;
    }
    
    public function setTag(Plugin $plugin, Player $player, string $tag, int $pos = self::POS_LEFT) {
        if (isset($this->tags[$player->getName()])) {
            $ntag = $this->tags[$player->getName()];
            switch ($pos) {
                case self::POS_LEFT: 
                    $ntag->setLeft($plugin, $tag);
                break;
                {
                case self::POS_RIGHT: 
                    $ntag->setRight($plugin, $tag);
                break;
            }
        }else {
            $ntag = new NameTag($player);
            switch ($pos) {
                case self::POS_LEFT: 
                    $ntag->setLeft($plugin, $tag);
                break;
                {
                case self::POS_RIGHT: 
                    $ntag->setRight($plugin, $tag);
                break;
            }
            $this->tags[$player->getName()] = $ntag;
        }
    }
    
    public function setColor(Plugin $plugin, Player $player, string $color) {
        if (isset($this->tags[$player->getName()])) {
            $ntag = $this->tags[$player->getName()];
            $ntag->setColor($color);
        }else {
            $ntag = new NameTag($player);
            $ntag->setColor($color);
            $this->tags[$player->getName()] = $ntag;
        }
    }
}