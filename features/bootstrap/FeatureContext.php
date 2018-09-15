<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Context\TranslatableContext;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }
	
	/**
	* @Given /^I am authenticated as "([^"]*)" using "([^"]*)"$/
	*/
	public function iAmAuthenticatedAs($username, $password) {
		$this->visit('/login');
		$this->waitForThePageToBeLoaded();
		$this->fillField('username', $username);
		$this->fillField('password', $password);
		$this->pressButton('_submit');
	}
	
	/**
	* @When /^I click the "([^"]*)" element with "([^"]*)" attribute equal "([^"]*)"$/
	*/
	public function iClickTheElement($class, $attribute, $value) {
		$page = $this->getSession()->getPage();
		$elements = $page->findAll('css', $class);
		if (empty($elements)) {
			throw new Exception("No element found with class ('$class')");
		}

		foreach ($elements as $el){
			if ($el->hasAttribute($attribute) && $el->getAttribute($attribute) == $value) {
				$el->click();
				return;
			}
		}

		throw new Exception("No element found with ('$attribute') equal ('$value')");
	}
	
	/**
	 * @When /^I wait for the page to be loaded$/
	 */
	public function waitForThePageToBeLoaded()
	{
		$this->getSession()->wait(10000, "document.readyState === 'complete'");
	}
	
}
