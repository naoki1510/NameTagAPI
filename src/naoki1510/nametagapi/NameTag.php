<?php

use pocketmine\Player;

class NameTag  {
    /** @var Player */
    public $player;
    
    /** @var string[] */
    public $lefttag;
    public $righttag;
    
    /** @var string */
    public $color;
    
    public function __construct(Player $player) {
        $this->player = $player;
        $this->lefttag = [];
        $this->righttag = [];
    }
    
    public function setLeft(Plugin $plugin, string $tag) {
        $this->lefttag[$plugin->getName()] = $tag;
        $this->sendTag();
    }
    
    public function setLeft(Plugin $plugin, string $tag) {
        $this->righttag[$plugin->getName()] = $tag;
        $this->sendTag();
    }

    /** Colorは§を含まない */
    public function setColor(string $color) {
        $this->color = '§' . $color;
        $this->sendTag();
    }
    
    public function sendTag() {
        $this->player->setNameTag(
            implode(' ', $this->lefttag) . 
            $this->color .
            $this->player->getName() .
            implode(' ', $this->righttag)
        );
    }
}