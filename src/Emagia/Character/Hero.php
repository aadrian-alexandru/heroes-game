<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 29-Jan-18
 * Time: 22:25
 */
namespace Emagia\Character;

use Emagia\Character\Skills\AbstractSkill;

/**
 * Class Hero
 * @package Emagia\Character
 */
class Hero extends Character
{
    /** @var array */
    protected $skills = array();

    /**
     * @return array
     */
    public function getSkills(): array
    {
        return $this->skills;
    }

    /**
     * @param array $skills
     * @return Hero
     */
    public function setSkills(array $skills): Hero
    {
        $this->skills = $skills;
        return $this;
    }

    /**
     * @param AbstractSkill $skill
     * @return Hero
     */
    public function addSkill(AbstractSkill $skill): Hero
    {
        if (!$this->hasSkill($skill)) {
            $this->skills[] = $skill;
        }

        return $this;
    }

    /**
     * @param AbstractSkill $skill
     * @return bool
     */
    public function hasSkill(AbstractSkill $skill): bool
    {
        foreach ($this->skills as $havingSkill) {
            if ($havingSkill instanceof $skill) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param AbstractSkill $skill
     * @return Character
     */
    public function removeSkill(AbstractSkill $skill): Character
    {
        foreach ($this->skills as $key => $havingSkill) {
            if ($havingSkill instanceof $skill) {
                unset($this->skills[$key]);
            }
        }

        return $this;
    }
}