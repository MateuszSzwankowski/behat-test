Feature: Test
	This
	Is
	Description

	Scenario: Test test test
		Given I am on "/login"
		When I fill in "username" with "my_username"
		And I fill in "password" with "verysecretpassword"
		And I press "_submit"
		Then I should see "Kalendarz"
	
	Scenario: test2
		Given I am authenticated as "my_username" using "verysecretpassword"
		And I am on "/calendar/29"
		When I wait for the page to be loaded
		And I click the ".event" element with "data-event_id" attribute equal "4807"
		Then I should see "Marki"
	
