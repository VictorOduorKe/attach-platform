
document.addEventListener("DOMContentLoaded", function () {
    fetch("./../db_connect/insertToAttachment.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "csrf_token=" + encodeURIComponent("<?php echo $_SESSION['csrf_token']; ?>")
    })
    .then(response => response.text())
    .then(data => console.log(data)) 
    .catch(error => console.error("Error:", error));
});
