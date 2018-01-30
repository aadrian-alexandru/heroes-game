<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 29-Jan-18
 * Time: 21:53
 */

namespace Emagia\Character\Skills;

/**
 * Class AbstractSkill
 * @package Emagia\Character\Skills
 */
class AbstractSkill
{
    const TYPE_ATTACK = 'attack';
    const TYPE_DEFENSE = 'defense';

    /** @var string */
    protected $type;
    /** @var int */
    protected $chanceToUse;

    /**
     * AbstractSkill constructor.
     * @param int $chanceToUse
     */
    public function __construct(int $chanceToUse)
    {
        $this->chanceToUse = $chanceToUse;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getChanceToUse(): int
    {
        return $this->chanceToUse;
    }

    /**
     * Will apply
     *
     * This function returns a boolean value depending on
     * chance/probability (percentage) set for the current skill
     *
     * @return bool
     */
    protected function wiillApply(): bool
    {
        return rand(0, 99) < $this->getChanceToUse();
    }
}