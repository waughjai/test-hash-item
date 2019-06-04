<?php

declare( strict_types = 1 );
namespace WaughJ\TestHashItem;

class TestHashItem
{
	public static function exists( array $list, string $key ) : bool
	{
		return array_key_exists( $key, $list );
	}

	public static function getExists( array $list, string $key, $fallback = null )
	{
		return $list[ $key ] ?? $fallback;
	}

	public static function isString( array $list, string $key ) : bool
	{
		return self::testIs( 'is_string', $list, $key );
	}

	public static function getString( array $list, string $key, $fallback = null )
	{
		return self::test( 'is_string', $list, $key, $fallback );
	}

	public static function isArray( array $list, string $key ) : bool
	{
		return self::testIs( 'is_array', $list, $key );
	}

	public static function getArray( array $list, string $key, $fallback = null )
	{
		return self::test( 'is_array', $list, $key, $fallback );
	}

	public static function isBool( array $list, string $key ) : bool
	{
		return self::testIs( 'is_bool', $list, $key );
	}

	public static function getBool( array $list, string $key, $fallback = null )
	{
		return self::test( 'is_bool', $list, $key, $fallback );
	}

	public static function isNumeric( array $list, string $key ) : bool
	{
		return self::testIs( 'is_numeric', $list, $key );
	}

	public static function getNumeric( array $list, string $key, $fallback = null )
	{
		return self::test( 'is_numeric', $list, $key, $fallback );
	}

	public static function isObject( array $list, string $key ) : bool
	{
		return self::testIs( 'is_object', $list, $key );
	}

	public static function getObject( array $list, string $key, $fallback = null )
	{
		return self::test( 'is_object', $list, $key, $fallback );
	}

	public static function isClass( string $class, array $list, string $key ) : bool
	{
		return self::testIs
		(
			function( $value ) use ( $class ): bool
			{
				return is_a( $value, $class );
			},
			$list,
			$key
		);
	}

	public static function getClass( string $class, array $list, string $key, $fallback = null )
	{
		return ( self::isClass( $class, $list, $key ) ) ? $list[ $key ] : $fallback;
	}

	public static function isTrue( array $list, string $key ) : bool
	{
		return self::getExists( $list, $key ) && $list[ $key ];
	}

	public static function test( callable $function, array $list, string $key, $fallback = null )
	{
		return ( self::testIs( $function, $list, $key ) ) ? $list[ $key ] : $fallback;
	}

	public static function testIs( callable $function, array $list, string $key ) : bool
	{
		return self::exists( $list, $key ) && $function( $list[ $key ] );
	}
}
