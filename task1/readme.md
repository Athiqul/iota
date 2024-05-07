### Problem description
Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string is valid.
An input string is valid if:
• Open brackets must be closed by the same type of brackets.
• Open brackets must be closed in the correct order.
• Every close bracket has a corresponding open bracket of the same type.
Example 1:
Input: s = "()"
Output: true
Example 2:
Input: s = "()[]{}"
Output: true
Example 3:
Input: s = "(]"
Output: false
### Solution
1. Making sure the input string is valid checking by opening brackets key and closing bracket value arrays
2.Loop through the input string +2 incrementing cause open brackets always follow odd number of brackets (according to the following problem and example)
3.checking if last index contains a opening bracket it will return false 
4. If output is 1 its means is valid
5. Function name inputStringValidate