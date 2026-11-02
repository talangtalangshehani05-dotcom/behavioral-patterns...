# Reflection Questions — Suggested Answers

Personalize these answers based on your actual implementation experience before submitting.

## 1. Which Behavioral Design Pattern was easiest to implement? Explain your answer.
I found the **Iterator pattern** the easiest to understand and implement because its purpose is straightforward: it allows records to be accessed one at a time without exposing the collection’s internal array. In PHP, the built-in `IteratorAggregate` interface makes it possible to support `foreach` cleanly. This helped me see how an interface can provide a consistent way to traverse a collection.

## 2. Which pattern was the most difficult to implement? Explain why.
I found the **Interpreter pattern** the most challenging because it requires translating a query into expressions and evaluating those expressions against student data. Supporting logical operators such as `AND` and `OR` requires clear separation between terminal expressions and compound expressions. Testing different queries is important to ensure that the result is correct.

## 3. Which Behavioral Design Pattern do you think is most useful in real-world applications? Explain.
I think the **Strategy pattern** is very useful in real-world applications because it allows an application to switch between different algorithms without changing the class that uses them. For example, a grading system could use simple average, weighted average, or another grading policy. The same idea can be applied to payment methods, shipping calculations, sorting, and other business rules.
