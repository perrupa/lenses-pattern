<?php
include 'Lens.php';

class LensTest extends PHPUnit_Framework_TestCase
{
	public function setUp() {
		$this->lens = new Lens( ['name', 'first'], "Unknown" );

		$this->marlow = [
				'name' => [
					'first' => 'Chris',
					'last' => 'Marlow'
				]
			];

		$this->wolverine = [
				'name' => [
					'last' => 'Logan'
				]
			];
	}

	public function testLensesWork()
	{
		$this->assertInstanceOf( 'Lens', $this->lens,
			'Subject is a Lens' );
		$this->assertNotNull( $this->lens ,
			'Lens ain\'t null' );
	}

	public function testCanGetAValue()
	{
		$firstName = $this->lens->get( $this->marlow );

		$this->assertNotNull( $firstName ,
			'NullObject properties are never null' );
		$this->assertEquals( "Chris", $firstName,
			'Lens can read an existing property');
	}

	public function testCanShowADefaultValue()
	{
		$firstName = $this->lens->get( $this->wolverine );

		$this->assertNotNull( $firstName ,
			"Lens results aren't null" );
		$this->assertEquals( "Unknown", $firstName,
			"Lens can show default when there's no value");
	}

}


function logger( $msg ) {
	print_r( "\n" );
	print_r( $msg );
	print_r( "\n" );
}