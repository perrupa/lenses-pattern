<?php

class Lens {
	private $path;
	private $defaultValue;

	function __construct(array $path = [], $defaultValue = null)
	{
		$this->path = $path;
		$this->defaultValue = $defaultValue;
	}

	public function get( $obj )
	{
		return $this->recurseProperties( $obj, $this->path );
	}

	private function recurseProperties( $obj, $path )
	{
		// shift first element off the list
		$head = array_shift( $path );

		if ( ! array_key_exists( $head, $obj ) ) {
			return $this->defaultValue;
		}

		$objectAtIndex = $obj[$head];

		if ( count($path) === 0 ) {
			return $objectAtIndex;
		}

		return $this->recurseProperties( $objectAtIndex, $path );
	}

}
