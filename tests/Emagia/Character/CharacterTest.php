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
 * @package Tests\Emagia\Character
 */
class CharacterTest extends TestCase
{
    const CHARACTER_NAME = 'OrderusTest';
    /** @var Character */
    protected $character;

    /**
     * Set up
     */
    public function setUp()
    {
        $this->character = new Character(self::CHARACTER_NAME);
        $this->character
            ->setHealth(10)
            ->setStrength(20)
            ->setDefense(30)
            ->setSpeed(40)
            ->setLuck(50);
    }

    /**
     * Test Get Name
     */
    public function testGetName()
    {
        $character = $this->character;
        self::assertEquals(self::CHARACTER_NAME, $character->getName());
    }

    /**
     * Test Set and Get Health
     */
    public function testSetHealth()
    {
        $character = $this->character;
        self::assertEquals(10, $character->getHealth());
        $character->setHealth(40);
        self::assertEquals(40, $character->getHealth());
    }

    /**
     * Test Set and Get Strength
     */
    public function testSetStrength()
    {
        $character = $this->character;
        self::assertEquals(20, $character->getStrength());
        $character->setStrength(35);
        self::assertEquals(35, $character->getStrength());
    }

    /**
     * Test Set and Get Defense
     */
    public function testSetDefense()
    {
        $character = $this->character;
        self::assertEquals(30, $character->getDefense());
        $character->setDefense(52);
        self::assertEquals(52, $character->getDefense());
    }

    /**
     * Test Set and Get Speed
     */
    public function testSetSpeed()
    {
        $character = $this->character;
        self::assertEquals(40, $character->getSpeed());
        $character->setSpeed(18);
        self::assertEquals(18, $character->getSpeed());
    }

    /**
     * Test Set and Get Luck
     */
    public function testSetLuck()
    {
        $character = $this->character;
        self::assertEquals(50, $character->getLuck());
        $character->setLuck(72);
        self::assertEquals(72, $character->getLuck());
    }
}