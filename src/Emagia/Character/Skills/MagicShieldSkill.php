<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 29-Jan-18
 * Time: 21:50
 */

namespace Emagia\Character\Skills;
use Emagia\Character\Character;

/**
 * Class MagicShieldSkill
 *
 * Takes only half of the usual damage when an enemy attacks; there’s a 20% change
 * he’ll use this skill every time he defends
 *
 * @package Emagia\Character\Skills
 */
class MagicShieldSkill extends AbstractSkill
{
    /** @var string */
    protected $type = self::TYPE_DEFENSE;

    /**
     * @param Character $attacker
     * @param Character $defender
     */
    public function apply(Character &$attacker, Character &$defender)
    {
        $damage = $attacker->getStrength() - $defender->getDefense();
        $damage = $damage / 2;
        $defenderHealth = $defender->getHealth() - $damage;
        $defender->setHealth($defenderHealth);
    }
}