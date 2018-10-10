<?php

use PHPUnit\Framework\TestCase;

class TestHashItemTest extends TestCase
{
	public function testItemExists() : void
	{
		$has_color = [ 'color' => 'red' ];
		$no_color = [];
		$this->assertEquals( \WaughJ\TestHashItem\TestHashItemExists( $has_color, 'color', null ), 'red' );
		$this->assertEquals( \WaughJ\TestHashItem\TestHashItemExists( $no_color, 'color', function( string $name ){ echo $name; } ), function( string $name ){ echo $name; } );
	}

	public function testItemString() : void
	{
		$color = [ 'color' => 'red' ];
		$number = [ 'color' => 255000000 ];
		$this->assertEquals( \WaughJ\TestHashItem\TestHashItemString( $color, 'color', null ), 'red' );
		$this->assertEquals( \WaughJ\TestHashItem\TestHashItemString( $number, 'color', false ), false );
		$this->assertEquals( \WaughJ\TestHashItem\TestHashItemString( $number, 'name', true ), true );
	}

	public function testItemArray() : void
	{
		$array = [ 'color' => [ 255, 0, 0 ] ];
		$number = [ 'color' => 255000000 ];
		$this->assertEquals( \WaughJ\TestHashItem\TestHashItemArray( $array, 'color', 'werasf' ), [ 255, 0, 0 ] );
		$this->assertEquals( \WaughJ\TestHashItem\TestHashItemArray( $number, 'color', 'pvpova' ), 'pvpova' );
		$this->assertEquals( \WaughJ\TestHashItem\TestHashItemArray( $number, 'name', 234 ), 234 );
	}

	public function testItemBool() : void
	{
		$switch1 = [ 'value' => true ];
		$switch2 = [ 'value' => 1 ];
		$this->assertEquals( \WaughJ\TestHashItem\TestHashItemBool( $switch1, 'value', 'cbbewa' ), true );
		$this->assertEquals( \WaughJ\TestHashItem\TestHashItemBool( $switch2, 'value', 'adfgdfg' ), 'adfgdfg' );
		$this->assertEquals( \WaughJ\TestHashItem\TestHashItemBool( $switch2, 'color', [ 2, 4, 6 ] ), [ 2, 4, 6 ] );
	}

	public function testItemNumeric() : void
	{
		$switch1 = [ 'value' => 1 ];
		$switch2 = [ 'value' => true ];
		$this->assertEquals( \WaughJ\TestHashItem\TestHashItemNumeric( $switch1, 'value', 'asfsfw' ), true );
		$this->assertEquals( \WaughJ\TestHashItem\TestHashItemNumeric( $switch2, 'value', 'dsklsdkjgl' ),'dsklsdkjgl' );
		$this->assertEquals( \WaughJ\TestHashItem\TestHashItemNumeric( $switch2, 'color', 'dskasdfl' ), 'dskasdfl' );
	}
}
