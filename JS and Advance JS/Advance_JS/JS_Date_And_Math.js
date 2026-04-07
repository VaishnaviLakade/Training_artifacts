console.log("----- Date & Math Practice Start -----");

let d = new Date();

console.log("Date:", d.toDateString());
console.log("Time:", d.toLocaleTimeString());

console.log("Year:", d.getFullYear());
console.log("Month:", d.getMonth());
console.log("Day:", d.getDate());

let timestamp = Date.now();
console.log("Timestamp:", timestamp);

let random = Math.floor(Math.random() * 10) + 1;
console.log("Random number:", random);

console.log("Max:", Math.max(10, 20, 30));
console.log("Min:", Math.min(10, 20, 30));

console.log("Power:", Math.pow(2, 3));
console.log("Square root:", Math.sqrt(16));

console.log("Absolute:", Math.abs(-5));

let d1 = new Date("2026-04-01");
let d2 = new Date("2026-04-05");

let diff = (d2 - d1) / (1000 * 60 * 60 * 24);

console.log("Days difference:", diff);
