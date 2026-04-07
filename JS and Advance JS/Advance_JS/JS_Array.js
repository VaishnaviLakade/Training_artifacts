console.log("----- Array Practice Start -----");

let arr = [10, 20, 30];

arr.push(40);
console.log("Push:", arr);

arr.pop();
console.log("Pop:", arr);

arr.unshift(5);
console.log("Unshift:", arr);

arr.shift();
console.log("Shift:", arr);

arr.forEach((x) => console.log("Value:", x));

let doubled = arr.map((x) => x * 2);
console.log("Map:", doubled);

let filtered = arr.filter((x) => x > 15);
console.log("Filter:", filtered);

let sum = arr.reduce((a, b) => a + b, 0);
console.log("Reduce:", sum);

console.log("Includes 20:", arr.includes(20));

let sorted = [5, 1, 3].sort((a, b) => a - b);
console.log("Sorted:", sorted);

console.log("----- Array Practice End -----");
