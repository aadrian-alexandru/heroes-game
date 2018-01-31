<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 31-Jan-18
 * Time: 19:36
 */

namespace Emagia;


/**
 * Class GameSettings
 *
 * This class is used exclusively as a set of default values
 * for Gameplay initialization step
 *
 * @package Emagia
 */
final class GameSettings
{
    const HERO_HEALTH_RANGE = array(70, 100);
    const HERO_STRENGTH_RANGE = array(70, 80);
    const HERO_DEFENSE_RANGE = array(45, 55);
    const HERO_SPEED_RANGE = array(40, 50);
    const HERO_LUCK_RANGE = array(10, 30);

    const WILDBEAST_HEALTH_RANGE = array(60, 90);
    const WILDBEAST_STRENGTH_RANGE = array(60, 90);
    const WILDBEAST_DEFENSE_RANGE = array(40, 60);
    const WILDBEAST_SPEED_RANGE = array(40, 60);
    const WILDBEAST_LUCK_RANGE = array(25, 40);

    const HERO_RAPID_STRIKE_SKILL_CHANCE = 10;
    const HERO_MAGIC_SHIELD_SKILL_CHANCE = 20;
}