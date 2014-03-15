<?php
namespace Perry\Representation\Eve\v1;
use Perry\Representation\Reference;

use Perry\Representation\Base;

class TournamentStaticSceneData extends Base
{
    /**
     * @var array
     */
    public $globalObjects = array();

    /**
     * @var array
     */
    public $ships = array();

    /**
     * @param array $globalObjects
     */
    public function setGlobalObjects($globalObjects)
    {
        // iterating over call global objects to fill them with their references
        foreach ($globalObjects as $object) {

            $object->type = new Reference($object->type);

            // a global object might contain further references
            if (isset($object->planetOrMoonInfo) && !is_null($object->planetOrMoonInfo)) {
                // reference to 1st heightMap
                $object->planetOrMoonInfo->heightMap1 = new Reference(
                    $object->planetOrMoonInfo->heightMap1,
                    "Dear CCP please document this representation"
                );

                // reference to shader Preset
                $object->planetOrMoonInfo->shaderPreset = new Reference(
                    $object->planetOrMoonInfo->shaderPreset,
                    "Dear CCP please document this representation"
                );

                // reference to 2nd heightMap
                $object->planetOrMoonInfo->heightMap2 = new Reference(
                    $object->planetOrMoonInfo->heightMap2,
                    "Dear CCP please document this representation"
                );
            }
            $this->globalObjects[] = $object;
        }
    }

    /**
     * @param array $ships
     */
    public function setShips($ships)
    {
        foreach ($ships as $ship) {

            $ship->item = new Reference($ship->item);
            $ship->type = new Reference($ship->type);
            $ship->character = new Reference($ship->character, "vnd.ccp.eve.Character-v1");

            foreach ($ship->turrets as $tkey => $turret) {
                $ship->turrets[$tkey] = new Reference($turret);
            }
            $this->ships[] = $ship;
        }
    }
}
