<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 29-Jan-18
 * Time: 21:50
 */

namespace Emagia\Character\Skills;

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
     * MagicShieldSkill constructor.
     * @param int $chanceToUse
     */
    public function __construct(int $chanceToUse)
    {
        parent::__construct($chanceToUse);
    }

    /**
     * @param float $damage
     * @return float
     */
    public function apply(float $damage): float
    {
        $damage = $damage / 2;
        return $damage;
    }
}