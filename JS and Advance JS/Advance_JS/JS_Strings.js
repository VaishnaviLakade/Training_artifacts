let str = "JavaScript";

console.log("Length:", str.length);
console.log("Uppercase:", str.toUpperCase());
console.log("Lowercase:", str.toLowerCase());

console.log("Includes Script:", str.includes("Script"));
console.log("Starts with Java:", str.startsWith("Java"));

console.log("Slice:", str.slice(0, 4));

let text = "Hello World";
console.log("Replace:", text.replace("World", "JS"));

let spaced = "   Hello   ";
console.log("Trim:", spaced.trim());

let fruits = "apple,banana,mango";
let arr = fruits.split(",");
console.log("Array:", arr);

let word = "hello";
let reversed = word.split("").reverse().join("");
console.log("Reversed:", reversed);

let name = "vaishnavi";
let capital = name.charAt(0).toUpperCase() + name.slice(1);
console.log("Capitalized:", capital);

console.log("----- String Practice End -----");
