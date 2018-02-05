<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 05-Feb-18
 * Time: 22:18
 */
namespace Tests\Emagia\Character;

use Emagia\Character\Hero;
use PHPUnit\Framework\TestCase;

/**
 * Class HeroTest
 * @package Tests\Emagia\Character
 */
class HeroTest extends TestCase
{
    const HERO_NAME = 'OrderusTest';
    /** @var Hero */
    private $hero;

    /**
     * Set up
     */
    public function setUp()
    {
        $this->hero = new Hero(self::HERO_NAME);
        $this->hero
            ->setHealth(10)
            ->setStrength(20)
            ->setDefense(30)
            ->setSpeed(40)
            ->setLuck(50);
    }
}