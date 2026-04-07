async function loadUsers() {
  try {
    let res = await fetch("https://jsonplaceholder.typicode.com/users");

    if (!res.ok) {
      throw new Error("API failed");
    }

    let data = await res.json();

    let list = document.getElementById("list");

    data.forEach((user) => {
      let li = document.createElement("li");
      li.innerText = user.name;

      list.appendChild(li);
    });
  } catch (err) {
    console.log(err);
  }
}

loadUsers();
