Feature: Test
	To
	Jest
	Opis

	Scenario: Test test test
		Given I am on "/login"
		When I fill in "username" with "dominik"
		And I fill in "password" with "superkurwatajnehasło123!@#"
		And I press "_submit"
		Then I should see "Kalendarz"
