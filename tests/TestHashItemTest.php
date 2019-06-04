<?php

use PHPUnit\Framework\TestCase;
use \WaughJ\TestHashItem\TestHashItem;

class TestHashItemTest extends TestCase
{
	public function testItemExists() : void
	{
		$has_color = [ 'color' => 'red' ];
		$no_color = [];
		$this->assertEquals( TestHashItem::exists( $has_color, 'color' ), true );
		$this->assertEquals( TestHashItem::exists( $no_color, 'color' ), false );
		$this->assertEquals( TestHashItem::getExists( $has_color, 'color', null ), 'red' );
		$this->assertEquals( TestHashItem::getExists( $no_color, 'color', function( string $name ){ echo $name; } ), function( string $name ){ echo $name; } );
	}

	public function testItemString() : void
	{
		$color = [ 'color' => 'red' ];
		$number = [ 'color' => 255000000 ];
		$this->assertEquals( TestHashItem::isString( $color, 'color' ), true );
		$this->assertEquals( TestHashItem::isString( $number, 'color' ), false );
		$this->assertEquals( TestHashItem::getString( $color, 'color', null ), 'red' );
		$this->assertEquals( TestHashItem::getString( $number, 'color', false ), false );
		$this->assertEquals( TestHashItem::getString( $number, 'name', true ), true );
	}

	public function testItemArray() : void
	{
		$array = [ 'color' => [ 255, 0, 0 ] ];
		$number = [ 'color' => 255000000 ];
		$this->assertEquals( TestHashItem::isArray( $array, 'color' ), true );
		$this->assertEquals( TestHashItem::isArray( $number, 'color' ), false );
		$this->assertEquals( TestHashItem::getArray( $array, 'color', 'werasf' ), [ 255, 0, 0 ] );
		$this->assertEquals( TestHashItem::getArray( $number, 'color', 'pvpova' ), 'pvpova' );
		$this->assertEquals( TestHashItem::getArray( $number, 'name', 234 ), 234 );
	}

	public function testItemBool() : void
	{
		$switch1 = [ 'value' => false ];
		$switch2 = [ 'value' => 1 ];
		$this->assertEquals( TestHashItem::isBool( $switch1, 'value' ), true );
		$this->assertEquals( TestHashItem::isBool( $switch2, 'value' ), false );
		$this->assertEquals( TestHashItem::getBool( $switch1, 'value', 'cbbewa' ), false );
		$this->assertEquals( TestHashItem::getBool( $switch2, 'value', 'adfgdfg' ), 'adfgdfg' );
		$this->assertEquals( TestHashItem::getBool( $switch2, 'color', [ 2, 4, 6 ] ), [ 2, 4, 6 ] );
	}

	public function testItemNumeric() : void
	{
		$switch1 = [ 'value' => 1 ];
		$switch2 = [ 'value' => true ];
		$this->assertEquals( TestHashItem::isNumeric( $switch1, 'value' ), true );
		$this->assertEquals( TestHashItem::isNumeric( $switch2, 'value' ), false );
		$this->assertEquals( TestHashItem::getNumeric( $switch1, 'value', 'asfsfw' ), 1 );
		$this->assertEquals( TestHashItem::getNumeric( $switch2, 'value', 'dsklsdkjgl' ),'dsklsdkjgl' );
		$this->assertEquals( TestHashItem::getNumeric( $switch2, 'color', 'dskasdfl' ), 'dskasdfl' );
	}

	public function testItemObject() : void
	{
		$list = [ 'value' => [ 'name' => 'Guy' ] ];
		$object = [ 'value' => ( object )([ 'name' => 'Guy' ]) ];
		$this->assertEquals( TestHashItem::isObject( $list, 'value' ), false );
		$this->assertEquals( TestHashItem::isObject( $object, 'value' ), true );
		$this->assertEquals( TestHashItem::getObject( $list, 'value', 'fdhfhjj' ), 'fdhfhjj' );
		$this->assertEquals( TestHashItem::getObject( $object, 'value', 'dhshfhf' ), ( object )([ 'name' => 'Guy' ]) );
	}

	public function testItemClass() : void
	{
		$list = [ 'date-string' => '2018-10-22', 'date-obj' => new \DateTime( '2018-10-22' ) ];
		$this->assertEquals( TestHashItem::isClass( 'DateTime', $list, 'date-string' ), false );
		$this->assertEquals( TestHashItem::isClass( 'DateTime', $list, 'date-obj' ), true );
		$this->assertEquals( TestHashItem::isClass( \DateTime::class, $list, 'date-obj' ), true );
		$this->assertEquals( TestHashItem::isClass( 'Date', $list, 'date-obj' ), false );

		$this->assertEquals( TestHashItem::getClass( 'DateTime', $list, 'date-string', null ), null );
		$this->assertEquals( TestHashItem::getClass( 'DateTime', $list, 'date-obj', null ), new \DateTime( '2018-10-22' ) );
		$this->assertEquals( TestHashItem::getClass( \DateTime::class, $list, 'date-obj', null ), new \DateTime( '2018-10-22' ) );
		$this->assertEquals( TestHashItem::getClass( 'Date', $list, 'date-obj', null ), null );
	}

	public function testItemIsTrue() : void
	{
		$switch1 = [ 'value' => true ];
		$switch2 = [ 'value' => 1 ];
		$switch3 = [ 'value' => 0 ];
		$switch4 = [ 'value' => 'afdafsaf' ];
		$switch5 = [ 'value' => '' ];
		$switch6 = [ 'value' => null ];
		$switch7 = [ 'value' => false ];
		$this->assertEquals( TestHashItem::isTrue( $switch1, 'value' ), true );
		$this->assertEquals( TestHashItem::isTrue( $switch2, 'value' ), true );
		$this->assertEquals( TestHashItem::isTrue( $switch3, 'value' ), false );
		$this->assertEquals( TestHashItem::isTrue( $switch4, 'value' ), true );
		$this->assertEquals( TestHashItem::isTrue( $switch5, 'value' ), false );
		$this->assertEquals( TestHashItem::isTrue( $switch6, 'value' ), false );
		$this->assertEquals( TestHashItem::isTrue( $switch7, 'value' ), false );
	}
}
