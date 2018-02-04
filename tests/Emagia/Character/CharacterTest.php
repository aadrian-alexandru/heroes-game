<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 29-Jan-18
 * Time: 21:03
 */
namespace tests\Emagia\Character;

use Emagia\Character\Character;
use PHPUnit\Framework\TestCase;

/**
 * Class CharacterTest
 * @package tests\Emagia\Character
 */
class CharacterTest extends TestCase
{
    const HERO_NAME = 'OrderusTest';
    /** @var Character */
    private $character;

    public function setUp()
    {
        $this->character = new Character(self::HERO_NAME);
        $this->character
            ->setHealth(10)
            ->setStrength(20)
            ->setDefense(30)
            ->setSpeed(40)
            ->setLuck(50);
    }

    public function testGetHealth()
    {
        $character = $this->character;
        self::assertEquals(10, $character->getHealth());
    }

    public function testSetHealth()
    {
        $character = $this->character;
        self::assertEquals(10, $character->getHealth());
        $character->setHealth(40);
        self::assertEquals(40, $character->getHealth());
    }
}