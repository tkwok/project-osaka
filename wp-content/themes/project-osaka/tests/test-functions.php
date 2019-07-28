<?php
/**
 * Class TestFunctions
 *
 * @package demandbase
 */

class TestFunctions extends WP_UnitTestCase {
  function setUp() {
		parent::setUp();
    // switch current theme to demandbase in the WordPress test instance
		switch_theme('project-osaka');
	}

  /**
  * Test to ensure demandbase theme is applied into test WordPress test instance
  * True if demandbase is the current theme
  */
  function testActiveTheme() {
    $this->assertTrue(wp_get_theme() == 'Project Osaka');
	}

  /**
  * Test to ensure Twenty Nineteen theme is not the active theme in the WordPress test instance
  * False if Twenty Nineteen theme is not the current theme
  */
	function testInactiveTheme() {
    $this->assertFalse(wp_get_theme() == 'Twenty Nineteen');
	}
}
