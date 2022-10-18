document.getElementById("new-message").addEventListener("submit", ((ev) => {
    if (document.getElementByName("msg").value === "")
    {
        ev.preventDefault();
    }
}));
window.scrollTo(0, document.body.scrollHeight);
