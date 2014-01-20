<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

class KillmailAttacker extends Base
{
    public $character;
    public $shipType;
    public $corporation;
    public $alliance;
    public $faction;

    /**
     * @param array|object $character
     */
    public function setCharacter($character)
    {
        $this->character = new Reference($character, "vnd.ccp.eve.Character-v1");
    }

    /**
     * @param array|object $corporation
     */
    public function setCorporation($corporation)
    {
        $this->corporation = new Reference($corporation, "vnd.ccp.eve.Corporation-v1");
    }

    /**
     * @param array|object $shipType
     */
    public function setShipType($shipType)
    {
        $this->shipType = new Reference($shipType, "Dear CCP please document this representation");
    }

    /**
     * @param array|object $alliance
     */
    public function setAlliance($alliance)
    {
        $this->alliance = new Reference($alliance, "Dear CCP please document this representation");
    }

    /**
     * @param array|object $faction
     */
    public function setFaction($faction)
    {
        $this->faction = new Reference($faction, "Dear CCP please document this representation");
    }
}