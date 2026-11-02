# Video Presentation Script

Use this as a guide, not as a requirement to read every word verbatim. Keep your face and screen visible throughout the recording, as required by the activity.

## 1. Introduction
“Good day! In this video, I will demonstrate my PHP project for Laboratory Activity #4: Applying Behavioral Design Patterns Using PHP. The project uses plain PHP and contains demonstrations of the 11 Behavioral Design Patterns listed in our activity. I will focus on Chain of Responsibility, Command, Iterator, and Strategy.”

## 2. Chain of Responsibility
“Chain of Responsibility passes a request through a sequence of handlers. Each handler checks whether it can handle the request. If it cannot, it passes the request to the next handler. In this student request system, Student Affairs, Registrar, Finance, and ICT are arranged in a chain. For a Transcript of Records request, the Registrar handles it.”

Action: Open `01-chain-of-responsibility/index.php`, run it, and point out the handler chain and output.

## 3. Command
“The Command pattern represents an action as an object. The invoker executes a command without needing to know the details of how the action works. This example supports actions such as enrolling a student, dropping a subject, and printing registration. It also demonstrates undo by reversing the most recent reversible action.”

Action: Open `02-command/index.php`, run it, and explain the invoker, command interface, concrete commands, and undo behavior.

## 4. Iterator
“The Iterator pattern provides a standard way to go through a collection without exposing its internal storage. In this example, student records are stored in a collection and accessed sequentially using PHP’s iterator interface and `foreach`.”

Action: Open `04-iterator/index.php`, run it, and explain why the client does not need to access the internal array directly.

## 5. Strategy
“The Strategy pattern puts alternative algorithms behind a common interface. The grade calculator can use simple average or weighted average. We can change the strategy without changing the calculator’s main class.”

Action: Open `09-strategy/index.php`, run it, and compare the two outputs.

## 6. Brief overview of the other patterns
“The project also includes Interpreter for student queries, Mediator for student communication, Memento for restoring a previous profile, Observer for grade notifications, State for enrollment status, Template Method for report generation, and Visitor for record operations.”

Action: Briefly show the folders and run one or two additional examples if time permits.

## 7. Reflection / experience
“While implementing the patterns, I learned that each pattern solves a different communication or behavior problem between objects. I had to pay attention to interfaces, class responsibilities, and how objects work together. Testing each example helped me understand the purpose of the pattern rather than just copying its structure.”

Adapt this paragraph to reflect what you actually found easy or difficult and the challenges you personally experienced. Do not claim to have experienced a problem you did not encounter.

## 8. Closing
“That concludes my demonstration of the four selected Behavioral Design Patterns and the complete project. Thank you for watching.”
