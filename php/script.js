let xhr = new XMLHttpRequest();

xhr.onreadystatechange = ((ev) => {
    console.log(ev);
});

document.getElementById("new-message").onsubmit = ((e) => {
    e.preventDefault();

    if (document.getElementById("msg").value !== "") {
        xhr.open("POST", "/api.php");
        xhr.send(`msg=${document.getElementById("msg")}`);
    }
});
