Feature: Sample Tests
In order to test the API
I need to be able to test the API

Scenario: Get Questions
Given I have the payload:
"""
"""
When I request "GET /api/v1/questions"
Then the response is JSON
Then the response contains a question

Scenario: Add Question
Given I have the payload:
"""
{
	"title": "Behat",
	"question": "Is it Awesome?",
	"poll_id": 4
}
"""
When I request "POST /api/v1/questions"
Then the response is JSON
Then the question contains a title of "Behat"
