<?php

declare( strict_types = 1 );
namespace WaughJ\TestHashItem
{
	function TestHashItemExists( array $list, string $key, $fallback = null )
	{
		return ( is_array( $list ) && isset( $list[ $key ] ) ) ? $list[ $key ] : $fallback;
	}

	function TestHashItemString( array $list, string $key, $fallback = null )
	{
		return TestHashItem( 'is_string', $list, $key, $fallback );
	}

	function TestHashItemArray( array $list, string $key, $fallback = null )
	{
		return TestHashItem( 'is_array', $list, $key, $fallback );
	}

	function TestHashItemBool( array $list, string $key, $fallback = null )
	{
		return TestHashItem( 'is_bool', $list, $key, $fallback );
	}

	function TestHashItemNumeric( array $list, string $key, $fallback = null )
	{
		return TestHashItem( 'is_numeric', $list, $key, $fallback );
	}

	function TestHashItem( callable $function, array $list, string $key, $fallback = null )
	{
		return ( TestHashItemExists( $list, $key, false ) && $function( $list[ $key ] ) ) ? $list[ $key ] : $fallback;
	}
}
