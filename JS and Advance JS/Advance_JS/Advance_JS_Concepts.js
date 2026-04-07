//Objects =Grouping the related data Together
//Ways Of Creating the objects:

//Using Object Literals:

/*let students = {
  name: "Vaishnavi",
  roll_no: 39,
  city: "Pune",
};*/

// //Accessing the object elements:
// console.log(students["name"]);
// console.log(students.city);

//Updating the propertise
let person = {
  name: "Vaishnavi",
  age: 21,
};

person.age = 22;

console.log(person);

//5. Deleting properties
let std = {
  name: "Vaishnavi",
  age: 21,
  city: "Pune",
};

delete std.city;

console.log(std);

//Objects WIth Different datatypes
let student = {
  name: "Vaishnavi",
  age: 21,
  isStudent: true,
  skills: ["HTML", "CSS", "JavaScript"],
  address: {
    city: "Pune",
    state: "Maharashtra",
  },
};

console.log(student.name);
console.log(student.skills[1]);
console.log(student.address.city);

//Objects With Methods:

let employee = {
  name: "ABC",
  greet: function () {
    console.log("Hello");
  },
};

employee.greet();

// 9. Nested objects

// An object inside another object is called a nested object.

let emp = {
  id: 101,
  name: "Vaishnavi",
  address: {
    city: "Pune",
    pin: 411001,
  },
};

console.log(emp.address.city);
console.log(emp.address.pin);

// 10. Array of objects

// This is very important in real projects.

let a = [
  { name: "Vaishnavi", age: 21 },
  { name: "Asha", age: 22 },
  { name: "Rohit", age: 20 },
];

console.log(a[0].name);
console.log(a[1].age);

//11. Looping through object properties

for (let key in emp) {
  console.log(key + " : " + emp[key]);
}

//12. Important built-in object methods

console.log(Object.keys(student));

console.log(Object.values(student));

//Object.entries()

console.log(Object.entries(student));

//13. Checking if property exists

console.log("name" in student);
console.log("city" in student);

//Copying objects

let obj1 = {
  name: "Vaishnavi",
  age: 21,
};

let obj2 = { ...obj1 };

obj2.name = "Asha";

console.log(obj1);
console.log(obj2);

//Object destructuring

let { name, age } = student;

console.log(name);
console.log(age);
